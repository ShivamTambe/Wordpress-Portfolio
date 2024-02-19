<?php
class Custom_Portfolio_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'custom_portfolio_widget',
            'Custom Portfolio Widget',
            array('description' => 'Display portfolio with categories')
        );
    }

    public function widget($args, $instance)
    {
        // Output widget content
        echo $args['before_widget'];

        // You can customize the widget content here
?>
        <div class="portfolio">
            <div class="portfolio_title">Portfolio</div>
            <div class="portfolio_dis">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliquo.</div>
        </div>
        <div class="portfolio pro_wid">
            <div class="port_categories">
                <?php $categories = get_terms('project_category'); ?>
                <a href="" class="category-link category active" data-category="all" id="project_categories">All</a> <?php
                foreach ($categories as $category) {
                    echo '<a href="#" class="category-link category" data-category="' . $category->slug . '">' . $category->name . '</a>';
                } ?>
            </div>
            <div id="projects-container" class="port_categories">

            </div>
        </div>



        <script>
            
            window.onload = function() {
                document.getElementById("project_categories").click();
            };
            jQuery(document).ready(function($) {
                $('body').on('click', '.category-link', function(e) {
                    e.preventDefault();
                    $('.category-link').removeClass('active');
                    $(this).addClass('active');
                    var category = $(this).data('category');
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        data: {
                            action: 'load_projects',
                            category: category,
                        },
                        success: function(response) {
                            $('#projects-container').html(response);
                        },
                    });
                });
            });
        </script>
<?php

        echo $args['after_widget'];
    }
}

// Register the widget
function register_custom_portfolio_widget()
{
    register_widget('Custom_Portfolio_Widget');
}

add_action('widgets_init', 'register_custom_portfolio_widget');
?>