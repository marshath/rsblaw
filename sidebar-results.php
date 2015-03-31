<div id="sidebar-rsb_result" class="sidebar fourcol last clearfix" role="complementary">

	<?php if ( is_active_sidebar( 'results-sidebar' ) ) { ?>
		<?php dynamic_sidebar( 'results-sidebar' ); ?>
	<?php } else { ?>
	<?php } //endif; ?>
			
	<?php /******* INSERT PRACTICE AREA CALLOUTS *******/
		get_template_part ('content' , 'practice_area_callouts');
	?>

</div>