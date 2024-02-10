<?php

/**
 * Plugin Name: Core Value
 * Description: A plugin for managing Experiences with custom metadata.
 * Version: 1.0
 * Author: Shivam Tambe
 */

 // Register Custom Post Type
function create_core_value_post_type() {
    $labels = array(
        'name'                  => _x( 'Core Values', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Core Value', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Core Values', 'text_domain' ),
        'name_admin_bar'        => __( 'Core Value', 'text_domain' ),
        'archives'              => __( 'Core Value Archives', 'text_domain' ),
        'attributes'            => __( 'Core Value Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Core Value:', 'text_domain' ),
        'all_items'             => __( 'All Core Values', 'text_domain' ),
        'add_new_item'          => __( 'Add New Core Value', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Core Value', 'text_domain' ),
        'edit_item'             => __( 'Edit Core Value', 'text_domain' ),
        'update_item'           => __( 'Update Core Value', 'text_domain' ),
        'view_item'             => __( 'View Core Value', 'text_domain' ),
        'view_items'            => __( 'View Core Values', 'text_domain' ),
        'search_items'          => __( 'Search Core Value', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Core Values list', 'text_domain' ),
        'items_list_navigation' => __( 'Core Values list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'core_value'), // Customize the slug if needed
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'excerpt', 'thumbnail'), // Customize the supports as needed
        'show_in_rest'       => true
    );
    register_post_type( 'core_value', $args );
}
add_action( 'init', 'create_core_value_post_type', 0 );
