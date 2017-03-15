<?php

/**
 * Add custom fields to tempalate parent pages
 */

add_action( 'cmb2_admin_init', 'go_mesa_register_sub_services_list' );
/**
 * A bottom call to action fields
 */
function go_mesa_register_sub_services_list()
{
    $prefix = 'go_mesa_sub_services_list_';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Sub Service Section', 'cmb2' ),
        'object_types' => array( 'page', ),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-templates/page-mesa-parent.php'), //only show if template page is front
        'closed'     => true, // true to keep the metabox closed by default
    ) );

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'group',
        'type'        => 'group',
        'description' => esc_html__( 'Add/Update your sub service information here', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Sub Service {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Sub Service', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Sub Service', 'cmb2' ),
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
        'name' => esc_html__( 'Sub-Service Image', 'cmb2' ),
        'id'   => 'image',
        'type' => 'file',
        'description' => 'Image size: 600x600 or larger'
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Sub Service Title', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',

    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Sub Service Sub Title', 'cmb2' ),
        'id'         => 'sub_title',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'        => esc_html__( 'Sub Service Url', 'cmb2' ),
        'id'          => 'sub_service_url',
        'type'        => 'text_url',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Sub Service Link Text', 'cmb2' ),
        'id'         => 'sub_service_link_text',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'        => esc_html__( 'Text Link', 'cmb2' ),
        'id'          => 'text_link',
        'type'        => 'text_url',
    ) );

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Description', 'cmb2'),
        'desc' => esc_html__('Short Description', 'cmb2'),
        'id' => 'description',
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