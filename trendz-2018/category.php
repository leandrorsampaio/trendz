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


<div class="wp-single-wrapper container">

	<div class="row wp-single-wrapper-row">
		<div class="col-12 page-header">
			<h3 class="page-header-title"><?php echo $category_name; ?></h3>
		</div>
	</div>


	<div class="row wp-single-wrapper-row mosaic-wrapper-highlights">
        <?php
		//
        // LIB
        include ('mudule-lib.php');
        //
        //
        //
        // Geting parameters from the Logic
		$args_mosaic_cat_parameters = array(
			'post_type' => array( 'frontendconfig' ),
			'p' => $ID_CategoriesMosaicConfiguration
		);
		// The Query
		$the_query_params = new WP_Query($args_mosaic_cat_parameters);
		// The Loop
		if ( $the_query_params->have_posts() ) {
			while ( $the_query_params->have_posts() ) {
				$the_query_params->the_post();
				//
				$var_front_end_mosaic_options = get_field('front_end_mosaic_options_cat');
				//
				if($var_front_end_mosaic_options == 'mosaiccate1') {
					$args_mosaic_cat= array(
						'cat' => $category_id,
						'posts_per_page' => 12,
						'order' => 'DESC'
					);
				} elseif ($var_front_end_mosaic_options == 'mosaiccate2') {
					$args_mosaic_cat= array(
						'cat' => $category_id,
						'posts_per_page' => 12,
						'orderby' => 'rand'
					);
				}  elseif ($var_front_end_mosaic_options == 'mosaiccate3') {
					$args_mosaic_cat= array(
						'cat' => $category_id,
						'posts_per_page' => 20,
						'order' => 'DESC'
					);
				} else {
					$args_mosaic_cat= array(
						'cat' => $category_id,
						'posts_per_page' => 20,
						'orderby' => 'rand'
					);
				}
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			$args_mosaic_cat= array(
				'cat' => $category_id,
				'posts_per_page' => 20,
				'order' => 'DESC'
			);
		}





		if($var_front_end_mosaic_options == 'mosaiccate1' || $var_front_end_mosaic_options == 'mosaiccate2') {
			echo '<div class="col-12 mosaic">';
	        include ('module-mosaic-cat.php');
	        echo '</div>';
		} else {
			?>

			<aside class="col-md-12 col-lg-4 aside aside-search">
	            <div class="aside-title">
	                <h1 class="aside-title-text search-title">
	                    All articles from the  <span><?php echo $category_name; ?></span> category.
	                </h1>







	            </div>
			</aside>

			<div class="col-md-12 col-lg-8 mainside">
				<div class="reademore">
		        	<?php include ('module-list-cat.php'); ?>
		        </div>
			</div>

			<?php
		}
        //
        ?>
    </div>




</div>






<?php
//
include ('footer.php');
//
?>
