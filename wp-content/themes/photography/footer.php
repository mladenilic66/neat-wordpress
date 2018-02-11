<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 */

?>

	<div class="container-wrap">
		<footer id="fh5co-footer" role="contentinfo">
			<div class="row">
				<?php dynamic_sidebar( 'footer_1' ); ?>

				<div class="col-md-3 col-md-push-1">
					<h4>Latest Posts</h4>

                        <?php

						$query = new WP_Query([
						    'post_type' => 'post',
						    'order_by' => 'date',
						    'order' => DESC,
						    'posts_per_page' => 5
						]);

						if ( $query->have_posts() ): ?>

					<ul class="fh5co-footer-links">
						<?php

							while ( $query->have_posts() ) :
							    
							$query->the_post(); ?>

						<li><a href="<?=get_permalink()?>"><?=the_title()?></a></li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>

					<?php wp_reset_postdata(); ?>
				</div>


				<div class="col-md-3 col-md-push-1">
					<h4>Links</h4>
					<?php wp_nav_menu([
	                    'theme_location' => 'footer-menu',
	                    'container' => 'ul',
	                    'menu_class' => 'fh5co-footer-links'
	                ]) ?>
				</div>


				<div class="col-md-3">
					<h4>Contact Information</h4>
					<ul class="fh5co-footer-links">
					    <li><?=get_field('contact_info','option')?></li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; Cathy Griffin, Photographer.</small> 
						<small class="block">Designed by <a href="#" target="_blank">Studio 18</a></small>
					</p>
					<p>
					<?php

                        $social = get_field('social_links', 'option');
                        
                        if ($social) : ?>

						<ul class="fh5co-social-icons">
							<?php foreach ($social as $item) : ?>

							<li><a href="<?=$item['link']?>"><i class="icon-<?=$item['icon']?>"></i></a></li>

							<?php endforeach; ?>
						</ul>

					<?php endif; ?>

					</p>
				</div>
			</div>
		</footer>
	</div><!-- END container-wrap -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<script src="<?= get_template_directory_uri() . '/js/jquery.min.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/jquery.easing.1.3.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/bootstrap.min.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/jquery.waypoints.min.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/jquery.flexslider-min.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/jquery.magnific-popup.min.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/magnific-popup-options.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/jquery.min.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/jquery.min.js' ?>"></script>
	<script src="<?= get_template_directory_uri() . '/js/main.js' ?>"></script>

	<?php wp_footer(); ?>
</body>
</html>
