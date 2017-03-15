<?php

/**
 * Added custom meta fields here for Mesa homepage
 */


//add_action( 'cmb2_admin_init', 'go_mesa_register_front_repeatable_group_field_metabox' );
///**
// * Hook in and add a repeatable grouped fields for slider
// */
//function go_mesa_register_front_repeatable_group_field_metabox() {
//    $prefix = 'go_mesa_front_group_';
//
//    /**
//     * Repeatable Field Groups
//     */
//    $cmb_group = new_cmb2_box( array(
//        'id'           => $prefix . 'metabox',
//        'title'        => esc_html__( 'Slider Section', 'cmb2' ),
//        'object_types' => array( 'page', ),
//        'closed'     => true, // true to keep the metabox closed by default
//    ) );
//
//    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
//    $group_field_id = $cmb_group->add_field( array(
//        'id'          => $prefix . 'demo',
//        'type'        => 'group',
//        'description' => esc_html__( 'Add/Update your slider here', 'cmb2' ),
//        'options'     => array(
//            'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
//            'add_button'    => esc_html__( 'Add Slider', 'cmb2' ),
//            'remove_button' => esc_html__( 'Remove Slider', 'cmb2' ),
//            'sortable'      => true, // beta
//            // 'closed'     => true, // true to have the groups closed by default
//        ),
//    ) );
//
//    /**
//     * Group fields works the same, except ids only need
//     * to be unique to the group. Prefix is not needed.
//     *
//     * The parent field's id needs to be passed as the first argument.
//     */
//    $cmb_group->add_group_field( $group_field_id, array(
//        'name'       => esc_html__( 'Entry Title', 'cmb2' ),
//        'id'         => 'title',
//        'type'       => 'text',
//        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
//    ) );
//
//    $cmb_group->add_group_field( $group_field_id, array(
//        'name'        => esc_html__( 'Description', 'cmb2' ),
//        'description' => esc_html__( 'Write a short description for this entry', 'cmb2' ),
//        'id'          => 'description',
//        'type'        => 'textarea_small',
//    ) );
//
//    $cmb_group->add_group_field( $group_field_id, array(
//        'name' => esc_html__( 'Entry Image', 'cmb2' ),
//        'id'   => 'image',
//        'type' => 'file',
//    ) );
//
//    $cmb_group->add_group_field( $group_field_id, array(
//        'name' => esc_html__( 'Image Caption', 'cmb2' ),
//        'id'   => 'image_caption',
//        'type' => 'text',
//    ) );
//
//}


add_action( 'cmb2_admin_init', 'go_mesa_register_front_feature_service_fields' );

/**
 * A repeatable fields for featured services
 */
function go_mesa_register_front_feature_service_fields() {
    $prefix = 'go_mesa_front_feature_service_';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Featured Service Section', 'cmb2' ),
        'object_types' => array( 'page', ),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-templates/front.php'),
        'closed'     => true, // true to keep the metabox closed by default
    ) );

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'feature',
        'type'        => 'group',
        'description' => esc_html__( 'Add/Update your featured service here', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Featured Service {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Featured Service', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Featured Service', 'cmb2' ),
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
        'name' => esc_html__( 'Featured Service Image', 'cmb2' ),
        'id'   => 'image',
        'type' => 'file',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Featured Service Title', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'        => esc_html__( 'Feature Service Url', 'cmb2' ),
        'id'          => 'service_url',
        'type'        => 'text_url',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'        => esc_html__( 'Description', 'cmb2' ),
        'description' => esc_html__( 'Write a short description for this featured service', 'cmb2' ),
        'id'          => 'description',
        'type'        => 'textarea_small',
    ) );

}


add_action( 'cmb2_admin_init', 'go_mesa_register_front_drive4mesa_cta' );
/**
 * A call to action fields
 */
function go_mesa_register_front_drive4mesa_cta()
{
    $prefix = 'go_mesa_register_drive4mesa_cta_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('Drive4Mesa CTA Section', 'cmb2'),
        'object_types' => array('page',), // Post type
        'show_on'      => array('key' => 'page-template', 'value' => 'page-templates/front.php'), //only show if template page is front
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
        'name' => esc_html__('Title', 'cmb2'),
        'id' => $prefix . 'title',
        'type' => 'text',
        //'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
        // 'column'          => true, // Display field value in the admin post-listing columns
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

add_action( 'cmb2_admin_init', 'go_mesa_register_front_other_service_fields' );

/**
 * A repeatable fields for other services
 */
function go_mesa_register_front_other_service_fields() {
    $prefix = 'go_mesa_front_other_service_';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Other Service Section', 'cmb2' ),
        'object_types' => array( 'page', ),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-templates/front.php'), //only show if template page is front
        'closed'     => true, // true to keep the metabox closed by default
    ) );

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'group',
        'type'        => 'group',
        'description' => esc_html__( 'Add/Update your other service here', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Other Service {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Other Service', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Other Service', 'cmb2' ),
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
        'name' => esc_html__( 'Other Service Image', 'cmb2' ),
        'id'   => 'image',
        'type' => 'file',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Other Service Title', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'        => esc_html__( 'Other Service Url', 'cmb2' ),
        'id'          => 'service_url',
        'type'        => 'text_url',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'        => esc_html__( 'Description', 'cmb2' ),
        'description' => esc_html__( 'Write a short description for this service', 'cmb2' ),
        'id'          => 'description',
        'type'        => 'textarea_small',
    ) );

}






