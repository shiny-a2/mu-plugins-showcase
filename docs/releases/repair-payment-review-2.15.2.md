# Repair payment and customer-panel review 2.15.2

The repair app now keeps payment review within the responsible branch view and makes receipts tied to an earlier invoice clearly distinguishable from current ones. Staff must inspect the receipt and affirm that the bank deposit matches before recording settlement. Customers with a receipt awaiting review see its pending state instead of another payment prompt.

The customer panel now gives the repair's ready or follow-up state priority over the invoice notice. When charges change, the old final invoice is marked for review and its print control is withheld until the updated invoice is issued. The service feedback prompt applies to completed repairs, while other purchase feedback remains in its own category. Invoice, receipt and feedback controls use the site's shared light and dark colors.

Synthetic finance checks covered branch access, changed invoices, receipt approval and duplicate prevention. Mobile and desktop browser checks in both themes exercised the staff dialogs and customer invoice, receipt and rating states. Deployed source checks and public app delivery passed. Authenticated production actions and message-provider delivery were not exercised for presentation testing.

Released on 11 November 2026 with a protected source backup and a recoverable release tag.
