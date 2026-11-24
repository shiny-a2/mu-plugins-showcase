# Preserved error logs with bounded rotation

An oversized application error log made ongoing diagnostics harder and risked further storage growth. The installed operations update preserved the existing log in restricted storage, opened a fresh log for the application and added size-aware daily rotation with bounded retention. No historical diagnostic entries were truncated or deleted.

The host accepted the complete rotation configuration without errors. The storefront routes checked after installation responded successfully, the relevant services stayed active and a natural application entry reached the new log. No service restart was needed. The first scheduled rotation has not yet occurred, so its outcome remains to be observed.
