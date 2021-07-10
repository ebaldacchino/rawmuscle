
<?php 
    global $title;
    global $page_heading;
?>
<div class="title__container flex-center flex-col">
    <?php
        if ($page_heading) {
            ?>
                <h1 class="no-margin-top"><?php echo $title; ?></h1>
            <?php
        } else {
            ?>
                <h2><?php echo $title; ?></h2>
            <?php
        }
    ?>

<div class="underline glow"></div>
</div>
