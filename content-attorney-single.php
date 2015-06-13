<?php
/**
 * The template for displaying a loop using content from the attorneys pages.
 *
 * @package WordPress
 * @subpackage RSBlaw.net
 * @since RSBlaw.net 1.0
 */
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
		
			<header class="article-header">
			
				<div class="threecol floatleft">
					<?php the_post_thumbnail('portrait-med'); ?>
				</div> <!-- .fourcol -->
				<div class="ninecol floatright">
					<h1 class="archive-title"><?php echo $displayname; ?></h1>
					
					<div class="attorney-byline">
						<p><em><?php echo $position;?></em>
						<!-- .fivecol -->
							<span class="social-links floatright">
							<!-- job title followed by social badges -->
								<?php // Display the Avvo account, if available
								if ($avvo) {
									echo '<a href="'; echo $avvo; echo'" rel="external">Avvo</a> | ';
								} else {
									echo "";
								} // end Avvo account
								// Display the Facebook account, if available
								if ($facebook) {
									echo '<a href="'; echo $facebook; echo'" rel="external">Facebook</a> | ';
								} else {
									echo "";
								} // end Facebook account
								// Display the Twitter account, if available
								if ($twitter) {
									echo '<a href="'; echo $twitter; echo'" rel="external">Twitter</a> | ';
								} else {
									echo "";
								} // end Twitter account
								// Display the LinnedIn account, if available
								if ($linkedin) {
									echo '<a href="'; echo $linkedin; echo'" rel="external">LinkedIn</a> | ';
								} else {
									echo "";
								} // end LinkedIn account
								// Display the Google account, if available
								if ($googleplus) {
									echo '<a href="'; echo $googleplus; echo'" rel="external">Google+</a>';
								} else {
									echo "";
								} // end Google account ?>
							</span><!-- .social-links-->
						</p>
					</div>
				</div>
			</header> <!-- end article header -->
		
			<section class="ninecol entry-content clearfix">
				<p class="excerpt">
				<p><?php the_content(); ?></p>
			
				<?php /******* INSERT PRACTICE AREA PDFs, if avilable *******/
				if (have_rows('attach_a_pdf')) { // display the practice area pdfs, if a practice area page
	
					if( have_rows('attach_a_pdf') ): ?>
					    <div id="practice-area-pdfs" class="practice-area-pdfs">
						    <h3>Available PDF's</h3>
							<ul>
						
						    <?php while( have_rows('attach_a_pdf') ): the_row(); ?>
						        <li>
									<a href="<?php $pdf = get_sub_field('pdf_file'); echo $pdf['url']; ?>">
										<span class="dashicons dashicons-media-default"></span>
										<?php $pdf = get_sub_field('pdf_file'); echo $pdf['title']; ?>
									</a>
								</li>
						    <?php endwhile; ?>
						
						    </ul>
					    </div>
					<?php endif;
					
				} else { 
					echo "";
				} ?>
				
			</section> <!-- end article section -->
			
			
		</article>