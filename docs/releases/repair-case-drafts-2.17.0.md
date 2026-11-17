# Repair case editing and saved drafts

Status: implemented and tested candidate; production deployment awaits approval.

A busy repair counter may initially receive only a customer's phone number. Staff can now save either intake type and complete the same case later, preserving its tracking code. The temporary state is explicit, so unfinished information is easier to find and complete.

Existing cases have one organized form for permitted corrections, including separate name fields and watch details. Historical unknown answers remain visibly unknown. A readable history shows the responsible person, time and previous and updated values. Conflicting edits and failed saves keep their context so staff can review the current case before proceeding. Existing access and historical-record protections remain in place.

Validation includes 125 isolated database checks and 64 interactive edit, draft and history states at mobile and desktop widths in light and dark themes. Related intake and receipt views were also checked. Keyboard focus, readable contrast, retained error feedback and horizontal overflow were exercised. No real customer, purchase or message was created for these checks. Live staff acceptance and external delivery remain unverified; the database fixtures do not establish production concurrency timing.
