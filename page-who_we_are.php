
<?php
/*
Template Name: Who We Are (Staff Profiles Page)
*/
?>
<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap clearfix">
		<div class="twelvecol clearfix">
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

						<section class="clearfix">
				<?php
			} //endwhile
		} //endif ?>
	<h2 class="section-title">Our Skilled Attorneys</h3>
<!-- NORMAL PAGE LOOP PAUSES HERE -->
<!-- ATTORNEYS LOOP STARTS HERE -->
			<?php
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
			?>

			</section>
<!-- ATTORNEYS LOOP ENDS HERE -->


<!-- NORMAL PAGE LOOP RESUMES HERE -->
			<?php if (have_posts()) {
					while (have_posts()) {
						the_post(); ?>
					<section class="clearfix">
						<?php if(have_rows('staff_profile')) { ?>
							<h2 class="section-title indent clearfix">Our Wonderful Staff</h2>
							<?php
							while(have_rows('staff_profile') ) {
						 		the_row();

								$position = get_sub_field('profile_position');
								$image = get_sub_field('profile_pic');
								$name = get_sub_field('profile_name');
								$bio = get_sub_field('profile_bio');
							?>

							<div class="fourcol staff-profile">
								<?php if( !empty($image) ) { ?>
									<img src="<?php echo $image; ?>" class="attachment-portrait-thumb wp-post-image" alt="<?php the_title(); ?>" height="auto" width="100%">
								<?php } //endif $image; ?>
								<h3 class="profile-name"> <?php echo $name; ?></h3>
								<h5 class="profile-position"><?php echo $position; ?></h5>
								<p class="profile-bio"><?php echo $bio; ?></p>
							</div> <!-- .threecol -->
							<?php } //endwhile ?>
					<?php } //endif ?> <!-- staff profile -->
				</section> <!-- end article section -->
			</article> <!-- end article -->
		<?php } //endwhile ?>
		<?php } //endif ?>
	</div> <!-- end #main -->

</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
