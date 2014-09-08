<?php get_header(); ?>
<?php
global $post;
			get_header();
			?>
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="twelvecol first clearfix" role="main">

			<?php
			// set user variables
			$id = get_the_author_meta('ID'); //ID assignment for user page, replaces commented page line below (because this is a user page, we can get the user info without the ACF field.
			/* $user_data = get_field('user'); $id = $user_data["ID"]; */

get_header();
?>
<div id="content">

 <div id="inner-content" class="wrap clearfix">

	<div id="main" class="twelvecol first clearfix" role="main">

	 <?php
				 // set user variables
	 $user_data = get_field('user');
	 $id = $user_data["ID"];
	 $id = (string)$id;
	$curauth = $id; //use either of these for WP user id queries
	$user_dataID = "user_{$id}"; //use this for Advanced Custom Field user queries
	$displayname = get_the_author_meta ('display_name', $id);
	$nicename = get_the_author_meta ('user_nicename', $id); //gets the slug for the user account, which should match the slug on the page.
	$bio =   get_the_author_meta ('description', $id); //use this as the "excerpt" preceding the_content
	$email = get_the_author_meta ('user_email', $id);
	$avvo = "http://www.avvo.com/attorneys/" . get_the_author_meta ('avvo', $id);
	$facebook = "http://www.facebook.com/" . get_the_author_meta ('facebook', $id);
	$twitter = "http://www.twitter.com/" . get_the_author_meta ('twitter', $id);
	$linkedin = "http://www.linkedin.com/in/" . get_the_author_meta ('linkedin', $id);
	$googleplus = "http://www.googleplus.com/";
	$gslug= (string)get_the_author_meta ('googleplus', $id);
	$googleplus = $googleplus . $gslug;
	$position = get_field('position');
	$user_slug = get_the_author_meta( 'user_nicename', $id );
	$tag_slug= $user_slug . "-tag";

if (have_posts()) {
	while (have_posts()) {
		the_post(); //the main page & user profile content loop
			include(locate_template('content-attorney-single.php')); //get_template_part with shared variable
	} //endwhile
} //endif
?>
<h2 class="section-title">Published Articles And Decisions</h2><?php
/*********************************************************************
												PUBLISHED ARTICLES AND DECISIONS LOOP
												**********************************************************************/
												// WP_Query arguments
												$article_args = array (
																							 'post_type'              => 'published_articles',
																							 // 'post_status'            => 'published',
																							 'pagination'             => 'true',
																							 'paged'                  => '1',
																							 'posts_per_page'         => '5',
																							 'posts_per_archive_page' => '5',
																							 'order'                  => 'DESC',
																							 'orderby'                => 'date',
																							 'tag'               => $tag_slug
																							 );

// The Query
												$articles_decisions_query = new WP_Query($article_args);

// The Loop
																								// The Loop
												if ( $articles_decisions_query->have_posts() ) {
													while ( $articles_decisions_query->have_posts() ) {
														$articles_decisions_query->the_post();
														$pub=get_field('publication-title');
														$link=get_field('publication-link');
														include(locate_template('content-published_articles.php'));
													} //endwhile
													wp_reset_postdata(); // Restore original Post Data
												} //endif
												?>

 <div class="tan_box"> <!-- begin a two-column split, with pub articles on left and blog posts on right -->
	<div class="sixcol first">
	 <h2 class="section-title"><?php echo $displayname; ?>'s Amazing Results</h2>
	 <?php

/*********************************************************************
										 ATTORNEY'S AMAZING RESULTS QUERY-- MOST RECENT
										 *****************************************/


// WP_Query arguments
										 $result_args = array (
																		'post_type'              => 'rsb_result',
																		'pagination'             => true,
																		'paged'                  => '1',
																		'posts_per_page'         => '5',
																		'posts_per_archive_page' => '10',
																		'tag'               => $tag_slug //match the page's manually assigned user slug to the manually assigned slug for rsb_result posts.
																		);

												// The Query
										 $results_query = new WP_Query( $result_args );

												// The Loop
										 if ( $results_query->have_posts() ) {
											while ( $results_query->have_posts() )  {
												$results_query->the_post();
											include(locate_template('content-rsb_result.php')); // i.e. get_template_part('content', 'rsb_results');
											 } // endwhile; //end results loop
									 wp_reset_postdata();
} //endif
?>
</div> <!-- end .sixcol .first-->

<!-- ATTORNEY'S AMAZING RESULTS QUERY - MOST RECENT -->

<div class="sixcol last divider"> <!-- responsible for the vertical divider to its left-->
<h2 class="section-title"><?php echo $displayname;?>'s Recent Blog Posts</h2>
 <?php
/*********************************************************************
BLOG POSTS QUERY-- MOST RECENT
*********************************************************************/
																			 // WP_Query arguments
																			 $args = array (
																											'post_type' => 'post',
																											'author_name' => $user_slug,
																											'pagination'             => true,
																											'paged'                  => '1',
																											'posts_per_page'         => '5',
																											'posts_per_archive_page' => '10'
																										);

																			 // The Query
																			 $posts = new WP_Query( $args );

																			 if ( $posts->have_posts() ) {
																				?>
																				<?php while ( $posts->have_posts() ) {
																					$posts->the_post();
																				 	include(locate_template('content.php'));
																				} //endwhile
																			} //endif //end results loop
																			?>
																		</div> <!-- .sixcol ,last-->
																		<!-- <footer class="article-footer"> </footer> -->
																	</article> <!-- end article -->



																</div> <!-- end .sixcol .first -->


															</div> <!-- end #main -->

														</div> <!-- end #inner-content -->

													</div> <!-- end #content -->
													<?php get_footer(); ?>
