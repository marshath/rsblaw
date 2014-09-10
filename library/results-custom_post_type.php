<?php
/* Custom Post Types, Categories, and Taxonomies

*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the Post Types
function rsb_result_cpt() {
	
	// *******************
	// Registering RESULTS 
	// *******************
	register_post_type( 'rsb_result', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Results', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Result', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Results', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Result', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Results', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Result', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Result', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Result', 'bonestheme' ), /* Search Partner Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Media coverage of decisions and other articles', 'bonestheme' ), /* Partner Description */
			'public' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 21, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icon-results.png', /* the icon for the custom post type menu */
			'capability_type' => 'post'
		) /* end of options */
	); /* end of register Results */
	
	
	// ******************************************
	// Registering PUBLISHED ARTICLES & DECISIONS 
	// ******************************************
	register_post_type( 'published_articles', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Articles/Decisions', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Article/Decision', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Articles/Decisions', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Article/Decision', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Articles/Decisions', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Article/Decision', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Article/Decision', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Article/Decision', 'bonestheme' ), /* Search Partner Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Media coverage of decisions and other articles', 'bonestheme' ), /* Partner Description */
			'public' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 22, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icon-articles.png', /* the icon for the custom post type menu */
			'taxonomies' => array('category', 'post_tag'), /* displays categories and tags for the cpt */
			'capability_type' => 'post'
		) /* end of options */
	); /* end of register Published Articles and Decisions */
	
	
	// ****************************************************
	// Add the default Categories or Tags to the post types 
	// ****************************************************
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'boardmember' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'boardmember' );
	
}


	// *****************************************
	// adding the function to the Wordpress init 
	// *****************************************
	add_action( 'init', 'rsb_result_cpt');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

?>
