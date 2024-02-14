<?php
/*
Template Name: Project
*/

get_header();
the_post();
?>
<div class="project_top_sec">
    <div class="contact_sec">
        <div class="contact_sub_sec project_sec">
            <div class="contact_title"><?php the_title() ?>
            </div>
            <div class="contact_dis"><?php the_content() ?></div>
        </div>
        <div class="contact_more">More</div>
    </div>
</div>
<div class="backimg" style="background-image: url(<?php echo get_post_meta($post->ID, 'background_image', true)?>);"></div>
<div class="details">
    <div class="detail">
        <div class="detail_t">Client</div>
        <div class="detail_d"><?php echo get_post_meta($post->ID, 'client_name', true)?></div>
    </div>
    <div class="detail">
        <div class="detail_t">Services</div>
        <div class="detail_d"><?php echo get_post_meta($post->ID, 'work', true)?></div>
    </div>
    <div class="detail">
        <div class="detail_t">Deliverables</div>
        <div class="detail_d"><?php echo get_post_meta($post->ID, 'deliverables', true)?></div>
    </div>
    <div class="detail">
        <div class="detail_t">Client</div>
        <div class="detail_d"><a href="<?php echo get_post_meta($post->ID, 'website_url', true)?>">Live Preview</a></div>
    </div>
</div>

<div class="project_content">
    <div class="project_c">
        <div class="about_pro">
            <div class="a_p_title">About the project</div>
            <div class="a_p_dis">Lorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante.</div>
            <!-- get_post_meta($post->ID, 'about_image', true) -->
            <?php $about_image = get_the_post_thumbnail($post->ID);
                if($about_image!=''){ ?>
                    <div class="a_p_img"><?php echo $about_image?></div>
                <?php }else{ ?>
                    <div class="a_p_img"><img src="https://assets-global.website-files.com/60e640d00fdb1e48916fae6c/60e65799dced1943d9c6cfdf_graphic-design-about-the-project-portfolio-x-webflow-template.jpg" alt=""></div>
                <?php } ?>
            <div class="line pro_line"></div>
        </div>
    </div>
    <div class="project_res">
        <div class="a_p_title">Project Result</div>
        <div class="a_p_dis">Lorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante.
        </div>
    </div>
    <div class="line project_line"></div>
</div>

<div class="project_gallary">
    <div class="p_g_top">
        <div class="p_g_tl">Project Gallary</div>
        <div class="p_g_tr">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero quasi rem doloribus et ex corporis pariatur. Voluptates obcaecati pariatur, architecto officiis ratione rerum hic neque, at, suscipit aliquid nihil quis.</div>
    </div>
    <div class="p_g_btm">
        <div class="p_g_btm_l"><img src="https://assets-global.website-files.com/60e640d00fdb1e48916fae6c/60e659f58ab2ad2eb8b9d4f1_01-project-gallery-portfolio-x-webflow-template-p-500.jpeg" alt=""></div>
        <div class="p_g_btm_r">
        <?php $project_gallary_r1 = get_post_meta($post->ID, 'project_gallary_r1', true);
                if($project_gallary_r1){ ?>
                    <div class="a_p_img"><img src="<?php echo $project_gallary_r1?>" alt=""></div>

                <?php }else{ ?>
                    <div class="a_p_img"><img src="https://assets-global.website-files.com/60e640d00fdb1e48916fae6c/60e659f58ab2ad2eb8b9d4f1_01-project-gallery-portfolio-x-webflow-template-p-500.jpeg" alt=""></div>
                <?php } ?>
            <img src="https://assets-global.website-files.com/60e640d00fdb1e48916fae6c/60e659f57b64f393f0c124fc_02-project-gallery-portfolio-x-webflow-template-p-500.jpeg" alt="">
            <img src="https://assets-global.website-files.com/60e640d00fdb1e48916fae6c/60e659f57b64f393f0c124fc_02-project-gallery-portfolio-x-webflow-template-p-500.jpeg" alt="">
            <img src="https://assets-global.website-files.com/60e640d00fdb1e48916fae6c/60e659f57b64f393f0c124fc_02-project-gallery-portfolio-x-webflow-template-p-500.jpeg" alt="">
        </div>
    </div>
</div>

<?php get_header('contact') ?>

<?php get_footer() ?>

