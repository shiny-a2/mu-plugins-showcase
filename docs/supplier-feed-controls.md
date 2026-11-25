# Reversible supplier-feed controls

## Prepared source-price verification — 1.3.0

A newly received supplier amount can make an older selling price unsafe while
its update awaits review. The prepared adapter records the source independently
and holds purchasing when price or inventory evidence is unresolved. It preserves
counted shop stock and content approval timestamps, and reuses existing journals
and targeted cache invalidation. The purchasing guard remains active when the
writer is rolled back.

Validation used disposable WordPress, WooCommerce and MySQL, real HTTP permission
checks, interrupted transactions, existing carts and rendered light/dark mobile
and desktop fragments. No real orders or financial changes were created. This
candidate is not deployed; production theme/cache acceptance and a reviewed
supplier coverage manifest remain required before activation.

## Existing feed controls (v1.0.0)

A shared supplier channel now has persistent administrator-only on/off/status controls. Reader and writer checks use the same state, stop disabled reads without replacing valid snapshots and prevent stale plans from updating the catalog. Invalid state fails closed. Independent feeds retain their existing behavior.

The administrative control is available in private messaging, with authorization rechecked for each action. Scheduling follows the same switch. Live read-only checks confirm paused reader/writer behavior and enabled primary services; eight offline checks cover recovery, authorization boundaries and disabled-write protection.

A requested brand availability closure used commerce-native stock updates, a protected rollback snapshot and a second audit of all matching products. Existing prices and publication states were preserved. Source, release notes and rollback tags remain in private repositories; runtime documents and inventory snapshots are excluded from Git.

Release: `v1.0.0-cat-sync-control`, with availability closure recorded as `v1.0.0-caterpillar-pause`.
