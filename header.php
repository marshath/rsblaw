<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<title><?php if ( is_single() ) { echo get_bloginfo('name') . ' | ' . wp_title(); } else { echo get_bloginfo('name'); } ?></title>

	<!-- Google Chrome Frame for IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- mobile meta (hooray!) -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<!-- or, set /favicon.ico for IE10 win -->
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!-- wordpress head functions -->
	<?php wp_head(); ?>
	<!-- end of wordpress head -->

	<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700,700italic' rel='stylesheet' type='text/css'>
	<!-- <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'> -->
</head>

<body <?php body_class(); ?>>
	<?php // drop Google Analytics Here ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-55770513-1', 'auto');
	  ga('send', 'pageview');
	</script>
	<?php // end analytics ?>
	<div id="container">
		<header class="header" role="banner">

			<div id="inner-header" class="wrap clearfix">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="sitelogo" title="Home">
					<div class="home-link"><img src="<?php bloginfo('template_directory'); ?>/library/images/rsb-logo.gif" alt="Rose Senders and Bovarnick, LLC" /></div>
				</a>
				<!-- Call the slogan with HTML formatting -->
				<div class="slogan"><?php echo html_entity_decode(get_bloginfo('description')); ?></div>
				<nav role="navigation">
					<?php bones_main_nav(); ?>
				</nav>
			</div> <!-- end #inner-header -->

		</header> <!-- end header -->