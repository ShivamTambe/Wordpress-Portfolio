<?php
/*
Template Name: Portfolio
*/

get_header();
$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1, // Set to -1 to retrieve all posts
);
$projects = get_posts($args);
?>


<div class="portfolio">
    <div class="portfolio_title">Portfolio</div>
    <div class="portfolio_dis">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliquo.</div>
</div>
<div class="portfolio pro_wid">
    <div class="port_categories">
        <?php $categories = get_terms('project_category'); ?>
                <a href="" class="category-link category" data-category="all" id="project_categories">All</a> <?php
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
            $('.category-link').not(this).removeClass('selected-category');
            $(this).addClass('selected-category');
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
<?php get_footer() ?>