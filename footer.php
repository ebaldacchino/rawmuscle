  </main>
  <footer>
    <div class="slide-in">
      <?php include('components/social-links.php'); ?>
        <nav>
            <a href="<?php echo site_url('/blog/'); ?>"
            <?php if (get_post_type() == 'post') echo 'class="active"' ?>
            >blog</a> | 
            <a href="<?php echo site_url('/contact/'); ?>"
            <?php if (is_page('contact')) echo 'class="active"' ?>
            >contact</a>
        </nav>
        <p>Copyright © <span id='date-year'></span> Raw Muscle | Website by <a href="https://ebaldacchino.netlify.app" target="_blank" rel="noreferrer">EB Web Solutions</a></p>
    </div>
  </footer>
    <i class="fas fa-arrow-circle-up scrollTop" style="display: none;"></i> 
  <?php wp_footer(); ?>
</body>
</html>