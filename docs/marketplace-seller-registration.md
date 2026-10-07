# Marketplace Seller Registration UX

The marketplace asks a seller to identify a watch, describe its condition, choose optional preparation services and provide useful photographs before review. The interface must explain this process without implying that submission guarantees publication, authenticity or a final selling price.

The 0.159.0 release gives every stage a single clear purpose. Natural Persian guidance explains what information helps the review, where sellers can find a model reference and how honest condition details improve the eventual listing. The reference field now behaves as its label promises: sellers may leave it empty when they cannot identify it. A separate control handles a genuinely different physical watch that shares the same brand and reference.

Pre-sale services are presented as decisions with outcomes instead of a bare checkbox list. Battery replacement, polishing and technical review each explain how they can improve clarity or buyer confidence. The consent boundary remains explicit: selecting a service does not start work or take payment; the seller receives an exact quote after inspection and must approve it first.

The interface uses the storefront's shared semantic palette and inherited typeface. Cards, controls, uploads, focus states and selected states remain consistent across light and dark themes. Image upload actions use Persian labels while preserving native file-input access and validation.

Validation combines PHP syntax checks, service-card and registration-flow contracts, and browser interaction. The browser fixture completes every stage at phone and desktop widths in both themes, checking readable contrast, keyboard-visible controls, selection states and horizontal overflow. The fixture uses synthetic content and local images; it creates no real marketplace record.
