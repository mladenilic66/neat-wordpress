<?php

/* Template Name: Projects Page */

get_header();

?>

	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
				
				<?php $hero = get_field('hero_image', 'option'); ?>

			   	<li style="background-image: url(<?=$hero['url']?>);">
			   		<div class="overlay-gradient"></div>
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
			   	</li>		   	
			  	</ul>
		  	</div>
		</aside>

		<div id="fh5co-work">
			<div class="row">
			<?php

				$query = new WP_Query([
				    'post_type' => 'projects',
					'order_by' => 'date',
					'order' => DESC,
					'posts_per_page' => 6
				]);

				$default = get_field('default_image', 'option'); 

				if ( $query->have_posts() ):

				    while ( $query->have_posts() ):
				    
				    $query->the_post(); ?>

				<div class="col-md-4 text-center animate-box">

					<?php $featured = get_field('featured_image'); ?>

					<a href="<?=get_permalink()?>" class="work" style="background-image: url(<?=(!empty($featured)) ? $featured['url'] : $default['url'] ?>);">
						<div class="desc">
							<h3><?=the_title()?></h3>

							<?php $terms = wp_get_post_terms( $post->ID,'project-categories' ); ?>

							<span><?=$terms[0]->name?></span>
						</div>
					</a>
				</div>

				<?php endwhile; ?>
			    <?php endif; ?>

				<?php wp_reset_postdata(); ?>

			</div>
		</div>
	</div><!-- END container-wrap -->

<?php get_footer(); ?>