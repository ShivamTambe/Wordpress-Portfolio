<?php
    $core_values_args = array(
      'post_type'      => 'core_value',
      'posts_per_page' => -1, // Set to -1 to retrieve all posts
    );
    $core_values = get_posts($core_values_args);
        ?>

<div class="work_style">
    <div class="line"></div>
    <div class="skills_sec">
        <div class="skills_title">The core values that drive my work</div>
        <div class="skills">
            <?php foreach($core_values as $core_value){ ?>
                <div class="skill">
                    <img src="<?php echo get_the_post_thumbnail_url($core_value->ID, 'thumbnail') ?>" alt="">
                    <div class="skill_title"><?php echo esc_html(get_the_title($core_value))?></div>
                    <p class="skill_dis"><?php echo esc_html(get_the_excerpt($core_value->ID)); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="line"></div>
</div>