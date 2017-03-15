<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/mesa-featured-image' ); ?>

<section class="mesa-main-content" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>


	<div id="" class="row mesa-main-content-area" >

		<div class="small-12 medium-9 medium-push-3 columns">

			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php foundationpress_entry_meta(); ?>
					</header>
					<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
					<footer>
						<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
						<p><?php the_tags(); ?></p>
					</footer>
					<?php the_post_navigation(); ?>
					<?php do_action( 'foundationpress_post_before_comments' ); ?>
					<?php comments_template(); ?>
					<?php do_action( 'foundationpress_post_after_comments' ); ?>
				</article>
			<?php endwhile;?>

		</div>

		<div class="small-12 medium-3 medium-pull-9 columns mesa-side-column">
			<?php get_sidebar(); ?>

		</div>

		<?php do_action( 'foundationpress_after_content' ); ?>

	</div>

</section>
	<div class="clearfix"></div>

<?php
$locations = get_post_meta( get_the_ID(), 'go_mesa_locations_group', true );

if (count($locations)>0):
	?>
	<section class="locations">
		<!-- 4 columns with background pictures -->
		<div class="expanded row small-collapse small-up-1 medium-up-2 large-up-4">

			<?php foreach((array) $locations as $location): ?>

				<div class="column">
					<a class="location-container" href="<?php echo esc_url($location['location_url']); ?>">
						<div class="location-content">
							<h3><?php echo esc_html($location['name']); ?></h3>
						</div>
						<img src="<?php echo esc_html($location['image']); ?>" alt="<?php echo esc_html($location['name']); ?>" />
						<div class="image-overlay"></div>
					</a>
				</div>

			<?php endforeach;

			?>

		</div>
	</section>
<?php endif; ?>

<?php

$here_to_help_title = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_extension_section_title', true );
$here_to_help_text = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_extension_section_text', true );
$here_to_help_img = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_extension_section_image', true );

$here_to_help_flag = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_extension_section_customize_CTA', true );

?>
<?php if ($here_to_help_flag == 2 && $here_to_help_img && $here_to_help_title): ?>

	<section class="here-to-help">

		<div class="row expanded" data-equalizer>
			<div class="small-12 medium-8 columns bg-mesa here-to-help-content" data-equalizer-watch>
				<div class="row">
					<div class="medium-offset-1 medium-11 columns text-center">
						<h2 class="particular-service-content-title"><?php echo esc_html($here_to_help_title); ?></h2>

						<?php echo wpautop($here_to_help_text); ?>

					</div>

				</div>
			</div>
			<div class="small-12 medium-4 columns mesa-side-background" data-equalizer-watch
				 data-interchange="[<?php echo $here_to_help_img; ?>, small],">

			</div>
		</div>
	</section>

<?php elseif($here_to_help_flag == 1) : ?>

<?php else: ?>

	<?php get_template_part( 'template-parts/mesa-cta-here-to-help' ); ?>

<?php endif; ?>



<?php
$complimentary_left_text = get_post_meta( get_the_ID(), 'go_mesa_complimentary_section_left_text', true );
$complimentary_right_text = get_post_meta( get_the_ID(), 'go_mesa_complimentary_section_right_text', true );

$complimentary_flag = get_post_meta( get_the_ID(), 'go_mesa_complimentary_section_flag', true );
?>

<?php if($complimentary_flag == 2 && $complimentary_right_text): ?>
	<section class="complimentary-updater-services">

		<div class="row expanded data-equalizer">
			<div class="small-12 medium-7 columns complimentary-updater-content-left" data-equalizer-watch>
				<div class="row">
					<div class="medium-offset-1 medium-11 columns text-center">

						<?php echo wpautop($complimentary_left_text); ?>

					</div>

				</div>
			</div>
			<div class="small-12 medium-5 columns complimentary-updater-content-right" data-equalizer-watch>
				<?php echo wpautop($complimentary_right_text); ?>
			</div>

		</div>

	</section>
<?php elseif($complimentary_flag == 1) : ?>

<?php else: ?>
	<?php get_template_part( 'template-parts/mesa-complimentary' ); ?>
<?php endif; ?>



<?php

$mvh_description = get_post_meta( get_the_ID(), 'go_mesa_move_for_hunger_description', true );
$mvh_title = get_post_meta( get_the_ID(), 'go_mesa_move_for_hunger_title', true );
$mvh_link = get_post_meta( get_the_ID(), 'go_mesa_move_for_hunger_url', true );
$mvh_image = get_post_meta( get_the_ID(), 'go_mesa_move_for_hunger_image', true );

$mvh_flag = get_post_meta( get_the_ID(), 'go_mesa_move_for_hunger_customize_MFH', true );

?>

<?php if( ($mvh_flag == 2) && $mvh_description && $mvh_title && $mvh_link && $mvh_image): ?>
	<section class="">
		<div class="row expanded move-for-hunger " data-equalizer>
			<div class="small-12 medium-4 columns mesa-side-background hide-for-small-only" data-equalizer-watch
				 data-interchange="[<?php echo $mvh_image; ?>, small],">

			</div>
			<div class="small-12 medium-8 columns bg-mesa-secondary mvh-content-container hide-for-small-only" data-equalizer-watch>
				<div class="row">
					<div class="medium-offset-1 medium-11 columns">
						<h2 class=""><?php echo esc_html($mvh_title) ?></h2>
						<div class="mvh-content">
							<?php echo wpautop($mvh_description); ?>
						</div>
						<a class="button button-yellow particular-service-cta-button" href="<?php echo esc_url($mvh_link); ?>"> Learn More </a>
					</div>

				</div>
			</div>

		</div>
	</section>
	<?php else: if($mvh_flag == 1): ?>

		<?php else: ?>
			<?php get_template_part( 'template-parts/mesa-move-for-hunger' ); ?>
		<?php endif; ?>
<?php endif; ?>



<?php

$bottom_cta_description = get_post_meta( get_the_ID(), 'go_mesa_bottom_cta_description', true );
$bottom_cta_button_text = get_post_meta( get_the_ID(), 'go_mesa_bottom_cta_button_text', true );
$bottom_cta_button_link = get_post_meta( get_the_ID(), 'go_mesa_bottom_cta_button_link', true );

$bottom_custom_cta_flag = get_post_meta( get_the_ID(), 'go_mesa_bottom_cta_customize', true);

?>

<?php if($bottom_custom_cta_flag && $bottom_cta_description && $bottom_cta_button_text && $bottom_cta_button_link): ?>

	<section class="call-to-action">
		<div class="row text-center">
			<div class="small-12 columns">
				<p><?php echo esc_html($bottom_cta_description); ?></p>
				<a href="<?php echo esc_url($bottom_cta_button_link) ?>" class="button button-yellow"><?php echo esc_html($bottom_cta_button_text); ?></a>
			</div>
		</div>
	</section>

<?php else: ?>

	<?php get_template_part( 'template-parts/mesa-cta' ); ?>

<?php endif; ?>

<?php get_footer();
