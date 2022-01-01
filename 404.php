<?php 
    global $meta_description;
    $meta_description = "Sorry ladies, this appears to be a dead link. Please go to our home page, and navigate from there!";
    get_header(); 
?> 
<?php 
    global $title;
    global $page_heading;
    $title='page not found';
    $page_heading=true;
    include 'components/title.php'; 
?>
<p>Use the menu above to get out of here, or checkout the man candy below!!!</p>
<?php include('components/image-slider.php'); ?>
<?php get_footer(); ?>