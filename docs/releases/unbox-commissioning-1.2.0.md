# Unbox shipping preparation — 1.2.0

A working carrier credential is only one part of a shipping integration. This update makes the distinction between connection, parcel readiness and automatic dispatch clearer for staff.

The prepared release adds opt-in dispatch for new eligible orders, keeps exceptions available for manual review, and improves shipment-history handling. It also handles incomplete legacy address copies conservatively, preserving a separately specified recipient and destination.

Validation includes 267 deterministic checks across configuration, permissions, carrier-response handling and dispatch behavior. Twenty browser cases cover mobile and desktop layouts in both themes, including keyboard interaction and synthetic form submission. Read-only carrier checks and an in-memory payload review were also completed without creating shipments or customer charges.

This is a prepared release, not a deployment announcement. Carrier-write commissioning and activation remain pending confirmation of the contract settings and an approved real shipment. No full live delivery-cycle verification is claimed.
