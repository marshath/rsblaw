<?php get_header(); ?>
<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="twelvecol first clearfix" role="main">

		<h1 class="archive-title h2 first eightcol"><?php echo $curauth->display_name; ?></h1>

		<div class="fourcol last"><a href="mailto:<?php echo $curauth->user_email;?>">Mail ?php echo $curauth->display_name; ?></a>
			<?php if (have_posts()) {
				while (have_posts()) {
				  the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

				<header class="article-header">
					<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				</header> <!-- end article header -->

				<section class="entry-content clearfix">
					<?php the_content(); ?>
				</section> <!-- end article section -->

				<section>
					<h3>Published Articles And Decisions</h3>

					<?php wp_reset_postdata();
					/*********************************************************************
					Published Articles and Decisions Loop
					*********************************************************************/
					$args = array (
						'post_type'              => 'published_articles',
						'post_status'            => 'published',
						'pagination'             => true,
						'posts_per_page'         => '10',
						'order'                  => 'DESC',
						'orderby'                => 'date',
					);
					$published_query = new WP_Query( $args );
	
					if ( $published_query->have_posts() ) {
						while ( $published_query->have_posts() ) { $published_query->the_post();
						{ ?>
						
					<article>
						<section>
							<h2><?php the_title(); ?></h2>
							<p><?php the_content(); ?></p>
						</section>
					</article>
					
						<?php }
						endwhile;
					} //end published articles loop
					wp_reset_postdata(); ?>
					
					<div class="sixcol">
						<?php
						/*********************************************************************
						Results Query-- Most recent
						*********************************************************************/
						$args = array (
							'post_type'              => 'rsb_result',
							'post_status'            => 'published',
							'pagination'             => true,
							'posts_per_page'         => '10',
							'order'                  => 'DESC',
							'orderby'                => 'date',
							'tag'					 => $curauth
						);
	
						$results_query = new WP_Query( $args );
	
						if ( $results_query->have_posts() ) {
							while ( $results_query->have_posts() ) { $results_query->the_post();
							{ ?>
							<article>
								<section>
									<h2>
										<?php the_title(); ?>
									</h2>
									<p>
										<?php the_excerpt(); ?>
									</p>
								</section>
							</article>
							<?php } 
							endwhile; 
						} //end results loop
						/* Restore original Post Data */
						wp_reset_postdata();?>
						
					</div> <!-- .sixcol -->

				</section>
				
				<?php // <footer class="article-footer"></footer> <!-- end article footer --> ?>
				
			</article> <!-- end article -->

				<?php } //endwhile ?>

			<?php } else { ?>

			<article id="post-not-found" class="hentry clearfix">
			
				<header class="article-header">
					<h1><?php _e("Oops, Post Not Found!", "rsblawtheme"); ?></h1>
				</header>
				
				<section class="entry-content">
					<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "rsblawtheme"); ?></p>
				</section>
				
				<footer class="article-footer">
					<p><?php _e("This is the error message in the custom lawyers template.", "rsblawtheme"); ?></p>
				</footer>
				
			</article>

			<?php } //endif ?>

		</div> <!-- end #main

		<?php get_sidebar(); ?>-->

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
