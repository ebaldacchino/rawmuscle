<?php 
    global $meta_description;
    $meta_description = wp_strip_all_tags ( get_the_content(), true );
    get_header(); 
?> 
<h1 class="glow"><?php the_title(); ?></h1>
<section class="stripper-profile no-margin-top"> 
    <article class="about-stripper"> 
        <?php if(has_post_thumbnail()) { ?>
            <div class='image-container'>
                    <?php the_post_thumbnail(); ?>
        </div>
        <?php } ?>
        <div class='stripper-info'><?php the_content(); ?></div>
    </article>
</section>
<?php include('components/image-slider.php'); ?>
<?php get_footer(); ?>