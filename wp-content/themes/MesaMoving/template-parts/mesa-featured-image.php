<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.

if ( has_post_thumbnail( $post->ID ) ) : ?>

    <?php if (is_home() && get_option('page_for_posts')): ?>
        <header id="featured-hero" role="banner"
                data-interchange="[<?php

                $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'small');
                echo $featured_image = $img[0];

                ?>, small], [<?php

                $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'large');
                echo $featured_image = $img[0];

                ?>, medium], [<?php

                $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'large');
                echo $featured_image = $img[0];

                ?>, large], [<?php

                $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'xlarge');
                echo $featured_image = $img[0];

                ?>, xlarge]">

            <div class="row featured-page-title">
                <div class="small-12 columns">
                    <div class="feature-page-title-content">
                        <h1 class="mesa-featured-header"> Our Blog</h1>
                    </div>
                </div>

            </div>
        </header>
    <?php else: ?>
        <header id="featured-hero" role="banner"
                data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium],
                [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">

            <div class="row featured-page-title">
                <div class="small-12 columns ">
                    <div class="feature-page-title-content">
                        <?php
                        if ( is_front_page() && is_home() ) {

                            // Default homepage
                        } elseif ( is_front_page() ) {

                        } elseif ( is_home() || is_single() ) { ?>

                            <h1 class="mesa-featured-header"> Our Blog</h1>

                        <?php
                        }elseif (is_search()) { ?>
                            <h1 class="mesa-featured-header"> Search Result </h1>
                        <?php

                        } else { ?>
                            <h1 class="mesa-featured-header"> <?php the_title() ?></h1>
                        <?php

                        } ?>
                    </div>
                </div>

            </div>
        </header>
    <?php endif; ?>
<?php else : ?>
    <header id="featured-hero" role="banner" data-interchange="[<?php echo get_theme_file_uri() . '/assets/images/feature_default.jpg'; ?>, small]">

        <div class="row featured-page-title">
            <div class="small-12 columns">
                <div class="feature-page-title-content">
                    <?php if( is_404()): ?>
                    <h1 class="mesa-featured-header"> File Not Found!!!  </h1>
                    <?php else: ?>
                    <h1 class="mesa-featured-header"> Mesa Moving and Storage  </h1>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </header>

<?php endif; ?>
