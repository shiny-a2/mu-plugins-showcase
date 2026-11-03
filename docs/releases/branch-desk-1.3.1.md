# Branch Desk 1.3.1 — released

A branch manager can now review sales, customers, repairs, recorded inventory and operating costs in one scoped dashboard. Daily sales charts cover the complete selected range, including days with no invoices and negative return totals. Managers can select a day or open the daily table to inspect its exact values. Customer-tier and recorded-cost breakdowns make the supporting reports easier to scan.

The desktop overview places the sales trend directly after its summary figures, with comparison details alongside each other. Mobile uses a single-column layout, readable forms and focused sheets. Both themes use the same typography and shared day/night control.

The release also includes auditable expense corrections and reviewed customer-message preparation. A message preview is separate from sending; uncertain provider results are not automatically retried. Report totals distinguish recorded sales, returns, operating costs and inventory selling value. They do not claim bank reconciliation or profit.

The approved release was deployed with a source backup and recovery point. Verification covered 135 isolated SQL, authorization and messaging-contract checks; 68 local browser states; and 36 authenticated live report views across mobile/desktop and light/dark. Live checks confirmed branch isolation, staff compatibility, private response handling, chart interaction and expense-dialog behavior. Database setup and duplicate constraints were exercised with synthetic temporary data, and installed tables were verified afterward.

Performance checks used bounded report samples and query plans, not a stress test. Security verification covered the changed application boundaries, not a full-site penetration test. No customer message, payment, wallet credit or expense was created for these tests. A real message-delivery pilot and purchase-cost-based profit reporting remain outside the verified scope.

Production source, customer records, credentials and operational evidence remain private.

## Complete-name correction — 1.3.2

Some reports showed a shortened legacy invoice label even though the import retained the customer's complete name. The correction uses that recorded full name in invoice lists, branch customer search, customer details and club groups, with a fallback for older records. It changes display resolution without rewriting customer or financial records.

Verification covered 145 isolated checks, report/dialog rendering with a long synthetic name in both themes and viewport sizes, and a bounded check of the reported case against the live database. Branch scope remains enforced.

## Restricted branch workspaces

Branch staff can now use a focused workspace with the panels assigned to their role. Sellers retain customer lookup and counter services without access to management reports. Branch managers see their own branch reports, while shared club lookup remains available when a customer visits a different store.

Repair access follows the same branch ownership for restricted accounts, including case links, tickets and activity notices. General technician transfer workflows remain available to their existing users. The central service-intake queue is not exposed to branch-restricted accounts.

Validation includes isolated permission checks and repair/Desk regressions, plus mobile and desktop interaction checks in both themes. Credentials and account-specific evidence remain private. A real SMS login is verified separately with the account holder; automated checks do not establish SMS delivery.

Live checks subsequently confirmed the assigned panel access for four staff accounts, cross-branch denial and shared club lookup. Twenty-four authenticated viewport/theme states were exercised, and test sessions were signed out afterward. Repair navigation now revalidates access with the server instead of serving cached session HTML. An owner-assisted OTP request was accepted; completed OTP login remains pending the code received by the account holder.

## Counter workspace redesign — 1.4.0

The counter now keeps customer search and the selected customer's account side by side on desktop. A dedicated navigation rail separates everyday counter work from branch management. On phones, bottom navigation and a single task view keep the workspace usable without squeezing desktop columns onto a narrow screen.

Reports use a scrollable section bar, clearer date filters and restrained metrics around the existing sales chart. Inventory cards, dialogs and login follow the same light and dark theme. Full names wrap, keyboard navigation has visible focus, and fields retain readable mobile sizing. Customer selection remains available when the viewport changes; delayed customer responses cannot overwrite another workspace section.

Validation includes 124 synthetic browser states across light/dark themes and mobile/desktop widths, 145 operations checks, 55 restricted staff checks, and branch/cache isolation checks. Critical text contrast was checked against a 4.5:1 threshold. No real financial entry or customer message was created by these tests. Physical-device OTP delivery and push notifications are outside this release.

The release is live. Twenty-eight authenticated browser states passed for representative seller and branch-manager roles at mobile and desktop widths, including theme changes, customer details and dialog presentation. No JavaScript errors or horizontal page overflow were observed, and the test sessions were signed out afterward.

## Customer welcome intake — 1.5.0

Sellers and branch managers can register a visitor from the customer-search workspace with a mobile number and optional name. The form previews a fixed welcome message linking to the customer account entry page. Existing CRM records keep their identity and source; new records identify the registering branch.

The welcome is sent once per normalized number across branches. Registration and message outcomes are shown separately, including delivery uncertainty. Retrying a form cannot resend an already attempted welcome. Delivery and cost history use the existing branch messaging ledger, without creating customer credit or changing marketing consent.

Thirty-two isolated intake checks and 32 browser form states passed, covering roles, branches, repeated submissions, phone formats, storage failures and uncertain provider responses. Existing operations and access regression checks also passed. Provider responses were synthetic; no real customer communication was sent for testing.

The feature is live. All four staff accounts passed read-only form checks across both themes and viewport sizes. Anonymous, invalid-session, malformed-input and cross-branch requests were denied. Test sessions were revoked after verification; no live customer records or SMS messages were created.

## Branch imports and staff notifications — 1.6.0 prepared

Branch managers can preview and confirm an accounting workbook from the counter workspace. The existing sales importer remains responsible for invoice identity, product matching and club calculations. Branch restrictions apply on the server, repeated confirmation cannot start a second job, and interrupted imports require review instead of an automatic replay.

The staff inbox brings together branch operations, import outcomes, message delivery issues and authorized repair activity. Read status and device subscriptions belong to the signed-in employee. Optional phone notifications contain a generic alert; customer details remain inside the authenticated workspace. Repair permissions continue to control which cases an employee can see.

Validation includes 50 isolated import/notification checks, the existing import and loyalty regressions, actual workbook parsing and branch-linking checks, 78 interactive import/inbox/device-control states, and 56 workspace regression states. Browser fixtures cover permission refusal, opt-in, opt-out, theme changes and narrow screens. No real customer import, payment or message was created for presentation tests.

Implementation is prepared; production deployment and physical-device receipt are still pending. Browser simulations do not establish delivery to an employee's phone.
