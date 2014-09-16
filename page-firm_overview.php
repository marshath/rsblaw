<?php
/* Template Name: Firm Overview Page */
?>

<?php get_header(); ?>

		<div id="content">
			<div id="inner-content" class="wrap clearfix">
				<div id="main" class="twelvecol first clearfix" role="main">
				
					<div id="sidebar-firm-overview" class="sidebar fivecol last floatright" role="complementary">
						<?php get_sidebar('firm_overview'); ?>
					</div>
					
					<?php if (have_posts()) {
						while (have_posts()) {
							the_post();
							get_template_part ('content' , 'page');
						} // endwhile
					} else {
						get_template_part( 'content', 'none' );
					} // endif ?>
					
				</div> <!-- end #main -->
			</div> <!-- end #inner-content -->
		</div> <!-- end #content -->

<?php get_footer(); ?>