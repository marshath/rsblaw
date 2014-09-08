<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage RSBlaw.net
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

<!-- Featured Image spans the main column (if it exists) -->
   <?php if ( has_post_thumbnail() ) {
   	?> <div class="full-col-img"> <?php the_post_thumbnail( 'landscape-wide' ); ?></div> <?php
   } ?>

	<header class="article-header">
		<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
	</header> <!-- end article header -->
	<section class="entry-content clearfix" itemprop="articleBody">
		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->


</article> <!-- end article -->
