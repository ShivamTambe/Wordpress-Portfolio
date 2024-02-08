<?php

    function enqueue_custom_styles(){
        wp_enqueue_style('custom-style', get_stylesheet_uri(), array(), '1.0', 'all');
    }

    add_action('wp_enqueue_scripts','enqueue_custom_styles');

    add_theme_support('post-thumbnails');
    add_theme_support('menus');

