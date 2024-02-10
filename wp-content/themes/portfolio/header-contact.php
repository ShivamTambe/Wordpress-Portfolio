<?php wp_head(); ?>
<?php $args = array(
    'post_type'      => 'top_post',
    'posts_per_page' => -1, // Set to -1 to retrieve all posts
);
$top_posts = get_posts($args);
if ($top_posts) {
    $post = $top_posts[2];
    setup_postdata($post);
}
?>
<div class="contact">
    <div class="line"></div>
    <div class="contact_sec">
        <div class="contact_sub_sec">
            <div class="contact_title"><?php echo esc_html(get_post_meta($post->ID, 'your_name', true)); ?></div>
            <span class="contact_title2">
                <span class="underline"><?php echo esc_html(get_post_meta($post->ID, 'underline_text', true)); ?></span>
                <?php echo esc_html(get_post_meta($post->ID, 'end_text', true)); ?>
            </span>
            <div class="contact_dis"><?php echo esc_html(get_post_meta($post->ID, 'my_dis', true)); ?></div>
            </div>
        <div class="contact_more">More</div>
    </div>
    <div class="line"></div>
</div>