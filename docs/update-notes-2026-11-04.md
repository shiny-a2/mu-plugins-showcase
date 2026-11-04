# Updates — 2026-11-04

[Back to update history](update-notes.md)

## 2026-11-04 — Fair cache warming during busy periods

Frequent content updates could repeatedly invalidate early entries in the cache warmer's priority list. When the existing load guard allowed only one request, later priority pages could keep waiting. The worker now remembers the next priority slot during busy runs, while ordinary runs retain their original order.

Fourteen isolated behavioral checks pass on macOS and Linux, including repeated invalidation, HTTP and network failures, cache hits, cursor recovery and resource limits. The previous worker fails the fairness regression. Existing catalogue-cursor and category-coverage checks also pass. The change preserves request, memory, load and time limits, and introduces no additional concurrency or customer-facing markup.

The recoverable worker update is published and its source readback matches the committed release. Public home, category and product checks return successful cached responses. No cache purge or service restart was needed. This is a maintenance fairness correction, not proof of universal cache coverage, a measured page-speed gain or all-green Core Web Vitals.

## 2026-11-04 — Clearer product search after live journey checks

Product search in the light theme allowed background photography to show through its result panel, making pale gold prices harder to read. The panel now uses the shared solid surface and readable text colors. Currency labels and the input placeholder are clearer, while the existing dark appearance and search behavior remain intact.

Mobile and desktop checks in both themes cover populated and empty results, hover, keyboard close and overflow. Regular-price contrast against the panel measures 5.43:1 in light mode and 9.15:1 in dark mode. Separate live journeys exercise navigation, in-stock filtering, product galleries and fit dialogs, anonymous cart additions/removal, and checkout entry. No order, payment or authentication message was submitted; authenticated checkout and physical-device coverage remain unverified.

Published-source readback and all four live search profiles pass, including decoded result photos. The scoped release preserves newer production theme changes, retains recovery copies and avoids a global cache purge or restart. These checks establish the named interactions, not sitewide defect-free operation or all-green field Core Web Vitals.

## 2026-11-04 — Reuse the early navigation stylesheet

The navigation stylesheet was downloaded twice on a cold visit because its early head link and later widget link used different version parameters. They now share the same URL for the standard build, while the early render-blocking stylesheet stays in place to protect header layout.

Seven isolated checks and four light/dark mobile/desktop browser comparisons pass. The representative stylesheet transfer falls from two requests totaling 6.5 KB to one request of 3.25 KB. Header geometry, gallery width and interactive menus remain intact. Published home, category and product responses confirm matching URLs in both rebuilt and cached pages.

This recoverable release changes no stylesheet rules, fonts or commerce records. Custom generated builds retain the previous fallback and are not included in the deduplication claim. The verified saving is modest; it does not establish a faster LCP or all-green field Core Web Vitals.

## 2026-11-04 — Product images match their mobile display space

The product gallery's mobile image hint included space occupied by padding and borders. On a representative phone-sized viewport at double pixel density, that made the browser select a larger image than the display needed. The shared simple-product template now declares the actual main-image space, and the existing responsive preload policy uses the same value.

The representative image transfer falls from about 121 KB to 81 KB in the affected profile, roughly 33%, using an existing image file without recompression. Full-resolution zoom, other photographs, custom layouts and variation galleries retain their existing behavior. Scope and markup checks, seven viewport/density combinations, and light/dark mobile/desktop gallery interactions pass. Each tested profile requests one main-image candidate with a matching preload.

Publication readback confirms matching attributes in rebuilt and cached responses, and the seven-profile request check passes against the published HTML. Anonymous storefront, cart and empty-checkout health checks retain their expected responses. The release has an exact recovery copy and renews only the representative page cache; other pages use the existing cache renewal process.

The diagnostic timing comparison did not establish an LCP improvement. This is a verified reduction in image demand for the affected profile, not a sitewide savings percentage or all-green Core Web Vitals claim.

## 2026-11-04 — Product gallery follows viewport changes

A stricter responsive check found that the gallery's temporary layout reservation could keep its old width after the screen size changed. The photo could remain too small or become clipped inside its resized container. The reservation now ends when the installed slider assigns its height, allowing the slider to resize the photograph normally while preserving the stable first frame.

The regression reproduces the old mismatch and now compares container, viewport and photo dimensions across mobile, tablet and desktop transitions. Four light/dark mobile/desktop checks cover keyboard slide selection, decoded zoom images, explicit image heights, touch swipe and no-JavaScript photo links. Published-source readback, rebuilt and cached responses, and the same interaction suite against production HTML pass. Anonymous storefront and empty-cart checks retain their expected responses. The recoverable release changes one presentation rule and preserves original images and commerce data; only the representative page cache was renewed. It does not establish a faster LCP or all-green field Core Web Vitals.

## 2026-11-04 — Product image preload follows media changes

A bounded image-format pilot exposed an old fixed JPEG preload that continued downloading after the gallery switched to WebP. The targeted early hint now follows the product's current featured image and shares the gallery's responsive candidates. Missing images have no stale fallback, while unrelated article and category hints keep their existing behavior.

The pilot was rolled back while the fix was prepared, then reapplied after publication. Three warm browser checks now download one main-image candidate without the extra legacy JPEG. The selected high-density mobile file is about 7.4% smaller. Original files, image dimensions, zoom source and commerce data are preserved; this is transfer reduction, not a disk-space claim or a proven page-speed gain.

Regression checks cover JPEG, WebP, replacement images, missing images and route exclusions. Mobile/desktop checks in light and dark themes cover gallery selection, zoom, resizing, touch swipe and no-JavaScript links. A headed-browser check confirms the dark zoom photograph after an intermittent black headless screenshot. Publication retains recovery copies and uses scoped cache renewal, with no global flush or restart. Field LCP, INP and all-green Search Console acceptance remain open.

## 2026-11-04 — Product gallery initialization stability

A product gallery briefly expanded into a tall image stack while its slider initialized, then collapsed to the intended image height. The simple-product gallery now reserves the featured image's dimensions before that transition. The installed slider retains control of later image heights, resizing, swipe navigation and zoom. Gallery pagination also has clearer shared-palette states and larger touch targets.

Filtered-image and exclusion checks cover unsupported product types, disabled sliders and missing image metadata. Mobile/desktop checks in light and dark themes exercise keyboard navigation, zoom, resizing, touch swipe and no-JavaScript photo links. Direct production traces retain a constant representative gallery height, with the large unprompted initialization shift removed. Production HTML readback includes the fix before the end of the document head and confirms a rebuilt response followed by a cache hit.

The recoverable release changes one presentation module. It preserves product data and commerce behavior, with no global cache purge or restart. Variable-product galleries and remaining LCP work are separate follow-ups. These scoped lab and release checks do not establish that every URL passes field Core Web Vitals.

## 2026-11-04 — Product fit guide first-frame stability

A shared product template rendered its fit guide before the component's layout stylesheet arrived. Asset discovery now recognises that template during page-head rendering, so the card receives its final layout before painting. The existing product-photo wrist preview remains intact. A faded input placeholder also now uses the shared muted-text palette with full opacity.

The late-style regression reproduces the original geometry change; the fixed fixture records zero component layout shift. Mobile/desktop checks in light and dark themes cover keyboard focus, modal open/close behavior, reduced motion, overflow and AA placeholder contrast. Guarded production readback and live interaction checks confirm the first-frame fix. Three controlled mobile runs recorded initial CLS below 0.002, but LCP remained high; external response delay, image delivery and gallery initialization remain follow-up work. These results do not establish field INP or all-green Search Console status.

The release preserves existing commerce behavior and camera assets, with a private recovery copy and a scoped representative cache refresh. No global purge or service restart was needed.

## 2026-11-04 — Archive filter cache ownership

Concurrent cache misses could start duplicate filter-option builds, and a slow former owner could clear a newer build's lock. Ownership now stays with the request that acquired it, and a fresh cache check avoids rebuilding work another request has just completed. Existing filter responses, stock and price decisions remain intact. A faint stock icon also now follows the shared light/dark palette while preserving the delivery image.

Twenty-six isolated checks pass, including concurrent workers and failure paths. Nine additional database checks pass against synthetic values in a temporary table. Mobile and desktop reviews in both themes cover modal interaction, selection, reset, scrolling and visible input focus.

The recoverable single-module release is published. Source readback and syntax checks pass; representative home, category and product responses return success and subsequent cache hits. The options endpoint returns a successful response with populated groups. No global cache purge, service restart or purchase was needed. The existing lock lifetime remains bounded, and this change does not establish a measured latency gain or all-green field Core Web Vitals.

## 2026-11-04 — Faster category availability checks

Category availability checks counted every matching product when they only needed to know whether one published product existed. The lookup now stops at the first match. Empty-category handling and temporary product redirects retain their existing destinations and visibility rules, including published products that are out of stock.

Thirty-five isolated SQL and consumer checks pass. A bounded comparison on the production database returns identical decisions for three representative categories; the large category's median lookup falls from roughly 611 ms to 1.7 ms. After publication, the corresponding category callback takes about 2.4 ms in the diagnostic render. These measurements describe one lookup and callback, not the complete page or field Core Web Vitals.

The recoverable single-module release is published with syntax and exact source readback checks. Representative storefront responses return success and subsequent cache hits. The main category is reviewed at mobile and desktop widths in both themes, with filter and sorting interaction checks. No layout assets, commerce records, schema or server settings changed. Uncached page delivery still takes several seconds, and further archive-query and startup work remains.

## 2026-11-04 — Less repeated work in catalogue ordering

Two catalogue callbacks were reading the same stock lookup separately while sorting products. The final ordering callback now reuses the existing lookup when its shape is known to be compatible. Custom or constrained lookups keep the independent path. Available, price-on-request and sold-out products retain their ordering, including stable pagination and products with missing lookup rows.

Ninety isolated checks cover the real callbacks, sorting, page boundaries and excluded request types. Bounded database comparisons preserve result order and totals across early and late pages. Three alternating samples show a modest reduction in the executed listing query; this is not a claim about whole-page speed. Mobile and desktop inspection in both themes covers catalogue presentation and relevant controls.

The source-controlled release retains an exact recovery copy. Live query readback matches the approved change, representative pages return successful responses, and repeated requests hit the existing cache. Uncached rendering remains slow enough to require further work. No database migration, broad cache purge or restart was needed, and field Core Web Vitals acceptance remains open.

## 2026-11-04 — Less duplication in large category listings

Products assigned to several descendant categories were generating repeated intermediate rows before the catalogue grouped them. A bounded anonymous-listing pilot now checks category membership without multiplying those rows. Existing visibility, stock ordering and pagination totals remain intact; small categories, alternate request types and unfamiliar query shapes retain their previous behavior.

Seventy-seven membership and exclusion checks pass alongside ninety stock-order checks. Twelve bounded database comparison cases preserve ordered results and totals. Three alternating samples show roughly 54% lower median time for the targeted large-category query; that figure does not describe the complete page. Isolated application renders preserve the first two pages and confirm that a small-category control remains unchanged. Mobile and desktop inspection in both themes covers listing presentation and relevant controls.

The single-module release is published with a recovery copy, production syntax checks and exact source readback. Live query results match the tested candidate, and five representative routes return successful responses followed by cache hits. Uncached responses still take several seconds, so startup and rendering remain follow-up work. No database migration, broad cache purge, restart or commerce record was needed. Search Console field acceptance remains unverified.
