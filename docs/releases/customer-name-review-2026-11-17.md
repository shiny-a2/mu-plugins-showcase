# Evidence-backed customer names and loyalty reconciliation

Imported customer records can contain numeric accounting labels, empty contact
names or different character forms. Those presentation defects should be
corrected without treating conflicting identities as interchangeable people.

A bounded maintenance tool previews reviewed name corrections, verifies account
and invoice ownership, and compares original values before writing. It refuses
financial fields and contact-number changes. A private recovery journal is
flushed before updates, including on legacy tables that cannot participate in a
single transaction. Audit events record the operation without copying customer
names or contact details.

The verified name corrections now agree across account, contact and invoice
records. Conflicting identities remain a review queue rather than being merged
based on similar spelling.

A separate accounting review resolves missing payment allocations from original
evidence, acknowledges documented historical voids without replaying their
credits, and identifies a canonical invoice when the same sale was recorded
twice. Corrections retain the original identifier and expiry of remaining credit,
so an existing debt rule does not mistake a split remainder for a new award.
Historical undercredits are reconciled against the same cumulative policy and
are not presented as new purchases or new earning notifications.

The bounded production reconciliation was independently reread: the reviewed
holds cleared, balances matched the approved plan, existing debt remained
unchanged, and unrelated grant and invoice fields were preserved. This is a
loyalty-accounting correction, not a claim that every raw sales record or
ambiguous identity has been resolved.

Validation includes 184 local synthetic assertions and 7 database-adapter checks
using session-local temporary tables. Coverage includes identity boundaries,
concurrent edits, exact payment totals, old source replay, rollback, expiry,
debt boundaries and notification behavior. Syntax, whitespace and publication
safety checks passed. Tests created no real messages, purchases or persistent
financial records.
