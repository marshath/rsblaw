<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage RSBlaw.net
 * @since RSBlaw.net 1.0
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<header class="entry-header">
				<?php if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				} //endif ?>
			</header> <!-- .entry-header -->
		
			<?php if ( is_search() ) { ?>
			
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div> <!-- .entry-summary -->
			
			<?php } else {} ?>
		
			<div class="entry-content">
				<p class="byline vcard">
					<?php printf( __( 'Written by <span class="author">%2$s</span> on <time class="updated" datetime="%3$s" pubdate>%4$s</time>', 'rsblawtheme' ),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author_link ( get_the_author_meta( 'ID' ) ) ,
						get_the_time('Y-m-j'),
						get_the_time ( get_option ('date_format') )) ; ?>
				</p> <!-- byline vcard -->
		
				<div class="entry-meta">
					<?php if ( 'post' == get_post_type() ) ?>
						<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
						<!-- <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'rsblawtheme' ), __( '1 Comment', 'rsblawtheme' ), __( '% Comments', 'rsblawtheme' ) ); ?></span> -->
						<?php } //endif
						edit_post_link( __( 'Edit', 'rsblawtheme' ), '<span class="edit-link">', '</span>' );
					?>
				</div> <!-- .entry-meta -->
				
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rsblawtheme' ) );
				
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'rsblawtheme' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) ); ?>
				
			</div> <!-- .entry-content -->
			
			<?php if ( is_single() ) { ?>
			<div class="disqus">
				<?php comments_template(); ?>
			</div>
			<?php } ?>
			
		</article> <!-- #post-## -->