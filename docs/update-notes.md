# Public Update Notes

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
