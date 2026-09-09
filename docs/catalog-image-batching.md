# Reliable catalog image batching

A desktop image-composition script produced acceptable results for its first few inputs, then began placing product photos with their original backgrounds. The script discarded segmentation errors and continued exporting. It also used an uncertain reference to the pasted layer and modified reusable templates directly, making each later result dependent on cleanup from the previous one.

The repaired workflow checks the cutout before composition, retries in a fresh source document, and retains the actual error when an input cannot be processed. One successful cutout feeds the product's primary and secondary layouts. Each output is built in a disposable template copy with explicit document ownership and cleanup.

This changes a failed image from a misleading finished asset into a visible, recoverable failure. Completed files remain available when processing resumes, temporary saves do not acquire final names until the write completes, and repeated processing or write failures stop the run. A progress window and incremental local log help the operator see what happened without inspecting every document tab.

The validation includes failure injection into segmentation, mask application, transparency checks, save operations, cancellation, and cleanup, plus a queue simulation of thousands of inputs. These are tests against a mocked image-editor host. They establish control-flow behavior, not real image-editor throughput or visual segmentation quality. Acceptance on representative photos in the target Windows application remains outstanding.

The source script, composition measurements, filenames, photos, templates, and runtime logs remain private. The public update describes the engineering outcome and its verification limits.
