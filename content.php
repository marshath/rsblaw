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
		
				<div class="entry-meta">
					<?php if ( 'post' == get_post_type() ) ?>
						<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'rsblawtheme' ), __( '1 Comment', 'rsblawtheme' ), __( '% Comments', 'rsblawtheme' ) ); ?></span>
						<?php } //endif
						edit_post_link( __( 'Edit', 'rsblawtheme' ), '<span class="edit-link">', '</span>' );
					?>
				</div><!-- .entry-meta -->
				
			</header><!-- .entry-header -->
		
			<?php if ( is_search() ) { ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div> <!-- .entry-summary -->
			<?php } else {
			} ?>
		
			<div class="entry-content">
			
				<p class="byline vcard">
					<?php if( is_single() ) { // Put the author's avatar on the left side of the byline on the single post template only ?>
						<img class="floatleft" src="<?php echo get_avatar( get_the_author_meta( 'ID' )); ?>">
					<?php } //endif is_single
					printf( __( 'Written by <a href="%1$s"><span class="author">%2$s</span></a><br><time class="updated" datetime="%3$s" pubdate>%4$s</time>', 'rsblawtheme' ),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author_link ( get_the_author_meta( 'ID' ) ) ,
						get_the_time('Y-m-j'),
						get_the_time ( get_option ('date_format') )) ; ?>
				</p> <!-- byline vcard -->
				
				<?php if( is_single() ) { // If there is a post thumbnail, put it to the left of the post on the single post template only ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="first fourcol"><?php the_post_thumbnail('landscape-thumb'); ?></div>
						<div class="last eightcol">
					<?php } //endif post thumbnail
				} //endif is_single
				
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rsblawtheme' ) );
				
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'rsblawtheme' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				
				if( is_single() ) { ?>
					</div>
				<?php } // close the .eightcol div if single ?>
				
			</div><!-- .entry-content -->
			
		</article><!-- #post-## -->