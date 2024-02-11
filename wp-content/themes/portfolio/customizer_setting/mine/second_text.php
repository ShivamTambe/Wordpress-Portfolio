<?php
function theme__second_text_customizer_settings($wp_customize)
{
    $args = array(
        'post_type'      => 'top_post',
        'posts_per_page' => -1,
    );
    $top_posts = get_posts($args);

    if ($top_posts) {
        $post = $top_posts[3];
        setup_postdata($post);
    }

    $second_text = esc_html(get_post_meta($post->ID, 'second_text', true));

    $wp_customize->add_panel('theme_options_panel', array(
        'title'    => __('Theme Options', 'text_domain'),
        'priority' => 10,
    ));

    $wp_customize->add_section('top_section', array(
        'title'    => __('Top Section', 'text_domain'),
        'priority' => 120,
        'panel'    => 'theme_options_panel',
    ));

    $wp_customize->add_setting('second_text_setting', array(
        'default'           => $second_text,
        'sanitize_callback' => 'sanitize_text_field',
        // 'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('second_text_control', array(
        'label'    => __('Second Text', 'text_domain'),
        'section'  => 'top_section',
        'settings' => 'second_text_setting',
        'type'     => 'text',
        // 'active_callback' => 'theme_enqueue_preview_script',
    ));
}
// add_action('customize_controls_enqueue_scripts', 'theme_customize_preview_js');
add_action('customize_register', 'theme__second_text_customizer_settings');
// function theme_enqueue_preview_script() {
//     error_log("Calling");
//     wp_enqueue_script(
//         'theme-customizer-preview',
//         get_template_directory_uri() . '/js/customizer-preview.js',
//         array('customize-preview'),
//         '' // Version
//     );
//     return true;
// }

function modify_second_text_custom_post_data($wp_customize) {
    $second_text = get_theme_mod('second_text_setting', '');

    $args = array(
        'post_type'      => 'top_post',
        'posts_per_page' => -1,
    );
    $top_posts = get_posts($args);

    if ($top_posts) {
        $post = $top_posts[3];
        setup_postdata($post);
    }
    if($second_text == ''){
        $second_text = esc_html(get_post_meta($post->ID, 'second_text', true)); 
    }
    update_post_meta($post->ID, 'second_text', $second_text);

    // Delete the Customizer data after saving to custom post type
    remove_theme_mod('second_text_setting');
}

add_action('customize_save_after', 'modify_second_text_custom_post_data');

// function theme_customize_preview_js() {
//     echo '<script>console.log("Enqueueing script");</script>';
//     wp_enqueue_script(
//         'theme-customizer-preview',
//         get_template_directory_uri() . '/js/customizer-preview.js',
//         array('customize-preview'),
//         '' // Version, you can add one if needed
//     );
// }
// add_action('customize_preview_init', 'theme_customize_preview_js');
