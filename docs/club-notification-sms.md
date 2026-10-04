# Tier-aware loyalty notifications

Release: v1.0.0-club-notice-sms — 2026-10-04

## What changed

An administrator can prepare a club introduction campaign for selected membership levels, preview messages against current balances, and test the approved template before launching a batch. The highest membership level receives separate copy with no nonexistent upgrade promise. Current conversion settings and qualification rules determine the point equivalent and remaining gap.

Optional notifications now cover newly active point awards and wallet increases. Historic activity is excluded when notifications are enabled. Repeated award imports and concurrent message attempts are protected against duplicate notifications; unresolved provider outcomes remain visible for review instead of being blindly resent.

## Why it matters

Customers can understand their existing rewards and next step, while staff can distinguish available points from spendable wallet credit. Notifications remain an explicit configuration choice, with provider-approved copy and an auditable outcome rather than a silent batch.

## Validation

24 isolated assertions cover rate and qualification rules, highest-tier copy, zero values, economic-event duplication, award maturity, outbox delivery and money-unit conversion. Eleven existing financial-policy regression checks also pass. No real customer messages or financial transactions were created during verification.

This showcase contains no production source, credentials, customer data, live balances or internal deployment configuration.
