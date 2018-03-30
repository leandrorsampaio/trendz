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
				'posts_per_page' => -1,
				'author' => $authorId
			);
			include ('module-readmore-author.php');
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
