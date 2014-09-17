<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">

			<?php if (have_posts()) {
					while (have_posts()) {
					  the_post();
					get_template_part('content', 'published_articles'); 
				} //endwhile 
			} else { ?>

				<article id="article-not-found" class="hentry clearfix">
				
					<header class="article-header">
						<h1><?php _e("Oops, Article Not Found!", "rsblawtheme"); ?></h1>
					</header>
					
					<section class="entry-content">
						<p><?php _e("Uh Oh. Something is missing. Try double checking the settings.", "rsblawtheme"); ?></p>
					</section>
					
					<footer class="article-footer">
						<p><?php _e("This is the error message in the single published articles template.", "rsblawtheme"); ?></p>
					</footer>
					
				</article>

			<?php } //endif ?>

		</div> <!-- end #main -->

		<?php get_sidebar('single'); ?>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
