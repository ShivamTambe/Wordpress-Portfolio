<?php
function theme_customizer_settings($wp_customize)
{
    $args = array(
        'post_type'      => 'top_post',
        'posts_per_page' => -1, // Set to -1 to retrieve all posts
    );
    $top_posts = get_posts($args);
    if ($top_posts) {
        $post = $top_posts[3];
        setup_postdata($post);
    }
    $your_name = esc_html(get_post_meta($post->ID, 'your_name', true));
    // Add a panel
    $wp_customize->add_panel('theme_options_panel', array(
        'title'    => __('Theme Options', 'text_domain'),
        'priority' => 10,
    ));

    // Add a section to the panel
    $wp_customize->add_section('top_section', array(
        'title'    => __('Top Section', 'text_domain'),
        'priority' => 120,
        'panel'    => 'theme_options_panel', // Assign the section to the panel
    ));

    // Add setting and control to the section
    $wp_customize->add_setting('your_name_setting', array(
        'default'           => $your_name,
        'sanitize_callback' => 'sanitize_text_field',
        // 'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('your_name_control', array(
        'label'    => __('Your Name', 'text_domain'),
        'section'  => 'top_section',
        'settings' => 'your_name_setting',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'theme_customizer_settings');

// function theme_enqueue_scripts() {
//     // Enqueue your custom script without jQuery dependency
//     wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true);
// }

// // Hook the function to the appropriate action
// add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');



function theme_customize_preview_js()
{
    error_log('location1: ' . get_template_directory_uri() . '/js/customizer-preview.js');
    wp_enqueue_script('theme-customizer-preview', get_template_directory_uri() . '/js/customizer-preview.js', array('jquery', 'customize-preview'), '', true);
}
add_action('customize_preview_init', 'theme_customize_preview_js');

function modify_custom_post_data($wp_customize) {
    $your_name = get_theme_mod('your_name_setting', '');

    $args = array(
        'post_type'      => 'top_post',
        'posts_per_page' => -1, // Set to -1 to retrieve all posts
    );
    $top_posts = get_posts($args);
    if ($top_posts) {
        $post = $top_posts[3];
        setup_postdata($post);
    }

    update_post_meta($post->ID, 'your_name', $your_name);

    // Delete the Customizer data after saving to custom post type
    remove_theme_mod('your_name_setting');
}

add_action('customize_save_after', 'modify_custom_post_data');
