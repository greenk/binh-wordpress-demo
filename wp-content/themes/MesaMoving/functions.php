<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

/** Add GO_Custom_Menu_Walker class */
require_once ( 'library/go-custom-menu-walker.php' );

/** Register GO Custom Side Menu */
require_once ( 'library/go-custom-side-menu.php' );

/** Register GO Custom Vertical Menu */
require_once ( 'library/go-custom-vertical-menu.php' );

/** Register GO Custom Social Widget */
require_once ( 'library/go-custom-social-widget.php' );

/** Register CMB2 library */
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/** Register CMB2 metabox (custom fields) for front page */
require_once ('library/go-mesa-front-page-additional-fields.php');

/** Register CMB2 metabox (custom fields) for pages */
require_once ('library/go-mesa-template-page-additional-fields.php');

/** Register CMB2 metabox (custom fields) for parent pages */
require_once ('library/go-mesa-parent-additional-fields.php');

/** Register CMB2 metabox (custom fields) for contact pages */
require_once ('library/go-mesa-contact-additional-fields.php');

/** Register filter for Gravity forms */
require_once ('library/go-gravity-form-filter.php');

/** Register cutomize color for TinyMCE plugin */
require_once ('library/go-mesa-tinymce-custom-color.php');

/** Register go-mesa theme customization */
require_once ('library/go-mesa-theme-customization.php');

/** Register GO Custom Testimonial Widget */
require_once ( 'library/go-custom-testimonial-widget.php' );

/** Register royal slider */
register_new_royalslider_files(1);

/** Register GO Gravity Form Import Entries */
require_once ( 'library/go-gravity-form-import-entries.php' );



