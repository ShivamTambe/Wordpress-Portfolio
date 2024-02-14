<?php
function footer_copyright_customizer_settings($wp_customize)
{
    $copyright_title = esc_html(get_theme_mod('copyright_setting', ''));
    // Add a panel
    $wp_customize->add_panel('copyright_options_panel', array(
        'title'    => __('copyright Options', 'text_domain'),
        'priority' => 10,
    ));

    // Add a section to the panel
    $wp_customize->add_section('copyright_section', array(
        'title'    => __('copyright Section', 'text_domain'),
        'priority' => 120,
        'panel'    => 'copyright_options_panel', // Assign the section to the panel
    ));

    // Add setting and control to the section
    $wp_customize->add_setting('copyright_setting', array(
        'default'           => $copyright_title,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('copyright_control', array(
        'label'    => __('copyright Title', 'text_domain'),
        'section'  => 'copyright_section',
        'settings' => 'copyright_setting',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'footer_copyright_customizer_settings');
