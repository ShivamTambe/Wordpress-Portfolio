<?php
function theme_my_dis_customizer_settings($wp_customize)
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

    $my_dis = esc_html(get_post_meta($post->ID, 'my_dis', true));

    $wp_customize->add_panel('theme_options_panel', array(
        'title'    => __('Theme Options', 'text_domain'),
        'priority' => 10,
    ));

    $wp_customize->add_section('top_section', array(
        'title'    => __('Top Section', 'text_domain'),
        'priority' => 120,
        'panel'    => 'theme_options_panel',
    ));

    $wp_customize->add_setting('my_dis_setting', array(
        'default'           => $my_dis,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('my_dis_control', array(
        'label'    => __('My Dis', 'text_domain'),
        'section'  => 'top_section',
        'settings' => 'my_dis_setting',
        'type'     => 'textarea',
    ));
}

add_action('customize_register', 'theme_my_dis_customizer_settings');

function modify_my_dis_post_data($wp_customize) {
    $my_dis = get_theme_mod('my_dis_setting', '');
    
    $args = array(
        'post_type'      => 'top_post',
        'posts_per_page' => -1,
    );
    $top_posts = get_posts($args);

    if ($top_posts) {
        $post = $top_posts[3];
        setup_postdata($post);
    }
    if($my_dis == ''){
        $my_dis = esc_html(get_post_meta($post->ID, 'my_dis', true)); 
    }
    update_post_meta($post->ID, 'my_dis', $my_dis);

    // Delete the Customizer data after saving to custom post type
    remove_theme_mod('my_dis_setting');
}

add_action('customize_save_after', 'modify_my_dis_post_data');
