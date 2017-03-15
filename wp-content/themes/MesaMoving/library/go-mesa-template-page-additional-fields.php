<?php

/**
 * Add custom fields to pages
 */

add_action( 'cmb2_admin_init', 'go_mesa_register_bottom_cta' );
/**
* A bottom call to action fields
*/
function go_mesa_register_bottom_cta()
{
    $prefix = 'go_mesa_bottom_cta_';

    /**
    * Sample metabox to demonstrate each field type included
    */
    $cmb_demo = new_cmb2_box(array(
    'id' => $prefix . 'metabox',
    'title' => esc_html__('Footer CTA Section', 'cmb2'),
    'object_types' => array('page', 'post'), // Post type
    // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    'closed'     => true, // true to keep the metabox closed by default
    // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
    // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Using CTA', 'cmb2'),
        'desc' => esc_html__('Check Custom to use CTA', 'cmb2'),
        'id' => $prefix . 'customize',
        'type' => 'radio',
        'show_option_none' => false,
        'options' => array (
            '2' => __('Custom', 'cmb2'),
            '1' => __('No Show', 'cmb2'),
            '3' => __('Default', 'cmb2')
        )
        // 'repeatable' => true,
        // 'column' => array(
        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
        // 	'position' => 2, // Set as the second column.
        // );
        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
    ));
    $cmb_demo->add_field(array(
    'name' => esc_html__('Text', 'cmb2'),
    'desc' => esc_html__('Short Description', 'cmb2'),
    'id' => $prefix . 'description',
    'type' => 'textarea_small',
    // 'repeatable' => true,
    // 'column' => array(
    // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
    // 	'position' => 2, // Set as the second column.
    // );
    // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
    ));

    $cmb_demo->add_field(array(
    'name' => esc_html__('Button Text', 'cmb2'),
    'desc' => esc_html__('Text appear on the CTA button', 'cmb2'),
    'id' => $prefix . 'button_text',
    'type' => 'text',
    ));

    $cmb_demo->add_field(array(
    'name' => esc_html__('Button Link', 'cmb2'),
    'id' => $prefix . 'button_link',
    'type' => 'text_url',
    ));

}

add_action( 'cmb2_admin_init', 'go_mesa_register_location_fields' );

/**
 * A repeatable fields for locations
 */
function go_mesa_register_location_fields() {
    $prefix = 'go_mesa_locations_';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Location Section', 'cmb2' ),
        'object_types' => array('page', 'post'),
        'closed'     => true, // true to keep the metabox closed by default
    ) );

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'group',
        'type'        => 'group',
        'description' => esc_html__( 'Add/Update your other service here', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Location {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Location', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Location', 'cmb2' ),
            'sortable'      => true, // beta
            'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_group->add_group_field( $group_field_id, array(
        'name' => esc_html__( 'Location Image', 'cmb2' ),
        'id'   => 'image',
        'type' => 'file',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Location Name', 'cmb2' ),
        'id'         => 'name',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'        => esc_html__( 'Location Url', 'cmb2' ),
        'id'          => 'location_url',
        'type'        => 'text_url',
    ) );


}

//add_action( 'cmb2_admin_init', 'go_mesa_register_additional_cta_section' );
///**
// * An additional section call to action fields
// */
//function go_mesa_register_additional_cta_section()
//{
//    $prefix = 'go_mesa_additional_cta_section_';
//
//    /**
//     * Sample metabox to demonstrate each field type included
//     */
//    $cmb_demo = new_cmb2_box(array(
//        'id' => $prefix . 'metabox',
//        'title' => esc_html__('Additional Section', 'cmb2'),
//        'object_types' => array('page',), // Post type
//        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
//        // 'context'    => 'normal',
//        // 'priority'   => 'high',
//        // 'show_names' => true, // Show field names on the left
//        // 'cmb_styles' => false, // false to disable the CMB stylesheet
//        'closed'     => true, // true to keep the metabox closed by default
//        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
//        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
//    ));
//
//    //    $cmb_demo->add_field(array(
//    //        'name' => esc_html__('Title', 'cmb2'),
//    //        'id' => $prefix . 'title',
//    //        'type' => 'text',
//    //        //'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
//    //        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
//    //        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
//    //        // 'on_front'        => false, // Optionally designate a field to wp-admin only
//    //        // 'repeatable'      => true,
//    //        // 'column'          => true, // Display field value in the admin post-listing columns
//    //    ));
//
//    $cmb_demo->add_field(array(
//        'name' => esc_html__('Left Column Text', 'cmb2'),
//        'desc' => esc_html__('Short Description', 'cmb2'),
//        'id' => $prefix . 'left_column_text',
//        'type' => 'text',
//        // 'repeatable' => true,
//        // 'column' => array(
//        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
//        // 	'position' => 2, // Set as the second column.
//        // );
//        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
//    ));
//
//    $cmb_demo->add_field(  array(
//        'name' => esc_html__( 'Left Column Image', 'cmb2' ),
//        'id'   => $prefix . 'image',
//        'type' => 'file',
//    ) );
//
//    $cmb_demo->add_field(array(
//        'name' => esc_html__('Right Column Title', 'cmb2'),
//        'id' => $prefix . 'right_column_title',
//        'type' => 'text',
//        //'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
//        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
//        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
//        // 'on_front'        => false, // Optionally designate a field to wp-admin only
//        // 'repeatable'      => true,
//        // 'column'          => true, // Display field value in the admin post-listing columns
//    ));
//
//    $cmb_demo->add_field(array(
//        'name' => esc_html__('Right Column Text', 'cmb2'),
//        'desc' => esc_html__('Short Description', 'cmb2'),
//        'id' => $prefix . 'right_column_text',
//        'type' => 'textarea_small',
//        // 'repeatable' => true,
//        // 'column' => array(
//        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
//        // 	'position' => 2, // Set as the second column.
//        // );
//        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
//    ));
//
//    $cmb_demo->add_field(array(
//        'name' => esc_html__('Link', 'cmb2'),
//        'id' => $prefix . 'url',
//        'type' => 'text_url',
//    ));
//
//    $cmb_demo->add_field(array(
//        'name' => esc_html__('Link Text', 'cmb2'),
//        'id' => $prefix . 'link_text',
//        'type' => 'text',
//    ));
//
//
//}

add_action( 'cmb2_admin_init', 'go_mesa_register_cta_extension_section' );
/**
 * An additional section call to action fields
 */
function go_mesa_register_cta_extension_section()
{
    $prefix = 'go_mesa_additional_cta_extension_section_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('CTA Extension Section', 'cmb2'),
        'object_types' => array('page', 'post'), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Customize CTA Setting', 'cmb2'),
        'desc' => esc_html__('Check Custom to use customize CTA', 'cmb2'),
        'id' => $prefix . 'customize_CTA',
        'type' => 'radio',
        'show_option_none' => false,
        'options' => array (
            '2' => __('Custom', 'cmb2'),
            '1' => __('No Show', 'cmb2'),
            '3' => __('Default', 'cmb2')
        )
        // 'repeatable' => true,
        // 'column' => array(
        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
        // 	'position' => 2, // Set as the second column.
        // );
        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('CTA Title', 'cmb2'),
        'desc' => esc_html__('Ex: Here to Help', 'cmb2'),
        'id' => $prefix . 'title',
        'type' => 'text',
        // 'repeatable' => true,
        // 'column' => array(
        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
        // 	'position' => 2, // Set as the second column.
        // );
        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Description Text', 'cmb2'),
        'desc' => esc_html__('Short Description', 'cmb2'),
        'id' => $prefix . 'text',
        'type'    => 'wysiwyg',
        'sanitization_cb' => true, // function should return a sanitized value
        //'escape_cb'       => false, // function should return a sanitized value
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => true, // show insert/upload button(s)
            'textarea_name' => 'address_text', // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        ),
    ));

    $cmb_demo->add_field(  array(
        'name' => esc_html__( 'Image', 'cmb2' ),
        'id'   => $prefix . 'image',
        'type' => 'file',
    ) );


}


add_action( 'cmb2_admin_init', 'go_mesa_register_complimentary_section' );
/**
 * An additional section call to action fields
 */
function go_mesa_register_complimentary_section()
{
    $prefix = 'go_mesa_complimentary_section_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('Complimentary Section', 'cmb2'),
        'object_types' => array('page', 'post'), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Using Customize Complimentary', 'cmb2'),
        'desc' => esc_html__('Check Custom to use customize Complimentary', 'cmb2'),
        'id' => $prefix . 'flag',
        'type' => 'radio',
        'show_option_none' => false,
        'options' => array (
            '2' => __('Custom', 'cmb2'),
            '1' => __('No Show', 'cmb2'),
            '3' => __('Default', 'cmb2')
        )
        // 'repeatable' => true,
        // 'column' => array(
        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
        // 	'position' => 2, // Set as the second column.
        // );
        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Left Text', 'cmb2'),
        'id' => $prefix . 'left_text',
        'type'    => 'wysiwyg',
        'sanitization_cb' => true, // function should return a sanitized value
        //'escape_cb'       => false, // function should return a sanitized value
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => true, // show insert/upload button(s)
            'textarea_name' => 'address_text', // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        ),
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Right Text', 'cmb2'),
        'id' => $prefix . 'right_text',
        'type'    => 'wysiwyg',
        'sanitization_cb' => true, // function should return a sanitized value
        //'escape_cb'       => false, // function should return a sanitized value
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => true, // show insert/upload button(s)
            'textarea_name' => 'address_text', // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        ),
    ));


}


add_action( 'cmb2_admin_init', 'go_mesa_register_move_for_hunger' );
/**
 * A bottom call to action fields
 */
function go_mesa_register_move_for_hunger()
{
    $prefix = 'go_mesa_move_for_hunger_';

    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('Move For Hunger Section', 'cmb2'),
        'object_types' => array('page', 'post'), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Using Customize Move for Hunger', 'cmb2'),
        'desc' => esc_html__('Check Custom to use customize MFH', 'cmb2'),
        'id' => $prefix . 'customize_MFH',
        'type' => 'radio',
        'show_option_none' => false,
        'options' => array (
            '2' => __('Custom', 'cmb2'),
            '1' => __('No Show', 'cmb2'),
            '3' => __('Default', 'cmb2')
        )
        // 'repeatable' => true,
        // 'column' => array(
        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
        // 	'position' => 2, // Set as the second column.
        // );
        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
    ));

    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Image', 'cmb2' ),
        'id'   => $prefix . 'image',
        'type' => 'file',
        'description' => 'Image size: 600x600 or larger'
    ) );

    $cmb_demo->add_field( array(
        'name'       => esc_html__( 'Title', 'cmb2' ),
        'id'         => $prefix. 'title',
        'type'       => 'text',

    ) );

    $cmb_demo->add_field( array(
        'name'        => esc_html__( 'Url', 'cmb2' ),
        'id'          => $prefix . 'url',
        'type'        => 'text_url',
    ) );

    $cmb_demo->add_field( array(
        'name' => esc_html__('Description', 'cmb2'),
        'desc' => esc_html__('Short Description', 'cmb2'),
        'id' => $prefix . 'description',
        'type'    => 'wysiwyg',
        'sanitization_cb' => true, // function should return a sanitized value
        //'escape_cb'       => false, // function should return a sanitized value
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => true, // show insert/upload button(s)
            'textarea_name' => 'address_text', // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        ),
    ));

}

add_action( 'cmb2_admin_init', 'go_mesa_register_associate_logo_section' );
/**
 * An additional section call to action fields
 */
function go_mesa_register_associate_logo_section()
{
    $prefix = 'go_mesa_associate_logo_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('Associate Logo Section', 'cmb2'),
        'object_types' => array('page'), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Using Customize Associate Logo List', 'cmb2'),
        'desc' => esc_html__('Check Custom and upload your logo list below', 'cmb2'),
        'id' => $prefix . 'flag',
        'type' => 'radio',
        'show_option_none' => false,
        'options' => array (
            '2' => __('Custom', 'cmb2'),
            '1' => __('No Show', 'cmb2'),
            '3' => __('Default', 'cmb2')
        )
        // 'repeatable' => true,
        // 'column' => array(
        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
        // 	'position' => 2, // Set as the second column.
        // );
        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
    ));

    $cmb_demo->add_field( array(
        'name' => 'Logo File List',
        'desc' => '',
        'id'   => $prefix. 'file_list',
        'type' => 'file_list',
        'preview_size' => array( 200, 100 ), // Default: array( 50, 50 )
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => 'Add or Upload Files', // default: "Add or Upload Files"
            'remove_image_text' => 'Remove Image', // default: "Remove Image"
            'file_text' => 'File', // default: "File:"
            'file_download_text' => 'Download', // default: "Download"
            'remove_text' => 'Remove', // default: "Remove"
        ),
    ) );


}


add_action( 'cmb2_admin_init', 'go_mesa_register_career_section' );
/**
 * An additional section call to action fields
 */
function go_mesa_register_career_section()
{
    $prefix = 'go_mesa_career_section_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('Career Section', 'cmb2'),
        'object_types' => array('page'), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Using Customize Career', 'cmb2'),
        'desc' => esc_html__('Check Custom to use customize Career', 'cmb2'),
        'id' => $prefix . 'flag',
        'type' => 'radio',
        'show_option_none' => false,
        'options' => array (
            '2' => __('Custom', 'cmb2'),
            '1' => __('No Show', 'cmb2'),
            //'3' => __('Default', 'cmb2')
        )
        // 'repeatable' => true,
        // 'column' => array(
        // 	'name'     => esc_html__( 'Column Title', 'cmb2' ), // Set the admin column title
        // 	'position' => 2, // Set as the second column.
        // );
        // 'display_cb' => 'yourprefix_display_text_small_column', // Output the display of the column values through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Custom Career Text', 'cmb2'),
        'id' => $prefix . 'text',
        'type'    => 'wysiwyg',
        'sanitization_cb' => true, // function should return a sanitized value
        //'escape_cb'       => false, // function should return a sanitized value
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => true, // show insert/upload button(s)
            'textarea_name' => 'address_text', // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        ),
    ));


}