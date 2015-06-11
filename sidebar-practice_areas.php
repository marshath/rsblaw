<div id="sidebar-practice-areas" class="sidebar fourcol last clearfix" role="complementary">

	<?php /****************************************************
	 PRACTICE AREAS SIDEBAR
	**********************************************************/
	if ( is_active_sidebar( 'practice-areas-sidebar' ) ) { 
		dynamic_sidebar( 'practice-areas-sidebar' );
    } //endif; ?>
	
	
	<?php /****************************************************
	 TESTIMONIAL SLIDER - Settings - Based on Flexslider
	**********************************************************/ ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#bne-slider-id-95 .bne-testimonial-slider').flexslider({
				animation:   "slide",
				animationSpeed: 700,
				smoothHeight: true,
				pauseOnHover: true,
				controlNav:   true,
				directionNav: true,
				slideshowSpeed: 7000
			});
		});
	</script>
					
							
	<?php /****************************************************
	 TESTIMONIAL SLIDER - Testimonial post query
	**********************************************************/
	$tag_slug = get_post( $post )->post_name;
	// WP_Query arguments
	$result_args = array (
		'post_type'              => 'testimonials',
		'pagination'             => false,
		'paged'                  => '',
		'posts_per_page'         => '',
		'posts_per_archive_page' => '',
		'category_name' => $tag_slug // match the page's manually assigned user slug to the manually assigned slug for rsb_result posts.
	);
	// The Query
	$results_query = new WP_Query( $result_args );
	// The Loop
	if ( $results_query->have_posts() ) { // display if there are Testimonials for this category ?>
			
	<div id="bne_testimonials_slider_widget-8" class="widget widget_bne_testimonials_slider_widget">
		<div class="bne_testimonial_slider_widget">
			
			<h4 class="widget-title">Testimonials</h4>
			
			<div class="bne-element-container">
				<div id="bne-slider-id-95" class="bne-testimonial-slider-wrapper">
					<div class="slides-inner">
						<div class="bne-testimonial-slider bne-flexslider">
							<div class="flex-viewport">
								<ul class="slides">
									<?php while ( $results_query->have_posts() )  { // Begin the loop, display all category Testimonials
										$results_query->the_post(); ?>
									    
									    <li>
											<div class="flex-content">
												
												<h3 class="bne-testimonial-heading"><?php the_title(); ?></h3>
												
												<div class="bne-testimonial-details">
													<span class="bne-testimonial-tagline"><?php the_field('tagline'); ?></span>
												</div><?php // bne-testimonial-details (end) ?>
												
												<div class="bne-testimonial-description">
													<?php the_content(); ?>
												</div>
												
												<div class="clear"></div>
												
											</div>
									    </li>
									
									<?php } // endwhile; //end results loop
									wp_reset_postdata(); ?>
								    
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			
		</div><!-- bne_testimonial_slider_widget (end) -->
	</div>
	<?php } //endif ?>


	<div id="tm_latest_cp_widget-2" class="widget widget_bne_testimonials_slider_widget">
			
		<?php /****************************************************
		 ATTORNEY'S AMAZING RESULTS QUERY-- MOST RECENT
		**********************************************************/
		$tag_slug = get_post( $post )->post_name;
		// WP_Query arguments
		$result_args = array (
			'post_type'              => 'rsb_result',
			'pagination'             => false,
			'paged'                  => '',
			'posts_per_page'         => '',
			'posts_per_archive_page' => '',
			'category_name' => $tag_slug //match the page's manually assigned user slug to the manually assigned slug for rsb_result posts.
		);
		// The Query
		$results_query = new WP_Query( $result_args );
		// The Loop
		if ( $results_query->have_posts() ) { ?>
			
			<h4 class="widget-title">Related Case Results</h4>
			<ul class="tm-latest-updates">
					
				<?php while ( $results_query->have_posts() )  {
					$results_query->the_post();
					echo '<li><h4 class="tm_lcptu_post_title"><a href="'; the_permalink(); echo '" class="tm_lcptu_post_title_link">'; the_title(); echo '</a></h4></li>';
				} // endwhile; //end results loop
			wp_reset_postdata(); ?>
	
			</ul>
		
		<?php } //endif ?>
	</div>
	
	
    <?php $qf=get_field('quick-facts', 11);
    $quickfacts = '<div id="quick-facts" class="widget widget_text"><h4>Quick Facts</h4>'; //prepend opening div
    $quickfacts .= $qf;
    $quickfacts .= '</div>'; //append closing div
    echo $quickfacts;
    //posts the quick facts advanced custom field from the practice areas page in the sidebar ?>

</div>