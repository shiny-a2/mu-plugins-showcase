# Completing approved catalogue images

An image workflow could attach a reviewed product photograph successfully and then stop before publication. The worker supplied the existing spreadsheet approval, but an older client interface did not accept that argument.

The compatibility fix forwards the approval to the store's existing publication checks. Earlier callers remain compatible. Identity, image ownership, category and duplicate checks still decide whether a draft may be published; the client creates no approval of its own.

Four HTTP transport regression tests and 20 checks against an isolated WordPress/WooCommerce store passed. The integration exercised valid publication, repeated requests and refusals for missing approval, changed identity or assignment, duplicate products and invalid authentication. Publication did not create additional images. The test used synthetic products and did not change the live catalogue.

Installed after owner approval and encrypted backups. Two previously approved drafts were published using the four images already attached to them. Both live pages were checked at mobile and desktop widths in light and dark themes, including keyboard focus and gallery navigation, with no horizontal overflow. Both existing jobs completed through the original attachment stage under its existing worker lock, with zero failures and no new uploads. No scheduler or service was added.
