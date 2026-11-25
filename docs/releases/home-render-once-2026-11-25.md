# Avoid repeated homepage rendering

Elementor wraps and transforms page output before passing it through another content filter. An exact-output guard missed that path, so the homepage rebuilt its product sections twice. Home Discovery 1.9.5 recognizes its own rendered document within the same request and preserves downstream changes. Fresh requests still refresh commerce content.

The approved single-file update is released with a recoverable source backup. Focused regression tests and live mobile/desktop checks in light and dark themes passed, including carousel controls, keyboard navigation, reduced motion, search clearing, brand filtering and expandable text. All 133 displayed offers matched fresh WooCommerce prices, destinations and availability. No purchase was created; signed-in checkout was not tested.

The duplicate stage is removed, but generating an uncached page remains slow. This release does not establish that every page is fast or that field Core Web Vitals have passed. Further work targets the remaining product construction cost and cache invalidation.
