<div class="Section-pro">
  <div class="Section-pro-top">
    Past Projects
  </div>
  <div class="Section-pro-cards">
    <?php
    $args = array(
      'post_type'      => 'project',
      'posts_per_page' => -1, // Set to -1 to retrieve all posts
      'order'          => 'DESC',
    );
    $projects = get_posts($args);

    foreach ($projects as $project) { ?>
      <div class="Pro-cards">
        <div class="pro">
          <div class='card-top'>
            <div><?php echo esc_html(get_post_meta($project->ID, 'client_name', true)); ?></div>
            <div class='card-middle'></div>
            <div><?php echo esc_html(get_post_meta($project->ID, 'work', true)); ?></div>
          </div>
          <div class='card-title'>
            <?php echo esc_html(get_post_meta($project->ID, 'title', true)); ?>
          </div>
          <p class='card-dis'>
            <?php echo get_the_excerpt($project->ID); ?>
          <div class='card-go'>
            <span><a href="<?php the_permalink($project->ID)?>">View Project</a></span>
            <span> Arrow</span>
          </div>
        </div>
        <div class="Pro-cards-right">
          <?php echo get_the_post_thumbnail($project->ID); ?>
          <!-- <img src='https://assets-global.website-files.com/60e640d00fdb1e48916fae6c/656a2c3424d5cf864945bde7_app-x-webflow-template.png' alt='Loading'/> -->
        </div>
      </div>
    <?php } ?>
  </div>
</div>