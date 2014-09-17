<?php
/**
 * The template for displaying posts from the RSB results custom post type.
 *
 * @package WordPress
 * @subpackage RSBlaw.
 * @since RSBlaw.net 1.0
 */
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
		
		    <header class="article-header">
		        <?php if ( is_single() ) { ?>
		        
		        	<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		            <h5><?php the_time( get_option( 'date_format' ) ); ?></h5>
		            
		        <?php } else { ?>
		        
		        	<h3 class="entry-title" itemprop="headline"><?php the_title(); ?></h3>
		        	
		        <?php } ?> <!-- end multiple posts title  -->
		    </header> <!-- end article header -->
		    
		    <section class="entry-content clearfix" itemprop="articleBody">
		        <?php the_content(); ?>
		    </section> <!-- end article section -->
		    
		    <?php // comments_template(); ?>
		
		</article> <!-- end article -->