<section class="form-submitted-bg" onsubmit='toggleSubmittedForm()'>
    <article class="form form-submitted-container">
        <?php  
            global $title;
            global $page_heading;
            $page_heading = false;
            $title = 'success';
            include 'title.php';  
        ?>
        <i class="fas fa-check-circle"></i>
        <p>Thank you for reaching out. We'll be in touch soon!</p>
        <button class="submit-btn btn">
        ok
        </button>
    </article>
</section>