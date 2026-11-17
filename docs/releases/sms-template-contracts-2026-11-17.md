# Consistent notification templates

A stock notification could place a product title and purchase link in slots
that did not match the registered message. The replacement now waits for
provider approval of the exact copy. Subscriptions remain pending during that
wait, and deferred jobs check stock again before sending.

Titles respect provider length limits, malformed links are refused, and an HTTP
success response alone no longer counts as an accepted notification. The admin
catalog reflects registered copy and identifies retired message paths. Existing
notification cursors, customer balances and campaign audiences are preserved.

Validation includes 94 synthetic assertions across notification regression,
approval and stock-message contracts, plus PHP syntax and whitespace checks.
The checks cover pending approval, operator overrides, duplicate deferred jobs,
malformed responses and stock rechecks. They create no real customer messages or
commercial records. Handset delivery is outside this verification scope.

The release is prepared for installation. Provider approval, installed settings
and actual delivery are separate states; an approved catalog entry alone does
not prove that every business event has a connected sender.
