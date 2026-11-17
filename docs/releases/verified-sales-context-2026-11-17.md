# Verified context for customer conversations

The installed update lets a sales assistant explain marketplace and loyalty rules from existing store producers, then read a customer's own submissions, tier progress and recent account-linked orders after mobile verification. A supplied phone number or user identifier alone grants no personal access.

An optional identity component owns verification and expiry. The store adapter provides transactional persistence and the established messaging transport. Account ambiguity and privileged accounts are rejected. Verification creates no customer account, login session, order, reward or automatic profile merge; the existing website login flow remains separate.

Customer responses distinguish drafts from submitted reviews, publication from physical authenticity, and points from wallet value and qualifying purchases. Internal notes and other sellers' records are excluded. The shared message transport now requires a valid provider acknowledgement. Profile synchronization also reports failed writes accurately so an incomplete batch can be retried.

Forty integration checks passed in isolated commerce and database fixtures with outbound traffic blocked. They exercised concurrent requests, replay, account ownership, ambiguous accounts, transaction failure, expiry cleanup and incomplete acknowledgements. The identity component passed static analysis, foundation/channel checks and release packaging gates. No real customer messages or purchases were used.

Production installation and feature activation were approved and completed. Installed file hashes, the additive verification store and indexes, configured cleanup with a successful invocation, service health and live authentication boundaries were verified. Real customer message delivery and each external channel's complete flow remain unverified. Recovery keeps personal access closed when verification is unavailable.


## Prepared customer-recognition correction

An eligibility check incorrectly excluded ordinary marketplace buyers and sellers from conversation verification. The prepared fix accepts those customer roles while keeping staff, elevated permissions and ambiguous accounts blocked.

Verified context now includes the account name and the actual products, brands and references in that customer's orders. Older orders use bounded pagination, and incomplete results are distinguished from an absent purchase. Seller photography guidance covers a clean background, soft light, focus, reflections and detailed condition photos.

The paired assistant update connects the affected Telegram integration to verification and stops treating saved contact labels as confirmed identity. Validation passed 62 isolated commerce checks and 55 assistant tests, plus eight media/handoff checks. Installation is pending approval. No live SMS, customer message or purchase was created for these tests; real delivery and customer acceptance remain unverified.
