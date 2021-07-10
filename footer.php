  </main>
  <footer>
    <div class="footer-container slide-in"> 
      <!-- 
      <?php 
        global $page_heading;
        global $title; 
        $title='subscribe now';
        $page_heading=false;
        include 'components/title.php' 
      ?>
      <p class="text-center">
        To hear about the next show near you!
      </p>
      <form class="flex-center" novalidate>
        <div class="form-control">
          <input type="email" name="email" placeholder="Email">
          <button class="btn">subscribe</button>
        </div>
      </form> -->
      <?php 
        global $page_heading;
        global $title; 
        $title='partners';
        $page_heading=false;
        include 'components/title.php' 
      ?>
      <div class="logos-container flex-center">
          <a href="https://www.myunikorn.com.au" target="_blank" rel="noreferrer">
            <img src="/wp-content/themes/rawmuscle/assets/img/myunikorn.svg" alt="My Unikorn Logo">
          </a>
          <a href="https://www.rawtoyz.com.au" target="_blank" rel="noreferrer">
            <img src="/wp-content/themes/rawmuscle/assets/img/raw-toyz.svg" alt="Raw Toyz Logo">
          </a>
      </div> 

      <?php include('components/social-links.php'); ?> 
        <nav class="text-center">
            <a href="<?php echo site_url('/blog/'); ?>"
            <?php if (get_post_type() == 'post') echo 'class="active"' ?>
            >blog</a> | 
            <a href="<?php echo site_url('/contact/'); ?>"
            <?php if (is_page('contact')) echo 'class="active"' ?>
            >contact</a>
        </nav>
       
        <p class="text-center">Copyright © <span id='date-year'></span> Raw Muscle | Website by <a href="https://ebaldacchino.netlify.app" target="_blank" rel="noreferrer">EB Web Solutions</a></p>
    </div>
  </footer>
    <i class="fas fa-arrow-circle-up scrollTop" style="display: none;"></i> 
  <?php wp_footer(); ?>
</body>
</html>