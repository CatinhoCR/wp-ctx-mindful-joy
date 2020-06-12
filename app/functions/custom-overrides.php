<?php

/**
 * Custom Nav Menu Walker
 *
 * @access      public
 * @since       1.0 
 * @return      void
 */
class Catix_Custom_Megamenu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        $item->classes[] = 'nav-item';
        $classes         = empty($item->classes) ? array() : (array) $item->classes;

        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

        //Add SPAN if no Permalink
        if ($permalink && $permalink != '#') {
            $output .= '<a class="nav-link" href="' . $permalink . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $title;

        if ($description != '' && $depth == 0) {
            $output .= '<small class="description">' . $description . '</small>';
        }

        if ($permalink && $permalink != '#') {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }

        /*
        Livre based in custom-walker in tokoo vitamins plugin
        global $wp_query;

		$indent 		= ($depth) ? str_repeat("\t", $depth) : '';
		$class_names 	= $value = '';
        $classes 		= empty($item->classes) ? array('nav-item') : (array) $item->classes;
        
        $class_names 	 = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
		$class_names 	 = ' class="' . esc_attr($class_names) . '"';
        $output 		.= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';
        // look at attributes for the li


        add_action( 'wp_update_nav_menu_item', array( $this, 'tokoo_update_custom_nav_fields' ), 10, 3 );
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'tokoo_edit_walker' ), 10, 2 );
        */
    }
}

/**
 * Custom Nav Menu Walker
 *
 * @access      public
 * @since       1.0 
 * @return      void
 */
class Catix_Custom_CategoryDropdown extends Walker_CategoryDropdown
{
    public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        // Reference:
        // https://developer.wordpress.org/reference/functions/wp_dropdown_categories/
    }
}