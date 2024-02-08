<?php 
function register_project_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Project Categories', 'taxonomy general name', 'my-project' ),
        'singular_name'              => _x( 'Project Category', 'taxonomy singular name', 'my-project' ),
        'search_items'               => __( 'Search Project Categories', 'my-project' ),
        'all_items'                  => __( 'All Project Categories', 'my-project' ),
        'edit_item'                  => __( 'Edit Project Category', 'my-project' ),
        'update_item'                => __( 'Update Project Category', 'my-project' ),
        'add_new_item'               => __( 'Add New Project Category', 'my-project' ),
        'new_item_name'              => __( 'New Project Category Name', 'my-project' ),
        'menu_name'                  => __( 'Project Categories', 'my-project' ),
        'view_item'                  => __( 'View Project Category', 'my-project' ),
        'popular_items'              => __( 'Popular Project Categories', 'my-project' ),
        'separate_items_with_commas' => __( 'Separate Project Categories with commas', 'my-project' ),
        'add_or_remove_items'        => __( 'Add or remove Project Categories', 'my-project' ),
        'choose_from_most_used'      => __( 'Choose from the most used Project Categories', 'my-project' ),
        'not_found'                  => __( 'No Project Categories found', 'my-project' ),
        'back_to_items'              => __( 'Back to Project Categories', 'my-project' ),
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project_category' ), // Customize the slug if needed
        'show_in_rest'      => true,
    );

    register_taxonomy( 'project_category', array( 'project' ), $args );
}

add_action( 'init', 'register_project_taxonomy' );
