# Putting a loyalty club on a shop that is already selling

Notes from building the storefront half of a points and wallet programme for a live WooCommerce
store. The ledger that decides what a customer holds is a separate concern; this is about the part
that feeds it and shows the result, and about the failures that only appear once real money and
real customers are involved.

Nothing here is client code. The examples are rewritten and the specifics are removed.

## A section that shows an empty balance is worse than no section

The storage layer was not approved yet, so there was nothing real to display. The obvious move is to
ship the interface anyway and let it render zeros until the data arrives.

That is the wrong way round. A customer who opens their account and sees **0 points** does not read
"this feature is not switched on yet". They read "my points are gone", and they contact support
about it.

So every part stays invisible until a provider is registered against its filter: no markup, no
scheduled job, not even a database query. "Installed" and "switched on" became two separate states,
and the preflight reports which one a site is in rather than leaving it to be assumed.

## Hashing something guessable is not hiding it

This lesson arrived three times in three different disguises.

**An identifier that was already public.** An internal customer reference was going to be a digest
of a user id "for privacy". But the same database stores that id in plain sight on every order and
every row of user metadata, so hashing it hid nothing from anyone who could read the ledger — while
making support questions unanswerable and implying an anonymity that was not there. It stayed
readable.

**A digest that was published.** The referral code goes in a URL a customer forwards to friends.
Deriving it from a user id, even through a digest, leaves it enumerable: there are only so many
ids, so computing all of them yields every code in the store. That is a customer list and a way to
credit signups to people who invited nobody. It is random and never derived, and that is asserted at
the source level, because the guarantee is the absence of an API rather than the behaviour of one.

**A fraud signal that looked private.** The anti-abuse comparison only needs equality, so it stores
hashes rather than addresses and IPs — which is right, and which the ledger enforces by refusing
anything that is not a full-length digest. What the ledger cannot see is whether the digest it was
handed is any good. A plain SHA-256 of an IPv4 address is reversed by computing all four billion of
them. A national mobile number is a smaller space than that. So an unkeyed digest of either is the
raw value wearing a hat, while every comment in the system calls the table privacy-safe. Every
signal became an HMAC under a key that lives outside the database.

The rule underneath all three: a digest is only as private as the space of inputs is large.

## An absence is not a value

Hashing an empty field gives every customer who left it blank the same digest. The fraud check then
reads two people who both skipped an optional field as one person, and refuses both their
invitations.

Absent inputs produce no signal at all. The same idea shows up in the customer-facing view: "nothing
is expiring" is reported as *nothing*, not as *zero days*, because zero days means today and would
warn a customer about a deadline that does not exist.

## An exact key set, not a minimum one

A referral panel naturally wants to say "Ali joined using your link". That hands one customer
another customer's identity, on a page the reader can screenshot. It also lets someone invite an
address they already know and use the panel to confirm whether that person shops there.

The fix is not to remember not to add it. The payload is validated against an **exact** key set, so
a data provider that grows a `friends` field has the whole answer refused rather than the new field
rendered. The version almost everyone writes — "are the required keys present?" — passes every test
and quietly publishes whatever else arrives. Both versions were run against the same suite; only the
exact one failed when a friend list was added.

## Two hooks that must never throw, and must never be quiet

The earn calculation runs inside an order status transition, and the referral attribution runs
inside user registration. An uncaught error in either is not a degraded loyalty programme:

- in the first, a customer has paid and their order will not move;
- in the second, a customer cannot create an account.

So nothing thrown by the ledger is allowed out of those files. Deleting the catch does not fail a
test politely — it produces an uncaught fatal, which is exactly what it would do on the real site.

The other half of the trap is subtler. Removing only the *failure record* leaves every other
assertion passing. And a write that fails on every single order while saying nothing looks exactly
like a loyalty programme nobody is using. Failures are logged and kept in a bounded record, surfaced
as an operator notice that **cannot be dismissed** — a dismissed notice is a fault that is still
happening and is now invisible.

## Sweeps go quiet in ways nobody notices

Order events could not be relied on: the store's admin tooling rewrote order totals without emitting
anything, so a listener would miss exactly the changes it existed to catch. The answer was to stop
asking what changed and recompute on a cycle instead. Reconciling is idempotent by design, so
recomputing an unchanged order writes nothing.

Four failure modes closed, each of which is silent:

- **Never wrapping.** The sweep catches up once and then goes quiet forever, looking exactly like a
  sweep with nothing to do.
- **Parking in front of a bad row.** Advancing the cursor only on success means one unreadable
  record stops everything behind it from ever being processed again. The cursor advances either way
  and the failure is recorded instead.
- **A flag instead of a lease.** A run killed by a timeout or a deploy leaves a plain flag set, and
  the job stops permanently with nothing saying so. A lease expires and the next run takes over.
- **An uncapped batch.** A job that decides for itself how much work to do is what makes checkout
  slow. The batch is capped regardless of what configuration asks for.

There is a fifth, upstream of all of them: a scheduling call that returns `false` for an interval
nobody registered. Callers almost always discard that return value, and then the job never runs at
all.

## Units and calendars are money bugs

Two conversions carried real consequences.

The ledger counted in the currency's minor unit; the storefront was written in a unit ten times
larger. Rendering one where the other was expected shows every customer **ten times** their balance.
The store's existing helper did that conversion in floating point, which is also how a balance ends
up a fraction short on some orders and over on others.

And "expires in three days" computed in UTC is a day out for part of every day in a `+03:30`
timezone. A day out on an expiry warning is a customer losing points they were told they still had.
Days are counted as calendar days in the customer's own timezone, and that timezone has no default:
the caller has to state it, so nobody gets it wrong by not thinking about it.

## A balance you can read quickly and still catch lying

A ledger keeps its integrity by never storing a balance: the balance is the sum of the entries. That
is correct and it is also what makes the account page slower for every year a customer stays. The
most loyal customers get the worst page.

The resolution is a checkpoint — not a stored balance, but a balance that was computed, recorded
alongside exactly which entries went into it, and recomputable at any time to check. A read sums the
newest checkpoint plus what came after, bounded by how often checkpoints are taken rather than by
how long someone has been shopping.

The difference from a stored column is that a checkpoint can be caught lying. A column is only ever
as true as the last write to it.

Two details matter more than they look:

- The covering digest is a **chain**, not a count. Reordering a ledger leaves the total identical,
  so no total can detect it, and a checkpoint that only counted entries would accept a ledger
  rearranged underneath it.
- The chain starts from a value that includes the account it belongs to, so one account's checkpoint
  cannot be presented as another's and still verify.

## Load order is a deployment hazard, not a detail

Must-use plugins load in filename order, with no dependency resolution and no way to say "after that
one". A call to a function in a file that has not loaded is fine — PHP resolves it when it runs.
Which means a **missing** file is not an error at deploy time. It is a fatal on whichever request
first reaches the call.

Most of the forward references sat on paths that only run when someone opens a particular page. One
did not: a hook that runs on *every* front-end request called a validator that lived in a file
sorting after it. Install that one file without its neighbour and the shop returns a fatal on every
page.

The fix was to move the shared shape into a file that sorts early, so the ordering cannot recur; and
then to write a read-only preflight that checks every function and constant used is defined by an
installed file, so the whole class becomes checkable rather than memorable.

## Documentation that is tested

This repository had already shipped a page claiming a capability the code did not have. So the
README for this work is checked against the code:

- the file list is asserted **in both directions**, because a list that is merely a subset of
  reality is exactly how a new file goes undocumented while every assertion still passes;
- the stated load order is compared against filename order;
- every integration filter named must exist in the source — one that is documented but never applied
  is a hook somebody wires up and then wonders why nothing happens;
- the promises are pinned to the code that keeps them, so adding a single write to a view documented
  as read-only fails the test that says so.

Four kinds of documentation lie were planted deliberately. All four failed a test.

## What carried over

- A feature that cannot show the truth should show nothing, not a zero.
- A digest is only as private as its input space is large.
- Validate against an exact set, not a minimum one, wherever the answer will be published.
- A hook inside a transaction must never throw and must never be silent; those are two separate
  bugs with the same cause.
- Anything that runs on a schedule needs a lease, a cap, a wrap, and a cursor that moves past
  failures.
- Prove a guard by removing it. A test that passes with the guard gone was testing something else.
