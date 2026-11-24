# Updates for November 6, 2026

[Back to update history](update-notes.md)

## Stable first frame for selected product galleries

On a small, controlled group of multi-image products, secondary photos briefly occupied space beneath the main photo before the gallery controls initialized. The gallery now holds its first-frame layout until those controls are ready. Image selection, swipe, keyboard access, full-screen viewing and a fallback for unavailable JavaScript remain available.

In three controlled phone-sized replay pairs, the gallery setup shift fell from about 0.03 to below 0.001 with an unrelated promotional popup held constant. The published pages passed light and dark checks on phone and desktop, including image selection and viewing, without horizontal overflow or browser errors. This is a scoped layout correction; intermittent promotional-popup movement and rolling Search Console field results still need separate review. No site-wide green Core Web Vitals result is claimed.

## Steady reading below product lists

When a category's next product batch arrived after a visitor had scrolled into the description or footer, the list could expand above the reading position and move the visible page. The archive now holds that batch until the visitor returns to the product list or chooses a visible continue button. Filter changes discard a pending batch.

Delayed-response browser checks covered the button, keyboard activation, automatic continuation on scrolling back, and mobile and desktop layouts in light and dark themes. The affected desktop scenario's largest sampled late shift fell from about 0.83 to below 0.02. Live checks confirmed the new behavior and no horizontal overflow. Other early page shifts and rolling field Core Web Vitals remain under review; Search Console has not yet marked every URL good.

## Stable first paint for product archives

Long product categories could briefly paint a one-column product grid before the responsive styles arrived, moving the first row after visitors had already seen it. The archive now requests the existing product-grid styles in the page head. Later widget links reuse those downloads, and other page types retain their existing loading path.

A repeated browser comparison on an affected archive reduced sampled desktop layout shift from about 0.42 to 0.03–0.04. Mobile and desktop checks in light and dark themes covered product cards, the advanced filter, and horizontal overflow. The source passed PHP syntax checks and was published with a recoverable server copy. Rolling field Core Web Vitals and Search Console validation remain pending.

## Stable archive filter while options load

The product archive filter now opens at its settled height while options load, with an internal scroll area and a steady mobile action bar when the result count appears. This prevents the dialog from growing across the page during the sampled interaction.

The live release passed five phone and desktop browser checks in light and dark themes, including loading options, expanding a section, selecting a filter, closing with Escape and checking for overflow and page errors. The sampled dialog had no attributed layout shift in those checks. Sitewide field Core Web Vitals and Search Console validation remain pending.
