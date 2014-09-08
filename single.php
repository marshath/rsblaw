
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="eightcol first clearfix" role="main">

						<?php if (have_posts()) {

								while (have_posts()) {
								  the_post();
								get_template_part('content'); ?>
							<?php } //endwhile ?>
				 		<?php } else { ?>

							<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e("Oops, Post Not Found!", "rsblawtheme"); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e("Something's missing. Check to make sure everything's set correctly.", "rsblawtheme"); ?></p>
								</section>
								<footer class="article-footer">
									<p><?php _e("This is the error message in the single post template.", "rsblawtheme"); ?></p>
								</footer>
							</article>

						<?php } //endif ?>
				 		endif; ?>


					</div> <!-- end #main -->

					<?php get_sidebar('single'); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
