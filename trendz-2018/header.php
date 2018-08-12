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

        <?php
        //
        // LIB
        include ('mudule-lib.php');
        //
        ?>



        <div id="wrapper" class="wrapper">



            <div id="gototop" class="gototop">
                <a class="gototop-link" href="#topbar">
                    <i class="fa fa-caret-up" aria-hidden="true"></i>
                    <span>Go to top</span>
                </a>
			</div>



			<div id="topbar" class="topbar">
                <div class="container">
                    <div class="row topbar-row">
                        <div class="col-12 topbar-col">
                            <?php
                                if(is_user_logged_in()) {
                                     get_currentuserinfo();
                                    echo '<a class="login-top-link" href="' . get_permalink($pageID_login) . '">Welcome ' . $current_user->user_login . ' <img src="' . get_template_directory_uri() . '/images/login-icon.png" /></a>';
                                } else {
                                    echo '<a class="login-top-link" href="' . get_permalink($pageID_login) . '">Member Login</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
			</div>




	        <header id="header" class="header container">

				<div class="row header-wrapper">
					<div class="col-9 col-lg-10 header-wrapper-main">
						<div class="header-wrapper-main-logo">
                            <a href="<?php echo bloginfo('url'); ?>">
    						    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
    							<h1 class="logo-text">The Creative Source & How-To-Guide For Shopping Center & Retail Professionals</h1>
                            </a>
                        </div>
						<div class="header-wrapper-main-menu">
							<ul class="menu menu-header">
								<?php
								// WP_Query arguments
								$args_menuheader = array(
									'post_type'              => array( 'menuheader' ),
								);
								// The Query
								$query_menuheader = new WP_Query( $args_menuheader );
								// The Loop
								if ( $query_menuheader->have_posts() ) {

									while ( $query_menuheader->have_posts() ) {
										$query_menuheader->the_post();

										$var_menuheader_title = get_the_title();
                                        $var_menu_link_type = get_field('menu_link_type');

										echo '<li class="menu-item level-1 ">';

                                        if ($var_menu_link_type == 'freelink') {

                                            $var_menu_link_free = get_field('menu_link_free');
                                            echo '<a class="menu-item-link" href="' . $var_menu_link_free . '">' . $var_menuheader_title . '</a>';

                                        } elseif ($var_menu_link_type == 'pagelink') {

                                            $var_menu_link_page = get_field('menu_link_page');
                                            echo '<a class="menu-item-link" href="' . $var_menu_link_page . '">' . $var_menuheader_title . '</a>';

                                        } elseif ($var_menu_link_type == 'categorylink') {

                                            $terms = get_field('menu_link_tax');

                                            if( $terms ):
                                                foreach( $terms as $term ):
                                                    echo '<a class="menu-item-link" href="' . get_term_link( $term ) . '">' . $var_menuheader_title . '</a>';
                                                endforeach;
                                            endif;

                                        } else {
                                            //
                                        }

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
							<form  class="search-header" role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
								<input class="search-header-imput" type="text" value="Search..." onclick="this.value=''" name ="s" maxlenght="20" />
								<button class="search-header-btn" type="submit">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
                        </div>

					</div>
					<div class="col-3 col-lg-2 header-wrapper-side">
						<div class="header-printedition">
							<div class="header-printedition-header">
								<p>
									Print edition:
								</p>
                                <a href="https://www.icsc.org/" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icsc.png" alt="icsc logo"/>
                                </a>
                            </div>

                            <?php
                            //
                            //
                            // WP_Query Other info header
                            $args_printedition = array(
                                'post_type' => array( 'frontendconfig' ),
                        		'p' => $ID_PrintEdition
                            );
                            // The Query
                            $query_printedition = new WP_Query( $args_printedition );
                            // The Loop
                            if ( $query_printedition->have_posts() ) {

                                while ( $query_printedition->have_posts() ) {
                                    $query_printedition->the_post();
                                    //
                                    $var_print_edition_link = get_field('print_edition_link');
                                    $var_print_edition_image = get_field('print_edition_image');
                                    //
                                }
                            } else {
                                // no posts found
                            }
                            // Restore original Post Data
                            wp_reset_postdata();
                            ?>
                            <a class="header-printedition-cover" href="<?php echo $var_print_edition_link; ?>">
                                <img src="<?php echo $var_print_edition_image; ?>" alt="Print Edition Cover"/>
                            </a>
						</div>
						<div class="header-social">
							<a class="header-social-link facebook" target="_blank" href="#">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
							<a class="header-social-link twitter" target="_blank" href="#">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
							<a class="header-social-link linkedin" target="_blank" href="#">
								<i class="fa fa-linkedin" aria-hidden="true"></i>
							</a>
							<a class="header-social-link rss" target="_blank" href="<?php bloginfo('rss2_url'); ?>">
								<i class="fa fa-rss" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>

	        </header><!-- #header -->



            <header id="header-mobile" class="header-mobile">
                <div class="header-mobile-top">
                    <div class="header-mobile-top-btn">
                        <i class="fa fa-times header-mobile-top-btn-opened" aria-hidden="true"></i>
                        <i class="fa fa-bars header-mobile-top-btn-closed active" aria-hidden="true"></i>
                    </div>
                    <div class="header-mobile-top-name">
                        <h1 class="header-mobile-top-name-text">Advertising Trendz</h1>
                    </div>
                </div>
                <nav class="header-mobile-menu">
                    <ul>
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

                                echo '<li>';
                                echo '<a href="' . $var_menuheader_link . '">' . $var_menuheader_title . '</a>';
                                echo '</li>';
                            }

                        } else {
                            // no posts found
                        }
                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </ul>
                    <div class="header-mobile-search">
                        <form class="search-header">
                            <input class="search-header-imput" type="text" value="Search..." onclick="this.value=''" />
                            <button class="search-header-btn">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </nav>
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
                            <?php
                            //
                            //
                            // WP_Query Other info header
                            $args_headerID = array(
                                'post_type' => array( 'frontendconfig' ),
                        		'p' => $ID_HeaderID
                            );
                            // The Query
                            $query_headerID = new WP_Query( $args_headerID );
                            // The Loop
                            if ( $query_headerID->have_posts() ) {

                                while ( $query_headerID->have_posts() ) {
                                    $query_headerID->the_post();
                                    //
                                    $var_header_ad_image = get_field('header_ad_image');
                                    $var_header_ad_question = get_field('header_ad_question');
                                    $var_header_ad_link = get_field('header_ad_link');
                                    $var_header_ad_post = get_field('header_ad_post');
                                    //

                                    if($var_header_ad_question == true) {
                                        echo '<a href="' . $var_header_ad_link . '" target="_blank">';
                                        echo '<img src="' . $var_header_ad_image . '" />';
                                        echo '</a>';
                                    } else {
                                        echo '<a href="' . $var_header_ad_post . '">';
                                        echo '<img src="' . $var_header_ad_image . '" />';
                                        echo '</a>';
                                    }


                                }
                            } else {
                                // no posts found
                            }
                            // Restore original Post Data
                            wp_reset_postdata();
                            ?>
						</div>
					</div>
				</div>

			</div>
