<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body class="fullWidth" <?php //body_class('fullWidth'); ?>>

	<!-- Placeholder for spinner -->
	<!--
	<div id="loading" class="loadSpinner">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_four"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_one"></div>
			</div>
		</div>
	</div>
	-->

	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<!-- Add animation -->
	<div class="animsition">

	<header id="masthead" class="site-header relPosition" role="banner">
		<!--
		<div class="title-bar" data-responsive-toggle="site-navigation">
			<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<ul class="menu">
					<li class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
				</ul>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
		-->

		<div id="autoHide" class="headerWrapper fixedHeader bgWhite">
			<div class="row stretched">
				<div class="navWrapper clearfix">
					<div class="small-12 medium-12 large-4 columns">
						<!-- Logo Area -->
						<div id="logo">
							<a href="index.html"><img src="#" alt="Mesa Moving & Storage" /> </a>
						</div>
					</div>

					<div class="small-12 medium-12 large-8 columns noPaddingRight">
						<!-- Mega Menu Starts -->
						<div id="mobileMenuTrigger" class="hide-for-large-up"><i class="icon-menu"></i></div>

						<nav id="primaryMenu">
							<ul class="clearfix">
								<li><a href="#">Our Services</a>
									<ul>
										<li class="dropDown"><a href="#"> Our Services 1</a>
											<ul>
												<li><a href="#"></a> Services 1</li>
												<li><a href="#"></a> Services 2</li>
											</ul>
										</li>
										<li><a href="#"> Our Services 2</a> </li>
									</ul>
								</li>
								<li><a href="#">Drive4Mesa</a> </li>
								<li><a href="#"> Our Stories</a>
									<ul>
										<li><a href="#">2 Column Grid</a></li>
										<li><a href="#">2 Column Grid Full</a></li>
										<li><a href="#">3 Column Grid</a></li>
									</ul>
								</li>
								<li ><a href="#"> Blog</a> </li>
							</ul> <!-- end of ul clearfix -->
						</nav>
						<!-- End of MegaMenu -->
					</div>
				</div>
			</div>
		</div>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
