<?php get_header(); ?>

		<div id="content">
			<div id="inner-content" class="wrap clearfix">

				<div id="main" class="eightcol first clearfix" role="main">

				<?php if (is_category()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e("Posts Categorized:", "rsblawtheme"); ?></span> <?php single_cat_title(); ?>
					</h1>
					
				<?php } elseif (is_tag()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e("Posts Tagged:", "rsblawtheme"); ?></span> <?php single_tag_title(); ?>
					</h1>
					
				<?php } elseif (is_author()) {
					global $post;
					$author_id = $post->post_author;
				?>
					<h1 class="archive-title h2">
						<span><?php _e("Posts By:", "rsblawtheme"); ?></span> <?php the_author_meta('display_name', $author_id); ?>
					</h1>
					
				<?php } elseif (is_day()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e("Daily Archives:", "rsblawtheme"); ?></span> <?php the_time('l, F j, Y'); ?>
					</h1>
					
				<?php } elseif (is_month()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e("Monthly Archives:", "rsblawtheme"); ?></span> <?php the_time('F Y'); ?>
					</h1>
					
				<?php } elseif (is_year()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e("Yearly Archives:", "rsblawtheme"); ?></span> <?php the_time('Y'); ?>
					</h1>
				<?php } ?>

				<?php if (have_posts()) { while (have_posts()) { the_post(); ?>

				<?php get_template_part('content', 'archive')?>

				<?php } //endwhile ?>

				<?php if (function_exists('rsb_page_navi')) {
					rsb_page_navi();
					 } else { ?>
					 
					<nav class="wp-prev-next">
						<ul class="clearfix">
							<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "rsblawtheme")) ?></li>
							<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "rsblawtheme")) ?></li>
						</ul>
					</nav>
					
				<?php } //end rsb_page_navi
				} else { ?>

					<article id="post-not-found" class="hentry clearfix">
					
						<header class="article-header">
							<h1><?php _e("Oops, Post Not Found!", "rsblawtheme"); ?></h1>
						</header>
						
						<section class="entry-content">
							<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "rsblawtheme"); ?></p>
						</section>
						
						<footer class="article-footer">
							<p><?php _e("This is the error message in the archive.php template.", "rsblawtheme"); ?></p>
						</footer>
						
					</article>

				<?php } //END ARTICLE LOOP; ?>

				</div> <!-- end #main -->

				<?php get_sidebar('archive'); ?>

			</div> <!-- end #inner-content -->
		</div> <!-- end #content -->
		
<?php get_footer(); ?>