# Exact-watch wrist preview preparation — 2.0.8

The wrist preview needs a clear image of the selected watch and a trustworthy physical case size. A catalogue review found that these inputs are incomplete for many products, so the next release prepares images in bounded batches and leaves each new preview disabled until an editor checks the exact model, image angle, case boundary and size.

Customers with an approved model can optionally enter their wrist circumference. The preview detects a hand after the customer selects a photo or opens the camera, places the watch, and shows an estimated case-to-wrist-width ratio. The result is labelled as an estimate; a ruler-based adjustment remains available. The photo and sizing work stay on the customer's device.

Local checks passed for image processing and import boundaries, product editing rules, and four mobile/desktop light/dark interface flows. A real local watch photo was cut out and visually reviewed, and a real hand-detection model returned landmarks in the browser. The image has not been matched to a live catalogue item. Whole-catalogue processing, physical phone sizing, editorial approval and deployment remain pending. The current live pilot is unchanged.

The batch now borrows the existing Photoshop workflow's white-background check before using local segmentation for more complex photos. It runs a small, bounded number of independent images at once and resumes completed outputs. Ten processor tests pass. A read-only 15-product catalogue sample produced 15 automated cutouts, with three visually checked on a neutral background; two sampled products still lacked a recorded case size. These results are preparation evidence, not approval for every watch or a live launch.
