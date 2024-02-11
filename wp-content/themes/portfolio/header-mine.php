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
                $second_text = get_theme_mod('second_text_setting', '');
                $underline_text = get_theme_mod('underline_text_setting', '');
                $end_text = get_theme_mod('end_text_setting', '');
                $my_dis = get_theme_mod('my_dis_setting', '');

                if($your_name== ''){
                    $your_name = esc_html(get_post_meta($post->ID, 'your_name', true));
                }
                if($second_text == ''){
                    $second_text = esc_html(get_post_meta($post->ID, 'second_text', true)); 
                }
                if($underline_text == ''){
                    $underline_text = esc_html(get_post_meta($post->ID, 'underline_text', true));
                }
                if($end_text == ''){
                    $end_text = esc_html(get_post_meta($post->ID, 'end_text', true));
                }
                if($my_dis == ''){
                    $my_dis = esc_html(get_post_meta($post->ID, 'my_dis', true)); 
                }
                echo 'Value from Customizer: ' . esc_html($your_name);
            ?>
                <h1><span id="your_name"><?php echo $your_name ?></span> <span id="second_text"><?php echo $second_text ?></span><br></br>
                    <span class="underline-heading"><?php echo $underline_text ?></span>
                    &nbsp;<?php echo $end_text ?>
                </h1>
                <p class="paragraph-large"><?php echo $my_dis ?></p>
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