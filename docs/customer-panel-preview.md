# Isolated customer panel preview

A private WordPress customer panel has been assembled in a separate staging installation with generated accounts and records. The work separates purchase feedback from repair feedback, adds short service-specific questions, and introduces guided, replayable tours of the actual panel controls.

The main issue was that one service screen could offer feedback for another service. The staged correction keeps each form beside its own subject and verifies that a signed-in customer owns an eligible record before a response is saved. Repeated submissions are constrained by storage, and managers have a restricted summary for internal review.

The tours use a reusable controller and panel-specific step descriptions. A customer's completion state is saved per tour version. Browser review covered both themes at desktop and phone widths using synthetic records. Staging checks also covered ownership, request validation, repeated submissions, and a restore rehearsal.

This is a **review preview**, not a production release. The real delivery rules, licensed integrations, theme parity and remaining edge cases still need acceptance testing. No customer data or live payment activity was used, and no production site was changed.

## October 2026 preview update

A read-only comparison found that the first isolated customer preview lacked several parts of the reference account experience. The staging copy now uses the reference Persian typeface and an original tier-card renderer with clearly labelled generated data. Guided onboarding has a longer, feature-aware introduction and a separate club-card walkthrough, with mobile placement, progress, skip and replay controls.

Browser checks covered desktop, tablet and phone layouts in light and dark themes, including a new synthetic customer and the tour controls. The preview remains incomplete: account activity, the full loyalty ledger, benefits, vouchers, the production theme and sign-in integrations still need isolated adapters and acceptance testing. No live customer information or production deployment was involved.
