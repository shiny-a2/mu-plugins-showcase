# Architecture Notes

This document explains the private MU-plugin umbrella at a reviewer-friendly level without exposing production source code, logs, defensive implementation details, customer/order data, payment workflow details, store identifiers, file paths, or site-specific configuration.

## Operating Model

The private MU-plugin collection is a production infrastructure layer. Each module targets a narrow operational concern and is designed to be source-controlled, recoverable, and independently removable.

## Module Taxonomy

1. **Performance guards:** cache boundaries, archive safeguards, scoped asset cleanup, REST pressure reduction, queue tuning, transient cleanup, and heavy-query containment.
2. **Request controls:** classification for cart, checkout, search, AJAX, REST, crawler, admin, and asset requests.
3. **Commerce operations:** export tools, order repair helpers, stock/status workflows, and admin-only payment handling.
4. **SEO/schema safety:** product/category metadata repair, public structured-data consistency, ItemList patterns, favicon control, and LCP hints.
5. **Microcache operations:** admin controls, batch rebuild patterns, warm-worker boundaries, and checkout/cart bypass safety.
6. **Diagnostics:** slow-request logging, storage audits, runtime checks, and admin investigation tools.
7. **Frontend workflow:** search overlays, offcanvas cart, checkout scroll recovery, payment-message safeguards, product finder flows, mobile headers, sticky buy bars, and product-card UI modules.
8. **Maintenance safety:** bounded cleanup loops, feature flags, rollback notes, and small-batch processing.

## Workflow

1. A production issue or operational need is isolated to a narrow module.
2. The module is developed in private source control and deployed as an MU plugin when boot-time availability is required.
3. Runtime behavior is scoped by request type, user capability, feature flag, or route boundary.
4. Expensive work is batched, sampled, cached, or scheduled rather than run unbounded on every request.
5. Diagnostic modules emit private evidence for investigation without exposing customer or store data publicly.
6. Public showcase updates describe the engineering pattern while leaving live rules private.

## Safety Decisions

- Modules remain small and independently reversible.
- Admin operations are capability-gated and nonce-protected.
- Maintenance tasks use caps, batches, and early exits.
- Public checkout behavior is separated from admin-only workflows and cacheable frontend pages.
- REST/AJAX controls are route-aware rather than globally destructive.
- SEO/schema repairs are documented as output-quality safeguards, not as a publication of live ranking or merchandising rules.
- Logs and operational evidence are never published in showcase repositories.
- Security-related implementation details are documented only at a pattern level.

## Reviewer Value

This showcase demonstrates production engineering judgment: the ability to stabilize an existing WooCommerce system with precise interventions, not just build greenfield features. The private work spans performance, APIs, admin tooling, diagnostics, and frontend UX while keeping risk bounded.

## Privacy Notes

This showcase intentionally avoids exact filenames-to-rule mappings, live request rules, SEO rule tables, payment workflow details, customer/order records, log excerpts, file paths, store-specific IDs, scanner internals, provider details, and deployment procedures. Phase 3 samples are simplified review snippets only.
