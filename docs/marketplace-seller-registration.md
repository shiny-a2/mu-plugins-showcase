# Marketplace Seller Registration UX

The marketplace asks a seller to identify a watch, describe its condition, choose optional preparation services and provide useful photographs before review. The interface must explain this process without implying that submission guarantees publication, authenticity or a final selling price.

The 0.159.0 release gives every stage a single clear purpose. Natural Persian guidance explains what information helps the review, where sellers can find a model reference and how honest condition details improve the eventual listing. The reference field now behaves as its label promises: sellers may leave it empty when they cannot identify it. A separate control handles a genuinely different physical watch that shares the same brand and reference.

Pre-sale services are presented as decisions with outcomes instead of a bare checkbox list. Battery replacement, polishing and technical review each explain how they can improve clarity or buyer confidence. The consent boundary remains explicit: selecting a service does not start work or take payment; the seller receives an exact quote after inspection and must approve it first.

The interface uses the storefront's shared semantic palette and inherited typeface. Cards, controls, uploads, focus states and selected states remain consistent across light and dark themes. Image upload actions use Persian labels while preserving native file-input access and validation.

Validation combines PHP syntax checks, service-card and registration-flow contracts, and browser interaction. The browser fixture completes every stage at phone and desktop widths in both themes, checking readable contrast, keyboard-visible controls, selection states and horizontal overflow. The fixture uses synthetic content and local images; it creates no real marketplace record.

The 0.159.1 follow-up lets a seller ask for expert pricing without entering a fictional zero price. The technician records a positive proposal, and the seller must accept it before the watch can proceed to publication. Front and back photographs remain mandatory; one combined photograph covers box, card and warranty when supplied. A clearly labelled exception lets an older unboxed watch proceed without that combined photograph. The brand picker uses consistent Persian-first labels, avoids duplicate aliases and includes Violet. Unidentified model references remain optional, and a missing reference alone cannot merge two separate physical watches.

The technician review sheet displays this request and validates its proposed amount before sending it to the existing operator and seller-review flow. The touched seller and technician surfaces were inspected at phone and desktop widths in both light and dark themes, including the two exception controls. No customer submission or financial record was created for the visual checks.

A small 0.159.2 catalogue follow-up also accepts the second seller-supplied brand in Persian spelling only. It is kept separate from unverified Latin names until the maker’s official spelling is confirmed.
