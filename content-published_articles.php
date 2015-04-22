<?php
/**
* The template for displaying posts from the published articles custom post type. Trigger with:
* get_template_part( 'content', get_post_type() );
*
* @package WordPress
* @subpackage RSBlaw.net
* @since RSBlaw.net 1.0
*/
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			
			<header class="article-header"> <!-- may need to remove this header, added because there was a closing -->
				<h3 class="entry-title" itemprop="headline"><a href="<?php echo $link; ?>" title="<?php echo $pub; ?>"><?php the_title(); ?></a></h3>
				<p class="byline vcard">Published in <?php echo $pub; ?> on <em><?php the_time( get_option( 'date_format' ) ); ?></em></p>
			</header> <!-- end article header -->
		
			<section class="entry-content clearfix" itemprop="articleBody">
				<?php the_content(); ?>
			</section> <!-- end article section -->
			
		</article> <!-- end article -->