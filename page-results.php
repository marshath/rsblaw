<?php
/*
Template Name: Results Page
*/
get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">

			<?php /******* INSERT RESULTSS, if Results page *******/
			if (is_page('results')) {
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						get_template_part('content', 'page');
					} //endwhile
				} //endif
			
				wp_reset_postdata();
	
				// Results Query-- Most recent
				$args = array (
					'post_type'        => 'rsb_result',
					'pagination'       => true,
					'posts_per_page'   => '20',
				);
				
				$results_query = new WP_Query( $args );
	
				if ( $results_query->have_posts()) {
					while ( $results_query->have_posts() ) {
						$results_query->the_post();
						get_template_part('content', 'rsb_result');
					} //endwhile
				} else { ?>
					<p>No Results Found</p>
				<?php };
	
				/* Restore original Post Data */
				wp_reset_postdata();	
			} ?>
			
			
			<?php /******* INSERT TESTIMONIALS, if Testimonial page *******/
			if (is_page('testimonials')) { // display the practice area pdfs, if a practice area page
				
				the_post();
				// Include the page content template.
				get_template_part( 'content', 'page' );
					
				// Results Query-- Most recent
				$args = array (
					'post_type'        => 'testimonials',
					'pagination'       => true,
					'posts_per_page'   => '20',
				);
				
				$results_query = new WP_Query( $args );
	
				if ( $results_query->have_posts()) {
					while ( $results_query->have_posts() ) {
						$results_query->the_post(); ?>
						
						<article>
						    <header>
						        <h3 class="entry-title" itemprop="headline"><?php the_title(); ?></h3>
						    </header> <!-- end article header -->
						    
						    <section class="entry-content clearfix" itemprop="articleBody">
						        <?php the_content(); ?>
						    </section> <!-- end article section -->
						</article>
							
					<?php } //endwhile
				} else { ?>
					<p>No Testimonials Found</p>
				<?php };
	
				/* Restore original Post Data */
				wp_reset_postdata();
				
			} else { 
				echo "";
			} ?>
			
		</div> <!-- end #main -->

		<?php get_sidebar('results'); ?>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>





			
