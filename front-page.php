<?php
/*
Template Name: Custom Front Page (Home) Template
*/
?>

<?php get_header(); ?>

		<div id="content">
		
			<?php if (have_posts()) {
				while (have_posts()) {
					the_post(); ?>
							
			<div class="cta-hero" style="background-image:url(<?php the_field('cta_image')?>);">
				<span>
					<div class="cta-container"><img src="<?php the_field('cta_image')?>" class="cta-image"></div> <!--.cta-container -->
					
					<div class="cta-textbox">
						<h1><em><?php the_field('cta_heading'); ?></em></h1>
						<p><?php the_field('cta_body'); ?></p>
						<a href="<?php the_field('cta_link'); ?>"><div class="button-primary aligncenter"><?php the_field('cta_link_label'); ?></div></a>
					</div> <!-- .cta-textbox -->
				</span>
			</div>
			
			<div id="inner-content" class="wrap clearfix">
					
				<div id="main" class="twelvecol clearfix first last" role="main">
					<?php get_template_part('content', 'page' ); ?>
				</div> <!-- end #main-->
				
			</div> <!-- end #inner-content -->
				
				<?php } //endwhile 
			} //endif ?>
		</div> <!-- end #content -->

<?php get_footer(); ?>