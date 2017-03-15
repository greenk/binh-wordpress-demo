
<?php
/*
Template Name: Front
*/
get_header(); ?>

<section id="" class="hero-section hide-for-small-only" role="banner">

	<?php echo get_new_royalslider(1); ?>

</section>

<section id="" class="hero-section show-for-small-only" role="banner">

	<?php echo get_new_royalslider(2); ?>

</section>

<!--<header id="front-hero" class="text-center hero-section" role="banner">-->
<!--	<div class="row hero-container">-->
<!--		<div class="small-12 columns hero-content">-->
<!--			<p class="hero-text">Here to Help Families and Businesses Get to Their Next Destination... One Move at at Time.</p>-->
<!---->
<!--			<a href="/contact" class="button button-yellow hero-button"> Get A Free Quote!</a>-->
<!--		</div>-->
<!--	</div>-->
<!---->
<!--</header>-->

<?php do_action( 'foundationpress_before_content' ); ?>

<section class="introduction-container" >
	<div class="row introduction-content">
		<div class="small-12 columns">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				the_title("<h2>", "</h2>", true);

				the_content("", false);

			endwhile;
		else:
			echo "We are updating...";
		endif;
		?>
		</div>
	</div>

</section>

<section class="our-services" role="main">

	<div class="row our-services-content">

		<?php
			$featured_services = get_post_meta( get_the_ID(), 'go_mesa_front_feature_service_feature', true );

			if (count($featured_services)>0):
				$count_temp = 0;
				foreach((array) $featured_services as $featured_service):
		?>

					<?php if( ($count_temp % 2) === 0): ?>
						<div class="clearfix"></div>
					<?php endif; ?>
		<div class="small-12 medium-6 columns text-center our-service-card padding-top-0">
			<div class="rounded-img">

				<a class="our-services-image-container" href="<?php echo esc_url( $featured_service['service_url'] ); ?>">

					<div class="our-services-cta">
						<h3 class="our-services-learn-more-text">Learn More
							<div class="image-overlay"></div>
						</h3>

					</div>

					<img class="our-services-image" src="<?php echo esc_url($featured_service['image']); ?>" alt="<?php esc_html($featured_service['title']); ?>">
					<div class="image-overlay-2"></div>

				</a>

			</div>

			<h3><a href="<?php echo esc_url( $featured_service['service_url'] ); ?>"> <?php echo esc_html($featured_service['title']); ?> </a></h3>
			<p>
				<?php echo esc_html($featured_service['description']); ?>
			</p>
		</div>
		<?php $count_temp = $count_temp + 1; ?>
		<?php endforeach;
			endif;
		?>

	</div>

</section>

<section class="drive4mesa">
	<div class="row text-center">
		<div class="small-12 columns" >
			<?php
				$drive4mesa_cta_title = get_post_meta( get_the_ID(), 'go_mesa_register_drive4mesa_cta_title', true );
				$drive4mesa_cta_description = get_post_meta( get_the_ID(), 'go_mesa_register_drive4mesa_cta_description', true );
				$drive4mesa_cta_button_text = get_post_meta( get_the_ID(), 'go_mesa_register_drive4mesa_cta_button_text', true );
				$drive4mesa_cta_button_link = get_post_meta( get_the_ID(), 'go_mesa_register_drive4mesa_cta_button_link', true );

			?>

			<h3><?php 	if ($drive4mesa_cta_title)
							echo esc_html($drive4mesa_cta_title);
						else
							echo 'Drive4Mesa'
				?></h3>
			<p><?php
					echo esc_html($drive4mesa_cta_description);
				?>
			</p>
			<a href="<?php echo esc_url($drive4mesa_cta_button_link) ?>" class="button button-yellow"><?php echo esc_html($drive4mesa_cta_button_text); ?></a>
		</div>
	</div>
</section>

<section class="other-services">

	<div class="expanded row small-collapse small-up-1 medium-up-2 large-up-3 ">
		<?php
			$other_services = get_post_meta( get_the_ID(), 'go_mesa_front_other_service_group', true );

			if (count($other_services)>0):
			foreach((array) $other_services as $other_service):
		?>
		<div class="column">
			<a class="other-service-container" href="<?php echo esc_url($other_service['service_url']); ?>">
				<div class="other-service-content">
					<h3><?php echo esc_html($other_service['title']); ?></h3>
					<p class="other-service-description"><?php echo esc_html($other_service['description']); ?></p>
					<button class="button button-yellow">Learn More</button>
				</div>
				<img src="<?php echo esc_html($other_service['image']); ?>" alt="<?php echo esc_html($other_service['title']); ?>" />
				<div class="image-overlay"></div>

			</a>
		</div>

		<?php endforeach;
		endif;
		?>
	</div>

</section>

<section class="testimonials">

	<div class="row text-center testimonials-container">
		<div class="small-12 columns ">
			<h2 class="testimonial-header">Who We've Helped</h2>
		</div>
	</div>

	<div class="row testimonials-container">
		<div class="orbit" role="customer-testimonial" aria-label="customer testimonial" data-orbit data-auto-play="true">
			<ul class="orbit-container">
				<button class="orbit-previous testimonial-previous-btn"><span class="show-for-sr">Previous Slide</span><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
				<button class="orbit-next testimonial-next-btn"><span class="show-for-sr">Next Slide</span><i class="fa fa-chevron-right" aria-hidden="true"></i></button>

				<?php

				$form_entries = GFFormsModel::get_leads(2);

				?>
				<?php if (count($form_entries)):

					$index_count = 0;

					$entry_count = count($form_entries);

					//We take 30 stared or approved reviews to show
					$approved_stared_reviews = [];
					$count = 0;
					$temp_index_count = 0;

					while($count <= 30 && $count < $entry_count && $temp_index_count < $entry_count ) {

						if ($form_entries[$temp_index_count]['is_starred'] || $form_entries[$temp_index_count]['5']){
							$approved_stared_reviews[] = $form_entries[$temp_index_count];

							$count = $count + 1;
						}

						$temp_index_count = $temp_index_count + 1;

					}

					while ($index_count < count($approved_stared_reviews)): ?>

						<li class="orbit-slide review-container">
							<div class="row small-up-1 medium-up-3 text-center">


							<?php

								for($i = 0; $i < 3; $i++): ?>

									<div class="column column-block review-part-container">

										<div class="review-content">
											<p> <?php echo esc_html($approved_stared_reviews[$index_count]['3']) ?></p>
										</div>

										<div class="review-meta">
											<div class="review-title">
												<span class="review-icons">
													<?php for($count = 0; $count < $approved_stared_reviews[$index_count]['4']; $count++): ?>
														<i class="fa fa-star" aria-hidden="true"></i>
													<?php endfor; ?>

												</span>
											</div>

											<div class="review-sub-meta">

													<span class="review-name"><?php echo esc_html($approved_stared_reviews[$index_count]['1']); ?></span>
													<span class="review-date"> <?php echo date("M-d-Y", strtotime($approved_stared_reviews[$index_count]['date_created'])); ?> </span>

											</div>
										</div>


									</div>

								<?php $index_count = $index_count + 1;
										if($index_count >= count($approved_stared_reviews)):
											break;
										endif;
								endfor; ?>
							</div>
						</li>


					<?php

						if($index_count >= count($approved_stared_reviews)):
							break;
						endif;
					endwhile;
				endif; ?>

			</ul>

		</div>
	</div>

	<div class="row text-center testimonial-footer testimonials-container">
		<div class="small-12 columns">
			<a href="/write-a-review" class="button button-yellow"> Write a Review</a>
		</div>

	</div>


</section>

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

					<?php  ?>
					<img data-interchange="[<?php
												$location_image = wp_get_attachment_image_src( $location['image_id'], [640,640] );
												echo $location_image[0];
					?>, small],[<?php
					$location_image = wp_get_attachment_image_src( $location['image_id'], [640,640] );
					echo $location_image[0];
					?>, medium],[<?php
					$location_image = wp_get_attachment_image_src( $location['image_id'], 'large' );
					echo $location_image[0];
					?>, large],[<?php
					$location_image = wp_get_attachment_image_src( $location['image_id'], 'full' );
					echo $location_image[0];
					?>, xlarge]
					" />



					<div class="image-overlay"></div>
				</a>
			</div>

			<?php endforeach;

			?>

		</div>
	</section>
<?php endif; ?>

<?php
	$files = get_post_meta( get_the_ID(), 'go_mesa_associate_logo_file_list', true );
	$asso_logo_flag = get_post_meta( get_the_ID(), 'go_mesa_associate_logo_flag', true );

?>
<?php if($asso_logo_flag == 2 && count($files)): ?>
	<section class="assoc-logos">
		<!-- Slider logo lists -->

		<div class="row assoc-logos-container">
			<div class="orbit" role="assoc-logos" aria-label="assoc-logos" data-orbit>
				<ul class="orbit-container">
					<button class="orbit-previous assoc-logo-previous-btn"><span class="show-for-sr">Previous Slide</span><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
					<button class="orbit-next assoc-logo-next-btn"><span class="show-for-sr">Next Slide</span><i class="fa fa-chevron-right" aria-hidden="true"></i></button>

					<?php
					$count_index = 0;
					$temp = 0;
					foreach((array) $files as $image_id => $image_url): ?>
					<?php if($count_index % 4 == 0): ?>
							<?php $temp = 0; ?>
					<li class=" orbit-slide">
						<div class="row text-center">
					<?php endif; ?>
					<?php if(($temp < 4 && $temp >=0)): ?>
							<div class="small-12 medium-3 columns assoc-logos-part-container">
								<img src="<?php
								$asso_image = wp_get_attachment_image_src( $image_id, 'large' );
								echo $asso_image[0];

								?>" alt=""/>
							</div>
					<?php endif; ?>
					<?php if($temp == 3): ?>

						</div>
					</li>
					<?php endif; ?>
					<?php $count_index = $count_index + 1;
						  $temp = $temp + 1;
						?>
					<?php endforeach; ?>

				</ul>

			</div>
		</div>
	</section>
<?php elseif($asso_logo_flag == 1): ?>

<?php else: ?>
	<?php get_template_part( 'template-parts/mesa-assoc-logos' ); ?>
<?php endif; ?>


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


<?php do_action( 'foundationpress_after_content' ); ?>


<?php get_footer();
