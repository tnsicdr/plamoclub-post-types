<?php
/**
 * Plugin Name: Plamo.club Post Types
 * Plugin URI: https://www.github.com/tnsicdr/plamoclub-wp-data
 * Description: Custom Post Types for plamo.club
 * Version: 0.0.3
 * Requires at least: 5.8
 * Requires PHP: 7.0
 * Author: Thanh Nguyen
 * Author URI: https://www.github.com/tnsicdr
 * Text Domain: plamoclub-post-types
 */

 // Exit if accessed directly.
if (! defined('ABSPATH') ) {
    exit;
}

define('PLMC_PLUGIN_PATH', plugin_dir_path(__FILE__));

add_action( 'init', 'register_post_type_plmc_kit');
function register_post_type_plmc_kit() {
    register_post_type('plmc_kit',
        array(
            'labels' => array(
                'name' => __('Model Kits', 'textdomain'),
                'singular_name' => __('Model Kit', 'textdomain'),
                'add_new_item' => __('Add Model Kit', 'textdomain'),
                'edit_item' => __('Edit Model Kit', 'textdomain'),
                'new_item' => __('New Model Kit', 'textdomain'),
                'view_item' => __('View Model Kit', 'textdomain'),
                'view_items' => __('View Model Kits', 'textdomain'),
                'search_items' => __('Search Model Kits', 'textdomain'),
                'not_found' => __('No model kits found', 'textdomain'),
                'new_item' => __('No model kits found in Trash', 'textdomain'),
                'parent_item_colon' => __('Parent Model Kit:', 'textdomain'),
                'all_items' => __('All Model Kits', 'textdomain'),
                'archives' => __('Model Kit Archives', 'textdomain'),
                'attributes' => __('Model Kit Attributes', 'textdomain'),
                'insert_into_item' => __('Insert into model kit', 'textdomain'),
                'uploaded_to_this_item' => __('Uploaded to this model kit', 'textdomain'),
                'filter_items_list' => __('Filter model kits list', 'textdomain'),
                'items_list_navigation' => __('Model kits list navigation', 'textdomain'),
                'item_published' => __('Model Kit published', 'textdomain'),
                'item_published_privately' => __('Model Kit published privately', 'textdomain'),
                'item_reverted_to_draft' => __('Model kit reverted to draft', 'textdomain'),
                'item_scheduled' => __('Model Kit scheduled', 'textdomain'),
                'item_updated' => __('Model Kit updated', 'textdomain'),
                'item_link' => __('Model Kit link', 'textdomain'),
                'item_link_description' => __('A link to a model kit', 'textdomain')
            ),
            'supports' => array(
                'title'
            ),
            'public' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'modelKit',
            'graphql_plural_name' => 'modelKits',
            'rewrite' => array( 'slug' => 'model-kit'),
        ),
    );

    register_post_type('plmc_garage_kit',
        array(
            'labels' => array(
                'name' => __('Garage Kits', 'textdomain'),
                'singular_name' => __('Garage Kit', 'textdomain'),
                'add_new_item' => __('Add Garage Kit', 'textdomain'),
                'edit_item' => __('Edit Garage Kit', 'textdomain'),
                'new_item' => __('New Garage Kit', 'textdomain'),
                'view_item' => __('View Garage Kit', 'textdomain'),
                'view_items' => __('View Garage Kits', 'textdomain'),
                'search_items' => __('Search Garage Kits', 'textdomain'),
                'not_found' => __('No garage kits found', 'textdomain'),
                'new_item' => __('No garage kits found in Trash', 'textdomain'),
                'parent_item_colon' => __('Parent Garage Kit:', 'textdomain'),
                'all_items' => __('All Garage Kits', 'textdomain'),
                'archives' => __('Garage Kit Archives', 'textdomain'),
                'attributes' => __('Garage Kit Attributes', 'textdomain'),
                'insert_into_item' => __('Insert into garage kit', 'textdomain'),
                'uploaded_to_this_item' => __('Uploaded to this garage kit', 'textdomain'),
                'filter_items_list' => __('Filter garage kits list', 'textdomain'),
                'items_list_navigation' => __('Garage kits list navigation', 'textdomain'),
                'item_published' => __('Garage Kit published', 'textdomain'),
                'item_published_privately' => __('Garage Kit published privately', 'textdomain'),
                'item_reverted_to_draft' => __('Garage kit reverted to draft', 'textdomain'),
                'item_scheduled' => __('Garage Kit scheduled', 'textdomain'),
                'item_updated' => __('Garage Kit updated', 'textdomain'),
                'item_link' => __('Garage Kit link', 'textdomain'),
                'item_link_description' => __('A link to a garage kit', 'textdomain')
            ),
            'supports' => array(
                'title'
            ),
            'public' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'garageKit',
            'graphql_plural_name' => 'garageKits',
            'rewrite' => array( 'slug' => 'garage-kit'),
        ),
    );
}

register_activation_hook( __FILE__, 'rewrite_flush_plmc_kit' );
function rewrite_flush_plmc_kit() {
    register_post_type_plmc_kit();
    flush_rewrite_rules();
}
