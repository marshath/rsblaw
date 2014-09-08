<?php
/* Legal Results Custom Post Type
*/

if ( ! function_exists('rsb_result_cpt') ) {

// Register Custom Post Type
function rsb_result_cpt() {

    $labels = array(
        'name'                => _x( 'Results', 'Post Type General Name', 'rsblawtheme' ),
        'singular_name'       => _x( 'Result', 'Post Type Singular Name', 'rsblawtheme' ),
        'menu_name'           => __( 'Results', 'rsblawtheme' ),
        'parent_item_colon'   => __( 'Parent Result:', 'rsblawtheme' ),
        'all_items'           => __( 'All Results', 'rsblawtheme' ),
        'view_item'           => __( 'View Result', 'rsblawtheme' ),
        'add_new_item'        => __( 'Add New Result', 'rsblawtheme' ),
        'add_new'             => __( 'Add New', 'rsblawtheme' ),
        'edit_item'           => __( 'Edit Result', 'rsblawtheme' ),
        'update_item'         => __( 'Update Result', 'rsblawtheme' ),
        'search_items'        => __( 'Search Results', 'rsblawtheme' ),
        'not_found'           => __( 'Not found', 'rsblawtheme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'rsblawtheme' ),
    );
    $results_args = array(
        'label'               => __( 'rsb_result', 'rsblawtheme' ),
        'description'         => __( 'Results from Previous Cases.', 'rsblawtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6, /* Appears right after Articles & Decisions (at 5), which is right after Posts */
        'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'rsb_result', $results_args );

}

// Hook into the 'init' action
add_action( 'init', 'rsb_result_cpt', 0 );

}
