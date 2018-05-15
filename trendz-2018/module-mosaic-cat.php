<?php
	//
	//
	//
	// The Query
	$the_query = new WP_Query($args_mosaic_cat);
	// The Loop
	$counter = 1;
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			//
			if ($counter == 1) {
				echo '<div class="mosaic-line-wrapper line-1">';
			} elseif ($counter == 4) {
				echo '<div class="mosaic-line-wrapper line-2">';
			} elseif ($counter == 8) {
				echo '<div class="mosaic-line-wrapper line-3">';
			}
			//
			//
			if (get_field('thumbnail_url')) {
				$thumbImgUrl = get_field('thumbnail_url');
			} else {
				$thumbImgUrl = get_template_directory_uri() . '/images/thumdefault.jpg';
			}
			echo '<a class="mosaic-item-link item-' . $counter . '" href="' . get_permalink() . '" style="background-image: url(' . $thumbImgUrl . ')">';
			//
			//
			echo '<span class="mosaic-item-link-title">' . get_the_title() . '</span>';
			//
			//
			$var_post_registered_only = get_field('post_registered_only');
			if ($var_post_registered_only != true) {
				echo '<span class="free-article">Free Article</span>';
			}
			//
			//
			echo '</a>';
			if ($counter == 3 || $counter == 7 || $counter == 13) {
				echo '</div>';
			}
			$counter = $counter + 1;
		}



		// Pagination
		echo '<div class="pagination-wrapper pagination-wrapper-cat">';
		echo paginate_links();
		echo '</div>';

		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		// no posts found
	}

?>
