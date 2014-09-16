<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="sevencol first clearfix" role="main">

			<?php if (have_posts()) {
				while (have_posts()) {
					the_post();
					// Include the page content template.
					get_template_part( 'content', 'page' );
				} // endwhile;
			} else {
				get_template_part( 'content', 'none' );
			} // endif; ?>
		</div> <!-- end #main -->

		<?php get_sidebar('contact'); ?>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>