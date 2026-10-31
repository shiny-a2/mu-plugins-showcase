# Reliable bulk-editor table responses

A compatibility fix restores product-table loading when an HTTPS content-rewriting plugin processes the bulk editor's JSON as HTML. The exclusion is limited to the editor's AJAX requests; storefront HTTPS behavior, product data, permissions and saved columns remain unchanged.

Validation covered thirteen scope/hook checks, PHP syntax, authenticated 10- and 100-row responses, and browser rendering and pagination of the affected profile. Variable server latency remains a separate issue. Search verification was inconclusive and is not included in the passed checks.
