<?php
/**
 * Plugin Name: Plamo.club Post Types
 * Plugin URI: https://www.github.com/tnsicdr/plamoclub-wp-data
 * Description: Custom Post Types for plamo.club
 * Version: 0.0.1
 * Requires at least: 5.8
 * Requires PHP: 7.0
 * Author: Thanh Nguyen
 * Author URI: https://www.github.com/tnsicdr
 * Text Domain: plmc-data
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
                'attributes' => __('Kit Attributes', 'textdomain'),
                'insert_into_item' => __('Insert into kit', 'textdomain'),
                'uploaded_to_this_item' => __('Uploaded to this kit', 'textdomain'),
                'filter_items_list' => __('Filter kits list', 'textdomain'),
                'items_list_navigation' => __('Model kits list navigation', 'textdomain'),
                'item_published' => __('Model Kit published', 'textdomain'),
                'item_published_privately' => __('Model Kit published privately', 'textdomain'),
                'item_reverted_to_draft' => __('Model kit reverted to draft', 'textdomain'),
                'item_scheduled' => __('Model Kit scheduled', 'textdomain'),
                'item_updated' => __('Model Kit updated', 'textdomain'),
                'item_link' => __('Kit link', 'textdomain'),
                'item_link_description' => __('A link to a model kit', 'textdomain')
    
            ),
            'supports' => array(
                'title',
                'editor'
            ),
            'public' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'modelKit',
            'graphql_plural_name' => 'modelKits',
            'rewrite' => array( 'slug' => 'model-kit'),
        ),
    );
}

add_action('graphql_register_types', function () {
    register_graphql_field('Model Kit', 'manufacturer', [
        'type' => 'String',
        'description' => __('The manufacturer of the kit', 'wp-graphql'),
        'resolve' => function( $post ) {
            $manufacturer = get_post_meta( $post->ID, 'manufacturer', true );
            return ! empty( $manufacturer)  ? $manufacturer : '';
        }
    ]);
});

register_activation_hook( __FILE__, 'rewrite_flush_plmc_kit' );
function rewrite_flush_plmc_kit() {
    register_post_type_plmc_kit();
    flush_rewrite_rules();
}
