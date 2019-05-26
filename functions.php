<?php
/**
 * Twenty Nineteen functions and definitions
 *  alfiroze theme
 */
function register_main_menu() {
    register_nav_menu('main-menu',__( 'Main Menu' ));
  }
  add_action( 'init', 'register_main_menu' );

add_theme_support( 'post-thumbnails' );

function m1_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'm1_logo' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm1_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'm1_logo',
    ) ) );
}
add_action( 'customize_register', 'm1_customize_register' );

//wedget
function wpb_widgets_init() { 
    register_sidebar( array(
        'name'          => 'footer right',
        'id'            => 'footer-right-widget',
        'before_widget' => '<div class="component type-labeled-box">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="labeled-box__title">',
        'after_title'   => '</div>',
    ) );
    register_sidebar( array(
        'name'          => 'footer left',
        'id'            => 'footer-left-widget',
        'before_widget' => '<div class="component type-labeled-box">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="labeled-box__title">',
        'after_title'   => '</div>',
    ) );
    register_sidebar( array(
        'name'          => 'footer mid',
        'id'            => 'footer-mid-widget',
        'before_widget' => '<div class="component type-labeled-box">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="labeled-box__title">',
        'after_title'   => '</div>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );
// search_form_topbar
function get_search_form_top_bar( $echo = true ) {
   
    do_action( 'pre_get_search_form_top_bar' );
 
    $format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';
 
    $format = apply_filters( 'search_form_format_top_bar', $format );
 
    $search_form_template = locate_template( 'searchform.php' );
    if ( '' != $search_form_template ) {
        ob_start();
        require( $search_form_template );
        $form = ob_get_clean();
    } else {
        if ( 'html5' == $format ) {
            $form = '<form role="search" method="get" class="component type--form theme--search" action="' . esc_url( home_url( '/' ) ) . '">
            <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="اكتب هنا">
            <input type="submit" value=""  />   
            </form>';
        } else {
            $form = '<form role="search" method="get" id="searchform" class="component type--form theme--search" action="' . esc_url( home_url( '/' ) ) . '">
            <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="اكتب هنا">
            <input type="submit" value=""  />   
            </form>';
        }
    }
 
    $result = apply_filters( 'get_search_form_top_bar', $form );
 
    if ( null === $result ) {
        $result = $form;
    }
 
    if ( $echo ) {
        echo $result;
    } else {
        return $result;
    }
}
function get_search_form_page( $echo = true ) {
   
    do_action( 'pre_get_search_form_page' );
 
    $format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';
 
    $format = apply_filters( 'search_form_format_page', $format );
 
    $search_form_template = locate_template( 'searchform.php' );
    if ( '' != $search_form_template ) {
        ob_start();
        require( $search_form_template );
        $form = ob_get_clean();
    } else {
        if ( 'html5' == $format ) {
            $form = '<form role="search" method="get" class="component type--form theme--search-results" action="' . esc_url( home_url( '/' ) ) . '">
            <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="اكتب هنا">
            <input type="submit" value=""  />   
            </form>';
        } else {
            $form = '<form role="search" method="get" id="searchform" class="component type--form theme--search-results" action="' . esc_url( home_url( '/' ) ) . '">
            <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="اكتب هنا">
            <input type="submit" value=""  />   
            </form>';
        }
    }
 
    $result = apply_filters( 'get_search_form_page', $form );
 
    if ( null === $result ) {
        $result = $form;
    }
 
    if ( $echo ) {
        echo $result;
    } else {
        return $result;
    }
}

function the_term_image_taxonomy( $taxonomy ) {
    // use for tags instead of categories
    return 'clinics';
}
add_filter( 'taxonomy-term-image-taxonomy', 'the_term_image_taxonomy' );

function get_clinics( $args = '' ) {
    $defaults = array( 'taxonomy' => 'clinics' );
    $args     = wp_parse_args( $args, $defaults );
 
    $taxonomy = $args['taxonomy'];
 
    /**
     * Filters the taxonomy used to retrieve terms when calling get_clinics().
     *
     * @since 2.7.0
     *
     * @param string $taxonomy Taxonomy to retrieve terms from.
     * @param array  $args     An array of arguments. See get_terms().
     */
    $taxonomy = apply_filters( 'get_clinics_taxonomy', $taxonomy, $args );
 
    // Back compat
    if ( isset( $args['type'] ) && 'link' == $args['type'] ) {
        _deprecated_argument(
            __FUNCTION__,
            '3.0.0',
            /* translators: 1: "type => link", 2: "taxonomy => link_clinic" */
            sprintf(
                __( '%1$s is deprecated. Use %2$s instead.' ),
                '<code>type => link</code>',
                '<code>taxonomy => link_clinic</code>'
            )
        );
        $taxonomy = $args['taxonomy'] = 'link_clinic';
    }
 
    $clinics = get_terms( $taxonomy, $args );
 
    if ( is_wp_error( $clinics ) ) {
        $clinics = array();
    } else {
        $clinics = (array) $clinics;
        foreach ( array_keys( $clinics ) as $k ) {
            _make_cat_compat( $clinics[ $k ] );
        }
    }
 
    return $clinics;
}

function get_clinic_link( $clinic ) {
    if ( ! is_object( $clinic ) ) {
        $clinic = (int) $clinic;
    }
 
    $clinic = get_term_link( $clinic );
 
    if ( is_wp_error( $clinic ) ) {
        return '';
    }
 
    return $clinic;
}

function dynamic_field_values ( $tag, $unused ) {

    if ( $tag['name'] != 'menu-656' )
        return $tag;

    $args = array (
        'numberposts'   => -1,
        'post_type'     => 'doctors',
        'orderby'       => 'title',
        'order'         => 'ASC',
    );

    $custom_posts = get_clinics( array(
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );
    if ( ! $custom_posts )
        return $tag;

    foreach ( $custom_posts as $custom_post ) {

        $tag['raw_values'][] = $custom_post->name;
        $tag['values'][] = $custom_post->name;
        $tag['labels'][] = $custom_post->name;

    }

    return $tag;

}

add_filter( 'wpcf7_form_tag', 'dynamic_field_values', 10, 2);

function paginate_links_fa( $args = '' ) {
    global $wp_query, $wp_rewrite;
 
    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );
 
    // Get max pages and current page out of the current query, if available.
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
 
    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';
 
    // URL base depends on permalink settings.
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
 
    $defaults = array(
        'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format'             => $format, // ?page=%#% : %#% is replaced by the page number
        'total'              => $total,
        'current'            => $current,
        'aria_current'       => 'page',
        'show_all'           => false,
        'prev_next'          => true,
        'prev_text'          => __( '&laquo; Previous' ),
        'next_text'          => __( 'Next &raquo;' ),
        'end_size'           => 1,
        'mid_size'           => 2,
        'type'               => 'plain',
        'add_args'           => array(), // array of query args to add
        'add_fragment'       => '',
        'before_page_number' => '',
        'after_page_number'  => '',
    );
 
    $args = wp_parse_args( $args, $defaults );
 
    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }
 
    // Merge additional query vars found in the original URL into 'add_args' array.
    if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format       = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );
 
        // Find the query args of the requested URL.
        wp_parse_str( $url_parts[1], $url_query_args );
 
        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }
 
        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }
 
    // Who knows what else people pass in $args
    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 2;
    }
    $add_args   = $args['add_args'];
    $r          = '';
    $page_links = array();
    $dots       = false;
 
    if ( $args['prev_next'] && $current && 1 < $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args ) {
            $link = add_query_arg( $add_args, $link );
        }
        $link .= $args['add_fragment'];
 
        /**
         * Filters the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<a  href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">السابق</a>';
    endif;
    for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
            $page_links[] = "<a  aria-current='" . esc_attr( $args['aria_current'] ) . "' class='active'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . '</a>';
            $dots         = true;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args ) {
                    $link = add_query_arg( $add_args, $link );
                }
                $link .= $args['add_fragment'];
 
                /** This filter is documented in wp-includes/general-template.php */
                $page_links[] = "<a  href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . '</a>';
                $dots         = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';
                $dots         = false;
            endif;
        endif;
    endfor;
    if ( $args['prev_next'] && $current && $current < $total ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args ) {
            $link = add_query_arg( $add_args, $link );
        }
        $link .= $args['add_fragment'];
 
        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<a  href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">التالى</a>';
    endif;
    switch ( $args['type'] ) {
        case 'array':
            return $page_links;
 
        case 'list':
            $r .= "<ul class='page-numbers'>\n\t<li>";
            $r .= join( "</li>\n\t<li>", $page_links );
            $r .= "</li>\n</ul>\n";
            break;
 
        default:
            $r = join( "\n", $page_links );
            break;
    }
    return $r;
}

function dynamic2_field_values ( $tag, $unused ) {

    if ( $tag['name'] != 'menu-651' )
        return $tag;

    $args = array (
        'numberposts'   => -1,
        'post_type'     => 'program_care',
        'orderby'       => 'title',
        'order'         => 'ASC',
    );

    $custom_posts = get_posts( $args );
    if ( ! $custom_posts )
        return $tag;

    foreach ( $custom_posts as $custom_post ) {
        $tag['raw_values'][] = $custom_post->post_title;
        $tag['values'][] = $custom_post->post_title;
        $tag['labels'][] = $custom_post->post_title;

    }

    return $tag;

}

add_filter( 'wpcf7_form_tag', 'dynamic2_field_values', 10, 2);

function remove_page_from_query_string($query_string)
{ 
    if ($query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        $query_string['paged'] = $query_string['page'];
    }      
    return $query_string;
}
add_filter('request', 'remove_page_from_query_string');

function doctoers_metabox( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'doctors',
		'title' => esc_html__( 'doctors Metabox', 'metabox_create' ),
		'post_types' => array('doctors' ),
		'context' => 'after_editor',
		'priority' => 'low',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'image_advanced',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Image Advanced', 'metabox_create' ),
				'max_status' => 'false',
			),			
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'doctoers_metabox' );

function galary_meta_box( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'galary1',
		'title' => esc_html__( 'galary Metabox', 'metabox-galary' ),
		'post_types' => array('galary' ),
		'context' => 'after_editor',
		'priority' => 'low',
		'autosave' => 'true',
		'fields' => array(
            array(
				'id' => $prefix . 'image_advanced',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Images', 'metabox_create' ),
				'max_status' => 'false',
				'max_file_uploads' => '6',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'galary_meta_box' );


function service_meta_box( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'service',
		'title' => esc_html__( 'service Metabox', 'metabox-service' ),
		'post_types' => array('services' ),
		'context' => 'after_editor',
		'priority' => 'low',
		'autosave' => 'true',
		'fields' => array(
            array(
				'id' => $prefix . 'image_advanced',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Images', 'metabox_create' ),
				'max_status' => 'false',
				'max_file_uploads' => '3',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'service_meta_box' );
function vedio_upload( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'vedio_upload',
		'title' => esc_html__( 'vedio upload', 'metabox-vedio' ),
		'post_types' => array('vedio' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'video_1',
				'type' => 'video',
				'name' => esc_html__( 'Video', 'metabox-vedio' ),
				'max_file_uploads' => 1,
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'vedio_upload' );

/**
 * Implement the Custom  feature.
 */
require get_parent_theme_file_path( '/theme_option/control.php' );
require get_parent_theme_file_path( '/theme_option/pagination.php' );