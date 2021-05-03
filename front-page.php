<?php 
    global $meta_description;
    $meta_description = "Australia's Best Male Strippers. Whether you're celebrating a bachelorette, birthday, or divorcé party, or even a girl's night out, it'll be totally epic!";
    get_header(); 
?> 
<section class='hero-img'>
    <?php 
        if( has_post_thumbnail() ): 
            echo get_the_post_thumbnail();
        endif; 
    ?>
</section>
<section class="slide-in">
    <h2 class="glow">sneak peak</h2>
    <iframe
			width="560"
			height="315"
            loading='lazy'
			src="https://www.youtube.com/embed/q-im8TsEQPw"
			srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{display:grid;place-items:center;height:100%;font-size:3rem;color:white;text-shadow:0 0 0.5em black}</style>
			<a href=https://www.youtube.com/embed/q-im8TsEQPw?autoplay=1>
				<img src=https://img.youtube.com/vi/q-im8TsEQPw/hqdefault.jpg alt='Have you had the Raw Muscle experience yet?'>
				<span>&#x25BA;</span>
			</a>"
			frameborder="0"
			allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
			allowfullscreen
			title="Raw Muscle trailer"
		></iframe>
</section>
<?php include('components/tour-dates.php'); ?>
<?php include('components/image-slider.php'); ?>
<?php get_footer(); ?>