<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap clearfix">

				<div id="main" class="twelvecol first clearfix" role="main">

				<h1 class="archive-title h2"><?php post_type_archive_title(); ?></h1>

				<?php if (have_posts()) {
					while (have_posts()) {
					  the_post();
					  $posttype=get_post_type( get_the_ID() );
					  get_template_part('content', $posttype);
					} //endwhile 
				
					if (function_exists('rsb_page_navi')) { 
						rsb_page_navi();
					} else { ?>
						
					<nav class="wp-prev-next">
						<ul class="clearfix">
							<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "rsblawtheme")) ?></li>
							<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "rsblawtheme")) ?></li>
						</ul>
					</nav>
							
					<?php } 
				} else { ?>

					<article id="post-not-found" class="hentry clearfix">
						<header class="article-header">
							<h1><?php _e("Oops, Post Not Found!", "rsblawtheme"); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "rsblawtheme"); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e("This is the error message in the custom results template.", "rsblawtheme"); ?></p>
						</footer>
					</article>

				<?php } //endif ?>

				</div> <!-- end #main -->

				<?php // get_sidebar(); ?>

			</div> <!-- end #inner-content -->
		</div> <!-- end #content -->

<?php get_footer(); ?>