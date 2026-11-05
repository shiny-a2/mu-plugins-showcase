# Product page asset cleanup — November 5, 2026

A scoped storefront update removes an unused general stylesheet from simple product pages whose descriptions contain no block content. Pages that use block content retain the style. Product copy, images, prices, stock, cart and checkout rules were not changed.

The release used a recoverable single-file backup and exact source checks. The live representative product response and its regenerated cache entry no longer include the unused stylesheet. Another product rendered the same way on an uncached request; the homepage and watch category continued to return HTTP 200.

Live anonymous browser checks passed at mobile and desktop widths in light and dark themes. They covered the gallery, full-screen image controls, description and review tabs, FAQ expansion and horizontal fit. No cart item or order was created. Other cached product pages refresh under their existing cache lifetime.

A fresh PageSpeed API measurement was unavailable because the daily quota was exhausted. Search Console field Core Web Vitals and ranking improvements are not claimed.
