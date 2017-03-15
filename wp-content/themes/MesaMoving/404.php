<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/mesa-featured-image' ); ?>

	<section class="mesa-main-content" role="main">

		<?php do_action( 'foundationpress_before_content' ); ?>

		<div class="row mesa-main-content-area" id="" >


			<div class="small-12 medium-9 medium-push-3 columns">

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<header>
						<h1 class="entry-title"><?php _e( 'File Not Found', 'foundationpress' ); ?></h1>
					</header>
					<div class="entry-content">
						<div class="error">
							<p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'foundationpress' ); ?></p>
						</div>
						<p><?php _e( 'Please try the following:', 'foundationpress' ); ?></p>
						<ul>
							<li><?php _e( 'Check your spelling', 'foundationpress' ); ?></li>
							<li><?php printf( __( 'Return to the <a href="%s">home page</a>', 'foundationpress' ), home_url() ); ?></li>
							<li><?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'foundationpress' ); ?></li>
						</ul>
					</div>
				</article>

			</div>

			<div class="small-12 medium-3 medium-pull-9 columns mesa-side-column">
				<?php get_sidebar(); ?>

			</div>

			<?php do_action( 'foundationpress_after_content' ); ?>


		</div>
	</section>
	<div class="clearfix"></div>

<?php

$bottom_cta_description = get_post_meta( get_the_ID(), 'go_mesa_bottom_cta_description', true );
$bottom_cta_button_text = get_post_meta( get_the_ID(), 'go_mesa_bottom_cta_button_text', true );
$bottom_cta_button_link = get_post_meta( get_the_ID(), 'go_mesa_bottom_cta_button_link', true );

$bottom_custom_cta_flag = get_post_meta( get_the_ID(), 'go_mesa_bottom_cta_customize', true);

?>

<?php if(($bottom_custom_cta_flag == 2) && $bottom_cta_description && $bottom_cta_button_text && $bottom_cta_button_link): ?>

	<section class="call-to-action">
		<div class="row text-center">
			<div class="small-12 columns">
				<p><?php echo esc_html($bottom_cta_description); ?></p>
				<a href="<?php echo esc_url($bottom_cta_button_link) ?>" class="button button-yellow"><?php echo esc_html($bottom_cta_button_text); ?></a>
			</div>
		</div>
	</section>
<?php elseif($bottom_custom_cta_flag == 1) : ?>

<?php else: ?>

	<?php get_template_part( 'template-parts/mesa-cta' ); ?>

<?php endif; ?>

<?php get_footer();
