<?php
function footer_footer_page_title_customizer_settings($wp_customize)
{
    $footer_page_title_title = esc_html(get_theme_mod('footer_page_title_setting', ''));
    // Add a panel
    $wp_customize->add_panel('footer_page_title_options_panel', array(
        'title'    => __('footer_page_title Options', 'text_domain'),
        'priority' => 10,
    ));

    // Add a section to the panel
    $wp_customize->add_section('footer_page_title_section', array(
        'title'    => __('footer_page_title Section', 'text_domain'),
        'priority' => 120,
        'panel'    => 'footer_page_title_options_panel', // Assign the section to the panel
    ));

    // Add setting and control to the section
    $wp_customize->add_setting('footer_page_title_setting', array(
        'default'           => $footer_page_title_title,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_page_title_control', array(
        'label'    => __('footer_page_title Title', 'text_domain'),
        'section'  => 'footer_page_title_section',
        'settings' => 'footer_page_title_setting',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'footer_footer_page_title_customizer_settings');
