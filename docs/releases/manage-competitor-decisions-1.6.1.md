# Brand decisions and faster management reports

Released 2026-11-16; competitor workspace 1.6.1.

The competitor workspace now starts with the store's available brands and their price position. Managers can see which brands have higher or lower prices, open the exact references behind each comparison, inspect shared models by store, and investigate rival activity where the store has no current availability or website sales. Brand and store views lead to dated charts, sorted reference prices, numeric price differences, per-store history and a current-page export.

The reports distinguish observed stock-out signals from confirmed sales. Missing, stale, unavailable or unpriced offers cannot establish a price advantage, and missing observations remain visible in charts. The opportunity view describes website sales explicitly so it cannot imply that in-person sales are absent.

The same release removes hidden-tab prefetching and duplicate requests, retains recent answers within the authorized page session, and avoids clearing unrelated caches when dates change. Unchanged historical observations reuse daily summaries. The initial Today report arrives with the private page, while pinned chart and image-export libraries load locally when needed.

Focused data, cache, authorization, range and failure checks passed. Synthetic mobile and desktop browser checks in light and dark themes exercised filtering, sorting, navigation, charts, reference history, keyboard focus and failure states. Published source checks, anonymous denial and read-only production reports passed. Live checks also verified that a customer with a valid request nonce remained denied. Server samples confirmed reuse of cached reports and daily evidence; initial historical preparation still costs more than a warm read. Authenticated production browser interaction and owner acceptance remain untested. No purchase, customer message or financial record was created for presentation testing.
