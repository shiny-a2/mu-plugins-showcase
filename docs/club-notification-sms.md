# Tier-aware loyalty notifications

## Birthday greetings and wallet credit · November 24, 2026

Customers who paid with their birthday voucher before their birthday receive a greeting on the day itself. The greeting contains their name and the shop’s signature. A repeat run checks the previous attempt before contacting the provider.

Wallet credit notifications resume for new eligible credits. Earlier entries remain available for staff review. Tests in an isolated WooCommerce shop covered unpaid orders, payment on the birthday, and repeated runs with outbound messaging intercepted.

## Silver introductions · November 24, 2026

New silver members receive the standard introduction with their current level, the next level (gold) and the value of their points. The message uses the short Persian name for silver in the field that accepts one word. Seasonal offers have their own wording. Local checks used an intercepted SMS transport to verify field order, credit values and duplicate handling.

## November 17, 2026

Club introductions now describe progress through future purchases, matching the configured qualification rules. They show the current tier and usable reward value without a numeric upgrade gap. The highest tier receives separate copy without an upgrade promise. Staff can select several tiers in one campaign; each explicit batch remains bounded and checks membership again before sending.

Counter purchases now join the existing notification queue at the shared invoice boundary. A new spreadsheet import can produce one purchase confirmation after the customer link settles. Reimporting the same branch, accounting year and invoice does not produce another confirmation. Returns and transactions already paired with a website order are excluded. Conflicting customer links and unresolved financial records stay available for review.

Existing and new members receive an introduction before their first new point or wallet notice. A failed or uncertain introduction does not unlock financial messages, and an ambiguous provider response is not retried automatically. Enabling notifications establishes a cutoff so historical records do not become a broadcast.

Provider approval is checked against the exact requested message text. Pending or differently worded templates stay disabled; the existing scheduled worker activates a route once both checks pass. This prevents a successful template-registration request from being mistaken for approval. The worker stops checking when the requested activation plan is complete.

The authorized installation enables approved purchase confirmations and queues new reward events. Updated introduction and occasion templates still await provider approval. No bulk introduction campaign was launched by installation. Existing qualification thresholds, reward balances and purchase history remain unchanged; a narrowly verified missing profile name was restored from matching contact records.

Validation passed 68 isolated notification assertions, 10 approval-state assertions, 28 importer and reward regression assertions, and 68 checks in an isolated WordPress/WooCommerce environment. These cover duplicate imports, mismatched customers, returned transactions, unknown transport outcomes, exact-copy approval and occasion behavior. Test transport was intercepted. No live purchases, financial records or customer messages were created for testing. Installed files, activation settings and the scheduled worker were checked separately; handset delivery and authenticated staff acceptance are not established by these tests.

This public note contains no customer records, private source or deployment credentials.
