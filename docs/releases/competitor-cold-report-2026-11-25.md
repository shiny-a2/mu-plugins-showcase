# Faster cold competitor reports with retained evidence

Released November 25, 2026.

Large competitor reports previously decoded many captured catalogues again when temporary caches were unavailable. The report builder now reads durable daily summaries and current-sample facts bound to the exact observations used to produce them. Original captures remain available. Corrected or incompatible summaries cannot silently reuse an old revision; a missing summary can fall back to the retained evidence.

A native comparison for the same date range, in fresh processes with transient return values forced to miss, reduced report construction from 50.3 seconds to 3.6 seconds. Raw catalogue reads fell from 181 to zero, and the complete report matched after excluding display/calculation clocks. This is an observed backend comparison, not a whole-page latency guarantee.

The approved installation used a verified encrypted backup and a bounded backfill of 152 captures, including a retained fallback shelf. Raw bytes and observation times were checked around each calculation; an old shelf remains visibly old. Existing manager access and guest denial were verified. Thirty-four PHP scripts passed, including actual database, correction, failure, numeric-reference and cold-read checks. No customer or financial records, messages or paid model requests were created for verification.

This report improvement does not change the availability of upstream websites. Collection failures and narrower analysis samples remain labelled separately in the [source coverage update](competitor-source-availability-2026-11-25.md).
