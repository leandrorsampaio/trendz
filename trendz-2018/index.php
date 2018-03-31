<?php
//
include ('header.php');

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

	} // end while
} // end if
?>


<div class="wp-single-wrapper container">
	<div class="row wp-single-wrapper-row mosaic-wrapper">
        <?php
        //
        //
        // Mosaic
        $args = array(
    		'orderby' => 'rand',
    		'posts_per_page' => 50
    	);
        echo '<div class="col-12 mosaic">';
        include ('module-mosaic.php');
        echo '</div>';
        //
        ?>
    </div>
</div>






<?php
//
include ('footer.php');
//
?>
