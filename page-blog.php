<?php
/*
Template Name: Blog Digest
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">
						<header>
						<h1 class="entry-title">Blog</h1></header>

								<?php if (have_posts()) {
								while (have_posts()) {
								  the_post();
							get_template_part( "content" ); ?>
						<?php } //endwhile; } else { ?>

						</div> <!-- end #main -->
                        <div class="fourcol">
						  <?php get_sidebar('archive'); ?>

                        </div>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
