# Branch showroom count and club customer view

A store-counter app now gives staff a daily, branch-specific way to check products available for immediate dispatch. Each brand shows progress, while each product row brings its image, reference, website price and stock reference together with the observed showroom count and price. Staff can add a known catalog product or record an item that search does not find. The count is a separate operational record; it does not change online stock or selling prices.

A manager-only view lists in-person club customers for the manager's branch. The customer detail presents local invoices and counter adjustments with their recorded reasons, alongside clearly identified club-wide balance activity. Branch access is enforced by the API as well as the interface.

The interface was reviewed with synthetic data at mobile and desktop widths in light and dark themes, including the product count state and the customer detail sheet. The release also includes a branch-scope guard check. No real customer transaction or stock change was created for presentation tests.

Releases: `v1.1.0-desk-showroom-count` and `v1.1.1-desk-count-polish`. The follow-up keeps validation feedback visible inside the active form and returns the staff member to the saved item’s brand. Production code and customer data remain in the private repository.
