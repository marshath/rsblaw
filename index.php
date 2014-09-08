<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<header class="article-header">
								<h1 class="page-title" itemprop="headline">Blog</h1>
							</header>

							<?php if (have_posts()) {
								while (have_posts()) {
									the_post();
									get_template_part('content');
									} // endwhile;
								rsb_page_navi();
							} else { ?>
									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'rsblawtheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'rsblawtheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'rsblawtheme' ); ?></p>
										</footer>
									</article>
							<?php } //endif ?>
						</div>

						  <?php get_sidebar('archive'); //fourcol last div inside sidebar ?>

				</div>

			</div>


<?php get_footer(); ?>
