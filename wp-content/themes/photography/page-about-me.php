<?php

/* Template Name: About Page */

get_header();

?>

	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">

				<?php $hero = get_field('hero_image', 'option'); ?>

			   	<li style="background-image: url(<?=$hero['url']?>);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 slider-text slider-text-bg">
				   				<div class="slider-text-inner text-center">
				   					<h1><?=get_field('hero_title')?></h1>
									<h2>
										<?=get_field('hero_content')?>
									</h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>		   	
			  	</ul>
		  	</div>
		</aside>		
		<div id="fh5co-about">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center heading-section">
					<h3><?=get_field('experience', 'option')?></h3>
					<p><?=get_field('experience_content', 'option')?></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center animate-box">

					<?php $my_hero = get_field('my_hero_image', 'option'); ?>

					<p><img src="<?=$my_hero['url']?>" alt="Free HTML5 Bootstrap Template" class="img-responsive"></p>
				</div>
				<div class="col-md-8 col-md-offset-2 text-center animate-box">
					<div class="about-desc">
						<h3><?=get_field('who_i_am', 'option')?></h3>
						<p><?=get_field('info', 'option')?></p>
					</div>
				</div>
			</div>
		</div>
	</div><!-- END container-wrap -->

<?php get_footer(); ?>