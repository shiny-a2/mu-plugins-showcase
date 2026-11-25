# Resume cache warming after a load pause

If server load rose after a batch had been claimed, requests that had not started could remain marked as running until stale-work recovery. The worker now returns its own unchanged, unstarted claims to the pending queue without charging an HTTP retry.

Actual request failures still follow the existing retry rules. Load limits, concurrency, cache lifetime and product freshness rules stay unchanged. Claim checks protect work changed by another process, and a failed update retains the existing recovery path.

Eight local lifecycle and failure scenarios passed, including a full batch, changed ownership and database failure. The regression fails against the previous worker. URL restrictions, deployment cache policy and PHP syntax checks also passed. A read-only database query-plan check accepted the statement; the local behavioral fixture is not a real concurrent production write test.

Released as a single backend file with a verified prior-source backup. The installed source and server syntax check matched the release. The global HTML cache stamp was preserved, and four anonymous page samples returned successful cache hits with unchanged HTML. The protected users endpoint remained inaccessible anonymously. No new entries appeared in the inspected PHP error log. The observed queue contained no pending work, so a live load-triggered deferral was not induced. This backend change does not alter storefront markup or styles. Cold product and category generation remains a separate performance task; this release does not establish a site-wide speed gain or passing field Core Web Vitals.
