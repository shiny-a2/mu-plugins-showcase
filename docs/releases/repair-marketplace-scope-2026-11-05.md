# Assigned repair access and reliable submission retries

The repair workspace now exposes marketplace work only to the assigned specialist and global managers. A general repair role no longer opens marketplace queues, linked jobs or notifications. Other branch repair work keeps its existing access rules. The interface follows the same server-side decision, including direct links and restored sessions.

Failed photo uploads previously left incomplete records that appeared in the review queue. The retry flow now continues the same owned record, and the queue excludes incomplete drafts and superseded history. Required photographs, description and price still apply. Existing history is retained rather than merged by brand or model alone.

Validated with isolated authorization, denied-route, inbox, upload failure/recovery and notification retry tests. Browser fixtures exercised allowed and denied staff at mobile and desktop widths in light and dark themes. The paired modules were deployed with file backups; live read-only checks confirmed the intended access matrix and draft exclusion. No real customer message, purchase or payment was created for testing.
