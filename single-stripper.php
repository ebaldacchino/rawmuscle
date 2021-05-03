<?php 
    global $meta_description;
    $meta_description = wp_strip_all_tags ( get_the_content(), true );
    get_header(); 

    $second_image = get_post_meta(get_the_ID(), '_stripper_custom_image', true);
    $srcset = wp_get_attachment_image_srcset( $image['id'], array( 100, 100 ) );
    $attachment_id = wp_get_attachment_metadata( '_stripper_custom_image', true );
?> 

    <?php if($second_image) {
    ?> 

    <style>
    .strippers-hero {
        height: calc(100vh - 10.5rem);
        filter: grayscale(100%); 
    }
    .strippers-hero img {
        position: absolute;
        z-index: -1;
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
    @media screen and (max-width: 600px) {
        .strippers-hero {
            height: 30vh;
        }
    }
    .strippers-hero > div {
        background-color: rgba(0, 0, 0, 0.5);
        height: 100%;
        flex-direction: column;
    }
    .strippers-hero h1 {
        font-size: 10vw;
        padding: 0;
        margin: 0;
    }
    </style>
        <section class='strippers-hero no-margin-top flex-center w100'> 
            <img class="w100" src="<?php echo $second_image; ?>" srcset="<?php echo esc_attr( $srcset ); ?>">
            <div class='w100 flex-center'>
                <h1 class='glow'><?php the_title(); ?></h1>
                    <div class="grid-center" style="padding:1rem 0 0 0"><div style="height:0.125rem;width:10vw;background-color:var(--theme-color)"></div></div>
                    
        </section>
    <?php } else {
        ?> 
        <h1 class="glow"><?php the_title(); ?></h1> 
    <?php
    } ?>

<section class="stripper-profile <?php if (!$second_image) {
    echo 'no-margin-top';
}
    ?>">
    <!-- <h3 class="glow">star sign</h3> -->
    <article class="about-stripper slide-in"> 
        <?php if(has_post_thumbnail()) { ?>
            <div class='image-container'>
            <?php the_post_thumbnail(); ?>
        </div>
        <?php } ?>
        <div class='stripper-info'><?php the_content(); ?></div>
    </article>
</section>
<section class="slide-in on-screen"><h2 class="glow">check my availability</h2><p class="text-center">Everything we need to book <?php the_title(); ?>
</p>
<form class="form" method="POST" novalidate>
    <input id='name' type="name" placeholder="Name" name="name">
    <input id='email' type="email" placeholder="Email" name="email">
    <input id="date" type="date" placeholder="Date" name="date">
    <input id="time" type="time"  placeholder="Time" name="time">
    <input id='phone' type="phone" placeholder="Phone" name="phone">
    <textarea id='message' name="message" placeholder="Enquiry" cols="30" rows="10"></textarea>
    <button class="btn">send</button>
</form>
</section>
<?php include('components/submitted-form.php'); ?>
<?php include('components/image-slider.php'); ?>
<?php get_footer(); ?>