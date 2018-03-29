<?php
//
get_header();
//
// Loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		//
		// Content
		$theTitle = get_the_title();
		$theContent = get_the_content();
		$theDate = get_the_date('F j, Y');
		$thumbImgUrl = get_field('thumbnail_url');
		//
		// Category
		//$theCategory = get_the_category();
		//$theCategoryLink = get_category_link( $theCategory );

		//
		// Author
		$theAuthorId = get_the_author_meta('ID');
		$theAuthorBio = get_the_author_meta('user_description');
		$theAuthorFirstName = get_the_author_meta('user_firstname');
		$theAuthorLastName = get_the_author_meta('user_lastname');
		$theAuthorCompleteName = $theAuthorFirstName . ' ' . $theAuthorLastName;
		$theAuthorUrl = get_author_posts_url($theAuthorId);


	} // end while
} // end if

?>


<div class="wp-single-wrapper container">

	<div class="row wp-single-wrapper-row">
		<section class="col-12 postimage">
			<div class="postimage-wrapper">
				<div class="postimage-wrapper-imgbg" style="background-image: url(<?php echo $thumbImgUrl; ?>)"></div>
			</div>
		</section>
	</div>





	<div class="row wp-single-wrapper-row">


		<aside class="col-4 aside">
			<div class="title">
				<h1 class="title-text"><?php echo $theTitle; ?></h1>
			</div>
			<section class="singlecats">
				<div class="singlecats-wrapper">
					<?php the_category( ', ' ); ?>
				</div>
			</section>
		</aside>




		<div class="col-8 mainside">

			<article class="article">
				<div class="article-top">
					<p class="article-top-text">
						<a class="article-top-text-link" href="<?php echo $theAuthorUrl; ?>">
							<?php echo $theAuthorCompleteName; ?>
						</a>
						<span class="article-top-text-separator">|</span>
						<span class="article-top-text-date">
							<?php echo $theDate; ?>
						</span>
					</p>
				</div>
				<div class="article-content">
					<div class="article-content-wrapper">
						<div class="wysiwyg-content">
							<?php echo $theContent; ?>
						</div>
					</div>
				</div>
			</article>

			<section class="author">
				<div class="author-info">
					<div class="author-info-wrapper">
						<h4 class="section-title">About the Author</h4>
						<p class="author-info-wrapper-bio">
							-
							<a class="author-info-wrapper-bio-link" href="<?php echo $theAuthorUrl; ?>">
								<?php echo $theAuthorCompleteName; ?>
							</a>
							<?php echo $theAuthorBio; ?>
						</p>
					</div>
				</div>
				<div class="author-readmore">
					<div class="author-readmore-wrapper">
						<h4 class="section-title">More from the Author</h4>
						<div class="author-readmore-wrapper-loop">


							<?php
							global $query;


							$args = array(
								'post_type' => 'post',
								'tax_query' => array(
									array(
										'author' => $theAuthorId,
									),
								),
							);

							$query = new WP_Query($args);
							while ($query->have_posts()) : $query->the_post();
							//
							echo '<li class="postsUl_li">';
							//
							echo '<p class="postsUl_li_title">';
							echo get_the_title();
							echo '</p>';
							//
							echo '<a href="' . get_permalink() . '" class="postsUl_li_visualizar link" target="_blank">';
							echo 'Visualizar Newsletter';
							echo '</a>';
							//
							if (is_user_logged_in()) {
								echo '<a href="' . get_edit_post_link() . '" class="postsUl_li_editar link" target="_blank">';
								echo 'Editar Newsletter';
								echo '</a>';
							} else {
								echo '<a href="' . get_admin_url() . '" class="postsUl_li_editar link" target="_blank">';
								echo 'Logar para Editar';
								echo '</a>';
							}
							//
							echo '</li>';
							//
						endwhile;
						wp_reset_query();
						?>





					</div>




				</div>
			</div>
		</section>

	</div>
</div>








<div class="row wp-single-wrapper-row">
	<section class="col-12 catreadmore">
		<div class="catreadmore-wrapper">

		</div>
	</section>
</div>






</div>




<?php
//
//
get_footer();
//
?>
