<?php
/*
Author: Ben Beekman
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once('library/results-custom_post_type.php'); // Find the other custom post types in CPT-onomy settings in WP Admin
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default


	/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
	add_image_size( 'cta-bg', 1020, 398, true );
	add_image_size( 'landscape-wide', 800, 300, true );
	add_image_size( 'landscape-med', 600, 400, true );
	add_image_size( 'landscape-thumb', 300, 200, true );
	add_image_size( 'portrait-med', 360, 480, true );
	add_image_size( 'portrait-thumb', 240, 320, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'portrait-thumb' ); ?>
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/
// hero banner assignment through panel
// function set_flexslider_hg_rotators( $rotators = array() )
// 	{
// 		$rotators['homepage'] = array( 'size' => 'large' );
// 		return $rotators;
// 	}





/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar( array(
		'name'          => __( 'Firm Overview Sidebar', 'rsblawtheme' ),
		'id'            => 'firm-overview-sidebar',
		'description'   => __( 'Sidebar for the Firm Overview page', 'rsblawtheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name'          => __( 'Practice Areas Sidebar', 'rsblawtheme' ),
		'id'            => 'practice-areas-sidebar',
		'description'   => __( 'Sidebar for the Practice Areas page', 'rsblawtheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name'          => __( 'Results Sidebar', 'rsblawtheme' ),
		'id'            => 'results-sidebar',
		'description'   => __( 'Sidebar for the Results page', 'rsblawtheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name'          => __( 'Blog Archive Sidebar', 'rsblawtheme' ),
		'id'            => 'blog-archive-sidebar',
		'description'   => __( 'Sidebar that appears on the right on the blog archive pages.', 'rsblawtheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Post Sidebar', 'rsblawtheme' ),
		'id'            => 'single-sidebar',
		'description'   => __( 'Sidebar that appears on the right of single posts & pages except for those that have their own more specific sidebar (one of the other widget areas on the Widgets page.', 'rsblawtheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Contact Sidebar', 'rsblawtheme' ),
		'id'            => 'contact-sidebar',
		'description'   => __( 'Sidebar for the Contact page', 'rsblawtheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name'=>'Footer Widgets Left',
		'id' => 'footer-widgets-left',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => 'h4 class=hidden',
		'after_title' => '</h4>',
	));
	register_sidebar( array(
		'name'=>'Footer Widgets Right',
		'id' => 'footer-widgets-right',
		'before_widget' => '<div class="footer-widgets-right">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class=hidden>',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!





/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
					?>
					<!-- custom gravatar call -->
					<?php
					// create variable
					$bgauthemail = get_comment_author_email();
					?>
					<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
					<!-- end custom gravatar call -->
					<?php printf(__('<cite class="fn">%s</cite>', 'rsblawtheme'), get_comment_author_link()) ?>
					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'rsblawtheme')); ?> </a></time>
					<?php edit_comment_link(__('(Edit)', 'rsblawtheme'),'  ','') ?>
				</header>
				<?php if ($comment->comment_approved == '0') {
				 ?>
					<div class="alert alert-info">
						<p><?php _e('Your comment is awaiting moderation.', 'rsblawtheme') ?></p>
					</div>
				<?php } //endif ?>
				<section class="comment_content clearfix">
					<?php comment_text() ?>
				</section>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</article>
			<!-- </li> is added by WordPress automatically -->
			<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __('Search for:', 'rsblawtheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','rsblawtheme').'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
</form>';
return $form;
} // don't remove this bracket!


/* EXTRA CUSTOM FIELDS FOR USER PROFILES START HERE
________________________________________________________________________*/

function remove_unused_profile_elements( $contactmethods ) {

  // Remove Yahoo IM
  if ( isset( $contactmethods['yim'] ) )
    unset( $contactmethods['yim'] );
  // Remove Yahoo IM
  if ( isset( $contactmethods['aim'] ) )
    unset( $contactmethods['aim'] );

  return $contactmethods;
}
add_filter( 'user_contactmethods', 'remove_unused_profile_elements', 10, 1 );


add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

<h3>Extra profile information</h3>

<table class="form-table">

	<tr>
		<th><label for="avvo">Avvo</label></th>

		<td>
			<input type="text" name="avvo" id="avvo" value="<?php echo esc_attr( get_the_author_meta( 'avvo', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Avvo username.</span>
		</td>
	</tr>
	<tr>
		<th><label for="facebook">Facebook</label></th>

		<td>
			<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Facebook username.</span>
		</td>
	</tr>

	<tr>
		<th><label for="twitter">Twitter</label></th>

		<td>
			<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Twitter username.</span>
		</td>
	</tr>

	<tr>
		<th><label for="linkedin">linkedin</label></th>

		<td>
			<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your LinkedIn username.</span>
		</td>
	</tr>
	<tr>
		<th><label for="googleplus">Google&#43;</label></th>

		<td>
			<input type="text" name="googleplus" id="googleplus" value="<?php echo esc_attr( get_the_author_meta( 'googleplus', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Google+ username.</span>
		</td>
	</tr>
</table>
<?php
}

//add capability to store the new fields we just created a front-end UI for.
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'avvo', $_POST['avvo'] );
	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
	update_user_meta( $user_id, 'googleplus', $_POST['googleplus'] );
}
/* EXTRA CUSTOM FIELDS FOR USER PROFILES END HERE
________________________________________________________________________*/




//RESPONSIVE THUMBNAILS CODE STARTS HERE

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

//RESPONSIVE THUMBNAILS CODE ENDS HERE



//ADDITIONAL MODIFICATIONS FOR RSBLAW START HERE

$defaults = array(
	'default-color'          => '',
	'default-image'          => 'http://www.rsblaw.net/wp-content/themes/rsblaw/library/images/rsb-logo.gif',
	'default-repeat'         => 'no-repeat',
	'default-position-x'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);

add_theme_support('custom-background', $defaults);
