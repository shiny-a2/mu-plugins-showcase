# Reversible supplier-feed controls

A shared supplier channel now has persistent administrator-only on/off/status controls. Reader and writer checks use the same state, stop disabled reads without replacing valid snapshots and prevent stale plans from updating the catalog. Invalid state fails closed. Independent feeds retain their existing behavior.

The administrative control is available in private messaging, with authorization rechecked for each action. Scheduling follows the same switch. Live read-only checks confirm paused reader/writer behavior and enabled primary services; eight offline checks cover recovery, authorization boundaries and disabled-write protection.

A requested brand availability closure used commerce-native stock updates, a protected rollback snapshot and a second audit of all matching products. Existing prices and publication states were preserved. Source, release notes and rollback tags remain in private repositories; runtime documents and inventory snapshots are excluded from Git.

Release: `v1.0.0-cat-sync-control`, with availability closure recorded as `v1.0.0-caterpillar-pause`.

## November 24, 2026 — Supplier availability and shop stock

A supplier list can mark a watch unavailable while a shop still has one on the shelf. The catalog preview now shows the supplier’s own availability for enrolled brands. Staff can reconcile a new list without taking those shop units off sale.

In a WooCommerce integration test, a supplier withdrawal left three physical units available at their existing sale price. The same file could be replayed, and an older inventory report could not reverse the withdrawal.

### Comparing a complete brand inventory

A supplier's complete inventory can now be compared with the watches that supplier has available for the named brand. The store checks the brand, supplier, model and product identity. This lets staff act on a missing model while keeping stock from other suppliers and physical shops separate. An integration test checked brand isolation and confirmed that a watch stocked only at a shop was excluded from the supplier list.

An operator can link an alternate model number to an individual existing product. The shop checks its title, brand, reference and competing catalogue matches again before applying a later file. Similar names alone do not qualify a product for a price change.
