=== SEO Fields API Support ===
Contributors: verzhykovskyi
Tags: seo, rest-api, metadata, yoast, api
Requires at least: 6.2
Tested up to: 6.7
Stable tag: 1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Exposes SEO fields managed by Yoast SEO to the WordPress REST API for programmatic updates.

== Description ==

**SEO Fields API Support** is a lightweight plugin that enhances the WordPress REST API by making Yoast SEO fields—such as SEO titles and meta descriptions—available for programmatic updates. This plugin is perfect for developers and site owners who need to automate or manage SEO metadata efficiently via the REST API.

### Key Features
- **Yoast SEO Integration**: Exposes `_yoast_wpseo_title` and `_yoast_wpseo_metadesc` fields in the REST API.
- **Wide Compatibility**: Supports all public post types, including posts, pages, and custom post types.
- **Secure**: Includes authentication checks and data sanitization to ensure safe updates.
- **Lightweight**: Only activates its features when Yoast SEO is installed, minimizing overhead.

### Compatibility
- Requires WordPress 6.2 or higher.
- Requires Yoast SEO to be installed and activated.

== Installation ==

1. Upload the `seo-fields-api-support` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. No additional setup is required—the plugin automatically registers the Yoast SEO fields with the REST API.

== Usage ==

After activation, you can update SEO fields using the WordPress REST API. Below is an example:

- **Updating a Post**: Send a `PUT` request to `/wp/v2/posts/<post-id>` with this JSON body:
  ```json
  {
    "meta": {
      "_yoast_wpseo_title": "Custom SEO Title",
      "_yoast_wpseo_metadesc": "Custom meta description for SEO."
    }
  }