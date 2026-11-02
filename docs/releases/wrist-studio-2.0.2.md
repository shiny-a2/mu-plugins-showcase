# Wrist preview pilot — 2.0.2

A watch preview should show the selected product and make its sizing limits clear. This release introduces a limited, one-product pilot using a reviewed frontal photograph, verified case dimensions and browser-local photo or camera placement.

The interface shows the case width before the preview begins. A customer can measure wrist width with a ruler and mark its edges in a photo to establish an approximate scale. Changing the source, reference measurement, smart placement or manual zoom clears that calibration. Saved previews retain the scale status. Hand detection positions the image; it does not claim to measure physical size.

Product images and model assets load on demand. Customer wrist images stay in the browser. The preview supports manual placement, rotation, comparison, camera freeze and local export. Its colors follow the existing storefront theme, including fixes for heading and button styles inherited from the surrounding page.

## Validation and limits

- PHP contracts cover configuration bounds, editor permissions and invalid saves.
- Geometry checks cover reference ratios, invalid points and photo letterboxing.
- Local browser checks exercise four mobile/desktop and light/dark combinations, keyboard/focus behavior, camera refusal, late camera cleanup, export and calibration invalidation.
- The live pilot passed photo, calibration, comparison, export and close flows in those four browser configurations.
- The deployed hand-detection worker recognized the documented sample image; a local blank-frame test returned no hand.

The pilot is live with a recoverable release. It is a two-dimensional preview, not a validated physical fitting instrument. A five-model asset set, physical iPhone/Android trials, depth/occlusion handling and three-dimensional strap fit remain future validation work. No real purchase, customer photo or outgoing customer message was used in these tests.
