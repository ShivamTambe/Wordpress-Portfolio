<?php

/**
 * Plugin Name: About
 * Description: A plugin for managing Abouts with custom metadata.
 * Version: 1.0
 * Author: Shivam Tambe
 */

 // Register Custom Post Type
 function create_About_post_type() {
    $labels = array(
        'name'                  => _x( 'Abouts', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'About', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Abouts', 'text_domain' ),
        'name_admin_bar'        => __( 'About', 'text_domain' ),
        'archives'              => __( 'About Archives', 'text_domain' ),
        'attributes'            => __( 'About Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent About:', 'text_domain' ),
        'all_items'             => __( 'All Abouts', 'text_domain' ),
        'add_new_item'          => __( 'Add New About', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New About', 'text_domain' ),
        'edit_item'             => __( 'Edit About', 'text_domain' ),
        'update_item'           => __( 'Update About', 'text_domain' ),
        'view_item'             => __( 'View About', 'text_domain' ),
        'view_items'            => __( 'View Abouts', 'text_domain' ),
        'search_items'          => __( 'Search About', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Abouts list', 'text_domain' ),
        'items_list_navigation' => __( 'Abouts list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'About'), // Customize the slug if needed
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'excerpt', 'thumbnail','editor'), // Customize the supports as needed
        'show_in_rest'       => true
    );
    register_post_type( 'about', $args );
}
add_action( 'init', 'create_About_post_type', 0 );



function custom_about_post_meta_boxes()
{
    add_meta_box(
        'about_image1_meta_box',
        'About Image1',
        'display_about_image1_meta_box',
        'about',
        'side',
        'default'
    );
    add_meta_box(
        'about_image2_meta_box',
        'About Image2',
        'display_about_image2_meta_box',
        'about',
        'side',
        'default'
    );
    add_meta_box(
        'about_image3_meta_box',
        'About Image3',
        'display_about_image3_meta_box',
        'about',
        'side',
        'default'
    );
}


function display_about_image1_meta_box($post)
{
    $about_image1 = get_post_meta($post->ID, 'about_image1', true);
?>
    <label for="about_image1">About Image1: <?php echo $about_image1 ?></label>
    <input type="file" id="about_image1" name="about_image1" accept="image/*">
<?php
}
function display_about_image2_meta_box($post)
{
    $about_image2 = get_post_meta($post->ID, 'about_image2', true);
?>
    <label for="about_image2">About Image2: <?php echo $about_image2 ?></label>
    <input type="file" id="about_image2" name="about_image2" accept="image/*">
<?php
}
function display_about_image3_meta_box($post)
{
    $about_image3 = get_post_meta($post->ID, 'about_image3', true);
?>
    <label for="about_image3">About Image3: <?php echo $about_image3 ?></label>
    <input type="file" id="about_image3" name="about_image3" accept="image/*">
<?php
}
add_action('add_meta_boxes', 'custom_about_post_meta_boxes');


function save_about_meta_data($post_id, $post, $update)
{

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if ($post->post_type == 'about') {
        $fields = array('about_image1', 'about_image2', 'about_image3');
        foreach ($fields as $field){
            error_log("Top: " . $field);
            if (!isset($_FILES[$field]['name']) || empty($_FILES[$field]['name'])) {
                return;
            }
            $uploaded_file = wp_handle_upload($_FILES[$field], array('test_form' => false));
            if (is_array($uploaded_file) && isset($uploaded_file['url'])) {
                $uploaded_image_url = $uploaded_file['url'];
                update_post_meta($post_id, $field, $uploaded_image_url);
            }     
        }
    }
}

add_action('save_post', 'save_about_meta_data', 10, 3);