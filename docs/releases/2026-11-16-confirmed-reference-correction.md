# Correcting a confirmed model reference across catalog readers

A product title contained the correct model, but its reference attribute had a
different final character on two storefronts. Exact catalog matching failed, and
the dependent app and spreadsheet export repeated the incorrect attribute.

The approved repair corrected the shared reference at its source and on the
receiving store. A private single-product plan checked site identity, brand,
reference uniqueness, collisions and the previously reviewed product state.
Before/after backups and readback confirmed unchanged prices, stock, pictures,
SKU, content, status and product URLs. Related existing SEO metadata was corrected
without changing templates or adding an independent app mapping.

Independent product reads, the public app endpoint, the actual spreadsheet-export
reader and exact bot lookup all returned the corrected model. Browser checks
covered both storefronts and the app at mobile/desktop widths with light/dark
preferences; the corrected reference was visible without horizontal overflow.
The existing fixed themes were preserved. No test purchase, message or financial
record was created. Source checks and the guarded production correction passed;
automatic supplier price/stock updates were not enabled by this data repair.

Private plans, commercial values, product identifiers, screenshots and backups
are excluded from this showcase.
