<?php
//
get_header();
//
// Loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();


		//
		//
		//
		// LIB
		include ('mudule-lib.php');
		//$pageID_aboutus = 7974;
		//$pageID_contactus = 38;
		//$pageID_subscribe = 33;
		//$pageID_backissues = 35;
		//$pageID_contributors = 8008;
		//
		//
		if (is_page($pageID_aboutus)) {
		    include ('module-pagedefault.php');
		} elseif (is_page($pageID_contactus)) {
		    include ('module-pagedefault.php');
		} elseif (is_page($pageID_subscribe)) {
		    include ('module-pagedefault.php');
		} elseif (is_page($pageID_backissues)) {
		    include ('module-pagedefault.php');
		} elseif (is_page($pageID_contributors)) {
		    include ('module-authors.php');
		} else {
		    include ('module-pagedefault.php');
		}



	} // end while
} // end if
//
//
get_footer();
//
?>
