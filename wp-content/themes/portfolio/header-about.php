<?php $top_post = array(
    'post_type'      => 'top_post',
    'posts_per_page' => -1, // Set to -1 to retrieve all posts
);
$top_d = get_posts($top_post)[0]; ?>
<div class="abouttop">
    <div class="aboutsum">
        <div class="about_image"><img src="<?php echo get_the_post_thumbnail_url($top_d->ID, 'thumbnail')?>" alt=""></div>
        <div class="about_content">
            <div class="a_title"><?php echo get_post_meta($top_d->ID, 'your_name', true) ?></div>
            <div class="a_dis"><?php echo get_post_meta($top_d->ID, 'my_dis', true) ?></div>
        </div>
    </div>
    <div class="a_more">MORE</div>
</div>
<?php $about = array(
    'post_type'      => 'about',
    'posts_per_page' => -1, // Set to -1 to retrieve all posts
);
$about_details = get_posts($about)[0]; ?>
<div class="aboutsec">
    <div class="line"></div>
    <div class="a_sec_content">
        <div class="a_sec_top">
            <div class="a_sec_tl">
                <h2 class="tl_title"><?php echo esc_html(get_the_title($about_details)) ?></h2>
                <p class="tl_dis"><?php echo apply_filters('the_content', $about_details->post_content); ?></p>
            </div>
            <div class="a_sec_tr">
                <img src="<?php echo get_post_meta($about_details->ID, 'about_image1', true) ?>" alt="">
            </div>
        </div>
        <div class="a_sec_btm">
            <div class="a_sec_bl"><img src="https://images6.alphacoders.com/890/890676.png" alt=""></div>
            <div class="a_sec_br"><img src="https://i.pinimg.com/736x/40/ca/82/40ca82ba1d9118bb86378ae825ccece1.jpg" alt=""></div>
        </div>
    </div>
    <div class="line"></div>
</div>


<?php get_header('experience'); ?>

<?php get_header('core_value') ?>

<?php get_header('contact') ?>
<?php get_footer(); ?>