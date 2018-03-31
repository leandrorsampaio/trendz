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
		// Lib
		include ('module-lib.php');
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
