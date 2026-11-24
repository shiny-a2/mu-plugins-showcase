# Branch-specific repair lists and lighter marketplace loading

Repair lists now follow the selected branch across browsing and exact searches. Late responses from a previous branch are discarded, while transferred cases remain visible to the related branches. Marketplace notifications take an authorized manager to the correct branch before opening the case.

The marketplace queue loads a lighter summary first and retrieves photographs and review history when a case is opened. Reopening a fresh list avoids a duplicate request, and stalled reads show a retry message.

The paired update was released after SQL, permission and mobile/desktop light/dark checks. Read-only production checks confirmed scoped lists, detail loading and a lighter queue response.
