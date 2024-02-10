<?php

/**
 * Plugin Name: Top Post
 * Description: A plugin for managing top posts with custom metadata.
 * Version: 1.0
 * Author: Shivam Tambe
 */

function register_top_post_type()
{
    register_post_type(
        'top_post',
        [
            'labels'        => [
                'name'               => _x('Top Posts', 'post type general name', 'your-text-domain'),
                'singular_name'      => _x('Top Post', 'post type singular name', 'your-text-domain'),
                'menu_name'          => _x('Top Posts', 'admin menu', 'your-text-domain'),
                'name_admin_bar'     => _x('Top Post', 'add new on admin bar', 'your-text-domain'),
                'add_new'            => _x('Add New', 'top post', 'your-text-domain'),
                'add_new_item'       => __('Add New Top Post', 'your-text-domain'),
                'new_item'           => __('New Top Post', 'your-text-domain'),
                'edit_item'          => __('Edit Top Post', 'your-text-domain'),
                'view_item'          => __('View Top Post', 'your-text-domain'),
                'all_items'          => __('All Top Posts', 'your-text-domain'),
                'search_items'       => __('Search Top Posts', 'your-text-domain'),
                'parent_item_colon'  => __('Parent Top Posts:', 'your-text-domain'),
                'not_found'          => __('No top posts found.', 'your-text-domain'),
                'not_found_in_trash' => __('No top posts found in Trash.', 'your-text-domain')

            ],
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'top_post'), // Customize the slug if needed
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title') // Customize the supports as needed

        ]
    );
}



add_action('init', 'register_top_post_type');

function custom_top_post_meta_boxes()
{
    add_meta_box(
        'your_name_meta_box',
        'Your Name',
        'display_your_name_meta_box',
        'top_post',
        'normal',
        'high'
    );

    add_meta_box(
        'second_text_meta_box',
        'Second Text',
        'display_second_text_meta_box',
        'top_post',
        'normal',
        'high'
    );

    add_meta_box(
        'underline_text_meta_box',
        'Underline Text',
        'display_underline_text_meta_box',
        'top_post',
        'normal',
        'high'
    );

    add_meta_box(
        'end_text_meta_box',
        'End Text',
        'display_end_text_meta_box',
        'top_post',
        'normal',
        'high'
    );

    add_meta_box(
        'my_dis_meta_box',
        'My Discription',
        'display_my_dis_meta_box',
        'top_post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'custom_top_post_meta_boxes');


function display_your_name_meta_box($post)
{
    $your_name = get_post_meta($post->ID, 'your_name', true);
?>
    <label for="your_name">Your Name:</label>
    <input type="text" name="your_name" value="<?php echo esc_attr($your_name); ?>" />
<?php
}
function display_second_text_meta_box($post)
{
    $second_text = get_post_meta($post->ID, 'second_text', true);
?>
    <label for="second_text">Second Text:</label>
    <input type="text" name="second_text" value="<?php echo esc_attr($second_text); ?>" />
<?php
}
function display_underline_text_meta_box($post)
{
    $underline_text = get_post_meta($post->ID, 'underline_text', true);
?>
    <label for="underline_text">Underline Text:</label>
    <input type="text" name="underline_text" value="<?php echo esc_attr($underline_text); ?>" />
<?php
}

function display_end_text_meta_box($post)
{
    $end_text = get_post_meta($post->ID, 'end_text', true);
?>
    <label for="end_text">End Text:</label>
    <input type="text" name="end_text" value="<?php echo esc_attr($end_text); ?>" />
<?php
}
function display_my_dis_meta_box($post)
{
    $my_dis = get_post_meta($post->ID, 'my_dis', true);
?>
    <label for="my_dis">Discription:</label>
    <textarea type="text" name="my_dis" value="<?php echo esc_attr($my_dis); ?>" ><?php echo esc_attr($my_dis); ?></textarea>
<?php
}


function save_custom_top_post_meta_data($post_id, $post, $update)
{

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if ($post->post_type == 'top_post') {

        $fields = array('your_name', 'second_text', 'underline_text', 'end_text','my_dis');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $field_value = sanitize_text_field($_POST[$field]);
                update_post_meta($post_id, $field, $field_value);
            }
        }
    }
}

add_action('save_post', 'save_custom_top_post_meta_data', 10, 3);
