<nav class="page-links">
    <a href="<?php echo site_url('/'); ?>"
    <?php if (is_front_page()) echo 'class="active"' ?>
    >home</a>
    <a href="<?php echo site_url('/shows/'); ?>"
    <?php if (is_page('shows')) echo 'class="active"' ?>
    >the show</a>
    <a href="<?php echo site_url('/privates/'); ?>"
    <?php if (is_page('privates')) echo 'class="active"' ?>
    >home visits</a>
    <a href="https://www.rawtoyz.com.au" target="_blank" rel="noreferrer">e-store</a>
    <a href="<?php echo site_url('/contact/'); ?>"
    <?php if (is_page('contact')) echo 'class="active"' ?>
    >contact us</a>
</nav>