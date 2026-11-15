# Consistent repair marketplace counts

Repair staff need the same workload count on the entry card, navigation and open list. Earlier limits could hide older waiting requests and count only a small part of the decision history.

The updated queue reads all eligible requests and shows the latest repair decision for each current registration. Reopened reviews return to the action queue. Badges and lists refresh together, and a failed connection keeps the previous count with a visible retry message.

Notifications now distinguish unread activity from outstanding work. Opening one notification marks that item as read; older unread items remain unread. Internal marketplace plumbing no longer appears as additional work, and older notifications remain accessible.

Synthetic checks cover large queues, duplicate decisions, access restrictions, unread counts and failed refreshes. Interactive browser checks passed at mobile and desktop sizes in both themes, including delayed responses, focus, dialogs and badge contrast. No real purchase or notification was created for testing. Real-device push delivery was not part of these checks.

Release: Repair 2.16.1 with Marketplace 0.164.9. Published on 2026-11-15. Read-only production checks confirmed that queue counts match the returned lists and an independent aggregate, older notification pages do not repeat rows, and access restrictions remain enforced. The delivered application asset and worker version were verified.
