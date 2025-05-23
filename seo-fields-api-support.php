<?php
/*
 * Plugin Name: SEO Fields API Support
 * Description: Exposes SEO fields from Yoast SEO to the WordPress REST API for updating via API.
 * Version: 1.1
 * Author: Dmytro Verzhykovskyi
 * Author URI: https://www.seoexpertorangecounty.com/
 * Plugin URI: https://www.seoexpertorangecounty.com/seo-fields-api-support/
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 6.2
 * Tested up to: 6.7
 */

if (!defined('ABSPATH')) {
    exit;
}

function seofiaps_register_meta($post_type) {
    $args = [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        },
        'sanitize_callback' => 'sanitize_text_field' // Enhanced security
    ];

    register_post_meta($post_type, '_yoast_wpseo_title', $args);
    register_post_meta($post_type, '_yoast_wpseo_metadesc', $args);
}

add_action('rest_api_init', function () {
    // Optionally check for Yoast SEO
    if (defined('WPSEO_VERSION')) {
        foreach (get_post_types(['public' => true], 'names') as $post_type) {
            seofiaps_register_meta($post_type);
        }
    }
});