# Faster product bulk editing and visible save failures

The product bulk editor now opens with a smaller working set while retaining page-size choices for operators. Ordinary grid reads and product edits avoid broad refresh work that slowed the shared administration system. Concurrent editor requests no longer wait behind an unused session lock. If a save request fails, the screen shows a persistent warning and offers a deliberate table reload so the operator can check the stored value.

Isolated checks passed for page-size limits, authorized request scope, session release, failed-save feedback and the compatibility update against the installed editor version. The scoped live files matched the prepared source; the editor remained active, and the new asset and public home page returned successful responses. No real product was changed for testing. Authenticated saves and a measured before-and-after speed comparison remain unverified.
