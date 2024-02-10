<?php

function display_about_image_meta_box($post)
{
    $about_image = get_post_meta($post->ID, 'about_image', true);
?>
    <label for="about_image">BackGround Image: <?php echo $about_image ?></label>
    <input type="file" id="about_image" name="about_image" accept="image/*">
<?php
}
function project_gallary_l_meta_box($post)
{
    $project_gallary_l = get_post_meta($post->ID, 'project_gallary_l', true);
?>
    <label for="project_gallary_l">project_gallary_l: <?php echo $project_gallary_l ?></label>
    <input type="file" id="project_gallary_l" name="project_gallary_l" accept="image/*">
<?php
}
function project_gallary_r1_meta_box($post)
{
    $project_gallary_r1 = get_post_meta($post->ID, 'project_gallary_r1', true);
?>
    <label for="project_gallary_r1">project_gallary_r1: <?php echo $project_gallary_r1 ?></label>
    <input type="file" id="project_gallary_r1" name="project_gallary_r1" accept="image/*">
<?php
}
function project_gallary_r2_meta_box($post)
{
    $project_gallary_r2 = get_post_meta($post->ID, 'project_gallary_r2', true);
?>
    <label for="project_gallary_r2">project_gallary_r2: <?php echo $project_gallary_r2 ?></label>
    <input type="file" id="project_gallary_r2" name="project_gallary_r2" accept="image/*">
<?php
}
function project_gallary_r3_meta_box($post)
{
    $project_gallary_r3 = get_post_meta($post->ID, 'project_gallary_r3', true);
?>
    <label for="project_gallary_r3">project_gallary_r3: <?php echo $project_gallary_r3 ?></label>
    <input type="file" id="project_gallary_r3" name="project_gallary_r3" accept="image/*">
<?php
}
function project_gallary_r4_meta_box($post)
{
    $project_gallary_r4 = get_post_meta($post->ID, 'project_gallary_r4', true);
?>
    <label for="project_gallary_r4">project_gallary_r4: <?php echo $project_gallary_r4 ?></label>
    <input type="file" id="project_gallary_r4" name="project_gallary_r4" accept="image/*">
<?php
}