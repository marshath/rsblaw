			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">
					<div class= "threecol first">
						<h3><?php bloginfo('name'); ?></h3>
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets Left') ) { ?>
						<?php } //endif ?>
					</div>
<!-- center two columns start here -->
					<div class="fivecol">
						<!-- subdivided nav starts -->
						<div class="sevencol vr-l first"> <!-- first of two nav cols-->
							<nav role="navigation">
								<?php footer_links_left(); ?>
							</nav>
						</div>
						<div class="fivecol vr-r"><!-- second of two nav cols-->
							<nav role="navigation">
								<?php footer_links_right(); ?>
							</nav>
						</div>
						<!-- subdivided nav ends -->

					</div> <!-- center two columns end here -->

<!-- right-side footer widgets start here-->
					<div class="threecol last">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets Right') ) { ?>
						<?php } //endif ?>
					</div> <!-- right-side footer widgets end here-->

					<div class="clearfix twelvecol first last aligncenter"><p class="source-org copyright">Copyright &copy;<?php echo date('Y');?> Rose, Senders &amp; Bovarnick, LLC. All rights reserved.</p></div>
				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->


		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

	</body>

	</html> <!-- end page. what a ride! -->
