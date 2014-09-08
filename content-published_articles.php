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

		<p class="byline vcard"> <em><?php the_time( get_option( 'date_format' ) ); ?></em> in <a href="<?php echo $link; ?>" title="<?php echo $pub; ?>"><?php echo $pub; ?></a></p>
		<h3 class="entry-title" itemprop="headline"><?php the_title(); ?></h3>
	</header> <!-- end article header -->

		<section class="entry-content clearfix" itemprop="articleBody">
			<?php the_content(); ?>
		</section> <!-- end article section -->
	</article> <!-- end article -->
