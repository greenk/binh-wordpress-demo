<?php

/**
 * Additonal fields for contact page template
 */



add_action( 'cmb2_admin_init', 'go_mesa_register_location_contact_fields' );

/**
 * A repeatable fields for locations
 */
function go_mesa_register_location_contact_fields() {
    $prefix = 'go_mesa_location_contact_';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Location Contact Section', 'cmb2' ),
        'object_types' => array( 'page', ),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-templates/page-mesa-contact.php'),
        'closed'     => true, // true to keep the metabox closed by default
    ) );

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'group',
        'type'        => 'group',
        'description' => esc_html__( 'Add/Update your location here', 'cmb2' ),
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
        'name'       => esc_html__( 'Location Name', 'cmb2' ),
        'id'         => 'name',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name' => esc_html__( 'Location Image', 'cmb2' ),
        'id'   => 'image',
        'type' => 'file',
    ) );

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Location address', 'cmb2'),
        'desc' => esc_html__('123 Example Street, etc', 'cmb2'),
        'id' => 'address',
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

    $cmb_group->add_group_field( $group_field_id, array(
        'name'        => esc_html__( 'Location Url', 'cmb2' ),
        'id'          => 'location_contact_url',
        'type'        => 'text_url',
    ) );


}

add_action( 'cmb2_admin_init', 'go_mesa_register_gravity_forms_selection' );

/**
 * A repeatable fields for locations
 */
function go_mesa_register_gravity_forms_selection() {
    $prefix = 'go_mesa_gravity_form_select_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('Select Gravity Form To Display', 'cmb2'),
        'object_types' => array('page',), // Post type
        'show_on'      => array('key' => 'page-template', 'value' => 'page-templates/page-mesa-contact.php'),
        'closed'     => true, // true to keep the metabox closed by default
    ));

    $gravity_forms = RGFormsModel::get_forms(null, 'title');
    $temp_array = [];
    foreach($gravity_forms as $form){
        $temp_array[$form->id] = __($form->title, 'cmb2');
    }

    $cmb_demo->add_field( array(
        'name'             => 'Select Gravity Form',
        'desc'             => 'Select an option',
        'id'               => $prefix. 'id',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'custom',
        'options'          => $temp_array,
    ) );


}

