# Leaner month comparison in an operations dashboard

A private commerce dashboard compared the current partial month with the previous month. Its first pass read the entire previous month, then repeated the read for the matching elapsed window and discarded the first result. The installed update calculates the comparison boundary before querying, so the previous period is read once. It also keeps a shorter previous month from spilling into the next month.

Local regression checks covered the partial-month boundary, caching and the shorter-month case. Installation checks confirmed the deployed file, syntax and running application services. The authenticated dashboard and production response-time improvement have not yet been independently measured; the update is a reduction in unnecessary query work, not a quantified speed claim.
