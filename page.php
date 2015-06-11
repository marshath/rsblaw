<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">
	
		<div id="main" class="eightcol first clearfix" role="main">

			<?php if (have_posts()) {
				while (have_posts()) {
					the_post();
					// Include the page content template.
					get_template_part( 'content', 'page' );
				} //endwhile
			} else { ?>

			<article id="post-not-found" class="hentry clearfix">
			
				<header class="article-header">
					<h1><?php _e("Sorry, Page Not Found!", "rsblawtheme"); ?></h1>
				</header>
				
				<section class="entry-content">
					<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "rsblawtheme"); ?></p>
				</section>
				
				<footer class="article-footer">
					<p><?php _e("This is the error message in the page.php template.", "rsblawtheme"); ?></p>
				</footer>
				
			</article>
			
			<?php } // end else ?>
		
		</div> <!-- end #main -->

		<?php get_sidebar(); ?>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>