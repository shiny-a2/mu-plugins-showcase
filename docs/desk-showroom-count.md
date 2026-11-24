# Branch showroom count and club customer view

A store-counter app now gives staff a daily, branch-specific way to check products available for immediate dispatch. Each brand shows progress, while each product row brings its image, reference, website price and stock reference together with the observed showroom count and price. Staff can add a known catalog product or record an item that search does not find. Submitting a count creates a review request. A designated reviewer can approve it to update the store.

A manager-only view lists in-person club customers for the manager's branch. The customer detail presents local invoices and counter adjustments with their recorded reasons, alongside clearly identified club-wide balance activity. Branch access is enforced by the API as well as the interface.

The interface was reviewed with synthetic data at mobile and desktop widths in light and dark themes, including the product count state and the customer detail sheet. The release also includes a branch-scope guard check. No real customer transaction or stock change was created for presentation tests.

Releases: `v1.1.0-desk-showroom-count`, `v1.1.1-desk-count-polish`, `v1.1.2-desk-exclude-sets` and `v1.1.3-desk-staff-login`. The follow-up keeps validation feedback visible inside the active form and returns the staff member to the saved item’s brand. Paired watches are not counted twice; staff may use a branch-scoped password sign-in or the existing SMS code. Production code, staff credentials and customer data remain in the private repository or server configuration.

Desk 1.8.4 separates models from physical units and excludes stock assigned only to another branch. A one-action brand confirmation records only uncounted models for manager review and preserves earlier observations, including missing products. It does not directly change online stock or selling prices. Scoped branch and batch checks, PHP syntax, and interactive light/dark mobile/desktop checks passed. After installation, read-only catalogue and summary checks excluded unassigned rows and the counter route responded normally. No real count was submitted solely for testing; the first staff use remains an operational acceptance check.

## Showroom price and stock approval in Desk 1.8.8

Staff see the units assigned to their branch, the regular price and a separate sale price. They can open the featured photo to confirm the model. A quantity-only approval keeps the current discount. When the regular price changes, the reviewer sees whether the discount will be removed or replaced. Entering zero removes it.

Individual requests and brand counts appear in the assigned reviewers’ Desk inboxes. Opening a notification takes the reviewer to the relevant count or brand. One approval applies the change. Retrying an approved request leaves stock and prices intact.

An isolated WooCommerce installation verified the payable price and the quantity remaining at the other branch. Browser checks covered the photo viewer, reviewer notifications, approval and rejection in both themes at mobile and desktop widths. After deployment we checked the effective branch permissions, inbox availability and device notification schedule on the running site.
