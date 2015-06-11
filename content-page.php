<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage RSBlaw.net
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
		
			<?php if ( has_post_thumbnail() ) { // Featured Image spans the main column (if it exists) ?>
				<div class="full-col-img"><?php the_post_thumbnail( 'landscape-wide' ); ?></div>
			<?php } ?>
		
			<header class="article-header">
				<?php if (is_page(array(92, 235, 94, 21, 237, 93))) { // display the practice area icon, if a practice area page ?>
					<div class="icon-<?php echo get_field("pa_callout_icon"); ?>"></div>
				<?php } else { 
					echo "";
				} ?>
				<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1> <?php // display the title ?>
			</header> <!-- end article header -->
			
			<section class="entry-content clearfix" itemprop="articleBody"> <?php // display the content ?>
				<?php the_content(); ?>
			</section> <!-- end article section -->
			
			
			<?php /******* INSERT PRACTICE AREA CALLOUTS *******/
			if ((is_page('home')) or (is_page('firm-overview'))) {
				get_template_part ('content' , 'practice_area_callouts');
			} ?>
			
			
			<?php /******* INSERT PRACTICE AREA PDFs, if avilable *******/
			if (is_page(array(92, 235, 94, 21, 237, 93))) { // display the practice area pdfs, if a practice area page

				if( have_rows('attach_a_pdf') ): ?>
				    <div id="practice-area-pdfs" class="practice-area-pdfs">
					    <h3>Related PDF's</h3>
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
			
			 
			<?php // <footer class="article-footer"></footer> <!-- end article footer --> ?>
		
		</article> <!-- end article -->