<?php

/* Template Name: Blog Single Page */

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
			   					<h1>We WON!! IOB Muxx Award!</h1>
								<h2>
									Thank you everyone who helped in this yourney!
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
				<div class="col-md-8 col-md-offset-2 fh5co-project-detail">
					<h2><?=the_title()?></h2>
					<p><?=get_the_content()?></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Gallery</h2>
				</div>

				<?php
                    $photos = get_field('gallery_repeater');

                    if (isset($photos) && $photos !== false) :
                ?>

				<div class="col-md-8 col-md-offset-2">
					<?php foreach ($photos as $row) : ?>
						<a href="<?=$row['image']['url']?>" class="col-md-2 image-popup img-portfolio-detail">
							<img src="<?=$row['image']['sizes']['thumbnail']?>" alt="<?=$row['image']['alt']?>" class="img-responsive">
						</a>
				    <?php endforeach; ?>
				</div>
				
			    <?php endif; ?>

			</div>
		</div>
	</div><!-- END container-wrap -->

    <?php endwhile; ?>

<?php get_footer(); ?>