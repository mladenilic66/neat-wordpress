<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 */
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?=custom_title()?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">

	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/animate.css' ?>">
	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/icomoon.css' ?>">
	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/bootstrap.css' ?>">
	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/magnific-popup.css' ?>">
	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/flexslider.css' ?>">
	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/style.css' ?>">
	<script src="<?= get_template_directory_uri() . '/js/modernizr-2.6.2.min.js' ?>"></script>

	<?php wp_head(); ?>
</head>
<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container-wrap">
			<div class="top-menu">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="<?=get_home_url()?>">Neat</a></div>
					</div>

					<?php wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'container' => 'div',
                        'menu_id' => 'topnav',
                        'menu_class' => 'col-xs-10 text-right menu-1'
                    ]) ?>

				</div>
			</div>
		</div>
	</nav>