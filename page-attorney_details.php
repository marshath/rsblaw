 <?php
/*
Template Name: Attorney Details
*/
get_header();
?>
<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="twelvecol first clearfix" role="main">

			<?php // set user variables
			$user_data = get_field('user');
			$id = $user_data["ID"];
			$id = (string)$id;
			$curauth = $id; //use either of these for WP user id queries
			$user_dataID = "user_{$id}"; //use this for Advanced Custom Field user queries
			$displayname = get_the_author_meta ('display_name', $id);
			$nicename = get_the_author_meta ('user_nicename', $id); //gets the slug for the user account, which should match the slug on the page.
			$bio =   get_the_author_meta ('description', $id); //use this as the "excerpt" preceding the_content
			$email = get_the_author_meta ('user_email', $id);
			$avvo = get_the_author_meta ('avvo', $id);
			$facebook = get_the_author_meta ('facebook', $id);
			$twitter = get_the_author_meta ('twitter', $id);
			$linkedin = get_the_author_meta ('linkedin', $id);
			$googleplus = get_the_author_meta ('googleplus', $id);
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
			<div class="clearfix cushion"></div>
			<div class="sixcol first tan_box2">
				<?php /****************************************************
				 ATTORNEY'S AMAZING RESULTS QUERY-- MOST RECENT
				**********************************************************/
				
				// WP_Query arguments
				$result_args = array (
					'post_type'              => 'rsb_result',
					'pagination'             => false,
					'paged'                  => '',
					'posts_per_page'         => '',
					'posts_per_archive_page' => '',
					'tag'               => $tag_slug //match the page's manually assigned user slug to the manually assigned slug for rsb_result posts.
				);
				
				// The Query
				$results_query = new WP_Query( $result_args );
				// The Loop
				if ( $results_query->have_posts() ) {
					echo '<h2 class="section-title">Attorney Results</h2>'; // write the section title
					while ( $results_query->have_posts() )  {
						$results_query->the_post();
					include(locate_template('content-rsb_result.php')); // i.e. get_template_part('content', 'rsb_results');
				} // endwhile; //end results loop
				wp_reset_postdata();
				} //endif ?>
				
			</div> <!-- end .sixcol .first-->
			
			<div class="sixcol last blog-bar"> <!-- responsible for the vertical divider to its left-->
			
				<?php /*********************************************************************
				 PUBLISHED ARTICLES AND DECISIONS LOOP
				**********************************************************************/
				// WP_Query arguments
				$article_args = array (
					'post_type'              => 'published_articles',
					// 'post_status'            => 'published',
					'pagination'             => 'false',
					'paged'                  => '1',
					'posts_per_page'         => '',
					'posts_per_archive_page' => '',
					'order'                  => 'DESC',
					'orderby'                => 'date',
					'tag'               => $tag_slug
					);
				
				// The Query
				$articles_decisions_query = new WP_Query($article_args);
				
				// The Loop
				if ( $articles_decisions_query->have_posts() ) {
					echo '<h2 class="section-title">Published Articles &amp; Decisions</h2>'; // write the section title
					while ( $articles_decisions_query->have_posts() ) {
						$articles_decisions_query->the_post();
						$pub=get_field('publication-title');
						$link=get_field('publication-link');
						include(locate_template('content-published_articles.php'));
					} //endwhile
					wp_reset_postdata(); // Restore original Post Data
				} //endif
				?>
				
			</div> <!-- .sixcol ,last-->
			
			<!-- <footer class="article-footer"> </footer> -->
			<!-- </article> end article -->
			<!-- end </div> .sixcol .first -->

		</div> <!-- end #main -->
	</div> <!-- end #inner-content -->

</div> <!-- end #content -->
<?php get_footer(); ?>
