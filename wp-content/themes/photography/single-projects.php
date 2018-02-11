<?php

/* Template Name: Project Single Page */

get_header();

?>

<?php while ( have_posts() ) : the_post(); ?>

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
			   					<h1>Portfolio Item Title</h1>
								<h2>
									A challenging visual design project for a large company.
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
                    $photos = get_field('gallery_repeater');

                    if (isset($photos) && $photos !== false) :
                ?>

				<div class="col-md-8">
                    <?php foreach ($photos as $row) : ?>
						<a href="<?=$row['image']['url']?>" class="image-popup img-portfolio-detail">
							<img src="<?=$row['image']['sizes']['large']?>" alt="<?=$row['image']['alt']?>" class="img-responsive">
						</a>
				    <?php endforeach; ?>
				</div>

			    <?php endif; ?>

				<div class="col-md-4 fh5co-project-detail">
					<h2 class="fh5co-project-title"><?=the_title()?></h2>
					<p><?=get_the_content()?></p>
				</div>
			</div>
		</div>
	</div><!-- END container-wrap -->

	<?php endwhile; ?>

<?php get_footer(); ?>