# Reversible supplier-feed controls

A shared supplier channel now has persistent administrator-only on/off/status controls. Reader and writer checks use the same state, stop disabled reads without replacing valid snapshots and prevent stale plans from updating the catalog. Invalid state fails closed. Independent feeds retain their existing behavior.

The administrative control is available in private messaging, with authorization rechecked for each action. Scheduling follows the same switch. Live read-only checks confirm paused reader/writer behavior and enabled primary services; eight offline checks cover recovery, authorization boundaries and disabled-write protection.

A requested brand availability closure used commerce-native stock updates, a protected rollback snapshot and a second audit of all matching products. Existing prices and publication states were preserved. Source, release notes and rollback tags remain in private repositories; runtime documents and inventory snapshots are excluded from Git.

Release: `v1.0.0-cat-sync-control`, with availability closure recorded as `v1.0.0-caterpillar-pause`.
