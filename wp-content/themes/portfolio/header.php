<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Portfolio Title
    </title>
    <?php wp_head(); ?> <!--  function to call style for plugins -->
</head>
<body>
    <div class="navbar">
      <div class="header-content">
          <div class="navtitle"><a href="<?php echo home_url(); ?>">Portfolio</a></div>
          <?php 
            wp_nav_menu(array('
              theme_location'=>'primary-menu',
              'menu_class'=>'nav-btns'
            ))
          ?>
      </div>
    </div>