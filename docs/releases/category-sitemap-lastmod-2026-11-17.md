# Accurate category update dates in sitemaps

A shopping category could gain useful buying guidance or updated search metadata while its sitemap still showed the date of an older product edit. The site now records category edits and gives the sitemap the later of the category and product dates. This helps search engines discover meaningful category updates without changing the customer-facing page or product URLs.

Focused PHP and sitemap behavior checks passed. The approved one-file release was verified on the live site: the XML remained valid, the category page still loaded normally, and an in-memory check confirmed the new date rule. Earlier edits have not been backdated, and no indexing request or ranking improvement is claimed.
