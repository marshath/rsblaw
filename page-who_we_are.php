
<?php
/*
Template Name: Who We Are (Staff Profiles Page)
*/
?>
<?php get_header(); ?>

		<div id="content">
			<div id="inner-content" class="wrap clearfix">
				<?php if (have_posts()) {
					while (have_posts()) {
						the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				
					<header class="article-header">
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
					</header> <!-- end article header -->
					
					<section class="entry-content clearfix" itemprop="articleBody">
						<?php the_content(); ?>
					</section> <!-- end article section -->
					
					<section class="clearfix attorney-profile"> <!-- closes after the attorney loop -->
							
					<?php } //endwhile
				} //endif 
				// NORMAL PAGE LOOP PAUSES HERE ?>
				
						<h2 class="section-title">Our Skilled Attorneys</h2>
						
						<?php // ************ ATTORNEYS LOOP STARTS HERE ************
						$args = array (
			               'post_parent'            => '23',
			               'post_type'              => 'page'
			            );
						// The Query
						$legal_query = new WP_Query( $args );
						if ( $legal_query->have_posts() ) {
							while ( $legal_query->have_posts() ) { $legal_query->the_post();
								include(locate_template('content-attorneys.php')); // get_template_part with shared variable
							} //endwhile
						} //endif
						wp_reset_postdata();
						// ************ ATTORNEYS LOOP ENDS HERE ************* ?>
		
					</section> <!-- closes .clearfix section -->
					
				<?php // NORMAL PAGE LOOP RESUMES HERE
				if (have_posts()) {
					while (have_posts()) {
						the_post(); ?>
						
					<section class="clearfix staff-profile">
					<?php if(have_rows('staff_profile')) { ?>
						<h2 class="section-title indent clearfix cushion">Our Wonderful Staff</h2>
						<?php
						while(have_rows('staff_profile') ) {
					 		the_row();
		
							$position = get_sub_field('profile_position');
							$image = get_sub_field('profile_pic');
							$name = get_sub_field('profile_name');
							$bio = get_sub_field('profile_bio'); ?>
		
						<div class="fourcol staff-profile">
							<?php if( !empty($image) ) { ?>
								<img src="<?php echo $image; ?>" class="attachment-portrait-thumb wp-post-image" alt="<?php the_title(); ?>" height="auto" width="100%">
							<?php } //endif $image; ?>
							<h3 class="profile-name"> <?php echo $name; ?></h3>
							<h5 class="profile-position"><?php echo $position; ?></h5>
							<p class="profile-bio"><?php echo $bio; ?></p>
						</div> <!-- .threecol -->
						
						<?php } // endwhile ?>
						
					<?php } // endif ?> <!-- staff profile -->
					</section> <!-- end article section -->
					
				</article> <!-- end article -->
				
				<?php } //endwhile ?>
			<?php } //endif ?>
				
			</div> <!-- end #inner-content -->
		</div> <!-- end #content -->

<?php get_footer(); ?>