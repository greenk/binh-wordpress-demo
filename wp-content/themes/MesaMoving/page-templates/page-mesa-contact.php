<?php
/*
Template Name: Mesa Contact
*/
get_header(); ?>

<?php get_template_part( 'template-parts/mesa-featured-image' ); ?>

    <section class="mesa-main-content" role="main">

        <?php do_action('foundationpress_before_content' ); ?>
        <div id="" class=" row mesa-contact mesa-main-content-area" role="main">
            <div class="small-12 columns">



            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
                    <header>
                        <h1 class="entry-title"><?php //the_title(); ?></h1>
                    </header>
                    <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <footer>
                        <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
                        <p><?php the_tags(); ?></p>
                    </footer>
                    <?php do_action( 'foundationpress_page_before_comments' ); ?>
                    <?php comments_template(); ?>
                    <?php do_action( 'foundationpress_page_after_comments' ); ?>
                </article>
            <?php endwhile;?>


            </div>
        </div>
        <?php do_action( 'foundationpress_after_content' ); ?>

    </section>

<?php
    $career_text = get_post_meta( get_the_ID(), 'go_mesa_career_section_text', true);
    $career_flag = get_post_meta( get_the_ID(), 'go_mesa_career_section_flag', true);
?>
<?php if($career_flag == 2): ?>
<section class="mesa-career-container">

    <?php echo wpautop($career_text); ?>

</section>
<?php endif; ?>

<?php
    $gravity_form_id = get_post_meta( get_the_ID(), 'go_mesa_gravity_form_select_id', true);

?>
    <?php if($gravity_form_id): ?>
    <section class="mesa-contact-form-container">

        <div class="row">
            <div class="small-12 columns">
            <?php $my_test = gravity_form( $gravity_form_id, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = false, $tabindex = 0, $echo = true );

            ?>
            </div>
        </div>

    </section>

    <?php endif; ?>
<?php
    $contact_locations = get_post_meta( get_the_ID(), 'go_mesa_location_contact_group', true );

    if (count($contact_locations)>0):
?>
    <section class="locations location-contact">
        <!-- 4 columns with background pictures -->
        <div class="expanded row small-collapse small-up-1 medium-up-2 large-up-4">

        <?php foreach((array) $contact_locations as $contact_location): ?>

            <div class="column">
                <a href="<?php echo esc_url($contact_location['location_contact_url']); ?>" class="location-container">
                    <div class="location-content">
                        <h3><?php echo esc_html($contact_location['name']); ?></h3>
                        <p>
                            <?php echo wpautop($contact_location['address']); ?>
                        </p>
                    </div>
                    <img src="<?php echo $contact_location['image']; ?>" alt="<?php echo esc_html($contact_location['name']); ?>" />
                    <div class="image-overlay image-overlay-contact"></div>
                </a>
            </div>

        <?php endforeach; ?>

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

<?php elseif($asso_logo_flag == 3): ?>
    <?php get_template_part( 'template-parts/mesa-assoc-logos' ); ?>
<?php endif; ?>

<?php get_footer();
