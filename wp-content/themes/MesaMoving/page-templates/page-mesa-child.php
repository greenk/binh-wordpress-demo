<?php
/*
Template Name: (Child) Mesa With CTA, Sidebar, Addition Section
*/
get_header(); ?>

<?php get_template_part( 'template-parts/mesa-featured-image' ); ?>


<?php //do_action('go_gravity_form_import_entries_manually', $gravity_form_id = 2); ?>

    <section class="mesa-main-content" role="main">

        <?php do_action( 'foundationpress_before_content' ); ?>


        <div class="row mesa-main-content-area" id="" role="main">

            <div class="small-12 medium-9 medium-push-3 columns">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
<!--                        <header>-->
<!--                            <h1 class="entry-title">--><?php //the_title(); ?><!--</h1>-->
<!--                        </header>-->
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

            <div class="small-12 medium-3 medium-pull-9 columns mesa-side-column">
                <?php get_sidebar(); ?>

            </div>

            <?php do_action( 'foundationpress_after_content' ); ?>

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

    $add_sec_left_column_text = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_section_left_column_text', true );
    $add_sec_image = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_section_image', true );
    $add_sec_right_column_title = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_section_right_column_title', true );
    $add_sec_right_column_text = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_section_right_column_text', true );
    $add_sec_right_link_text = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_section_link_text', true );
    $add_sec_url = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_url', true );

    ?>

    <?php if ($add_sec_image && $add_sec_left_column_text && $add_sec_right_column_text && $add_sec_right_column_title && $add_sec_right_link_text): ?>
    <section class="locations additional-section">
        <!-- 2 columns with left background pictures -->
        <div class="expanded row small-collapse small-up-1 medium-up-2 large-up-2">
            <div class="column additional-section-left">
                <a class="location-container" href="<?php echo esc_url($add_sec_url); ?>">
                    <div class="location-content">
                        <h3><?php echo esc_html($add_sec_left_column_text); ?></h3>
                    </div>
                    <img src="<?php echo esc_url($add_sec_image); ?>" alt="<?php echo esc_html($add_sec_right_column_title) ?>" />
                    <div class="image-overlay"></div>
                </a>
            </div>
            <div class="column additional-section-right">
                <div class="additional-section-right-content">
                    <h3> <?php echo esc_html($add_sec_right_column_title); ?> </h3>
                    <p> <?php echo esc_html($add_sec_right_column_text); ?>
                    </p>
                    <a href="<?php echo esc_url($add_sec_url); ?>"> <?php echo esc_html($add_sec_right_link_text); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>

            </div>

        </div>
    </section>
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
