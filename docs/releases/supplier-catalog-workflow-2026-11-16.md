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

Company-group binding, a genuine file exercise and real database failure tests
remain pending. This is preview deployment evidence, not acceptance of automatic
price, stock, supplier-order or financial operations.
