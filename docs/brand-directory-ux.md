# Brand directory usability and shared themes

The catalog brand directory now puts search ahead of optional refinements. Customers can combine country-origin, price and alphabet filters, see the result count and recover from empty results with a single reset.

Logo-led cards retain catalog destinations and pricing information, while quieter secondary actions reduce visual noise. Both themes use the storefront's shared palette and inherited typeface. Card surfaces, readable action text, visible keyboard focus and reduced-motion behavior improve consistency without altering brand artwork or commerce data.

Validation covered the directory and a country hub at mobile and desktop widths in light and dark themes. Read-only browser checks exercised search, combined filters, clear/reset, empty results, focus, hover contrast, destinations and horizontal overflow. Sampled text and action states passed a 4.5:1 contrast threshold, with screenshot review alongside interaction checks.

Release: `v2.5.0-brand-directory`. Production source remains private; this note contains no customer records or sensitive implementation details.

## Country-led discovery update

The storefront now uses concise country guidance and a scrollable country collection. Each country collection offers a logo-led path to its related watch brands before the product list. The homepage brand collection, country collection and brand navigation use the same catalog relationships, so a newly cataloged brand can appear across those paths without a separate editorial list. An unknown origin is left ungrouped rather than guessed.

The update preserves the existing category destinations and uses the shared storefront light/dark palette. Responsive component previews and automated checks covered logo fallback, new-brand inclusion, rail controls and cache invalidation boundaries. Release: `v1.0.0-brand-country-discovery`.
