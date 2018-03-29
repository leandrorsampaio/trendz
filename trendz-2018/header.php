<!doctype html>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; <?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">


        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"/>

		<link href="https://fonts.googleapis.com/css?family=Oswald:200,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,700" rel="stylesheet">



		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/libs/reset.css" >
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/libs/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/libs/font-awesome.min.css"/>
		<script src="<?php echo get_template_directory_uri(); ?>/libs/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/app.js" type="text/javascript"></script>

		<!--
		<script src="<?php echo get_template_directory_uri(); ?>/libs/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/libs/jquery-ui.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/libs/jquery-ui.min.css"/>
		-->


		<link rel="stylesheet/less" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/style.less" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" type="text/javascript"></script>




        <?php wp_head(); ?>


	</head>

    <body>





        <div id="wrapper" class="wrapper">


			<div id="topbar" class="topbar">

			</div>


	        <header id="header" class="container">

				<div class="row header-wrapper">
					<div class="col-10 header-wrapper-main">
						<div class="header-wrapper-main-logo">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
							<h1 class="logo-text">The Creative Source & How-To-Guide For Shopping Center & Retail Professionals</h1>
						</div>
						<div class="header-wrapper-main-menu">
							<ul class="menu menu-header">
								<?php
								// WP_Query arguments
								$args_menuheader = array(
									'post_type'              => array( 'menuheader' ),
									'order'                  => 'ASC'
								);
								// The Query
								$query_menuheader = new WP_Query( $args_menuheader );
								// The Loop
								if ( $query_menuheader->have_posts() ) {

									while ( $query_menuheader->have_posts() ) {
										$query_menuheader->the_post();

										$var_menuheader_title = get_the_title();
										$var_menuheader_link = get_field('menu_link');

										echo '<li class="menu-item level-1 ">';
										echo '<a class="menu-item-link" href="' . $var_menuheader_link . '">' . $var_menuheader_title . '</a>';
										echo '</li>';
									}

								} else {
									// no posts found
								}
								// Restore original Post Data
								wp_reset_postdata();
								?>
							</ul>
						</div>
						<div class="header-wrapper-main-search">
							<form class="search-header">
								<input class="search-header-imput" type="text" value="Search..." onclick="this.value=''" />
								<button class="search-header-btn">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>

					</div>
					<div class="col-2 header-wrapper-side">
						<div class="header-printedition">
							<div class="header-printedition-header">
								<p>
									Print edition:
								</p>
								<img src="<?php echo get_template_directory_uri(); ?>/images/icsc.png" alt="icsc logo"/>
							</div>
							<div class="header-printedition-cover">

							</div>
						</div>
						<div class="header-social">
							<a class="header-social-link facebook" href="#">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
							<a class="header-social-link twitter" href="#">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
							<a class="header-social-link linkedin" href="#">
								<i class="fa fa-linkedin" aria-hidden="true"></i>
							</a>
							<a class="header-social-link rss" href="#">
								<i class="fa fa-rss" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>

	        </header><!-- #header -->


			<div id="togglead" class="container togglead">

				<div class="row togglead-wrapper">
					<div class="col-12 togglead-wrapper-inner">
						<div class="togglead-wrapper-inner-line">
						</div>
						<div class="togglead-wrapper-inner-bar">
							<p class="togglead-wrapper-inner-bar-text">
								AD
							</p>
							<p class="togglead-wrapper-inner-bar-btn">
								Click to see the ad
								<i class="fa fa-angle-up togglead-wrapper-up" aria-hidden="true"></i>
								<i class="fa fa-angle-down togglead-wrapper-down active" aria-hidden="true"></i>
							</p>
						</div>
						<div class="togglead-wrapper-inner-ad">

						</div>
					</div>
				</div>

			</div>
