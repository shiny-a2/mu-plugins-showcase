# Earlier discovery of the homepage background

The homepage carousel's background was discovered only after its stylesheet loaded. The prepared update lets the browser discover the matching phone or desktop image from the document head. It reuses the existing image without changing the carousel design or purchase behavior.

Browser tests cover both sides of the responsive breakpoint and verify a single matching download. With a deliberately delayed stylesheet, the resource starts earlier. Carousel controls, keyboard navigation, reduced motion and mobile/desktop light/dark previews also passed; screenshots were inspected.

Source publication is approved. Production installation and live verification are pending. These checks establish correct image selection and earlier discovery, not a whole-site speed gain or a passing field Core Web Vitals assessment. Server response time remains separate work.
