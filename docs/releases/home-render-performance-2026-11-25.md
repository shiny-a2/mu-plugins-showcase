# Reducing repeated work on the storefront homepage

The homepage carousel previously repeated product-link work, and a second content hook could rebuild its already-rendered output. The released update resolves each slide link once and reuses an exact repeated output within the same request. New requests still obtain current product information.

The existing object cache also gains bounded batch reads. Compatibility tests cover stored false-like values, request-local hits, private groups and failed transport fallback. This reduces repeated cache round trips without extending the lifetime of product data.

PHP checks and focused behavioral tests passed. Browser fixtures covered the full brand mix, deferred photographs, previous/next and keyboard controls, playback, reduced motion and purchase-form destinations at phone and desktop widths in both themes. No order was created. An isolated host diagnostic returned equivalent cache values and rendered the complete carousel; it is not a field performance result.

Released on 25 November 2026 in two stages, with protected source backups and installed-file verification. Live anonymous browser checks passed on phone and desktop in light and dark themes, including carousel interaction. Displayed prices, availability and product-link destinations matched current catalog objects. The empty cart kept its private cache policy; no purchase was submitted.

The observed page loads remained within the layout-shift target in those browser samples. Uncached homepage generation and repeated full-page cache eviction still need work. Signed-in checkout and sustained traffic were not exercised, and no claim is made that every page passes field Core Web Vitals.
