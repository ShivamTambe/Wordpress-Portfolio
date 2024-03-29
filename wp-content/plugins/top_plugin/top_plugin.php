<?php


/*
 * Plugin Name:       Top Posts
 * Plugin URI:        https://github.com/dashboard
 * Description:       Developed for Pratice.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shivam Tambe
 * Author URI:        https://github.com/dashboard
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       Mine Plugin
 * Domain Path:       /languages
 */


// function enqueue_portfolio_scripts()
// {
//     wp_enqueue_script('portfolio-script', get_template_directory_uri() . '', array('jquery'), null, true);
// }

// add_action('wp_enqueue_scripts', 'enqueue_portfolio_scripts');

require_once __DIR__ . '/post-types/top_post.php';
require_once __DIR__ . '/post-types/project_post.php';
require_once __DIR__ . '/post-types/experience.php';
require_once __DIR__ . '/post-types/core_value.php';
require_once __DIR__ . '/post-types/about_me.php';
require_once __DIR__ . '/taxonomy/project_category.php';
require_once __DIR__ . '/taxonomy/project_tag.php';

// require_once __DIR__ . '/widgets/portfolio_widget.php';

function mine_activation()
{
}
register_activation_hook(
    __FILE__,
    'mine_activation'
);


function mine_deactivation()
{
}
register_deactivation_hook(
    __FILE__,
    'mine_deactivation'
);
