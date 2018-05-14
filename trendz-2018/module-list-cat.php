<?php
    // The Query
	$the_query = new WP_Query($args_mosaic_cat);
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			//
			echo '<div class="reademore-item">';
			//
			echo '<div class="reademore-item-image">';
			echo '<a class="reademore-item-image-link" href="' . get_permalink() . '">';
			//
			if (get_field('thumbnail_url')) {
				echo '<img src="' . get_field('thumbnail_url') . '" alt="' . get_the_title() . '" />';
			} else {
				echo '<img src="' . get_template_directory_uri() . '/images/thumdefault.jpg" alt="' . get_the_title() . '" />';
			}
			//
			echo '</a>';
			echo '</div>';
			//
			echo '<div class="reademore-item-text">';
			echo '<a class="reademore-item-text-title" href="' . get_permalink() . '">';
			echo get_the_title();
			echo '</a>';
			echo '<a class="reademore-item-text-excerp" href="' . get_permalink() . '">';
			$counter = get_the_excerpt();
			if ((strlen($counter)) < 200) {
				$limitation = substr(get_the_excerpt(), 0, 150);
				echo $limitation;
			} else {
				$limitation = substr(get_the_excerpt(), 0, 150);
				echo $limitation . '... <b>(read more)</b>';
			}
			echo '</a>';
			echo '</div>';
			//
			echo '</div>';

		}





		// Pagination
		echo '<div class="pagination-wrapper">';
		echo paginate_links();
		echo '</div>';



		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		// no posts found
	}

?>
