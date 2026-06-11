# Sample Code

This directory contains Phase 3 public-safe snippets. The samples demonstrate MU-plugin engineering patterns without mirroring production source code.

## Published Samples

- `php/request-classifier.php` — generic request classification for applying different behavior to cart, checkout, REST, AJAX, admin, and asset traffic.
- `php/bounded-cleanup-loop.php` — capped maintenance loop that processes small batches instead of running an unbounded cleanup.
- `php/admin-action-policy.php` — capability and nonce style wrapper for admin-only operational actions.

## Sample Rules

- Use fictional route names, action names, identifiers, and diagnostic payloads.
- Keep snippets short enough for review.
- Explain what each snippet demonstrates.
- Exclude production guard rules, defensive internals, site-specific paths, customer/order data, payment workflow details, file names, exact hooks, live IDs, exports, scan results, and real logs.
- Do not include production-ready defensive code or deployment procedures.

## Status

Phase 3 is active with three short PHP snippets. These files are intentionally simplified and should be read as review samples, not as production MU-plugin code.
