<?php
/**
* The template for displaying featured posts on the front page
*
* @package WordPress
* @subpackage RSBlaw.net
* @since RSBlaw.net 1.0
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php // Output the featured image.
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} // endif; ?>
			</a>
		
			<header class="entry-header">
			
				<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) { ?>
					<div class="entry-meta">
						<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'rsblawtheme' ) ); ?></span>
					</div> <!-- .entry-meta -->
				<?php } // endif; ?>
		
				<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
				
			</header><!-- .entry-header -->
			 
		</article><!-- #post-## -->