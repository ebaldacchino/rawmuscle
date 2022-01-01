<?php 
    global $meta_description;
    $meta_description = wp_strip_all_tags ( get_the_content(), true );
    get_header(); 
?> 
<?php  
        global $title; 
        global $page_heading;
        $title=get_the_title();
        $page_heading=true;
        include 'components/title.php';  
?> 
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
<section class="slide-in on-screen">
    <?php  
        global $title; 
        global $page_heading;
        $title='check my availability'; 
        $page_heading=false;
        include 'components/title.php';  
?>  
<p class="text-center">Everything we need to book <?php the_title(); ?>
</p>
<form class="form" method="POST" novalidate>
    <input id='name' type="name" placeholder="Name" name="name">
    <input id='email' type="email" placeholder="Email" name="email">
    <input id="date" type="date" placeholder="Date" name="date">
    <input id="time" type="time"  placeholder="Time" name="time">
    <input id='phone' type="phone" placeholder="Phone" name="phone">
    <textarea id='message' name="message" placeholder="Enquiry" cols="30" rows="10"></textarea>
    <button class="btn" type='submit'>send</button>
</form>
</section>
<?php include('components/submitted-form.php'); ?>
<?php include('components/image-slider.php'); ?>
<?php get_footer(); ?>