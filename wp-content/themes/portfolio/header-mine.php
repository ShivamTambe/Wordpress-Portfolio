<div class='Section-top'>
    <div class="Section">
        <div class="Section-content">
            <?php wp_head(); ?>
            <?php $args = array(
                'post_type'      => 'top_post',
                'posts_per_page' => -1, // Set to -1 to retrieve all posts
            );
            $top_posts = get_posts($args);
            if ($top_posts) {
                $post = $top_posts[3];
                setup_postdata($post);
                $your_name = get_theme_mod('your_name_setting', '');
                if($your_name== ''){
                    $your_name = esc_html(get_post_meta($post->ID, 'your_name', true));
                }
                echo 'Value from Customizer: ' . esc_html($your_name);
            ?>
                <h1><span id="your_name"><?php echo $your_name ?></span> <span id="second_text">and <?php echo esc_html(get_post_meta($post->ID, 'second_text', true)); ?></span><br></br>
                    <span class="underline-heading"><?php echo esc_html(get_post_meta($post->ID, 'underline_text', true)); ?></span>
                    &nbsp;<?php echo esc_html(get_post_meta($post->ID, 'end_text', true)); ?>
                </h1>
                <p class="paragraph-large"><?php echo esc_html(get_post_meta($post->ID, 'my_dis', true)); ?></p>
            <?php } else {  ?>
                <h1>I'm Default, and I Default<br></br>
                    <span class="underline-heading">user interfaces</span>
                    &nbsp;for Defaults
                </h1>
                <p class="paragraph-large">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim ad minim veniam quis nostrud</p>
            <?php } ?>
        </div>
    </div>
    <div class="Section-end">
        <div class='divider'></div>
    </div>
</div>