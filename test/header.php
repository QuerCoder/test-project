<!DOCTYPE html>
<html>
<head lang="ru">
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body>
<header id="header">
	<div class="header-top container d-sm-flex flex-wrap justify-content-sm-between h-100 align-items-center">
		<div class="b-logo py-1 my-sm-auto text-center">
			<a href="/" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>"></a>
		</div>
		<div class="b-phone py-1 my-sm-auto text-center">
			<a href="tel:<?php echo preg_replace('~[^0-9+]~', '', get_theme_mod('phone', '+380 689 89 90')); ?>" ><?php echo get_theme_mod('phone', '+380 689 89 90'); ?></a>
		</div>
	</div>
	<!-- end header-top -->
	<nav class="b-navigation navbar navbar-expand-lg navbar-light">
		<div class="container px-3 px-lg-2">
			<a class="navbar-brand d-lg-none" href="#">Навигация</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnav" aria-controls="topnav" aria-expanded="false" aria-label="Навигация">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="topnav">

				<?php wp_nav_menu( array( 
					'theme_location' 	=> 'header-menu', 
					'container' 			=> '',   
					'menu_class'			=> 'navbar-nav mr-auto',
				) ); ?>

				<?php if (!dynamic_sidebar('Search Widget')) :?> <?php endif;?>

			</div>
		</div>
	</nav>
</header>
<!-- end header -->

<?php get_template_part('layouts/carousel'); ?>