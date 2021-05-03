<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php 
      if (is_front_page()) {
        bloginfo('name'); echo " | "; bloginfo('description');
      } elseif (is_archive()) {
        echo post_type_archive_title(); echo " | "; bloginfo('name');
      } elseif (is_single()) {
        the_title(); echo " | "; bloginfo('name');
      } elseif (is_404()) {
        echo "Page Not Found | "; bloginfo('name');
      } elseif (is_home()) {
        echo "Blog | "; bloginfo('name');
      } else {
        the_title(); echo " | "; bloginfo('name');
      } 
    ?>
     </title>
    
    <meta name='description' content="<?php 
      global $meta_description;
      echo $meta_description;
    ?>" />  
    <?php wp_head(); ?>
</head>
<body>
<nav class="navbar">  
    <?php echo get_custom_logo(); ?> 
  <article class="menu-items"> 
    <?php include('components/nav-links.php'); ?>
    <?php include('components/social-links.php'); ?>
  </article>
  <button id="menu-icon" aria-label="Menu Icon">
    <div class="menu-icon-bar1"></div>
    <div class="menu-icon-bar2"></div>
    <div class="menu-icon-bar3"></div>
  </button>
</nav>    
<aside>
    <article> 
      <?php include('components/nav-links.php'); ?>
      <?php include('components/social-links.php'); ?>
    </article>
  </aside>
<main class="page-transition arriving">

  

  