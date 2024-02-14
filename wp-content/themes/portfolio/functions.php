<?php
// Enqueue jQuery
function enqueue_scripts() {
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');
function enqueue_custom_styles()
{
    wp_enqueue_style('custom-style', get_stylesheet_uri(), array(), '1.0', 'all');

    // Localize the script to provide the correct AJAX URL
    error_log('adming_: '. admin_url('admin-ajax.php'));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('wp-block-styles');
add_theme_support('experimental-customizer');


require_once __DIR__ . '/customizer_setting/mine/your_name.php';
require_once __DIR__ . '/customizer_setting/mine/second_text.php';
require_once __DIR__ . '/customizer_setting/mine/underline_text.php';
require_once __DIR__ . '/customizer_setting/mine/end_text.php';
require_once __DIR__ . '/customizer_setting/mine/my_dis.php';

require_once __DIR__ . '/customizer_setting/footer_cust/email.php';
require_once __DIR__ . '/customizer_setting/footer_cust/email_dis.php';
require_once __DIR__ . '/customizer_setting/footer_cust/email_placeholder.php';
require_once __DIR__ . '/customizer_setting/footer_cust/email_button.php';

require_once __DIR__ . '/customizer_setting/footer_copyright/copyright.php';

require_once __DIR__ . '/customizer_setting/footer_pages/footer_page_title.php';


// AJAX handler
function load_projects_ajax_handler() {
    $category_slug = $_POST['category'];
    if($category_slug == 'all'){
        $args = array(
            'post_type'      => 'project',
            'posts_per_page' => -1,  // Retrieve all posts
        );
    }
    else{
        $args = array(
            'post_type' => 'project',
            'tax_query' => array(
                array(
                    'taxonomy' => 'project_category',
                    'field' => 'slug',
                    'terms' => $category_slug,
                ),
            ),
        );
    }

    $projects = new WP_Query($args);

    if ($projects->have_posts()){
        while ($projects->have_posts()) {
            $projects->the_post();
            $client_name = get_post_meta(get_the_ID(), 'client_name', true);
            // Display your project content here ?>
            <div class="port_project port1">
                <div class="port_image"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt=""></div>
                <div class="exp_rr_t">
                    <span class="exp_span exp_span_d"><?php echo $client_name ?></span>
                    <span class="exp_span_line line"></span>
                    <span class="exp_span">1989/2024</span>
                </div>
                <div class="exp_rr_e port_title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
            </div>
            <?php
        }
    }
    else{
        echo 'No projects found.';
    }

    wp_reset_postdata();

    die(); // Always end AJAX handler with die.
}

add_action('wp_ajax_load_projects', 'load_projects_ajax_handler');
add_action('wp_ajax_nopriv_load_projects', 'load_projects_ajax_handler');