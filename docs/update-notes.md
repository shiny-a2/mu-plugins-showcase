# Public Update Notes

## 2026-09-06 — A Second Ladder, and Partial Credit on the First

- Documented why a single earning rate cannot span channels whose transaction sizes differ by two orders of magnitude: one channel's typical transaction, at another channel's rate, would issue more of the currency in one event than the whole programme has issued since launch.
- Recorded the same failure applied to the standing ladder. Its rungs describe a range that one high-value transaction exceeds several times over, so counting such a transaction whole would park that customer at the top rung permanently and leave the rungs beneath it describing nobody — a ladder disabled by a large number rather than extended by a new source. The operator now sets a percentage, so a genuinely large transaction reaches the top rung without flattening the ladder for everyone else.
- Documented a second ladder for participants who receive money rather than spend it. Placing them on the spending ladder would rank someone who has never purchased as the best customer, and would let anyone reach the top rung's discount by consigning an item; the two ladders now stand side by side in the participant's own panel because they are two true things about one person.
- Based the second ladder on settled net amounts — not asking prices, not transactions that have not been paid out, and not the operator's own commission — so it ranks people for outcomes rather than for uploading photographs.
- Drew nothing at all for a participant with no activity on the second ladder, on the grounds that a ladder somebody is not on is an advertisement in the middle of their account page.
- Made out-of-order thresholds a refusal rather than a silent sort: a higher rung set below a lower one misclassifies everyone above it with no visible cause, and sorting would persist numbers in an order the operator did not type.
- Verified with synthetic records rolled back afterwards: each rate at its new value, the percentage contribution measured in isolation from the other contributors to the same filter chain, the receiving side confirmed absent from the spending ladder, rung boundaries and remaining-to-next figures, and no markup emitted for an inactive participant.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

## 2026-09-06 — Loyalty Earning Beyond the Web Order

- Documented a loyalty programme that could only be earned from one channel — the web order handler — while the business took money at three counters, so a customer who paid for a substantial service saw their standing stay where it was.
- Recorded the decision not to reuse the order handler for the other two channels: a service and a consignment sale carry different margins and different reasons for rewarding, so each channel earns on its own rate rather than inheriting a decision nobody made.
- Put every rate on one screen, on the grounds that the operator's real question is never what one channel earns but what it earns relative to another, and an answer split across three settings pages cannot be read. The screen shows the existing web rate alongside for comparison and reports what each rate has actually cost, read from the ledger rather than recomputed.
- Wrote nothing to the ledger directly. Grants go through the programme's own reward service, which holds the maturity window and checks for a repeated source inside a per-customer lock, so an event replayed by a correction or a double-fired hook credits once — a guarantee that belongs to the ledger rather than to the caller.
- Documented the currency hazard that motivated two separate conversion helpers: one subsystem stores minor units, another stores major units, and the programme counts major units. Two of the three agree and the disagreement is silent, so an unconverted amount would over-credit by an order of magnitude and surface only at redemption. Each amount converts through a function named after the subsystem it was read from.
- Added a single completion event fired from both of the service module's completion paths, since an over-the-counter transaction and a two-week custody job are the same event to anything outside that module.
- Flagged rather than resolved an operator choice: two of the four marketplace rules reward the same seller for the same item at two different moments, and the screen says so in place of silently overriding the choice.
- Verified against the live ledger with every grant rolled back afterwards: rate arithmetic including rounding and zero-unit guards, correct crediting to seller and buyer at their separate rates, settlement crediting on net rather than gross, replay safety, and no credit where there is no linked account, no charge, or no matching record.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

## 2026-09-06 — Per-Location Contact Routing in Outbound Messages

- Documented a correction to templated outbound messages that ended every pattern with a single organisation-wide telephone number: a message naming one location and printing another location's number sends the recipient to a counter that cannot help them.
- Recorded the rule that the number travels with the location rather than with the template — arrival messages use the location the customer attended, collection and follow-up messages use the location they are being directed to, and those are not always the same one.
- Kept the numbers in module settings rather than inside the template bodies, because a provider-approved pattern cannot be edited without re-approval and a telephone number is the field most likely to change.
- Documented two token slots the templates required and the sender was not filling, noting that an empty slot is a provider parameter error and therefore silently no message rather than a partial one, and that one slot legitimately carries different content depending on which of two patterns was selected.
- Added a state check to the collection message. It was unreachable — all three call sites already verified the state — but the equivalent reminder message had always checked, and consistency here is cheaper than depending on the discipline of callers.
- Verified that the module's patterns share no name with the three unrelated senders on the same provider account, that the separate marketplace subsystem sends no messages of its own, and that outbound calls were intercepted during testing so nothing reached a real recipient.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

## 2026-09-06 — After-Sales Module: Integration and Acceptance

- Documented the correspondence layer that joins the service desk to the existing customer-facing message threads: one link table rather than a parallel inbox, media accepted in both directions, and a close action that asks twice because closing is the one transition a customer cannot undo from their side.
- Recorded the routing rule that sends marketplace listing rejections to a named operator's queue as an ordinary thread, so a seller reads the reason in the same place they read everything else and no second notification channel exists to fall out of date.
- Documented a satisfaction record that spans three unrelated order sources under one schema, with a separate outbound path for public product reviews so private service feedback and public reviews are never the same submission.
- Established consumables as their own line of business across both the counter ledger and the service desk, classified by line kind rather than by a free-text description, with the honest limitation that records imported before the classification was preserved cannot be reclassified.
- Corrected a reporting window that bounded a period at both ends: an item sold and then immediately looked for was excluded because its row and the query carried the same timestamp. A period ending "now" needs no upper bound, and the bound excluded only the most recent record, which is the one most likely to be checked.
- Made two private routes decline the full-page cache explicitly rather than relying on the cache writer's allowlist happening not to include them, on the grounds that a guarantee worth having should not depend on an unrelated file keeping its present shape.
- Verified before handover: every module file parses; no undefined internal call; no unprepared parameterised query; no unescaped output; unauthenticated requests refused on every route but the deliberately public one; the full operator lifecycle from intake to handover including credential refusal, the post-handover totals lock, and a complete event timeline; spreadsheet figures reconciled to the source rows at the presentation currency; dashboard figures reconciled to direct queries; and no warning attributable to any module file in the server log.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

## 2026-08-31 — After-Sales Service Operations Module

- Documented a private multi-file MU-plugin module that puts an entire after-sales service desk on one record: an intake file per serviced item with a dictatable tracking reference, an append-only history of every state change, and a single-writer custody model so an item's physical location is never derivable two different ways.
- Separated over-the-counter service from items left on deposit, so the fast path collects only what a two-minute job needs while the deposit path enforces condition evidence, storage location and a handover credential before the record can advance.
- Recorded the pattern for lending an item to an external specialist and for moving work between locations: one movement ledger, plural round trips, a de-duplicated counterparty directory, and a lock that prevents an item that is not on the premises from being announced as ready or marked handed over.
- Established a single currency rule across storage, transport and presentation with one conversion boundary, an append-only event log as the source of truth for reporting, and a totals lock at handover so a reported period cannot change after the fact.
- Documented an installable field application for staff devices carrying its own shell and the site's existing typeface, with client-side image resizing and timestamping so large photographs never reach the server for decoding.
- Documented a customer-facing status and estimate-approval surface whose ownership predicate uses only an identifier the customer's own session cannot edit, and which renders nothing personal for an unauthenticated visitor because the full-page cache keys on path alone.
- Added filesystem containment for evidential images using a rewrite rule rather than an interpreter flag that has no effect under the deployed process manager, plus exclusion from the nightly integrity walk.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

## 2026-08-18 — Deterministic Infinite-Scroll End Detection

- Documented a private fix for archive infinite scroll that could keep spinning past the last product on listings without standard pagination markup (for example builder-driven product grids): the lightweight fragment endpoint now emits an authoritative "has next page" flag derived from a peek-ahead of one extra item, so the client stops exactly at the final product instead of inferring the boundary from pagination links or empty/not-found responses.
- Noted the flag is essentially free (the peek-ahead row already existed to trim the page) and backward-safe: when the flag is absent, such as an older cached fragment, the client falls back to its previous boundary detection, so nothing regresses while caches roll over.
- Kept production source, store identity, exact catalog figures, taxonomy values, cache keys, and URLs private.

## 2026-08-16 — In-Person Sales Operations, Joint-Attribution Tagging, and Catalog Onboarding API

- Documented a private operations expansion that bulk-imports historical and periodic in-person point-of-sale records from an accounting export into the CRM operations layer: it groups multi-line receipts into orders, normalizes calendar dates, maps collection channels and stock locations, requires a valid contact number (screening placeholder and invalid numbers into a skip report), and stays idempotent so re-runs never duplicate.
- Added a private order-tagging module that lets an operator mark an online order as jointly attributed to a physical retail location from both the order screen and the orders list, capturing an optional reference note plus the actor and timestamp, to support later split-commission reconciliation against in-person records.
- Documented a private, authenticated server-side catalog-onboarding endpoint that creates products natively from an external ETL export where direct REST body creation is blocked by the host: idempotent by product reference, sets brand and reference vocabulary, matches only existing attribute terms (unknown values are reported rather than silently created), defaults to an unpublished review state, and supports an optional batch form.
- Extended the passwordless phone-code sign-in so privileged staff accounts can use it for their own test purchases while normal password sign-in stays intact, with a unified single-step send/verify flow.
- Kept production source, store identity, retail-location names, provider and gateway names, taxonomy values, endpoint authentication, exact figures, customer/order data, and operational logs private.

## 2026-07-19 — Authentication and Account-Panel Source Provenance

- Captured the current customer authentication and account-panel runtime as a byte-verifiable baseline in private source control before beginning identity security changes.
- Added private provenance documentation so future refactors can be reviewed against the exact deployed starting point and rolled back without reconstructing live files.
- Validated the captured PHP source and screened it for credentials and customer records before publication to the private repository.
- Kept source code, hashes, versions, filenames, site identity, provider configuration, security findings, and operational paths out of this public showcase.

## 2026-07-14 — Archive Filter Visibility and Pagination Consistency

- Fixed a production archive-filter mismatch where unavailable catalog items occupied query slots and were removed only during card rendering, causing short pages and hiding valid products on later pages.
- Unified option counts, live counts, full-page archive queries, AJAX results, and pagination around the same WooCommerce catalog-visibility contract.
- Added an indexed stock-state check for resilience when imported product visibility relationships lag behind authoritative inventory data, and removed a low result-set ceiling that could truncate large filtered collections.
- Kept production source, store identity, exact catalog figures, taxonomy values, cache keys, URLs, database details, and operational logs private.

## 2026-07-08 — Archive Filter Count Query Optimization

- Documented a private performance fix for product-archive filter counts where scoped term-count collection was made more index-friendly and expensive database-side sorting was moved out of the hot query path.
- Preserved the public behavior pattern: archive filter options still show scoped counts, lazy-loaded groups, selected-state handling, pagination, and AJAX result updates.
- Kept production source, exact taxonomy names, SQL text, file paths, cache keys, catalog size, live measurements, and operational logs private.

## 2026-06-18 — Admin Safe Mode Payment Boundary

- Documented a production safety update that keeps admin performance protection from suppressing business-critical payment HTTP calls.
- Clarified the rollout boundary: the private fix applies to new live administrative payment-status actions only and does not replay historical gateway operations or convert background attempts into newly allowed calls.
- Kept provider names, live route rules, order data, gateway payloads, logs, and production source private.

## 2026-06-18 — Archive UX and Schema Stability

- Documented private updates for archive infinite-scroll stability, cacheable frontend asset delivery, deterministic archive pagination, and safer Product/Offer JSON-LD fallbacks.
- Clarified that public proof covers the engineering pattern only: externalized assets, bounded pagination behavior, structured-data repair, and diagnostic boundaries.
- Kept production selectors, exact URLs, product references, shipping rules, provider payloads, logs, customer/order data, and source implementation private.

## 2026-06-14 — MU Operations, SEO, and Asset Safety Expansion

- Documented a private MU-plugin expansion covering scoped asset cleanup, SEO/schema repair, microcache operations, checkout scroll recovery, and payment-message UX safeguards.
- Updated the public architecture notes to show the larger operating model without publishing production source, exact live rules, SEO rule tables, route logic, payment workflow details, logs, or customer/order data.
- Aligned the public showcase with the private umbrella index now tracking 84 PHP modules while preserving the repository as portfolio proof rather than a source mirror.

## 2026-06-14 — Cart Asset Delivery Optimization

- Documented a frontend performance update that moves a repeated cart drawer stylesheet out of page HTML and into a cacheable asset.
- Preserved the public behavior pattern: cart toggle, drawer open/close, mini-cart refresh, and add-to-cart updates remain part of the private implementation.
- Kept production source, selectors, URLs, cache paths, and site-specific measurements private.

## 2026-06-14 — Archive Filter Payload Optimization

- Documented a performance update that moves heavy product-archive filter option data out of initial HTML and into cached lazy loading.
- Preserved the public filter behavior pattern: modal filters, selected-state handling, sorting, pagination, and AJAX result updates remain part of the private implementation.
- Kept production source, URLs, taxonomy details, cache keys, and site-specific measurements private.

## 2026-06-11 — Phase 3

- Added sanitized PHP samples for request classification, bounded cleanup loops, and admin action policy checks.
- Kept samples fictional and omitted live route rules, defensive internals, file paths, customer/order data, payment workflow details, and deployment procedures.
- Updated the sample-code overview to clarify what the snippets demonstrate and what is intentionally excluded.

## 2026-06-11 — Phase 2

- Expanded the umbrella showcase from a skeleton into an employer-friendly infrastructure case study.
- Added architecture notes for module taxonomy, request controls, bounded maintenance, admin operations, diagnostics, frontend workflow modules, and rollout safety.
- Clarified the privacy boundary around logs, defensive internals, live route rules, payment workflow details, customer/order data, file paths, and deployment procedures.
- Kept production MU-plugin source and operational evidence private.

## 2026-06-08

- Created the Phase 1 public umbrella showcase for private MU-plugin work.
- Added privacy boundary, reviewer path, tech stack, and sample-code placeholder.
- Kept production source, logs, security internals, and site-specific configuration private.
