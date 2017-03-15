<?php

/**
 * Modify the html output menu
 */

class GO_Custom_Menu_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        // add the dropdown CSS class
        $output .= "\n$indent<ul class=\"menu vertical nested\" >\n";
    }

    public function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

        // add 'not-click' class to the list item
        $element->classes[] = 'not-click';

        // if element is current or is an ancestor of the current element, add 'active' class to the list item
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';

        // if it is a root element and the menu is not flat, add 'has-dropdown' class
        // from https://core.trac.wordpress.org/browser/trunk/src/wp-includes/class-wp-walker.php#L140
        $element->has_children = ! empty( $children_elements[ $element->ID ] );
        $element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-dropdown' : '';

        // call parent method
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}