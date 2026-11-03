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
