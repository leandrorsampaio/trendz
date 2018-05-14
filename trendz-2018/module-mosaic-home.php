<?php
	//
	// Geting parameters from the Logic
	$args_mosaic = array(
		'post_type' => array( 'frontendconfig' ),
		'p' => 7983
	);
	// The Query
	$the_query_params = new WP_Query($args_mosaic);
	// The Loop
	if ( $the_query_params->have_posts() ) {
		while ( $the_query_params->have_posts() ) {
			$the_query_params->the_post();
			//
			$var_front_end_mosaic_options = get_field('front_end_mosaic_options');
			//
			if($var_front_end_mosaic_options == 'mosaichome1') {
				$args_mosaic_home = array(
					'posts_per_page' => 12,
					'order' => 'ASC'
				);
			} elseif ($var_front_end_mosaic_options == 'mosaichome2') {
				//
				$var_mosaic_id_1 = get_field('front_end_mosaic_custom_1');
				$var_mosaic_id_2 = get_field('front_end_mosaic_custom_2');
				$var_mosaic_id_3 = get_field('front_end_mosaic_custom_3');
				$var_mosaic_id_4 = get_field('front_end_mosaic_custom_4');
				$var_mosaic_id_5 = get_field('front_end_mosaic_custom_5');
				$var_mosaic_id_6 = get_field('front_end_mosaic_custom_6');
				$var_mosaic_id_7 = get_field('front_end_mosaic_custom_7');
				$var_mosaic_id_8 = get_field('front_end_mosaic_custom_8');
				$var_mosaic_id_9 = get_field('front_end_mosaic_custom_9');
				$var_mosaic_id_10 = get_field('front_end_mosaic_custom_10');
				$var_mosaic_id_11 = get_field('front_end_mosaic_custom_11');
				$var_mosaic_id_12 = get_field('front_end_mosaic_custom_12');
				//
				$args_mosaic_home = array(
					'posts_per_page' => 12,
					'post__in' => array($var_mosaic_id_1->ID, $var_mosaic_id_2->ID, $var_mosaic_id_3->ID,
					$var_mosaic_id_4->ID, $var_mosaic_id_5->ID, $var_mosaic_id_6->ID, $var_mosaic_id_7->ID,
					$var_mosaic_id_8->ID, $var_mosaic_id_9->ID, $var_mosaic_id_10->ID, $var_mosaic_id_11->ID,
					$var_mosaic_id_12->ID)
				);
			} else {
				$args_mosaic_home = array(
					'posts_per_page' => 12,
					'orderby' => 'rand'
				);
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		$args_mosaic_home = array(
			'posts_per_page' => 12,
			'orderby' => 'rand'
		);
	}
	//
	//
	//
	// The Query for the mosaic
	$the_query = new WP_Query($args_mosaic_home);
	// The Loop
	$counter = 1;
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			//
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
				$thumbImgUrl = get_the_title();
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
		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		// no posts found
	}

?>
