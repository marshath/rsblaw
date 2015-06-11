<?php
/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.

Developed by: Eddie Machado
URL: http://themble.com/bones/

Special Thanks for code & inspiration to:
@jackmcconnell - http://www.voltronik.co.uk/
Digging into WP - http://digwp.com/2010/10/customize-wordpress-dashboard/

*/

/************* ADMIN MENU & DASHBOARD *****************/

// LOAD ADVANCED CUSTOM FIELDS PLUGIN
define( 'ACF_LITE', true ); // hide the ACF menu item in the left sidebar of the Admin Area

// REMOVE ADMIN DASHBOARD WIDGETS
add_action('admin_init', 'remove_dashboard_meta');
function remove_dashboard_meta() {
	remove_meta_box('dashboard_primary', 'dashboard', 'side'); // wordpress news
	// remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // incoming links
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // quick press
	// remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // drafts
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // comments
	// remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // recent activity
} 

// REMOVE WELCOME PANEL
remove_action('welcome_panel', 'wp_welcome_panel');

// REMOVE ADMIN SIDEBAR MENU ITEMS
add_action('admin_menu', 'my_remove_menu_pages');
function my_remove_menu_pages() {
	// remove_menu_page('index.php'); // dashboard
	remove_menu_page('edit.php'); // posts
	remove_menu_page('edit-comments.php'); // comments
	// remove_menu_page('themes.php'); // appearance
	remove_menu_page('plugins.php'); // plugins
	// remove_menu_page('users.php'); //users
	remove_menu_page('tools.php'); //tools
	// remove_menu_page('options-general.php'); // settings
	remove_menu_page('wpseo_dashboard'); // Yoast SEO
}

// REMOVE APPEARANCE SUBMENU ITEMS
add_action('admin_init', 'remove_theme_submenus');
function remove_theme_submenus() {
    global $submenu; 
    unset($submenu['themes.php'][5]); // appearance > themes
    unset($submenu['themes.php'][6]); // appearance > customize
    unset($submenu['themes.php'][20]); // appearance > background
}

// REMOVE ADMIN BAR MENU ITEMS
add_action('wp_before_admin_bar_render', 'my_remove_admin_bar_links');
function my_remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('themes'); // view sites > themes
	$wp_admin_bar->remove_menu('customize'); // view sites > customize
	$wp_admin_bar->remove_menu('widgets'); // view sites > widgets
	$wp_admin_bar->remove_menu('menus'); // view sites > menus
	$wp_admin_bar->remove_menu('customize-background'); // view sites > background
	$wp_admin_bar->remove_menu('updates'); // updates
	$wp_admin_bar->remove_menu('comments'); // comments
	$wp_admin_bar->remove_menu('new-content'); // new post
	// $wp_admin_bar->remove_menu('edit'); // edit post
	$wp_admin_bar->remove_menu('wpseo-menu'); // Yoast SEO 
}


/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter('login_headerurl', 'bones_login_url');
add_filter('login_headertitle', 'bones_login_title');


/************* CUSTOMIZE ADMIN *******************/

/*
I don't really recommend editing the admin too much
as things may get funky if WordPress updates. Here
are a few funtions which you can choose to use if
you like.
*/

// Custom Backend Footer
function bones_custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="http://33degreesds.com" target="_blank">33 Degrees Design Studio</a></span>', 'rsblawtheme');
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');
?>
