<?php
//
include ('header.php');

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		$categories = get_the_category();


	} // end while
} // end if

$category_id = $categories[0]->cat_ID;
$category_name = $categories[0]->name;


?>


<div class="wp-single-wrapper container authorpage">

	<div class="row wp-single-wrapper-row">
		<div class="col-12 page-header">
			<h3 class="page-header-title"><?php echo $category_name; ?></h3>
		</div>
	</div>




	<div class="row wp-single-wrapper-row mosaic-wrapper">
        <?php
        //
        //
        // Mosaic
        $args = array(
    		'orderby' => 'rand',
    		'posts_per_page' => -1,
			'cat' => $category_id
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
