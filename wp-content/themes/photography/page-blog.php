<?php

/* Template Name: Blog Page */

get_header();

?>

<?php $default = get_field('default_image', 'option'); ?>

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

		<div id="fh5co-blog">
			<div class="row">

			<?php

				$query = new WP_Query([
				    'post_type' => 'post',
                    'orderby' => 'date',
				    'order' => DESC
				]);

				if ( $query->have_posts() ):

				    while ( $query->have_posts() ):
				    
				    $query->the_post(); ?>

				<div class="col-md-4">
					<div class="fh5co-blog animate-box">

						<?php $featured = get_field('featured_image'); ?>

						<a href="<?=get_permalink()?>" class="blog-bg" style="background-image: url(<?=(!empty($featured)) ? $featured['url'] : $default['url'] ?>);"></a>
						<div class="blog-text">
							<span class="posted_on"><?=date_short(get_the_date(),"M jS Y")?></span>
							<h3><a href="<?=get_permalink()?>"><?=the_title()?></a></h3>
							<p><?=short_text(get_the_content(),80, "...")?></p>
							<ul class="stuff">
								<!-- <li><i class="icon-heart3"></i>249</li> -->
								<!-- <li><i class="icon-eye2"></i>1,308</li> -->
								<li><a href="<?=get_permalink()?>">Read More<i class="icon-arrow-right22"></i></a></li>
							</ul>
						</div> 
					</div>
				</div>

				<?php endwhile; ?>
			    <?php endif; ?>

				<?php wp_reset_postdata(); ?>

			</div>
		</div>
	</div><!-- END container-wrap -->

<?php get_footer(); ?>