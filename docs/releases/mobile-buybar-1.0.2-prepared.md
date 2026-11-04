## 2026-11-04 — Responsive product buy bar correction prepared

A product buy bar could remain visible after a mobile viewport was enlarged to desktop. A prepared correction lets responsive CSS own visibility and preserves deliberately hidden states. It retains the existing price, stock and commerce behavior.

The initial isolated browser comparison passes 65 candidate checks and reproduces 29 failures in the previous version. Simple-product presentation was inspected in mobile and desktop light/dark profiles. Syntax checks pass. The final repeat with the complete fixture styles and remaining interactive checks is pending because browser control stopped responding reliably. The source is saved in the private repository; this update has **not been deployed to production** and makes no Core Web Vitals improvement claim.

