<?php
/**
 * The template for displaying a loop using content from the attorneys pages.
 *
 * @package WordPress
 * @subpackage RSBlaw.net
 * @since RSBlaw.net 1.0
 */
?>

		<div class="sixcol first">
		
		   <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
		   
		      <div class="fourcol first">
		         <?php the_post_thumbnail('portrait-med'); ?>
		      </div> <!-- .fourcol .first -->
		      
		      <h3 class="archive-title"><?php the_title(); ?></h3>
		      
		      <section class="entry-content clearfix">
		         <?php the_content(); ?>
		      </section> <!-- end article section -->
		      
		   </article>
		   
		</div>