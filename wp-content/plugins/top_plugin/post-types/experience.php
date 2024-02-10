<?php

/**
 * Plugin Name: Experience
 * Description: A plugin for managing Experiences with custom metadata.
 * Version: 1.0
 * Author: Shivam Tambe
 */

function create_experience_post_type() {
    $labels = array(
        'name'                  => _x( 'Experiences', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Experience', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Experiences', 'text_domain' ),
        'name_admin_bar'        => __( 'Experience', 'text_domain' ),
        'archives'              => __( 'Experience Archives', 'text_domain' ),
        'attributes'            => __( 'Experience Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Experience:', 'text_domain' ),
        'all_items'             => __( 'All Experiences', 'text_domain' ),
        'add_new_item'          => __( 'Add New Experience', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Experience', 'text_domain' ),
        'edit_item'             => __( 'Edit Experience', 'text_domain' ),
        'update_item'           => __( 'Update Experience', 'text_domain' ),
        'view_item'             => __( 'View Experience', 'text_domain' ),
        'view_items'            => __( 'View Experiences', 'text_domain' ),
        'search_items'          => __( 'Search Experience', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Experiences list', 'text_domain' ),
        'items_list_navigation' => __( 'Experiences list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'experience'), // Customize the slug if needed
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'excerpt', 'thumbnail'), // Customize the supports as needed
        'show_in_rest'       => true
    );
    register_post_type( 'experience', $args );
}
add_action( 'init', 'create_experience_post_type', 0 );

function custom_experience_post_meta_boxes(){
    // add_meta_box(
    //     'experience_logo_meta_box',
    //     'Experience Logo',
    //     'display_experience_logo_meta_box',
    //     'experience',
    //     'side',
    //     'default'
    // );
    add_meta_box(
        'company_name_meta_box',
        'Company Name',
        'display_company_name_meta_box',
        'experience',
        'side',
        'default'
    );
    add_meta_box(
        'company_date_meta_box',
        'Company Date',
        'display_company_date_meta_box',
        'experience',
        'side',
        'default'
    );
}

function display_company_name_meta_box($post)
{
    $company_name = get_post_meta($post->ID, 'company_name', true);
?>
    <label for="company_name">Company Name:</label>
    <input type="text" name="company_name" value="<?php echo esc_attr($company_name); ?>" />
<?php
}
function display_company_date_meta_box($post)
{
    $company_date = get_post_meta($post->ID, 'company_date', true);
?>
    <label for="company_date">Company Date:</label>
    <input type="text" name="company_date" value="<?php echo esc_attr($company_date); ?>" />
<?php
}
add_action('add_meta_boxes', 'custom_experience_post_meta_boxes');

function save_experience_post_meta_data($post_id, $post, $update)
{

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if ($post->post_type == 'experience') {
        $fields = array('company_name', 'company_date');
        foreach ($fields as $field){
            error_log("first: " . $field);
            if ($field == 'experience_logo') {
                if (!isset($_FILES['experience_logo']['name']) || empty($_FILES['experience_logo']['name'])) {
                    return;
                }
                $uploaded_file = wp_handle_upload($_FILES['experience_logo'], array('test_form' => false));

                if (is_array($uploaded_file) && isset($uploaded_file['url'])) {
                    $uploaded_image_url = $uploaded_file['url'];
                    update_post_meta($post_id, $field, $uploaded_image_url);
                }
            } else if (isset($_POST[$field])) {
                $field_value = sanitize_text_field($_POST[$field]);
                update_post_meta($post_id, $field, $field_value);
            }
        }
    }
}

add_action('save_post', 'save_experience_post_meta_data', 10, 3);