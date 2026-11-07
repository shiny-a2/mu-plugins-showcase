# Wrist preview catalogue preparation — 2.0.6

The editor can now suggest a transparent image already present in the exact product's gallery when no preview image has been chosen. Selecting it opens the full-resolution source for case-boundary calibration and clears the approval checkbox. An opaque image is never suggested by this path. The existing per-product approval and physical case-width checks remain required.

This source update is prepared in a private branch and has not been deployed to the store. It does not make every watch eligible: a frontal image of the exact model and a verified case width are still needed for each product. The storefront's existing one-product pilot remains the only confirmed live product preview.

PHP contracts, the editor selection interaction, geometry checks, and four local mobile/desktop light/dark preview flows passed. Physical phone and catalogue-wide accuracy were not verified.
