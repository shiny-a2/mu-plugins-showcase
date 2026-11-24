# Reliable archive filter counts

Large product categories could leave shoppers waiting for attribute choices when count generation exceeded the database's time limit. The released filter divides that work into bounded requests and combines the results before sorting or limiting the visible choices. If part of the calculation fails, it does not present incomplete counts as if they were final.

Regression checks covered a large synthetic category, stock-aware counts, duplicate products, term limits and failed batches. Existing cache ownership checks also passed. A read-only live calculation using the previously failing case completed without a database error. The filter dialog opened and closed on mobile and desktop in both themes, with no observed overflow or missing images. A short post-release check found no new database timeout from this path.

This release fixes the observed failure. The uncached calculation still takes several seconds, so the check does not establish high-traffic capacity or a sitewide speed gain. Further cold-path profiling is planned separately.
