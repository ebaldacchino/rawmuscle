<section class="slider-section slide-in" id='tour-dates'>
    <h2 class="glow">tour dates</h2>
    
    <?php
        $args = array(
            'post_type' => 'event',
            'meta_key' => '_event_date', 
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => '_event_date',
                    'value' => date('YYmmdd'),
                    'compare' => '<='
                )
            )
        );
        $eventsData = [];
        $events = new WP_Query($args);

        if ($events->have_posts()) { 
          ?>

        

        <?php 
        $states = []; 
        while ($events->have_posts()) {
            $events->the_post();
            $state = get_post_meta(get_the_ID(), '_event_state', true); 
            $date = get_post_meta(get_the_ID(), '_event_date', true);
            
            if ( strtotime( $date ) > strtotime('-1 day') ) {
                array_push($states, get_post_meta(get_the_ID(), '_event_state', true ) );
            };
            
        };
        $states = array_unique($states);

        if (count( $states ) === 0) {
             ?>
                <p>Please refer to the official Raw Muscle Facebook page for a full list of our upcoming ladies nights!</p>
                    <a href="https://www.facebook.com/rawmuscle/events/" target="_blank" rel="noreferrer">
                        <button class="btn">see show dates</button>
                    </a>
            <?php
        } else {
            ?>
            <div class="tab">
                 <?php
            foreach ($states as $state) { ?>                
                <button style='text-transform: uppercase;'><?php echo $state ?></button>
                <?php
            } 
        ?>
                </div> 
                <?php
        }
         foreach ($states as $iterable_state) { ?> 
            <div class="events-container" data-state='<?php echo $iterable_state; ?>' style='display:none;'>
            <?php 
            while ($events->have_posts()) {
            $events->the_post();
                $state = get_post_meta(get_the_ID(), '_event_state', true); 
                $date = get_post_meta(get_the_ID(), '_event_date', true);


            if ($iterable_state === $state && strtotime( $date ) > strtotime('-1 day') ) { 
            ?>
               <div class="tour-listing" style='text-transform:capitalize;'>  

            <h5><?php
            $timestamp = strtotime($date); 
            
            echo date('j / n', $timestamp); 
            ?>
            </h5>

            <h5 style='margin: 0.5rem;'>
                <?php echo get_post_meta(get_the_ID(), '_event_town', true); ?>
            </h5>
        
            <a href="<?php echo get_post_meta(get_the_ID(), '_event_link', true); ?>" target="_blank" rel="noreferrer"><button class="btn">get tickets</button></a>
        </div>  
            <?php }} ?>
                </div>
            <?php } ?>
            <?php
 } else {
            ?>
                <p>Please refer to the official Raw Muscle Facebook page for a full list of our upcoming ladies nights!</p>
                    <a href="https://www.facebook.com/rawmuscle/events/" target="_blank" rel="noreferrer">
                        <button class="btn">see show dates</button>
                    </a>
            <?php

        };

        wp_reset_query();

        ?> 
</section>