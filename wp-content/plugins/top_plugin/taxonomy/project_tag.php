<?php

function register_project_tag_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Project Tags', 'taxonomy general name', 'your-text-domain' ),
        'singular_name'              => _x( 'Project Tag', 'taxonomy singular name', 'your-text-domain' ),
        'search_items'               => __( 'Search Project Tags', 'your-text-domain' ),
        'all_items'                  => __( 'All Project Tags', 'your-text-domain' ),
        'edit_item'                  => __( 'Edit Project Tag', 'your-text-domain' ),
        'update_item'                => __( 'Update Project Tag', 'your-text-domain' ),
        'add_new_item'               => __( 'Add New Project Tag', 'your-text-domain' ),
        'new_item_name'              => __( 'New Project Tag Name', 'your-text-domain' ),
        'menu_name'                  => __( 'Project Tags', 'your-text-domain' ),
        'view_item'                  => __( 'View Project Tag', 'your-text-domain' ),
        'popular_items'              => __( 'Popular Project Tags', 'your-text-domain' ),
        'separate_items_with_commas' => __( 'Separate Project Tags with commas', 'your-text-domain' ),
        'add_or_remove_items'        => __( 'Add or remove Project Tags', 'your-text-domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used Project Tags', 'your-text-domain' ),
        'not_found'                  => __( 'No Project Tags found', 'your-text-domain' ),
        'back_to_items'              => __( 'Back to Project Tags', 'your-text-domain' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false, // Set to true if you want hierarchical (like categories), false if you want non-hierarchical (like tags)
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project_tag' ), // Customize the slug if needed
        'show_in_rest'      => true,
    );

    register_taxonomy( 'project_tag', array( 'project' ), $args );
}

add_action( 'init', 'register_project_tag_taxonomy' );
