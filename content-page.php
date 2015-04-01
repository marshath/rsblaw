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
				<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			</header> <!-- end article header -->
			
			<section class="entry-content clearfix" itemprop="articleBody">
				<?php the_content(); ?>
			</section> <!-- end article section -->
			
			<?php /******* INSERT PRACTICE AREA CALLOUTS *******/
			if ((is_page('home')) or (is_page('firm-overview'))) {
				get_template_part ('content' , 'practice_area_callouts');
			} ?>
						
			<?php // <footer class="article-footer"></footer> <!-- end article footer --> ?>
		
		</article> <!-- end article -->