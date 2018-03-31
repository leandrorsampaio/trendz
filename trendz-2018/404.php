<?php
//
get_header();
//
// Loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();


	} // end while
} // end if


// WP_Query arguments
$args_notfound = array(
	'page_id' => 8019
);
// The Query
$query_notfound = new WP_Query( $args_notfound );
// The Loop
if ( $query_notfound->have_posts() ) {

	while ( $query_notfound->have_posts() ) {
		$query_notfound->the_post();

		include ('module-pagedefault.php');

	}

} else {
	// no posts found
}
// Restore original Post Data
wp_reset_postdata();

//
//
get_footer();
//
?>
