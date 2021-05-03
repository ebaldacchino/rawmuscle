<?php 
    global $meta_description;
    $meta_description = "Whether you're in Shepparton or Auckland, Australia's award winning male strippers will bring their award winning show to you!";
    get_header(); 
?> 
<h1 class="glow">about the show</h1> 
<section class="info">
    <p>The perfect girls night out. Winners of the X-Awards 2019 Male Strip Show Of The Year. In other words, we pull all the stops to make your night amazing. It doesn’t matter whether you’re celebrating a hens night, birthday party, divorce party or simply a ladies night. Our team of male strippers are coming for you.</p>
    <p>The men of Raw Muscle tour Australia and New Zealand wide. Consequently, our hot hunks are travelling everywhere from Perth to Christchurch. You can run, but you can’t hide!</p>
</section>
<section class="row">
    <article class="slide-in on-screen">
        <h3>general</h3>
        <h1>$35</h1>
        <p>Standing tickets</p>
        <button class="btn" href='#tour-dates'>pick a show</button>
    </article>
    <article class="slide-in on-screen">
        <h3>bronze</h3>
        <h1>$40</h1>
        <p>3rd and 4th row seating</p>
        <button class="btn" href='#tour-dates'>pick a show</button
        >
    </article>
    <article class="slide-in on-screen">
        <h3>silver</h3>
        <h1>$50</h1>
        <p>2nd row seating</p>
        <button class="btn" href='#tour-dates'>pick a show</button>
    </article>
    <article class="slide-in on-screen">
        <h3>gold</h3>
        <h1>$60</h1>
        <p>1st row seating</p>
        <button class="btn" href='#tour-dates'>pick a show</button>
    </article>
</section>
<?php include('components/tour-dates.php'); ?>
<?php include('components/image-slider.php'); ?>
<?php get_footer(); ?>