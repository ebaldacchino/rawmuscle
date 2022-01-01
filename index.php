<?php 
    global $meta_description;
    $meta_description = "Keep your eyes peeled to hear all about Australia's Best Male Strippers' adventures, from their domination of the X-Awards to their trek to Uluru. This is your chance to get to know all about the men of Raw Muscle!";
    get_header(); 
    
    global $title; 
    global $page_heading;
    $page_heading = true;
    $title='blog posts';
    include 'components/title.php';  
?>  
<section class='row no-margin-top'>
    <?php
        $args = array(
            'post_type' => 'post', 
        );

        $blogposts = new WP_Query($args);

        while ($blogposts->have_posts()) {
            $blogposts->the_post();
        
    ?>
    <article class='blog-post'> 
        <a href="<?php the_permalink() ?>">
            <!-- <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>"> -->
            <?php the_post_thumbnail(); ?>
        </a>
        <h3><?php the_title(); ?></h3>
        <!-- <small>Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?></small> -->
        <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
        <a href="<?php the_permalink() ?>">
    <button class="btn">read more</button></a>
    </article>
    <?php }
        wp_reset_query(); 
    ?>
    
</section>
<!-- <div>
        <?php echo paginate_links(); ?>
    </div> -->
<?php get_footer(); ?>