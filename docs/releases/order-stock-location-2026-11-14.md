# Order location reporting — 14 November 2026

Order operations and internal order cards now use the same location information.
A confirmed assignment or recorded item allocation shows the actual branch name;
current product stock is clearly identified as a suggestion. Orders sourced from
multiple locations keep item-level details, while missing data remains explicit.

Staff can choose a branch or return to automatic reporting. Changes retain the
previous location, operator and time in the existing audit trail, and reach the
bot through normal order-update polling. A failed save is reported as a failure.

Validation uses synthetic order data: location/authorization/save checks, a
producer-to-consumer contract test and real caption/update functions, plus staff
modal save/reopen/reset and failure checks at mobile and desktop widths. No
customer record or test message was created. Production delivery is verified by
source hashes, task health and read-only contract checks; actual group delivery
is left to normal polling rather than a forced message replay.
