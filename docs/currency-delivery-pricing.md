# Currency references and delivery pricing

Release v1.0.0-omega-fx — 2026-10-04.

## What changed

A dedicated administrator pricing table groups selected watch and accessory collections, accepts three reference currencies and supports independent delivery quotes. Updating a reference rate recalculates enabled catalogue prices. Each installment quote has a single fifteen-percent uplift, computed on the server from its corresponding cash quote.

The customer selector now uses the shared storefront palette and remains readable in both themes and mobile/desktop layouts. Available single-unit inventory is supported without modifying stock. The basket preserves the chosen price through repeated totals; new order lines retain the quote context. Local gateway rules distinguish validated cash and installment choices while preserving other eligibility restrictions.

## Why it matters

Staff can maintain prices by updating a small reference-rate table rather than re-entering every product price. Customers see separate delivery/payment choices, and money-unit conversion, quote repetition and conflicting cart methods are checked explicitly.

## Validation and boundaries

33 isolated financial/cart assertions, existing stock/legacy regressions and four interactive browser combinations passed. Browser checks cover selection, keyboard focus, hover, contrast, overflow and mocked purchase payloads. No real orders, provider payment calls or customer messages were used as tests. Initial reference rates and product amounts remain owner-entered; no market rate is guessed.

This public note contains no production source, live rates, customer data or internal deployment details.
