<?php

	// The Query
	$the_query = new WP_Query($args);
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







			if (get_field('thumbnail_url')) {
				$thumbImgUrl = get_the_title();
			} else {
				$thumbImgUrl = get_template_directory_uri() . '/images/thumdefault.jpg';
			}

			echo '<a class="mosaic-item-link item-' . $counter . '" href="' . '" style="background-image: url(' . $thumbImgUrl . ')">';
			//
			//
			//
			echo '</a>';




			if ($counter == 3 || $counter == 7 || $counter == 13) {
				echo '</div>';
			}



			$counter = $counter + 1;

		}
		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		// no posts found
	}

?>
