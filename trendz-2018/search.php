<?php
//
get_header();
//
// Loop
?>










<div class="wp-single-wrapper container authorpage">

	<div class="row wp-single-wrapper-row">
		<div class="col-12 page-header">
			<h3 class="page-header-title">
                <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"
            </h3>
		</div>
	</div>

	<div class="row wp-single-wrapper-row">

		<aside class="col-md-12 col-lg-4 aside aside-search">
            <div class="aside-title">
                <h1 class="aside-title-text search-title">
                    <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"
                </h1>
            </div>
		</aside>





		<div class="col-md-12 col-lg-8 mainside">
            <div class="reademore">




            <?php
            if ( have_posts() ) {
                while ( have_posts() ) { the_post();

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

                echo '<div class="pagination-wrapper">';
                echo paginate_links();
                echo '</div>';

            }
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
