<?php
/* Template Name: Practice Areas Page */
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

			<div id="main" class="eightcol first clearfix" role="main">

				<?php if (have_posts()) {
					while (have_posts()) {
						the_post(); ?>
						<?php get_template_part ('content' , 'page');
					} //endwhile
				} else {
					get_template_part ('content' , 'none');
				} //endif ?>
			</div> <!-- end #main -->
					<?php get_sidebar('practice_areas');
					?>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
