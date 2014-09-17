<?php
/*
Template for single posts for results custom post type
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">

			<?php if ( have_posts()) {
				while (have_posts()) {
					the_post();
					get_template_part('content' , 'rsb_result');
				} //endwhile;
			}//endif; ?>

		</div> <!-- end #main -->

		<?php get_sidebar('results'); ?>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
