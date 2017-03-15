<?php

/*
 * GO Custom Social Widget
 */

// Creating the widget
class GO_Social_Widget extends WP_Widget {

    /**
     * Sets up a new GO Custom Vertical Menu widget instance.
     *
     * @since 3.0.0
     * @access public
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'go_social_widget',
            'description' => __( 'Add a social widget to sidebar or footer.' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'go_social_widget', __('GO Custom Social Widget'), $widget_ops );
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
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];

        // social profile link
        $facebook_profile = '<a class="button button-brand-footer-color" href="' . $facebook . '"><i class="fa fa-facebook"></i></a>';
        $twitter_profile = '<a class="button button-brand-footer-color" href="' . $twitter . '"><i class="fa fa-twitter"></i></a>';
        $google_profile = '<a class="button button-brand-footer-color" href="' . $google . '"><i class="fa fa-google-plus"></i></a>';
        $linkedin_profile = '<a class="button button-brand-footer-color" href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a>';

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="inline-list social">';
//        echo '<p class="inline-list social">';
        echo (!empty($facebook) ) ? $facebook_profile : null;
        echo (!empty($twitter) ) ? $twitter_profile : null;
        echo (!empty($google) ) ? $google_profile : null;
        echo (!empty($linkedin) ) ? $linkedin_profile : null;
//        echo '</p>';
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

        //empty($instance['title']) ? $title = 'My Social Profile' : null;

        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['google']) ? $google = $instance['google'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
        </p>

        <?php
    }

    // Updating widget values
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';

        return $instance;
    }

} // Class GO_Menu_Widget ends here

// Register and load the widget
function go_social_load_widget() {
    register_widget( 'GO_Social_Widget' );
}
add_action( 'widgets_init', 'go_social_load_widget' );