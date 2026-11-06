# Product page asset cleanup — November 5, 2026

A scoped storefront update removes an unused general stylesheet from simple product pages whose descriptions contain no block content. Pages that use block content retain the style. Product copy, images, prices, stock, cart and checkout rules were not changed.

The release used a recoverable single-file backup and exact source checks. The live representative product response and its regenerated cache entry no longer include the unused stylesheet. Another product rendered the same way on an uncached request; the homepage and watch category continued to return HTTP 200.

Live anonymous browser checks passed at mobile and desktop widths in light and dark themes. They covered the gallery, full-screen image controls, description and review tabs, FAQ expansion and horizontal fit. No cart item or order was created. Other cached product pages refresh under their existing cache lifetime.

A fresh PageSpeed API measurement was unavailable because the daily quota was exhausted. Search Console field Core Web Vitals and ranking improvements are not claimed.

## November 6 follow-up: shared theme assets

The public storefront now receives only the shared day/night switch styling. Customer dashboard styling stays on the dashboard route. This removes about 16 KB of raw inline CSS from a representative public product response while preserving the dashboard's generated stylesheet byte for byte.

Before release, browser replay at phone and desktop widths in both themes matched the current product's key colors and layout, and the switch changed state. After release, the live home, watch category and product pages returned HTTP 200 with the smaller stylesheet. The live product passed the same four viewport and theme checks, with no script error or horizontal overflow. The change is a bounded reduction in initial HTML; field LCP and Core Web Vitals results still require fresh measurement.

## November 6 follow-up: one-product gallery pilot

A single product with several photos now uses a lighter gallery presentation. A browser trace showed that the previous slider rebuilt the already visible main image, delaying the final desktop LCP observation. The new presentation keeps image selection, touch swiping, keyboard controls and full-screen viewing while avoiding that rebuild. Other products retain their existing galleries.

The first live canary exposed a low-resolution secondary photo and was rolled back. A corrected release preserved the normal image size; the live page then passed light and dark checks at phone and desktop widths, including photo selection, swiping, full-screen viewing and horizontal fit. The home page, category and another product continued to respond normally, and the regenerated product page was served from cache.

Throttled local desktop comparisons suggest a faster final LCP for this example. Mobile comparisons varied and did not establish an improvement. Search Console field results have not yet reflected this release, so a site-wide green Core Web Vitals result is not claimed.

## November 6 follow-up: selected product galleries

The lighter gallery now covers eleven selected simple products with five to ten photos each. Image selectors scroll within the available width and remain usable on narrow phones. When a customer selects a photo that has not loaded yet, the current image stays visible until the next one is ready; a failed load leaves the current image in place. Products outside the selected group keep their existing gallery.

Seventeen live browser checks passed across the selected products. The five-photo and ten-photo examples were checked in light and dark themes at phone and desktop widths; the remaining products were checked at phone width. The checks covered the last photo, full-screen image position, selector visibility, horizontal fit and page errors. A comparison product kept its original gallery, and the home page, category and sampled product pages returned HTTP 200 from the existing internal cache.

Three throttled desktop replay pairs showed lower final LCP for the ten-photo example than the previous slider. Mobile results were inconclusive. Search Console field data still needs time and fresh measurement before any broader Core Web Vitals conclusion.

## November 6 follow-up: four-photo watch galleries

The lighter gallery now covers twelve more selected simple watches with four photos each. A live browser trace of one watch showed its main photo becoming the largest painted element twice as the previous slider started. The updated gallery keeps the normal image size and the same selection, swipe, keyboard and full-screen controls.

Fifteen live browser checks passed across the new selection. A representative watch was checked in light and dark themes at phone and desktop widths, including visual inspection of the initial and selected image. The other watches passed phone-width selection and full-screen checks. A product outside the selection retained its original gallery; sampled pages returned HTTP 200 and warmed responses used the existing internal cache.

Three throttled desktop comparison pairs showed lower final LCP for the representative watch with the lighter gallery. One fresh live browser run recorded a single final paint of its main image. These observations do not establish a mobile or Search Console field improvement; broader Core Web Vitals status remains pending field data.
