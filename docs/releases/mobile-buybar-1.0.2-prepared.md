## 2026-11-04 — Responsive product buy bar correction released

The product buy bar now disappears when a mobile viewport is enlarged beyond
its mobile breakpoint. Responsive CSS owns visibility and respects deliberately
hidden states. Version 1.0.2 retains the existing price, stock and commerce
behavior and removes the competing visibility observer.

The final browser comparison, including the navigation dock styling, passed
65 candidate checks and reproduced 29 failures in the previous version. Six
isolated interaction checks passed for fallback scrolling, the secondary link
and notification drawer open/close. Mobile and desktop presentation was
inspected in light and dark themes, including the open mobile drawer.

The recoverable one-file production release passed syntax and exact-source
readback checks. Representative home, category and product responses returned
HTTP 200 and reached cache HIT on repeat requests; cached product markup
contained the corrected behavior. Live inspection confirmed the mobile buy
bar and its absence above the mobile breakpoint. The additional live dark-theme
interaction check was limited by browser control; four-profile coverage was
completed in the isolated rendered fixture. No real purchase or notification
was submitted. This release does not establish improved field Core Web Vitals.
