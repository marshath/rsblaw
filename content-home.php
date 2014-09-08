<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage RSBlaw.net
 */
?>
<div class="cta-container">
	<div class="cta" style="background: url(<?php the_field('cta_image');?>) no-repeat scroll 0 0 transparent; background-size: 100% auto; min-height: 300px; background-size: cover;">
		<div class="cta-textbox">
			<h1><em><?php the_field('cta_heading'); ?></em></h1>
			<p><?php the_field('cta_body'); ?>We can help you learn your rights and get the compensation that you deserve. Take a moment to call or contact us to find out more.</p>
			<div class="button-primary">
				<a href="<?php the_field('cta_link'); ?>"><?php the_field('cta_link_label'); ?></a>
			</div> <!-- .button -->
		</div> <!-- .cta-textbox -->
	</div> <!-- .cta -->
</div> <!-- .cta_container -->
<article id="home-article" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
	</header> <!-- end article header -->

	<section class="entry-content clearfix" itemprop="articleBody">
		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

	<?php //comments_template(); ?>

</article> <!-- end article -->
