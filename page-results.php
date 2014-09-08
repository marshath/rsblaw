<?php
/*
Template Name: Results Page
*/
get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

			<div id="main" class="eightcol first clearfix" role="main">

				<?php if (have_posts()) {
								while (have_posts()) {
								  the_post(); ?>
					<?php get_template_part('content', 'page'); ?>
				<?php } //endwhile
				} //endif
				wp_reset_postdata();

				// Results Query-- Most recent
				$args = array (
					'post_type'              => 'rsb_result',
					'pagination'             => true,
					'posts_per_page'         => '5',
				);
				$results_query = new WP_Query( $args );

				if ( $results_query->have_posts()) {
					while ( $results_query->have_posts() ) {
						$results_query->the_post(); ?>
						<?php get_template_part('content', 'rsb_result');
					} //endwhile
				} //endif
				//end results loop
else {
	?><p>No Results Found</p><?php
};


			/* Restore original Post Data */
			wp_reset_postdata();
			?>
		</div> <!-- end #main -->

	<?php get_sidebar('results'); ?>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
