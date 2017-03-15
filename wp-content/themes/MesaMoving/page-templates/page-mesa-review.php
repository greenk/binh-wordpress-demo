<?php
/*
Template Name: Mesa Review
*/
get_header(); ?>

<?php get_template_part( 'template-parts/mesa-featured-image' ); ?>

    <section class="mesa-main-content" role="main">
        <?php do_action( 'foundationpress_before_content' ); ?>

        <div class="row mesa-main-content-area" id="page-mesa-review" >

            <!-- main content -->
            <div class=" small-12 medium-9 medium-push-3 columns">
                <div class="row">

                    <div class="small-12 medium-4 medium-push-8 columns">

                        <?php while ( have_posts() ) : the_post(); ?>
                            <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
                                <header>
                                    <h3 class="entry-title"><?php the_title(); ?></h3>
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

                        <section class="mesa-review-form-container">

                            <div class="row">
                                <div class="small-12 columns">
                                    <?php gravity_form( 2, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = false, $tabindex = 0, $echo = true );

                                    ?>
                                </div>
                            </div>

                        </section>

                    </div>

                    <div class="small-12 medium-8 medium-pull-4 columns">

                        <?php

                            $form_entries = GFFormsModel::get_leads(2);

                            $number_entries = count($form_entries);

                            if ($number_entries >= 15){
                                //device the entries into chunk
                                $chunk_15_entries = array_chunk($form_entries, 15);

                                $number_chunk = count($chunk_15_entries);

                                if (isset($_GET['chunk_review']) && !empty($_GET['chunk_review']) && is_numeric($_GET['chunk_review'])):
                                    $chunk_review = $_GET['chunk_review'];
                                else:
                                    $chunk_review = 1;
                                endif;

                                $form_entries = $chunk_15_entries[$chunk_review - 1];
                            }

                        ?>

                        <?php if ($number_entries):
                                foreach($form_entries as $form_entry):
                                    if ($form_entry['is_starred'] || $form_entry['5']): ?>
                        <div class="review-container">
                            <div class="review-meta">
                                <div class="review-title">
                                    <span class="review-icons">
                                        <?php for($count = 0; $count < $form_entry['4']; $count++): ?>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <?php endfor; ?>

                                    </span>
                                    - <span class="review-name"><?php echo esc_html($form_entry['1']); ?></span>
                                </div>
                                <div class="review-date">
                                    Reviewed Date: <?php echo date("M-d-Y", strtotime($form_entry['date_created'])); ?>
                                </div>
                            </div>
                            <div class="review-content">
                                <p> <?php echo esc_html($form_entry['3']) ?></p>
                            </div>
                        </div>
                        <?php       endif;
                                endforeach;
                            endif; ?>

                        <?php if(isset($number_chunk) && $number_chunk > 0): ?>
                        <ul class="pagination" role="navigation" aria-label="Pagination">
                            <?php if($chunk_review > 1 && $chunk_review <= $number_chunk): ?>
                                <li class="pagination-previous"><a href="<?php echo '/write-a-review/?chunk_review=' . ($chunk_review - 1); ?>" aria-label="Previous page">Previous <span class="show-for-sr">page</span></a></li>
                            <?php else: ?>
                                <li class="pagination-previous disabled">Previous <span class="show-for-sr">page</span></li>
                            <?php endif; ?>

                            <?php
                                for($i = 1; $i <= $number_chunk; $i++){

                                    if(isset($chunk_review) && $i == $chunk_review) {
                                        echo '<li class="current"><span class="show-for-sr">You are on page</span>' . $i . '</li>';
                                    } else {
                                        echo '<li><a href="/write-a-review/?chunk_review=' . $i . ' " ' . 'aria-label="Page '. $i . '"' . '>' . $i . '</a></li>';
                                    }

                                }
                            ?>
                            <?php if($chunk_review == $number_chunk): ?>
                                <li class="pagination-next disabled">End</li>
                            <?php else: ?>
                                <li class="pagination-next"><a href="<?php echo '/write-a-review/?chunk_review=' . ($chunk_review + 1); ?>" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>



                </div>

            </div>

            <!-- side bar content -->
            <div class=" small-12 medium-3 medium-pull-9 columns">
                <?php get_sidebar(); ?>

            </div>

        </div>
        <?php do_action( 'foundationpress_after_content' ); ?>
    </section>


<?php

$here_to_help_title = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_extension_section_title', true );
$here_to_help_text = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_extension_section_text', true );
$here_to_help_img = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_extension_section_image', true );

$here_to_help_flag = get_post_meta( get_the_ID(), 'go_mesa_additional_cta_extension_section_customize_CTA', true );

?>
<?php if ($here_to_help_flag && $here_to_help_img && $here_to_help_title): ?>

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

<?php else: ?>

    <?php get_template_part( 'template-parts/mesa-cta-here-to-help' ); ?>

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
