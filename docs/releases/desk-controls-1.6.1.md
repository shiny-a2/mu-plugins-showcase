# Desk 1.6.1: calendars and choice menus

Prepared and tested locally; not yet deployed.

Branch staff can choose Persian dates from a calendar, including direct month and year selection, while keeping manual entry. Stock-count dates respect the last permitted day. The reporting and expense forms retain their existing date formats.

Choice menus now match the application, with clear selections, keyboard support and search in longer lists. The controls follow the existing light/dark theme and remain usable inside scrollable forms on narrow screens.

Validation includes 36 dedicated interactive control states and 214 existing reporting, operations, workspace and import/inbox browser states, with synthetic data. Checks cover leap days, date-format conversion, future-date restrictions, empty search, disabled fields, keyboard navigation and nested forms. Staff-access, branch-scope, syntax and service-worker isolation checks also pass. Mobile/desktop screenshots were inspected in both themes. Physical-device and screen-reader acceptance remain pending. No real customer transaction or message was created for visual testing.
