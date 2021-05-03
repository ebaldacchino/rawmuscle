<?php 
    global $meta_description;
    $meta_description = "Whether you want tickets to our award-winning male strip show, a male stripper or topless waiter to come to you, or you have ask a couple cheeky questions, get in touch!";
    get_header(); 
?> 
<h1 class="glow">get in touch</h1> 
<section class="no-margin-top">
    <p class="text-center">You're more than welcome to ask 'anything'!</p>
    <form class="form" method="POST" novalidate>
        <input id='name' type="text" name="name" placeholder="Name">
        <input id='email' type="email" name="email" placeholder="Email">
        <input id='phone' type="phone" name="phone" placeholder="Phone">
        <textarea name="message" id='message'  placeholder="Please type your message here..." rows="5"></textarea>
        <!-- <label for="subscribe">
            <input type="checkbox" name="subscribe" value="false"> I would like to subscribe to your mailing list</label> -->
        <button class="btn">send</button>
    </form>
</section>
<?php include('components/submitted-form.php'); ?>
<?php get_footer(); ?>