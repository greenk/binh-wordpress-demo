<?php

// Create and add customization place for Mesa Theme


function go_mesa_theme_customize_register($wp_customize)
{
    $wp_customize->add_section("mesa_header", array(
        "title" => __("GO Mesa Header", "customizer_ads_sections"),
        "priority" => 30,
    ));

    $wp_customize->add_setting("mesa_contact_phone", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "mesa_contact_phone",
        array(
            "label" => __("Call", "customizer_ads_code_label"),
            "section" => "mesa_header",
            "settings" => "mesa_contact_phone",
            "type" => "text",
        )
    ));
}

add_action("customize_register","go_mesa_theme_customize_register");
