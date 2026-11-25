# Reducing repeated work on the storefront homepage

The homepage carousel previously repeated product-link work, and a second content hook could rebuild its already-rendered output. The prepared update resolves each slide link once and reuses an exact repeated output within the same request. New requests still obtain current product information.

The existing object cache also gains bounded batch reads. Compatibility tests cover stored false-like values, request-local hits, private groups and failed transport fallback. This reduces repeated cache round trips without extending the lifetime of product data.

PHP checks and focused behavioral tests passed. Browser fixtures covered the full brand mix, deferred photographs, previous/next and keyboard controls, playback, reduced motion and purchase-form destinations at phone and desktop widths in both themes. No order was created. An isolated host diagnostic returned equivalent cache values and rendered the complete carousel; it is not a field performance result.

Status: source prepared for the approved staged release. Installation and live verification are pending. Repeated full-page cache eviction and wider host-load work remain separate follow-ups; no claim is made that every page passes Core Web Vitals.
