<?php get_header(); ?>

	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">

				<?php 

					$slider = get_field('slider');

                        if ($slider): ?>
                     
						<ul class="slides">

							<?php foreach($slider as $item): ?>

						   	<li style="background-image: url(<?=$item['image']['sizes']['slider']?>);" >
						   		<div class="overlay-gradient"></div>
						   		<div class="container-fluid">
						   			<div class="row">
							   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 slider-text">
							   				<div class="slider-text-inner">
							   					<h1><?=$item['title']?></h1>
												<h2><?=$item['subtitle']?></h2>
												<p>
													<a class="btn btn-primary btn-learn" href="<?=$item['slider_button']?>">Learn More</a>
												</p>
							   				</div>
							   			</div>
							   		</div>
						   		</div>
						   	</li>
						   	<?php endforeach; ?>
					  	</ul>

                <?php endif; ?>
		  	</div>
		</aside>

		<div id="fh5co-services">
			<div class="row">

				<?php

                    $services = get_field('services');
                        
                    if ($services) : ?>

				    <?php foreach ($services as $service) : ?>

					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="icon-<?=$service['service_icon']?>"></i>
							</span>
							<div class="desc">
								<h3><a href="#"><?=$service['service_title']?></a></h3>
								<p><?=$service['service_content']?></p>
							</div>
						</div>
					</div>

				<?php endforeach; ?>

				<?php endif; ?>

			</div>
		</div>

		<div id="fh5co-work" class="fh5co-light-grey">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Work</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<?php

				    $query = new WP_Query([
					    'post_type' => 'projects',
					    'orderby' => 'rand',
					    'posts_per_page' => 3
					]);

					if ( $query->have_posts() ):

						while ( $query->have_posts() ) :
						
						$query->the_post();

						$featured = get_field('featured_image');
						$default = get_field('default_image', 'option');
				?>

				<div class="col-md-4 text-center animate-box">
					<a href="<?=get_permalink()?>" class="work"  style="background-image: url(<?=(!empty($featured)) ? $featured['url'] : $default['url'] ?>);">
						<div class="desc">
							<h3><?=the_title()?></h3>

							<?php $terms = wp_get_post_terms( $post->ID,'project-categories' ); ?>

							<span><?=$terms[0]->name?></span>
						</div>
					</a>
				</div>

				<?php endwhile; ?>
		        <?php endif; ?>

			</div>
		</div>

		<div id="fh5co-counter" class="fh5co-counters">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center animate-box">
					<p>We have a fun facts far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
			</div>
		</div>

		<div id="fh5co-blog" class="blog-flex">

		<?php

			$post_object = get_field('featured_post','option');

			if( $post_object ):

				// override $post
				$post = $post_object;
				setup_postdata( $post );

				$featured = get_field('featured_image');
				$default = get_field('default_image', 'option');
		?>
			
			<div class="featured-blog" style="background-image: url(<?=(!empty($featured)) ? $featured['sizes']['large'] : $default['url'] ?>);">
				<div class="desc-t">
					<div class="desc-tc">
						<span class="featured-head">Featured Post</span>
						<h3><a href="<?=get_permalink()?>"><?=the_title()?></a></h3>
						<span><a href="<?=get_permalink()?>" class="read-button">Learn More</a></span>
					</div>
				</div>
			</div>

		<?php wp_reset_postdata(); ?>

		<?php endif; ?>

			<div class="blog-entry fh5co-light-grey">
				<div class="row animate-box">
					<div class="col-md-12">
						<h2>Latest Posts</h2>
					</div>
				</div>

				<?php

					$query = new WP_Query([
					    'post_type' => 'post',
					    'order_by' => 'date',
					    'order' => DESC,
					    'posts_per_page' => 3
					]);

					if ( $query->have_posts() ): ?>

				<div class="row">

                    <?php
						while ( $query->have_posts() ) :
							    
						$query->the_post();
					?>

					<div class="col-md-12 animate-box">
						<a href="<?=get_permalink()?>" class="blog-post">

							<?php $featured = get_field('featured_image'); ?>
					        <?php $default = get_field('default_image', 'option'); ?>

							<span class="img" style="background-image: url(<?=(!empty($featured)) ? $featured['sizes']['thumbnail'] : $default['url'] ?>);">
								
							</span>
							<div class="desc">
								<h3><?=the_title()?></h3>
								<?php $cat = get_the_category(); ?>
								<span class="cat"><?=$cat[0]->name?></span>
							</div>
						</a>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- END container-wrap -->

<?php  get_footer(); ?>