<?php

// Additonal filter to control the gravity forms

//filter to change button text for contact form
add_filter( 'gform_submit_button', 'gravity_form_submit_button', 10, 2 );
function gravity_form_submit_button( $button, $form ) {
    return "<button class='button button-yellow' id='gform_submit_button_{$form['id']}'><span>&nbsp;&nbsp;&nbsp;&nbsp;SEND&nbsp;&nbsp;&nbsp;&nbsp;</span></button>";
}

//filter to change button text for career form
add_filter( 'gform_submit_button_3', 'career_form_submit_button', 10, 2 );
function career_form_submit_button( $button, $form ) {
    return "<button class='button button-yellow' id='gform_submit_button_{$form['id']}'><span>&nbsp;&nbsp;&nbsp;&nbsp;SUBMIT&nbsp;&nbsp;&nbsp;&nbsp;</span></button>";
}

////filter to change button text for review form
//add_filter( 'gform_submit_button_2', 'review_form_submit_button', 10, 2 );
//function review_form_submit_button( $button, $form ) {
//    return "<button class='button button-yellow' id='gform_submit_button_{$form['id']}'><span>&nbsp;&nbsp;&nbsp;&nbsp;SEND&nbsp;&nbsp;&nbsp;&nbsp;</span></button>";
//}