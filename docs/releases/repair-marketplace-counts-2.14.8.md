# Repair marketplace queue clarity

The marketplace badge now counts both incoming parcels and watches awaiting technical review. Previously, the main badge omitted the review queue even though those watches appeared inside the page. A failed refresh no longer replaces the last known count with zero.

Review tabs name the repair team's decision explicitly. Each card separates that decision from the current listing stage, so technical approval is not confused with publication. The interface explains that decision counts cover the recent history returned by the existing service. Tabs wrap on mobile, and notification rows identify the type of event before its title.

Validation used synthetic records at mobile and desktop widths in light and dark themes. Checks covered queue counts, decision tabs, dialogs, notification navigation, device controls, text contrast, keyboard focus and horizontal overflow. No customer messages, purchases or real review decisions were created for testing.

Release: 2.14.8. Deployed with a recoverable backup. Live file hashes and versioned assets are checked separately from the isolated browser tests; authenticated production review actions remain untested.
