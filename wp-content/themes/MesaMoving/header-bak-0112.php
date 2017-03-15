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

		<script src="https://use.typekit.net/eqh0qtx.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>

		<?php wp_head(); ?>
	</head>
	<body <?php //body_class('fullWidth'); ?>>

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
	<div id="body-container" class="animsition">

	<header id="masthead" class="site-header " role="banner" >

		<div class="top-bar-container" data-sticky-container>
			<div class="sticky" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: small;">
				<div class="top-bar">
					<div class="row column">
						<div class="top-bar-left">
							<ul class="dropdown menu" data-dropdown-menu>
								<li class="menu-text">Site Title</li>
								<li class="has-submenu">
									<a href="#">One</a>
									<ul class="submenu menu vertical" data-submenu>
										<li><a href="#">One</a></li>
										<li><a href="#">Two</a></li>
										<li><a href="#">Three</a></li>
									</ul>
								</li>
								<li><a href="#">Two</a></li>
								<li><a href="#">Three</a></li>
							</ul>
						</div>
						<div class="top-bar-right">
							<ul class="menu">
								<li>
									<input type="search" placeholder="Search">
								</li>
								<li>
									<button type="button" class="button">Search</button>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="siteNavStickyContainer" data-sticky-container>
			<div id="siteNavStickyWrap" class="sticky" data-sticky data-sticky-on="small" data-anchor="body-container" data-margin-top="0" >

				<div class="title-bar " data-responsive-toggle="site-navigation">
					<div class="row " data-equalizer data-equalize-on="small">
						<div class="small-2 columns menu-toggle-container" data-equalizer-watch>
<!--					<button class="menu-icon menu-toggle-button" type="button" data-toggle="mobile-menu"></button>-->
							<button class="menu-toggle-button" type="button" data-toggle="mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
						</div>
						<div class="small-10 columns" data-equalizer-watch>
							<div class="title-bar-title">
								<div id="logo" class="go-mesa-logo" >
									<a href="/"><img src="<?php echo get_theme_file_uri( '/assets/images/logo.png' ); ?>" alt="Mesa Moving & Storage"></a>
								</div>
<!--								<a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a>-->
							</div>
						</div>

					</div>
				</div>


				<nav id="site-navigation" class="main-navigation top-bar bg-white " role="navigation" >
					<div class="row" >
						<div class="small-12 medium-12 large-4 columns">

							<div class="top-bar-left">
								<!--
								<ul class="menu">
									<li class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
								</ul>
								-->

								<!-- Logo Area -->
								<div id="logo" class="go-mesa-logo">
									<a href="/"><img src="<?php echo get_theme_file_uri( '/assets/images/logo.png' ); ?>" alt="Mesa Moving & Storage"></a>
								</div>

							</div>
						</div>
						<div class="small-12 medium-12 large-8 columns">

							<div class="top-bar-right bg-white">

								<div class="pull-right contact-text-navigation hide-for-small-only">
									<a href="/contact-us" class="button small button-yellow contact-text-navigation-button">Get a Free Quote</a>
									Or Call <a href="tel:<?php echo get_theme_mod("mesa_contact_phone") ?>"><?php
											echo get_theme_mod("mesa_contact_phone");
										?></a>
								</div>

								<?php foundationpress_top_bar_r(); ?>

								<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
									<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</nav>

			</div>
		</div>

	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
