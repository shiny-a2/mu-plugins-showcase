# Public Update Notes

## 2026-09-07 — Two Missing Notifications in the Service Workflow

- Documented two messages the workflow assumed existed and never had: the collection credential a customer must present at handover, and the confirmation that an item was actually handed over. The credential was printed on the operator's receipt and rendered in the customer's own panel, but sent nowhere; the handover was recorded in the record and announced to nobody.
- Gave the credential its own message rather than appending it to the ready-for-collection notice. The variant of that notice carrying an outstanding balance already spends every token slot the provider allows, so there was nowhere to add one without removing something, and a credential on the fourth line of a longer message is one the recipient scrolls past while standing at the counter.
- Sequenced it deliberately: the credential follows the announcement and never precedes it, because one sent at intake is lost over the weeks the item is held, and one sent while work is still in progress invites someone to arrive early. Dispatch-by-post records get none — there is no counter to present it at and the courier releases the parcel, so the credential would open nothing.
- Justified the handover note as evidence rather than courtesy: it is the only message sent after a record closes, and every dispute about a collection begins with two parties recalling different days. It reports what was actually paid rather than the total, since a record can close with a balance outstanding and telling someone they paid a figure they did not is worse than silence.
- Required one exception in the shared refusal gate. Every other message is blocked once a record reaches its terminal state; without an exception the handover note would have been refused by the very status it exists to report.
- Attached both to domain events rather than to call sites. The ready notice is sent from three places and completion is reached by two distinct paths, so hooking the events means neither message can be forgotten at a fourth site added later.
- Verified end to end with outbound calls intercepted: the credential carries the record's real code and its collection location, the completion note carries the amount actually paid, neither is sent twice on replay, the completion note passes the terminal-status gate while the ready notice is still correctly refused by it, and no token is ever transmitted empty.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

## 2026-09-06 — Making a Silent Messaging Failure Visible and Self-Serviceable

- Documented the failure mode that motivated this work: an unregistered or unapproved message template is refused by the provider inside an otherwise successful HTTP response, so the sending path records the refusal and continues. The record is correct and nobody reads it, which is how an operator can spend two weeks telling customers their items are ready and reach none of them.
- Added an operator screen that asks the provider about every message the module can send and reports the answer as live, awaiting approval, or refused. The provider offers no listing endpoint and this account's outbound history is access-denied, so the check has to be an actual send; it is addressed to the account of whoever pressed the button and accepts no recipient parameter, because a health check that took one would be a way to send an approved template to anyone from a screen that looks harmless.
- Made each template name repointable from that screen. Provider templates cannot be renamed — a corrected body returns as a new registration under a new name — so a name written into source is a standing assumption about someone else's console that goes stale without a signal, and requiring a deployment to change a short identifier is how the stale one survives. The remap costs one filter call on a path already making a network request, and its stored value is read only when something is actually being sent.
- Added a notice on the module's own screens when messages have genuinely been failing, counted from the event timeline the sender already writes rather than from a second log nobody would maintain. Scoped to those screens and to a real count, since a warning on every administrative page is one people stop seeing.
- Rejected names that do not look like provider identifiers. The mistakes that actually occur are a pasted URL, a localized label, or the token list itself, and any of those stored would repoint a live message at a name that cannot exist.
- Verified: all ten slots resolve, an untouched name passes through unchanged, a typed name repoints exactly one message and leaves the rest alone with the original still recoverable, malformed pastes are refused, an approved template reads as live and one awaiting approval reads as waiting rather than broken, a probe with no recipient sends nothing, and the remap holds on the real send path in a request that did not configure it.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

## 2026-09-06 — Outbound Messaging Enabled After Pattern Verification

- Documented why templated outbound messaging stayed disabled through the whole build: the provider rejects an unregistered or unapproved template with a code that the sending path cannot distinguish from a delivered message without inspecting the response body, so enabling it before every template was proven live would have meant messages disappearing silently.
- Recorded the verification: each template sent once against the live account, with the returned message identifier as evidence rather than the absence of an error.
- Documented two templates reported as missing that were not. One had been registered with the token list accidentally pasted into its name field — the body is correct and approved, the provider answers only to that name, and provider templates cannot be renamed, so the sender now asks for the name that exists and replacing it is a one-line change whenever someone registers a tidier one. The other was being requested under a spelling that differed from the panel's by separators alone.
- Corrected an earlier report of this investigation that concluded no template was registered. That conclusion came from testing one spelling of one template — the single template that genuinely did not exist under any tried spelling — and generalising from it.
- Measured the blast radius before enabling rather than after: the pending queue was empty, nothing was awaiting a customer answer, and both scheduled reminder intervals matched no records, so enabling sent nobody anything on its own.
- Ran a complete record through the routes the client application actually calls afterwards, confirming each message fired exactly once and was recorded once in the idempotency ledger.
- Noted three approved templates whose bodies omit the per-location contact token, so that message shows no telephone number regardless of what the sender supplies; extra tokens are ignored by the provider rather than rejected, so this is a content gap for the operator to re-register, not a failure.
- Flagged eleven unrelated templates in the same account whose token syntax is malformed — the marker appears doubled or trailing — so they would render the literal marker to a recipient instead of a value. None is currently sent by any code path.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

## 2026-09-06 — Per-Location Record Isolation

- Documented a reversal of an early access decision: staff at each location previously read every record from both locations, and now read only their own location's work.
- Recorded why the obvious scope — match the record's originating location — is the wrong one. An item is received at one counter, worked on at the second, held there overnight and collected at the first; scoping on origin alone hides a record from the person physically holding the item, which is not a stricter rule but a broken workflow. A record belongs to a location if that location appears in any of the roles it can play, including the one it is in transit to, so the boundary follows the item rather than the paperwork.
- Applied the check at the shared permission callback rather than inside each handler. A filtered list beside an unfiltered detail view is not an access rule, it is a list of identifiers to request back one at a time; one callback covers twenty-two identifier-bearing routes and no route added later can omit it.
- Distinguished identifiers by route rather than by name, because the same parameter names three different kinds of record in that namespace and treating them alike would refuse someone their own correspondence thread.
- Answered out-of-scope records as missing rather than forbidden: a forbidden response confirms the record exists and belongs to the other location, which is the fact being withheld.
- Carried the scope into the cache key for the shared counters view. A single shared entry would have let whichever location asked first determine what the other's counters read for the following minute — the boundary holding in the query and leaking through the cache, which is the variant that reading the query does not reveal. Invalidation still clears every location's copy, since the boundary governs who may look and never who is allowed to be current.
- Took the scope for the reporting dashboard and the spreadsheet export from the boundary rather than from the request, so neither becomes the one screen where it can be typed around.
- Verified as each of the five real staff accounts: unrestricted accounts see everything, each restricted account sees only its own location, both locations see the transferred item, search is filtered as well as detail, counters differ per location, and an export requested for the other location returns none of its records.
- Kept production source, provider names, message template bodies, location names, site identity, capability names, table and column names, file paths, contact numbers, and customer or order data private.

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
