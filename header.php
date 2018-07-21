<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CCPS
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ccps' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar fixed-top navbar-expand-xl navbar-light scrolling-navbar justify-content-between">
			<div class="container">
				<div class="navbar-brand">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$ccps_description = get_bloginfo( 'description', 'display' );
					if ( $ccps_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $ccps_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'social-menu-1',
					'container'			=> 'div',
					'container_class'	=> 'social-menu-container',
					'menu_class'		=> 'd-flex list-unstyled ml-auto',
				) ); ?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			<!-- <nav id="site-navigation" class="main-navigation"> -->
				<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php // esc_html_e( 'Primary Menu', 'ccps' ); ?></button> -->
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'menu-1',
					'container_id'		=> 'navbarSupportedContent',
					'container_class'	=> 'collapse navbar-collapse flex-grow-0',
					'container'			=> 'div',
					'menu_class'		=> 'navbar-nav ml-0',
					'walker'			=> new understrap_WP_Bootstrap_Navwalker(),
				) ); ?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<?php if ( is_front_page() ) { ?>
		<div id="front-page-carousel"></div>
	<?php } ?>
	
	<div id="content" class="site-content container">
