<?php

/*
 * GO Custom Social Widget
 */

// Creating the widget
class GO_Testimonial_GravityForm_Widget extends WP_Widget {

    /**
     * Sets up a new GO Custom Vertical Menu widget instance.
     *
     * @since 3.0.0
     * @access public
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'go_testimonial_gravityform_widget',
            'description' => __( 'Add a slider testimonial content widget to sidebar or footer.' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'go_testimonial_gravityform_widget', __('GO Custom Testimonial GravityForm Widget'), $widget_ops );
    }

    /**
     * Outputs the content for the current Custom Menu widget instance.
     *
     * @since 3.0.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Custom Menu widget instance.
     */
    public function widget($args, $instance) {

        $title = apply_filters('widget_title', $instance['title']);


        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        //get gravity form entries
        $form_entries = GFFormsModel::get_leads(2);

        echo '<div class="orbit sidebar-testimonial-container" role="sidebar-slider" data-orbit>';
        echo '<ul class="orbit-container">';
        echo '<button class="orbit-previous sidebar-testimonial-pre-button"><span class="show-for-sr">Previous Slide</span><i class="fa fa-chevron-left" aria-hidden="true"></i></button>';
        echo '<button class="orbit-next sidebar-testimonial-next-button"><span class="show-for-sr">Next Slide</span><i class="fa fa-chevron-right" aria-hidden="true"></i></button>';
        if (count($form_entries)){
            $index_count = 0;
            foreach($form_entries as $form_entry){
                if($form_entry['5'] || $form_entry['is_starred']){
                    echo '<li class="orbit-slide">';

                        echo '<div class="review-content">';
                            echo esc_html($form_entry['3']);
                        echo '</div>';

                        echo '<div class="review-meta">';

                            echo '<div class="review-title">';

                                echo '<span class="review-icons">';
                                for($count = 0; $count < $form_entry['4']; $count++){
                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                }
                                echo '</span>';

                            echo '</div>';

                            echo '<div class="review-sub-meta">';
                                echo '<span class="review-name">';
                                    echo esc_html($form_entry['1']);
                                echo '</span>';

                                echo '<span class="review-name">';
                                    echo date("M-d-Y", strtotime($form_entry['date_created']));
                                echo '</span>';
                            echo '</div>';

                        echo '</div>';

                    echo '</li>';
                    $index_count++;
                }
                if($index_count >= 30){
                    //we take only 30 reviews.
                    break;
                }
            }
        }


        echo '</ul>';
        echo '<div class="write-a-review-sidebar">';
        echo '<a href="/write-a-review" class="button button-yellow">Write a review </a>';
        echo '</div>';
        echo '</div>';
        echo $args['after_widget'];
    }

    /**
     * Outputs the settings form for the GO Custom Social widget.
     *
     * @since 3.0.0
     * @access public
     *
     * @param array $instance Current settings.
     * @global WP_Customize_Manager $wp_customize
     */
    public function form($instance) {
        isset($instance['title']) ? $title = $instance['title'] : null;


        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

        <?php
    }

    // Updating widget values
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';


        return $instance;
    }

} // Class GO_Menu_Widget ends here

// Register and load the widget
function go_testimonial_gravityform_load_widget() {
    register_widget( 'GO_Testimonial_GravityForm_Widget' );
}
add_action( 'widgets_init', 'go_testimonial_gravityform_load_widget' );