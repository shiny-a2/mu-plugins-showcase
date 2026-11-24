# MU Plugins Showcase

The [repair queue update](docs/releases/repair-branch-queue-2026-11-24.md) keeps branch views separate and opens case details on demand.

An open case with a missed first-response deadline can now pass to another eligible sales operator. The case note names both operators and records the missed deadline. A manual transfer button is available in the case header. Tests covered repeated checks, excluded cases and rollback when the note could not be saved.

The operator card shows the customer’s club tier, lead source and lead number beneath the contact details. Phone and lead numbers use Persian digits. Browser checks covered known and missing values at phone and desktop widths in both themes.

The [verified profile update](docs/releases/verified-account-signin-2026-11-24.md) keeps named staff sign-in and customer history together.

Operators can dictate Persian text directly into a customer message, edit the draft and save it with a title using a single button. Phone and desktop browser checks exercised simulated speech input and template selection in both themes.

The operator card now shows why a case closed and summarizes its latest recorded order, including the item, status and date when available. A missing browsing timestamp no longer appears as a claim that the customer never visited. Browser tests covered a closed sale with an order and no browsing history on phone and desktop in both themes.

Operators can now save a reusable message while writing to a customer and carry the selected text into the SMS or chat workflow. Product sharing sits beside messaging in the card header, and operators can record the requested brand when a product is unavailable. Browser tests checked the message text and intended recipient using simulated requests at phone and desktop widths.

The operator customer card brings recent product views, cart additions and stock requests into the opening summary. It explains when the next contact is due and keeps branch selection beside the invitation that requires it. Browser tests covered choosing and changing an outcome on phone and desktop in light and dark themes.

The [technician photo update](docs/releases/technician-photo-gallery-2026-11-24.md) adds per-photo review tools and navigation through enlarged watch images.

Operators can filter their personal notification center by lead, follow-up, chat and ticket. Opening a notice takes them to the assigned record and saves its read status across devices. Browser checks covered filtering, opening a ticket and refreshing the list in light and dark themes at phone and desktop widths.

Released [per-photo background review](docs/releases/repair-photo-review-2026-11-18.md). The installed workflow returned a catalogue-photo preview for review.

Installed operations update: [leaner month comparison in a private dashboard](docs/releases/manage-metric-comparison-2026-11-19.md); authenticated response-time measurement remains pending.

Installed update: [supplier import follow-up and branch stock recovery](docs/releases/2026-11-16-supplier-import-automation.md), with live workflow observation still pending.

Installed repair update: [registration and publication notifications](docs/releases/repair-market-notifications-2.17.2.md); physical-device receipt remains unverified.

Latest repair workflow update: [editable cases and saved intake drafts](docs/releases/repair-case-drafts-2.17.0.md), released with installation and read-only access checks.
Latest operations update: [automatic supplier locations from warranty providers](docs/releases/supplier-warranty-location-2026-11-15.md).
Supplier preview installed: [reviewed catalog updates and traceable outcomes](docs/releases/supplier-catalog-workflow-2026-11-16.md); live writes and company acceptance remain pending.

Public-safe umbrella showcase for private WordPress MU-plugin work across WooCommerce performance, operations, API controls, diagnostics, admin safety, and frontend workflow improvements.

This repository is documentation and sanitized portfolio proof only. It is not a source mirror. Production MU-plugin source, logs, defensive implementation details, customer/order data, store identifiers, payment workflow details, and site-specific configuration stay private.

## Review Summary

- [Club introduction messages](docs/club-notification-sms.md): current level, next level and usable credit, including the regular silver introduction.

- [Correct club introduction level names](docs/releases/club-approved-launch-tokens-20261119.md): installed alignment with approved message positions, with previous send protection retained.

- [Preserved error logs with bounded rotation](docs/releases/php-error-log-retention-2026-11-19.md): the installed operations update keeps prior diagnostics available and limits future log growth; the next scheduled rotation still needs observation.

- [Administrative access recovery check](docs/releases/administrative-access-2026-11-19.md): a scoped production access change with an independent reconnection test and timed recovery path.

- [Reliable archive filter counts](docs/releases/archive-filter-counts-2026-11-19.md): large category filters now complete bounded count work without showing partial options; cold response time remains a follow-up.

- [Customer invoice clarity and club launch controls](docs/releases/club-launch-invoice-clarity-20261118.md): installed accounting references, explicit review states and clearer messaging counts, with native access checks.

- [Reviewed purchase sources and club balances](docs/releases/club-source-reconciliation-20261118.md): installed duplicate-source safeguards and a verified bounded reconciliation, with wallet history and unresolved evidence preserved.

- [Timed sale preview and brand discovery](docs/releases/timed-sale-preview-2026-11-18.md): a compact campaign countdown, temporary home introduction and automatically populated discounted-brand rail.

- [Repair case editing and saved drafts](docs/releases/repair-case-drafts-2.17.0.md): capture a phone number during a busy intake, finish the same case later and review who changed its information.

- Customers can return to a verified private chat for order, loyalty and marketplace information. After installation, the store rejected unverified requests for both account information and purchase history. [Verified sales context](docs/releases/verified-sales-context-2026-11-17.md)

- [Focused brand navigation](docs/releases/brand-menu-2026-11-17.md): priority and established best-selling brands appear directly, while complete alphabetical and country directories remain available.

- [Clearer brand category paths](docs/releases/brand-menu-2026-11-17.md#brand-category-paths): correct country wording in breadcrumbs while keeping category addresses stable and the responsive text readable.

- [Rules and contact page design](docs/releases/rules-link-design-20261117.md): installed responsive navigation and layout, with original branding and approved terms preserved; live mobile/desktop light/dark checks passed.

- **Purchase tracking, 18 November 2026.** The order confirmation page now emits a purchase for paid orders and confirmed card transfers. Reloading the page can retry a missed browser event using the same transaction ID. Item revenue reflects discounts, with shipping and tax reported separately. Tests covered unpaid orders, confirmed transfers and repeat visits. The callback was verified on the live store. A separate desktop test confirmed that the live homepage sent a page view and the Google collector returned HTTP 204. For the completed 31 October to 6 November test window, both Analytics properties reported events on control hostnames, while the storefront hostname had no reported events. Purchase attribution remains unverified.
- [Clearer purchase and return policies](docs/releases/purchase-policy-1.3.0.md): installed fulfillment choices, shipping responsibilities and linked marketplace terms, with scoped backups and live verification.

- [Birthday and anniversary gifts](docs/releases/occasion-gifts-1.1.0.md): installed gift terms, one reminder, responsive gift pages and verified conversion; new messaging templates await provider confirmation.

- [Market advisor and Google visibility](docs/releases/manage-market-advisor-1.9.0.md): evidence-linked priorities, explicit analysis and separately labelled search measurements.

- [Competitor brand evidence candidate](docs/releases/competitor-brand-evidence-2026-11-18.md): distinct reference counts, retailer drilldowns and a bounded watch-category source, with uncertainty shown explicitly.

- [Authenticity payment review in the repair desk](docs/releases/repair-authenticity-payment-review-2.16.3.md): a clear hold on further assessment and card issuance while physical receipt and a recorded return remain available.

- [Original brand artwork in the storefront header](docs/releases/brand-header-2026-11-12.md): a responsive light/dark logo update checked on the live home page.

- [Repair payment and customer-panel review](docs/releases/repair-payment-review-2.15.2.md): clearer receipt decisions, current invoice status and responsive service feedback.

- [Faster product bulk editing and visible save failures](docs/releases/bulk-editor-save-speed-2026-11-11.md): smaller editor pages, less broad refresh work and clear failure feedback.

- [Repair workspace polish and invoice release](docs/releases/repair-workspace-2.15.1.md): clearer customer-first intake, consistent staff screens and a refined customer invoice view, with messaging provider validation pending.

- [Complete GO browsing and clearer gift-card terms](docs/releases/go-giftcard-2026-11-11.md): later category products load, and gift-card restrictions appear before checkout.

- [Accurate category update dates in sitemaps](docs/releases/category-sitemap-lastmod-2026-11-17.md): category edits can advance sitemap dates without changing customer-facing pages or product URLs.

- [Repair intake clarity](docs/releases/repair-intake-2.15.0.md): customer lookup, clearer intake and estimates, branch-specific notices, and a staged final-invoice path.

- [Desk calendars and choice menus](docs/releases/desk-controls-1.6.1.md): selectable Persian dates and consistent searchable menus, tested locally and awaiting deployment.
- [Shipping commissioning preparation](docs/releases/unbox-commissioning-1.2.0.md): clearer readiness, opt-in dispatch and tested tracking behavior, with live activation still pending.

- [Measured wrist preview pilot](docs/releases/wrist-studio-2.0.2.md): the selected watch image, explicit scale calibration and a limited live rollout with device-testing limits.

- [Exact-watch wrist preview preparation](docs/releases/wrist-studio-2.0.8-preparation.md): bounded image preparation, an optional wrist-size estimate and local interface checks, with catalogue approval and deployment still pending.

- [Branch management dashboard release](docs/releases/branch-desk-1.3.1.md): full-range sales charts, customer tiers, repairs, recorded costs and reviewed messaging, with live scope and interface checks.

- [Repair marketplace queue clarity](docs/releases/repair-marketplace-counts-2.14.8.md): consistent waiting counts and a clear distinction between review decisions and listing status.

- [Evidence-based operator feedback labels](docs/operator-feedback-labels.md): clearer customer-state labels, transparent reasons and responsive review in both themes.

- [Isolated customer panel preview](docs/customer-panel-preview.md): separate staging, service-specific feedback and guided tours tested with generated records.

- [Storefront performance and update notes](docs/update-notes.md): bounded anonymous caching, a scoped bulk-editor latency fix, and staged maintenance with checkout smoke checks.

- [Branch showroom counts and manager club view](docs/desk-showroom-count.md): daily physical checks with a branch-scoped customer history.
- [Branch-specific showroom totals](docs/desk-showroom-count.md): separate model and unit counts, with one-action brand confirmation for manager review.

- [Reversible supplier-feed controls](docs/supplier-feed-controls.md): shared pause guards and verified catalog availability updates.

- [Brand directory usability and shared themes](docs/brand-directory-ux.md): visible search, accessible refinements and readable logo-led cards across mobile/desktop.

- **Problem:** production WooCommerce systems often need urgent fixes and long-term safeguards across performance, checkout, admin operations, REST traffic, storage, and diagnostic tooling without introducing large plugin dependencies.
- **Solution:** a private MU-plugin collection of small, reversible, source-controlled modules that can be deployed independently and grouped by operational risk.
- **Engineering focus:** request classification, cache boundaries, bounded cleanup, admin-only workflows, API pressure control, SEO/schema safety, archive pagination stability, checkout/payment boundaries, rollback-aware operations, and low-overhead diagnostics.
- **Public scope:** architecture, module taxonomy, operational boundaries, update notes, and sanitized snippets.

## Business Context

MU plugins are useful when a commerce site needs guaranteed boot-time behavior, emergency mitigations, or operational features that should not depend on normal plugin activation state. The private collection is used as an infrastructure layer rather than a single monolithic application.

The work is organized around several production concerns:

1. Protect high-pressure request paths such as cart, checkout, search, REST, and AJAX.
2. Reduce shared-host CPU/DB pressure with scoped guards and lightweight cache patterns.
3. Keep admin workflows responsive by limiting heavy background tasks and dashboard noise.
4. Provide operations tools for product exports, order repair, stock workflows, and admin-only payment handling.
5. Add diagnostic tools that help identify slow requests, storage growth, and runtime issues.
6. Improve frontend commerce workflows through isolated UI modules.
7. Repair public metadata/schema output without exposing production SEO rules or store data.
8. Keep archive pagination, infinite-scroll behavior, and externalized frontend assets safe under real catalog browsing.
9. Keep each module small enough to disable, rollback, or split into a dedicated private repo.

## What This Demonstrates

- [Marketplace seller registration UX](docs/marketplace-seller-registration.md) with clear Persian guidance, explicit service consent and responsive theme validation.

- [Consistent loyalty earning](docs/club-earning-policy.md) with safe historical review and accessible checkout choices.

- [Loyalty scheduler recovery](docs/loyalty-scheduler-recovery.md) with explicit channel-rate semantics, idempotent replay and a monitored server-side runner.

- [Country-gate browser passes](docs/country-gate-browser-pass.md) for durable public viewing from trusted overseas devices without granting account or administration access.

- [Currency and delivery pricing](docs/currency-delivery-pricing.md) with server-calculated quotes and consistent cart behavior.

- [Tier-aware loyalty notifications](docs/club-notification-sms.md) with accurate reward values, configurable delivery and duplicate protection.

- Date-consistent personnel accounts with shared financial rules, individual payment evidence and auditable expense entry.

- Evidence-based competitor analysis with shared dashboard and messaging calculations, explicit uncertainty, source-quality visibility, and [cautious grouped stock-change review](docs/releases/manage-small-brand-activity-1.12.7.md).

- Small reversible modules for production WordPress/WooCommerce systems.
- Performance and operations work around cache boundaries, REST pressure, query safety, queues, transients, and admin workflows.
- API and request-boundary thinking without publishing live guard rules.
- SEO/schema repair, asset-delivery, and archive-pagination patterns that improve public surfaces while keeping implementation private.
- Operational tooling for exports, admin-only order workflows, storage audits, and diagnostics.
- Frontend UX improvements delivered as isolated MU modules where boot-time availability matters.
- Public-safe grouping of many private MU-plugin modules into one reviewer-friendly showcase.
- Clear distinction between portfolio proof and production code.
- Byte-verifiable source provenance for customer-facing authentication and account-panel modules before security refactoring begins.

## Architecture Overview

The private source is managed as a production MU-plugin umbrella with split private repos for selected modules:

- **Performance guards:** reduce load from expensive archives, REST endpoints, frontend assets, background queues, pagination edges, and transient storms.
- **API/request controls:** classify request types and apply different behavior to REST, AJAX, checkout, cart, crawler, and admin traffic.
- **Admin operations:** support export, order repair, status recovery, payment back-office workflows, and controlled maintenance actions.
- **SEO/schema safety:** keep product/category metadata, JSON-LD output, ItemList structures, favicon behavior, and LCP hints consistent without exposing live SEO rules.
- **Diagnostics:** capture low-overhead performance/storage/runtime signals for investigation while keeping logs private.
- **Frontend modules:** improve search overlays, offcanvas cart, product discovery, infinite-scroll behavior, watch finder flows, mobile UI, and product cards.
- **Safety wrappers:** use capability checks, nonces, small batches, and feature flags so changes can be rolled out or disabled with limited blast radius.

See `docs/architecture-notes.md` for the detailed reviewer walkthrough.
- [Catalog image batching](docs/catalog-image-batching.md) — rejecting failed cutouts before export, preserving reusable templates, and distinguishing queue tests from visual acceptance.
- [Cache boundary](docs/cache-boundary.md) — keeping account pages out of a full-page cache, and why the dangerous failure was an outage rather than a leak
- [Loyalty storefront](docs/loyalty-storefront.md) — putting a points and wallet programme on a shop that is already selling, and the failures that only appear once real money is involved

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
- `samples/php/` — short public-safe PHP snippets for request classification, bounded cleanup, and admin action policy.

## Phase Status

- **Phase 1:** showcase skeleton, privacy boundary, and reviewer path.
- **Phase 2:** employer-friendly module taxonomy, architecture notes, and risk boundaries.
- **Phase 3:** sanitized snippets for request classification, bounded maintenance, and admin action safety.

## Links

- Portfolio: <https://amiraliyaghouti.com>
- GitHub profile: <https://github.com/shiny-a2>
- Private source umbrella: `shiny-a2/mu-plugins` (not public)

## Latest update

[October 30, 2026 release notes](docs/releases/2026-10-30.md).

[Bulk-editor compatibility update — October 31, 2026](docs/releases/2026-10-31-bulk-editor.md).

Latest repair update: [assigned marketplace access and reliable upload retries](docs/releases/repair-marketplace-scope-2026-11-05.md).
