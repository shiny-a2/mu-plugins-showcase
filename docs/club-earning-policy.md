# Consistent loyalty earning and checkout choices

Release: `v1.1.1-club-earning-rates`.

Recovery update: `v0.1.1-loyalty-earning-rate`.

Centralized payment-method earning policy so checkout reward previews and settled purchase calculations agree. Documented split payments use the recorded allocation; missing evidence remains visible for review rather than producing guessed rewards.

Added repeatable customer-locked corrections for historical purchase rewards. Consumed rewards remain intact, open reservations are protected, and rate corrections cannot debit customer wallets. Legacy aggregate awards without source attribution remain review items.

Updated tier service wording, persistent status and annual gift-expiry presentation. Refined payment cards and benefit comparison for mobile/desktop in both themes, with inherited typography, keyboard interactions and contrast checks.

Validation uses synthetic policy cases, transaction tests confined to temporary database tables and browser fixtures. No live customer purchases or messages were created as tests. Private source, business-specific rates, ledger totals and customer data are excluded from this showcase.

A matching customer-app/service-worker version refresh makes the updated presentation available without changing private-page cache boundaries.

The recovery update separates the final payment-channel rate from the customer-tier multiplier. This permits a configured positive channel rate below the ordinary rate while retaining the rule that a tier itself cannot reduce earning. Failed order sources can be replayed through existing idempotency keys after the correction, so recovery does not duplicate awards.
