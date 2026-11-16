# Branch count approval and private showroom valuation

Desk 1.7.0 adds a review step between recording a physical count and changing the
website catalogue. Branch managers can approve or reject quantities and unit
prices for their own branch. Review shows the proposed change and makes clear
that the selling price is shared across the website. Rejections include a reason;
edited counts require another review.

Approved counts preserve other branches and supplier stock. Sales and returns
recorded after the physical count are included in the resulting quantity.
Concurrent edits require a fresh preview, and repeated approval cannot apply the
same count twice. Unsupported or ambiguous rows remain available for review.

Aggregate showroom value has a separate permission from unit prices and counts.
General administrators can see it, while ordinary sellers and branch managers
cannot. A specific manager may receive a branch-scoped exception. Explicit Desk
branch restrictions also apply to queued imports, messaging and notifications.
The restrictions do not change the account's role in other applications.

The candidate passed 100 combined integration assertions in an isolated
WordPress/WooCommerce/MariaDB environment, including migration, approval,
rejection, authorization and interrupted-write recovery. Browser checks cover
light/dark mobile and desktop layouts, keyboard focus, conflict recovery,
aggregate visibility and invalid numeric input. No real transaction, message or
catalogue update was created for testing.

Status: implemented and tested; production installation and owner acceptance
are pending. Live compatibility and the first authorized count approval remain
separate verification steps.
