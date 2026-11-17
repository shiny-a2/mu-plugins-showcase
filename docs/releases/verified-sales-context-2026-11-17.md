# Verified context for customer conversations

The prepared update lets a sales assistant explain marketplace and loyalty rules from existing store producers, then read a customer's own submissions, tier progress and recent account-linked orders after mobile verification. A supplied phone number or user identifier alone grants no personal access.

An optional identity component owns verification and expiry. The store adapter provides transactional persistence and the established messaging transport. Account ambiguity and privileged accounts are rejected. Verification creates no customer account, login session, order, reward or automatic profile merge; the existing website login flow remains separate.

Customer responses distinguish drafts from submitted reviews, publication from physical authenticity, and points from wallet value and qualifying purchases. Internal notes and other sellers' records are excluded. The shared message transport now requires a valid provider acknowledgement. Profile synchronization also reports failed writes accurately so an incomplete batch can be retried.

Integration checks use isolated commerce and database fixtures with outbound traffic blocked. They exercise concurrent requests, replay, account ownership, ambiguous accounts, transaction failure, expiry cleanup and incomplete acknowledgements. The identity component passed static analysis, foundation/channel checks and release packaging gates. No real customer messages or purchases were used.

This release is prepared and tested locally. Production installation, the additive verification store, feature configuration and a real delivery check remain pending. Recovery keeps personal access closed when verification is unavailable.
