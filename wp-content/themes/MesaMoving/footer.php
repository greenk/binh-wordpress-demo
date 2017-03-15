<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section> <!-- Close container section -->

		<div id="footer-container" class="mesa-footer">
			<footer class="mesa-footer-tag">
				<div class="row">
					<div class="small-12 medium-offset-1 medium-10 large-offset-2 large-7 columns ">
						<div class="row">

							<?php do_action( 'foundationpress_before_footer' ); ?>
							<?php dynamic_sidebar( 'footer-widgets' ); ?>
							<?php do_action( 'foundationpress_after_footer' ); ?>

						</div>

						<div class="row">
							<div class="small-12 columns text-center">
								<img src="<?php echo get_theme_file_uri( '/assets/images/united-logo.png' ); ?>" />
								<p>&copy; Copyright <?php echo date("Y") ?> Mesa Moving & Storage, All Rights Reserved | Mesa Systems Inc.: USDOT 236778 | MC-240638 </p>
							</div>
						</div>
					</div>

				</div>
			</footer>
		</div>


<!--		<div id="footer-container">-->
<!--			<footer id="footer">-->
<!--				--><?php //do_action( 'foundationpress_before_footer' ); ?>
<!--				--><?php //dynamic_sidebar( 'footer-widgets' ); ?>
<!--				--><?php //do_action( 'foundationpress_after_footer' ); ?>
<!--			</footer>-->
<!--		</div>-->


		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>

</div> <!-- Close animsition tag -->

<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>

<!-- begin SnapEngage code -->
<script type="text/javascript">
	(function() {
		var se = document.createElement('script'); se.type = 'text/javascript'; se.async = true;
		se.src = '//storage.googleapis.com/code.snapengage.com/js/1d9d4a64-85ba-492e-ad67-b6f34a58c63a.js';
		var done = false;
		se.onload = se.onreadystatechange = function() {
			if (!done&&(!this.readyState||this.readyState==='loaded'||this.readyState==='complete')) {
				done = true;
				/* Place your SnapEngage JS API code below */
				/* SnapEngage.allowChatSound(true); Example JS API: Enable sounds for Visitors. */
			}
		};
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(se, s);
	})();
</script>
<!-- end SnapEngage code -->

</body>
</html>
