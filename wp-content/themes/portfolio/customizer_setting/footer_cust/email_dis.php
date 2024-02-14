<?php
function footer_email_dis_customizer_settings($wp_customize)
{
    $email_dis_title = esc_html(get_theme_mod('email_dis_setting', ''));
    // Add a panel
    $wp_customize->add_panel('email_options_panel', array(
        'title'    => __('Email Options', 'text_domain'),
        'priority' => 10,
    ));

    // Add a section to the panel
    $wp_customize->add_section('email_section', array(
        'title'    => __('Email Section', 'text_domain'),
        'priority' => 120,
        'panel'    => 'email_options_panel', // Assign the section to the panel
    ));

    // Add setting and control to the section
    $wp_customize->add_setting('email_dis_setting', array(
        'default'           => $email_dis_title,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('email_dis_control', array(
        'label'    => __('Email Dis Title', 'text_domain'),
        'section'  => 'email_section',
        'settings' => 'email_dis_setting',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'footer_email_dis_customizer_settings');
