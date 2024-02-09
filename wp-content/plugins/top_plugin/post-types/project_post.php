<?php

/**
 * Plugin Name: Projects
 * Description: A plugin for managing top posts with custom metadata.
 * Version: 1.0
 * Author: Shivam Tambe
 */


function register_project_post_type()
{
    $labels = array(
        'name'               => _x('Projects', 'post type general name', 'your-text-domain'),
        'singular_name'      => _x('Project', 'post type singular name', 'your-text-domain'),
        'menu_name'          => _x('Projects', 'admin menu', 'your-text-domain'),
        'name_admin_bar'     => _x('Project', 'add new on admin bar', 'your-text-domain'),
        'add_new'            => _x('Add New', 'project', 'your-text-domain'),
        'add_new_item'       => __('Add New Project', 'your-text-domain'),
        'new_item'           => __('New Project', 'your-text-domain'),
        'edit_item'          => __('Edit Project', 'your-text-domain'),
        'view_item'          => __('View Project', 'your-text-domain'),
        'all_items'          => __('All Projects', 'your-text-domain'),
        'search_items'       => __('Search Projects', 'your-text-domain'),
        'parent_item_colon'  => __('Parent Projects:', 'your-text-domain'),
        'not_found'          => __('No projects found.', 'your-text-domain'),
        'not_found_in_trash' => __('No projects found in Trash.', 'your-text-domain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'project'), // Customize the slug if needed
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'), // Customize the supports as needed
        'show_in_rest'       => true

    );

    register_post_type('project', $args);
}

add_action('init', 'register_project_post_type');


function custom_project_post_meta_boxes()
{
    add_meta_box(
        'background_image_meta_box',
        'Background Image',
        'display_background_image_meta_box',
        'project',
        'side',
        'default'
    );
    add_meta_box(
        'client_name_meta_box',
        'Client Name',
        'display_client_name_meta_box',
        'project',
        'side',
        'default'
    );
    add_meta_box(
        'work_meta_box',
        'Work',
        'display_work_meta_box',
        'project',
        'side',
        'default'
    );
}
function display_background_image_meta_box($post)
{
    $background_image = get_post_meta($post->ID, 'background_image', true);
?>
    <label for="background_image">BackGround Image: <?php $background_image ?></label>
    <input type="file" id="background_image" name="background_image" accept="image/*" > 
<?php
}
function display_client_name_meta_box($post)
{
    $client_name = get_post_meta($post->ID, 'client_name', true);
?>
    <label for="client_name">Client Name:</label>
    <input type="text" name="client_name" value="<?php echo esc_attr($client_name); ?>" />
<?php
}
function display_work_meta_box($post)
{
    $work = get_post_meta($post->ID, 'work', true);
?>
    <label for="work">Work:</label>
    <input type="text" name="work" value="<?php echo esc_attr($work); ?>" />
<?php
}
add_action('add_meta_boxes', 'custom_project_post_meta_boxes');

function save_project_post_meta_data($post_id, $post, $update)
{

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if ($post->post_type == 'project') {
        $fields = array('client_name', 'work','background_image');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $field_value = sanitize_text_field($_POST[$field]);
                update_post_meta($post_id, $field, $field_value);
            }
        }
    }
}

add_action('save_post', 'save_project_post_meta_data', 10, 3);
