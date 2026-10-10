# Loyalty scheduler recovery

A production health warning exposed two independent faults: a valid reduced payment-channel earning policy was being validated as though it were a customer-tier reduction, and the host scheduler could exit without advancing overdue WordPress work.

The integration now sends the final channel-aware percentage through an explicit domain boundary while retaining the stronger tier invariant. Unit tests cover reduced, ordinary and increased rates, and mutation testing proves that removing the tier guard is detected.

The operations path now runs due events through WP-CLI under an exclusive host lock and gives the loyalty sweep an explicit priority check. Recovery replays only recorded failed sources through their existing idempotency keys. The administrative failure notice is cleared only after every replay succeeds.

Release validation checks a recent sweep timestamp, a future next run, an empty failure counter and the absence of a stale cron lock. The public note excludes order identifiers, customer data, configured rates and host details.
