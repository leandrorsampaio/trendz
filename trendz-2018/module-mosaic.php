<?php

	// The Query
	$the_query = new WP_Query($args);
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			//
			echo '<div class="mosaic-item">';
			echo '<a class="mosaic-item-link" href="' . get_permalink() . '">';
			//
			if (get_field('thumbnail_url')) {
				echo '<img src="' . get_field('thumbnail_url') . '" alt="' . get_the_title() . '" />';
			} else {
				echo '<img src="' . get_template_directory_uri() . '/images/thumdefault.jpg" alt="' . get_the_title() . '" />';
			}
			//
			if (get_field('free_content')) {
				echo '<span class="mosaic-item-link-free"><i class="fa fa-tag" aria-hidden="true"></i>Free Content</span>';
			}
			//
			echo '</a>';
			echo '</div>';

		}
		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		// no posts found
	}

?>
