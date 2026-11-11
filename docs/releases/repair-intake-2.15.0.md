# Repair intake clarity 2.15.0

New repair intake starts with a customer lookup. Staff can open a prior repair, inspect a matching purchase, or add a new customer before choosing counter service or a watch left for repair. Both forms show the customer's name and mobile number near the top.

Photographs are optional for an ordinary watch left for repair, and a completed intake goes straight to its receipt. Staff can add photographs later from the file. The estimate view lists the recorded services and amounts. The outside-service form now closes after a successful save, and the service choices include plating and finishing. Notifications at one counter are limited to its own repair activity.

A separate final-invoice path was installed with the release. It remains disabled while its dedicated messaging template is awaiting approval; estimate approval continues independently.

The change passed synthetic interaction and layout checks on mobile and desktop in light and dark themes. An isolated WordPress and database run checked the additive schema change, customer ownership, branch access and duplicate action protection with generated records. The deployed files matched the private release, and the public app shell and script responded successfully. Authenticated production actions and real message delivery were not exercised for presentation testing.

Released on 11 November 2026 with a recoverable source backup.
