# Customer names with explicit evidence

Imported customer records can contain numeric accounting labels, empty contact
names or different character forms. Those presentation defects should be
corrected without treating conflicting identities as interchangeable people.

A bounded maintenance tool previews reviewed name corrections, verifies account
and invoice ownership, and compares original values before writing. It refuses
financial fields and contact-number changes. A private recovery journal is
flushed before updates, including on legacy tables that cannot participate in a
single transaction. Audit events record the operation without copying customer
names or contact details.

Sixteen synthetic checks cover preview behavior, forbidden fields, identity and
phone mismatches, concurrent edits, recovery, and preservation of payment data.
Syntax and whitespace checks also pass. The tool is prepared for live preflight;
no messages or financial records were created by these tests. Ambiguous identity
and historical-credit decisions remain explicit review items.
