<?php
function theme_end_text_customizer_settings($wp_customize)
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

    $end_text = esc_html(get_post_meta($post->ID, 'end_text', true));

    $wp_customize->add_panel('theme_options_panel', array(
        'title'    => __('Theme Options', 'text_domain'),
        'priority' => 10,
    ));

    $wp_customize->add_section('top_section', array(
        'title'    => __('Top Section', 'text_domain'),
        'priority' => 120,
        'panel'    => 'theme_options_panel',
    ));

    $wp_customize->add_setting('end_text_setting', array(
        'default'           => $end_text,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('end_text_control', array(
        'label'    => __('End Text', 'text_domain'),
        'section'  => 'top_section',
        'settings' => 'end_text_setting',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'theme_end_text_customizer_settings');

function modify_end_text_post_data($wp_customize) {
    $end_text = get_theme_mod('end_text_setting', '');

    $args = array(
        'post_type'      => 'top_post',
        'posts_per_page' => -1,
    );
    $top_posts = get_posts($args);

    if ($top_posts) {
        $post = $top_posts[3];
        setup_postdata($post);
    }
    if($end_text == ''){
        $end_text = esc_html(get_post_meta($post->ID, 'end_text', true));
    }
    update_post_meta($post->ID, 'end_text', $end_text);

    // Delete the Customizer data after saving to custom post type
    remove_theme_mod('end_text_setting');
}

add_action('customize_save_after', 'modify_end_text_post_data');
