<?php

if ( ! class_exists( 'Arsha_Nav_Walker' ) ) :

class Arsha_Nav_Walker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "\n<ul>\n";
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "</ul>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes );

        if ( $has_children ) {
            $li_class = ( $depth == 0 ) ? 'dropdown' : 'deep-dropdown';
            $output .= '<li class="' . $li_class . '">';
        } else {
            $output .= '<li>';
        }

        $output .= '<a href="' . esc_url( $item->url ) . '">';

        if ( $has_children ) {
            $output .= '<span>' . esc_html( $item->title ) . '</span>';
            $output .= '<i class="bi bi-chevron-down toggle-dropdown"></i>';
        } else {
            $output .= esc_html( $item->title );
        }

        $output .= '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}

endif;