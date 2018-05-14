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
	<div class="row wp-single-wrapper-row mosaic-wrapper-highlights">
        <?php
        //
        //
        // Mosaic
        echo '<div class="col-12 mosaic">';
        include ('module-mosaic-home.php');
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
