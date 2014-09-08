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
			<?php the_post_thumbnail('portrait-medium'); ?>
		</div> <!-- .fourcol -->
			<h1 class="archive-title"><?php echo $displayname; ?></h1>

			<div class="byline">
			<p><em><?php echo $position;?></em>
			<!-- .fivecol -->
			<span class="social-links floatright">
			<!-- job title followed by social badges -->
			<a href="<?=$avvo?>" rel="external">Avvo</a> |
			<a href="<?=$facebook?>" rel="external">Facebook</a> |
			<a href="<?=$twitter?>" rel="external">Twitter</a> |
			<a href="<?=$linkedin?>" rel="external">LinkedIn</a> |
			<a href="<?=$googleplus?>" rel="external">Google Plus</a>
		</span><!-- .social-links--></p></div>
</header> <!-- end article header -->

<section class="entry-content clearfix">
	<p class="excerpt"><?php echo $bio; ?></p>
	<p><?php the_content(); ?></p>
</section> <!-- end article section -->
</article>
