# Keeping customer pages out of a page cache

Notes from adding a sensitive-route boundary to a full-page cache on a live,
high-traffic store. Engineering only — no client source, infrastructure or data.

## The shape of the problem

A full-page cache is indiscriminate by design: it stores whatever the first
visitor saw and hands it to the next one. That is exactly what you want for a
catalogue page and exactly what you must never allow for an account page. So
some layer has to decide which routes are private, and every layer that touches
the cache has to agree with it.

The failure mode when they disagree is not subtle. One layer caching a page
another considers private means one customer is served another customer's
account page.

## One registry, consulted by everyone

The route list is a data-only file. A shared helper reads it, and every cache
layer asks the helper rather than holding its own copy: the pre-WordPress
drop-in, the page cache itself, the warmer, the batch rebuilder, the crawler and
the admin tools. None of them keeps an opinion, so none of them can drift.

## The failure that mattered most was an outage, not a leak

The helper is loaded from the early cache drop-in, which runs before the CMS
boots. The registry was loaded with a plain `require`.

A syntax error in that file — from a half-finished edit, a truncated upload, an
interrupted deploy — is a fatal at that point. Not a degraded cache: a blank
page on every URL of a store that is actively selling.

This was reproduced before it was fixed, rather than reasoned about. A probe
printed the line before the require and never reached the line after it.

In PHP 7 and later a parse error inside an included file is a catchable
`ParseError`, so both a broken file and one that throws are survivable. One case
is not: a file that calls `exit()` cannot be caught by anything. That limit is
written down rather than glossed over, because a guard is only trustworthy if
its edges are known.

## Fail closed, then make the closure visible

With no usable registry, every route is treated as private. Nothing is cached,
nothing leaks, the store is slower and correct, and above all it keeps serving.

That was the easy half. The hard half is that it was completely silent.

Every consumer checks the boundary, finds it unusable, and correctly does
nothing. Each of those decisions is right on its own. Together they mean page
caching is off across the entire store, with no error anywhere and one symptom:
the site got slower. That is a serious incident arriving as a vague complaint.

So the helper now explains itself — which path it tried, whether the file was
missing, unreadable, unloadable or rejected, and what the consequence is — and
the admin shows it. A diagnostic nobody can read is the same as no diagnostic.

The most useful field turned out to be the path. The likeliest real cause is a
plugin directory named differently from the default the code assumes, and that
is unfixable without being told which path was tried.

## A queue that starved itself

The cache warmer's crawler skipped rows the boundary refused, but left them in
the pending queue without marking them as attempted. The pending query orders by
id ascending, and an unmarked row always satisfies the retry window, so the same
rows were selected at the front of every batch.

Once the queue held a batch's worth of them, no safe row was ever reached again.
The crawler kept ticking, kept rescheduling, and warmed nothing — indefinitely,
with no error. Refused rows are now retired to a terminal state, counted
separately from genuine fetch failures so an operator can tell a route refused
on purpose from one that broke.

## Checking a deployment instead of documenting it

The install order is helper, then registry, then drop-in, and it is not
negotiable: the drop-in loads the helper and the helper loads the registry.
Install the drop-in first and it fails closed — caching off store-wide, no
error.

A note in a document does not prevent that at two in the morning. So the check
is a script: read-only, safe to run against production, and it refuses the wrong
order, a missing registry, a registry that would kill the early cache, and a
half-upgraded helper/drop-in pair.

That last case exists only because a deliberately planted defect survived the
first round of testing — no test had used a mismatched pair. It is the state
most likely to be missed, because both layers are present, both load, and
nothing looks wrong while the two disagree about which routes are private.

## What the tests had to do differently

The behaviour under test is whether the process survives a registry that kills
it. A test running in the same process would either die alongside the code or
prove nothing about it, so each case runs in a subprocess and the suites run
separately from one another.

Every guard was verified by planting the failure it prevents: removing the parse
guard, failing open instead of closed, treating an unusable registry as safe to
cache, hiding the path from the diagnostics, and four ways of making the
preflight approve a bad deployment.

## Two rules worth carrying elsewhere

**A silent safe failure is still a failure.** Failing closed protected the data
and hid the outage. Both halves needed doing.

**Verify a rollback does not recreate the failure.** Rolling back by deleting the
registry leaves the drop-in loaded with nothing to load — which is the failure
state, not a recovery. The notes say so explicitly.
