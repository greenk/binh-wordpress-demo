<?php
/*
Template Name: (Parent) Mesa With CTA and Sidebar
*/
get_header(); ?>

<?php get_template_part( 'template-parts/mesa-featured-image' ); ?>
    <section class="mesa-main-content" role="main">

        <?php do_action( 'foundationpress_before_content' ); ?>

        <div class="row mesa-main-content-area" id="" >

            <div class="small-12 medium-9 medium-push-3 columns">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
<!--                        <header>-->
<!--                            <h1 class="entry-title">--><?php ////the_title(); ?><!--</h1>-->
<!--                        </header>-->
                        <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
                        <div class="entry-content">
                            <div class="service-page-content">
                                <?php the_content(); ?>
                            </div>

                        </div>
                        <div>
                            <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
                            <p><?php the_tags(); ?></p>
                        </div>
                        <?php do_action( 'foundationpress_page_before_comments' ); ?>
                        <?php comments_template(); ?>
                        <?php do_action( 'foundationpress_page_after_comments' ); ?>
                    </article>
                <?php endwhile;?>

            </div>

            <div class="small-12 medium-3 medium-pull-9 columns mesa-side-column hide-for-small-only">
                <?php get_sidebar(); ?>

            </div>

            <?php do_action( 'foundationpress_after_content' ); ?>


        </div>
    </section>
    <div class="clearfix"></div>

    <section class="">
    <!-- Sub services -->
    <?php
    $sub_services = get_post_meta( get_the_ID(), 'go_mesa_sub_services_list_group', true );

    $count_sub_service = 0;
    if (count($sub_services)>0):
        foreach((array) $sub_services as $sub_service):
            if(($count_sub_service % 2) ==  0):
            ?>

                <div class="row expanded particular-service-section-type-1" data-equalizer>
                    <div class="small-12 medium-8 columns bg-mesa particular-service-content" data-equalizer-watch>
                        <div class="row">
                            <div class="medium-offset-1 medium-11 columns">
                                <h2 class="particular-service-content-title"><?php echo esc_html($sub_service['title']) ?></h2>
                                <h4 class="particular-service-content-sub-title"><?php echo esc_html($sub_service['sub_title']); ?> </h4>
                                <p class="particular-service-content-text">
                                    <?php echo wpautop($sub_service['description']); ?>
                                </p>
                                <a class="button button-yellow particular-service-cta-button" href="<?php echo esc_url($sub_service['sub_service_url']); ?>"> Learn More </a>
                                <span class="particular-service-cta-text"><a href="<?php echo esc_url($sub_service['text_link']) ?>"> <?php echo esc_html($sub_service['sub_service_link_text']); ?> </a>
                                    <?php if($sub_service['sub_service_link_text']): ?>
                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="small-12 medium-4 columns mesa-side-background" data-equalizer-watch
                            data-interchange="[<?php echo $sub_service['image']; ?>, small],"

                        data-interchange="[<?php
                    $sub_service_image = wp_get_attachment_image_src( $sub_service['image_id'], [640,400] );
                    echo $sub_service_image[0];
                    ?>, small],[<?php
                        $sub_service_image = wp_get_attachment_image_src( $sub_service['image_id'], [640,400] );
                    echo $sub_service_image[0];
                    ?>, medium],[<?php
                        $sub_service_image = wp_get_attachment_image_src( $sub_service['image_id'], 'large' );
                    echo $sub_service_image[0];
                    ?>, large],[<?php
                        $sub_service_image = wp_get_attachment_image_src( $sub_service['image_id'], 'full' );
                    echo $sub_service_image[0];
                    ?>, xlarge]
					"

                    >

                    </div>
                </div>

            <?php else: ?>
                <div class="row expanded particular-service-section-type-2" data-equalizer>

                    <div class="small-12 medium-4 columns mesa-side-background hide-for-small-only" data-equalizer-watch
                         data-interchange="[<?php echo $sub_service['image']; ?>, small],">
                    </div>

                    <div class="small-12 medium-8 columns particular-service-content" data-equalizer-watch>
                        <div class="row">
                            <div class="medium-offset-1 medium-11 columns">
                                <h2 class="particular-service-content-title"><?php echo esc_html($sub_service['title']) ?></h2>
                                <h4 class="particular-service-content-sub-title"><?php echo esc_html($sub_service['sub_title']); ?> </h4>
                                <p class="particular-service-content-text">
                                    <?php echo wpautop($sub_service['description']); ?>
                                </p>
                                <a class="button button-yellow particular-service-cta-button" href="<?php echo esc_url($sub_service['sub_service_url']); ?>"> Learn More </a>
                                <span class="particular-service-cta-text"><a href="<?php echo esc_url($sub_service['text_link']) ?>"> <?php echo esc_html($sub_service['sub_service_link_text']); ?> </a>
                                    <?php if($sub_service['sub_service_link_text']): ?>
                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </span>
                            </div>

                        </div>
                    </div>

                </div>
            <?php endif; ?>
            <?php $count_sub_service = $count_sub_service + 1; ?>
        <?php endforeach;
    endif;
    ?>
    </section>

    <div class="clearfix"></div>
    <!-- Manual calling sidebar because we would like to push sidebar section to the bottom of the page-->
    <section class="mesa-main-content show-for-small-only">
        <div class="row mesa-main-content-area "  id="" >

            <div class="small-12 medium-3 medium-pull-9 columns mesa-side-column show-for-small-only">
                <?php get_template_part('sidebar'); ?>

            </div>
        </div>
    </section>

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
