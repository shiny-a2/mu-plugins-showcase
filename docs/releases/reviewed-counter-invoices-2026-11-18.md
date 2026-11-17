# Consistent reviewed invoices and customer standing

Status: implemented and tested candidate; production activation and historical corrections await owner approval.

A sale entered manually and later imported can appear twice. Once its original accounting evidence has been reviewed, reports should count the sale once and explain why its retained copy is excluded. The candidate gives staff a clear reviewed-duplicate label while preserving invoice history and branch/date filters. Missing or changed evidence still requires review.

Repeated accounting imports also respect earlier source-backed corrections. An amount, payment or item discrepancy is held for review, and a concurrent edit is preserved. A source-backed correction plan is prepared separately; unresolved identities and accounting amounts remain protected rather than guessed.

Validation includes 34 importer checks, 26 reviewed re-import assertions using isolated database queries, 45 reconciliation checks and related customer-standing/report tests. Twelve interactive invoice and error states, plus standing views, passed at mobile/desktop widths in light and dark themes. A separate stock-callback replay check used synthetic storage and products. No real invoice, account balance or message was changed by these checks. Target-database concurrency and live staff acceptance remain unverified.
