<?php
//
get_header();
//
// Loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
		$authorId = $author->ID;

		$theAuthorFirstName = get_the_author_meta('user_firstname', $authorId);
		$theAuthorLastName = get_the_author_meta('user_lastname', $authorId);
		$theAuthorCompleteName = $theAuthorFirstName . ' ' . $theAuthorLastName;

	} // end while
} // end if



?>


<div class="wp-single-wrapper container authorpage">

	<div class="row wp-single-wrapper-row">
		<div class="col-12 page-header">
			<h3 class="page-header-title">More About The Author</h3>
		</div>
	</div>

	<div class="row wp-single-wrapper-row">

		<aside class="col-4 aside aside-authorpage">
			<div class="aside-photo">
				<img src="<?php echo get_field('author_photo', 'user_'.$authorId); ?>" />
			</div>
			<div class="aside-title">
				<h1 class="aside-title-text"><?php echo $theAuthorCompleteName; ?></h1>
			</div>
			<div class="aside-excert">
				<p class="aside-title-text">
					<?php echo get_field('author_bio_complete', 'user_'.$authorId); ?>
				</p>
			</div>
		</aside>





		<div class="col-8 mainside">
			<?php
			// Readmore Module
			echo '<div class="reademore">';
			$args = array(
				'author' => $authorId
			);

			// The Query
			$the_query = new WP_Query($args);
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

					$var_post_registered_only = get_field('post_registered_only');
					if ($var_post_registered_only != true) {
						echo '<span class="free-article">Free Article</span>';
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


			echo '</div>';
			?>
		</div>
	</div>


</div>




<?php
//
//
get_footer();
//
?>
