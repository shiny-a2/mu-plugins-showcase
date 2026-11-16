# Supplier intake and recoverable branch sales — prepared release

The commerce adapter now exposes completed bulk-import reports to the existing
product research workflow and reports in-stock references absent from a supplier
price list. Missing rows do not imply that a product has become unavailable.

Accounting imports require an exact, unambiguous product match before adjusting
inventory. Re-uploading an unchanged invoice can recover a failed stock write
without deducting twice. Deductions stay with the selling branch while stock
owned by another branch or supplier is preserved. Conflicting references and
missing opening counts remain review items. Invoice amounts and customer
ownership are not changed to force a product match.

The real WordPress/WooCommerce/MariaDB fixture passed 55 integration checks.
Focused matching and import regression tests passed 21 and 28 assertions; Desk
management, operations and import tests passed 195. Production auditing was
read-only. No real financial records or messages were created for testing.
The implementation is prepared; production installation remains pending.
