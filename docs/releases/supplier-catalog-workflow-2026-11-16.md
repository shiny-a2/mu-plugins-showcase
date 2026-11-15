# Reviewed supplier catalog updates — preview installed

Supplier spreadsheets can propose prices and availability that disagree with
current product ownership or an operator's newer edits. The adapter
checks those conditions again before changing a product and returns a traceable
result for each operation.

It preserves the existing company resolver and inventory ownership, holds
unsupported cases, distinguishes rejected changes from uncertain outcomes and
prevents a repeated operation from silently applying twice. The companion
management workflow provides a complete preview and downloadable receipts.
Existing writers retain their behavior until a company explicitly enables the
new ownership path.

Local validation passed 63 isolated adapter checks and 61 inventory/company
resolution checks. The companion workflow passed 155 supplier/access/order tests
and 32 catalog tests, including a synthetic producer/consumer contract fixture.
The isolated tests do not prove real database locking, commerce-hook effects or
external supplier-message delivery. Live acceptance remains pending.

There is no storefront presentation change. Source code, company files, customer
information and operational configuration remain private.

The owner-approved preview has now been installed with write and supplier-order
sending controls disabled. The bot restarted successfully, its source hashes
matched the reviewed release, and the backup passed integrity checks. Live
read-only snapshots respected existing inventory ownership; requests without
credentials or a configured company were refused. Private/public command menus
were cleared and management commands were scoped to authorized administrators.

The company group is now bound. A genuine file exercise and agreement with the
existing inventory owner remain pending. This is preview deployment evidence, not acceptance of automatic
price, stock, supplier-order or financial operations.


## Installed cache recovery correction

Adapter 1.0.1 refreshes WooCommerce's per-product metadata and optional product
instance caches before checking a saved result. A disposable integration test
reproduced an earlier error: a separate worker committed successfully, but the
receipt reader retained older metadata and could not confirm that result. The
same refresh also clears values left in memory after a rolled-back save.

The correction passed 63 isolated assertions and 34 real database assertions
with WordPress 6.9.4, WooCommerce 10.9.4 and MariaDB 10.11.16. Checks include
concurrent locking, termination before and after commit, receipt recovery,
exception rollback and lookup-table integrity. Only synthetic products were
used, outbound HTTP was blocked and product-instance caching was enabled. Test
PHP was 8.3.35; production PHP, the production cache drop-in and the complete
plugin stack remain outside this verification.

The owner-approved update is now installed. Production syntax, matching source
hashes, backups, route registration and read-only API checks passed. Company
policy is unchanged and writes remain disabled. Authenticated snapshots continued
to hold existing inventory; missing credentials and unconfigured companies were
denied. The API contract is unchanged, uncertain operations are not automatically
resent, and existing branch inventory remains protected. Genuine company-file
acceptance and inventory-owner agreement are still pending.
