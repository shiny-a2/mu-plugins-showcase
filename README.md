# MU Plugins Showcase

Public-safe umbrella showcase for private WordPress MU-plugin work across WooCommerce performance, operations, API controls, diagnostics, admin safety, and frontend workflow improvements.

This repository is documentation and sanitized portfolio proof only. It is not a source mirror. Production MU-plugin source, logs, defensive implementation details, customer/order data, store identifiers, payment workflow details, and site-specific configuration stay private.

## Review Summary

- **Problem:** production WooCommerce systems often need urgent fixes and long-term safeguards across performance, checkout, admin operations, REST traffic, storage, and diagnostic tooling without introducing large plugin dependencies.
- **Solution:** a private MU-plugin collection of small, reversible, source-controlled modules that can be deployed independently and grouped by operational risk.
- **Engineering focus:** request classification, cache boundaries, bounded cleanup, admin-only workflows, API pressure control, rollback-aware operations, and low-overhead diagnostics.
- **Public scope:** architecture, module taxonomy, operational boundaries, and future sanitized snippets.

## Business Context

MU plugins are useful when a commerce site needs guaranteed boot-time behavior, emergency mitigations, or operational features that should not depend on normal plugin activation state. The private collection is used as an infrastructure layer rather than a single monolithic application.

The work is organized around several production concerns:

1. Protect high-pressure request paths such as cart, checkout, search, REST, and AJAX.
2. Reduce shared-host CPU/DB pressure with scoped guards and lightweight cache patterns.
3. Keep admin workflows responsive by limiting heavy background tasks and dashboard noise.
4. Provide operations tools for product exports, order repair, stock workflows, and admin-only payment handling.
5. Add diagnostic tools that help identify slow requests, storage growth, and runtime issues.
6. Improve frontend commerce workflows through isolated UI modules.
7. Keep each module small enough to disable, rollback, or split into a dedicated private repo.

## What This Demonstrates

- Small reversible modules for production WordPress/WooCommerce systems.
- Performance and operations work around cache boundaries, REST pressure, query safety, queues, transients, and admin workflows.
- API and request-boundary thinking without publishing live guard rules.
- Operational tooling for exports, admin-only order workflows, storage audits, and diagnostics.
- Frontend UX improvements delivered as isolated MU modules where boot-time availability matters.
- Public-safe grouping of many private MU-plugin modules into one reviewer-friendly showcase.
- Clear distinction between portfolio proof and production code.

## Architecture Overview

The private source is managed as a production MU-plugin umbrella with split private repos for selected modules:

- **Performance guards:** reduce load from expensive archives, REST endpoints, frontend assets, background queues, and transient storms.
- **API/request controls:** classify request types and apply different behavior to REST, AJAX, checkout, cart, crawler, and admin traffic.
- **Admin operations:** support export, order repair, status recovery, payment back-office workflows, and controlled maintenance actions.
- **Diagnostics:** capture low-overhead performance/storage/runtime signals for investigation while keeping logs private.
- **Frontend modules:** improve search overlays, offcanvas cart, product discovery, watch finder flows, mobile UI, and product cards.
- **Safety wrappers:** use capability checks, nonces, small batches, and feature flags so changes can be rolled out or disabled with limited blast radius.

See `docs/architecture-notes.md` for the detailed reviewer walkthrough.

## Key Engineering Decisions

- **Umbrella showcase:** one public overview is clearer than one public repo per archived MU file.
- **Small modules:** operational changes stay narrow, reversible, and easier to audit.
- **Fail safe:** public examples discuss request classes and boundaries, not exact production controls.
- **Bounded work:** cleanup/export/scan tasks are chunked to avoid long-running web requests.
- **Admin-only operations:** back-office features are separated from public checkout surfaces.
- **Private source remains authoritative:** public docs explain outcomes and architecture only.

## Tech Stack

- WordPress MU-plugin architecture
- WooCommerce operations and performance
- PHP
- Optional JavaScript/CSS companions
- WordPress REST/AJAX hooks
- WP-Cron and admin-post workflows
- Production diagnostics and admin tooling patterns

## Privacy Boundary

Public files describe the architecture and engineering approach only. Production source, logs, exact guard rules, customer/order data, payment workflow details, file paths, defensive internals, and site-specific configuration remain private.

Read the full boundary in `docs/privacy-boundary.md`.

## Reviewer Path

- Start with this README for the operating model and module categories.
- Read `docs/architecture-notes.md` for workflow and engineering decisions.
- Read `docs/privacy-boundary.md` for what is intentionally excluded.
- Check `docs/update-notes.md` for public-facing change history.
- Review `samples/README.md` for the Phase 3 sanitized sample plan.

## Repository Structure

- `docs/architecture-notes.md` — architecture, workflow, and engineering decisions.
- `docs/privacy-boundary.md` — what is public versus private.
- `docs/update-notes.md` — public update log.
- `samples/README.md` — sanitized sample-code overview.
- `samples/php/` — planned short public-safe PHP snippets for request classification, bounded cleanup, and admin action policy.

## Phase Status

- **Phase 1:** showcase skeleton, privacy boundary, and reviewer path.
- **Phase 2:** employer-friendly module taxonomy, architecture notes, and risk boundaries.
- **Phase 3:** planned sanitized snippets for request classification, bounded maintenance, and admin action safety.

## Links

- Portfolio: <https://amiraliyaghouti.com>
- GitHub profile: <https://github.com/shiny-a2>
- Private source umbrella: `shiny-a2/mu-plugins` (not public)
