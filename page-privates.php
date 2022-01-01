<?php 
    global $meta_description;
    $meta_description = "You don't have to come to the show to meet the men of Australia's award winning show. Whether you need a male stripper, topless waiter, or a nude model for some cheeky art, we have the canvas for you!";
    get_header(); 
?> 
<?php  
    global $title; 
    global $page_heading;
    $title = 'home visits';
    $page_heading = true;
    include 'components/title.php';  
?> 
<section class="info">
    <p>First of all, do you like an adventurous bad boy, or a sweet and sensitive charmer? Seeing as you’re only planning on one hens night, you can always get both. But why?</p>
    <p>Firstly, a bachelorette needs someone to serve her drinks and pamper her. Secondly, she needs a rock hard canvas for her body shots. Thirdly, she needs someone to fulfill her hens night fantasies. In conclusion, our sexy male strippers and topless waiters will be sure to make your ladies night nothing short of amazing.</p>
</section>
<section class="row">
    <article class="slide-in">
        <h3>male strippers</h3>
        <h1>$250</h1>
        <p>15 minute routine</p>
        <button class="btn" href='#male-strippers'>choose a hunk</button>
    </article>
    <article class="slide-in">
        <h3>double trouble</h3>
        <h1>$450</h1>
        <p>2 guys for a 30 min show</p>
        <button class="btn" href='#male-strippers'>pick your sex</button>
    </article>
    <article class="slide-in ">
        <h3>topless waiters</h3>
        <h1>$100</h1>
        <p>2 hours minimum</p>
        <button class="btn" href='#male-strippers'>which abs</button>
    </article>
    <article class="slide-in ">
        <h3>life drawing</h3>
        <h1>$250</h1>
        <p>45 minutes of nude art</p>
        <button class="btn" href='#male-strippers'>pick your penis</button>
    </article>
</section>

<?php include('components/image-slider.php'); ?>

<?php get_footer(); ?>