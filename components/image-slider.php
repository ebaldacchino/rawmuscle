<?php if ($_SERVER["REQUEST_URI"] === '/strippers/') { ?>
<h1 class="glow">the guys</h1> 
<section class="slider-section slide-in no-margin-top" id='male-strippers'> 
<?php } else { ?>
<section class="slider-section slide-in" id='male-strippers'> 
    <h2 class="glow">the guys</h2>
    
<?php } ?>  
 <p>Got a Raw Muscle guy you fantasize about? Click on him below for just a little bit 'more'!</p>
    <article class="slider-container flex-center no-margin-top">
        <button class="arrow-container left flex-center" aria-label="Move slider left">
            <i class="fas fa-chevron-left"></i>
        </button>
        <div class="slider">
            <?php 
                $args = array(
                    'post_type' => 'stripper',
                    'posts_per_page' => 100,
                    'order' => "ASC",
                    'orderby' => "rand" //modified
                );
                $strippers = new WP_Query($args);

                while($strippers->have_posts()) {
                    $strippers->the_post();
            ?>
            <?php if(has_post_thumbnail()) { ?>
                <a class="image" href="<?php the_permalink(); ?>"> 

                    <?php the_post_thumbnail(); ?>
                    <div class="description-container">
                        <span><?php echo the_title(); ?></span>
                        <!-- <span class="contrast">star sign</span> -->
                    </div>
                </a>
                <?php } ?>
            <?php }
            wp_reset_query(); ?>
        </div>
        <button class="arrow-container right flex-center" aria-label="Move slider Right">
            <i class="fas fa-chevron-right"></i>
        </button>
    </article>
</section>