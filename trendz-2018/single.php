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
		$thePostId = get_the_ID();
		$theTitle = get_the_title();
		$theContent = get_the_content();
		$theExcerpt = get_the_excerpt();
		$theDate = get_the_date('F j, Y');
		//
		if(get_field('thumbnail_url')) {
			$thumbImgUrl = get_field('thumbnail_url');
		} else {
			$thumbImgUrl = get_template_directory_uri() . '/images/highlight.jpg';
		}
		//
		// Category
		$theCategory = get_the_category();
		//$theCategoryLink = get_category_link( $theCategory );
		$categories = get_the_category();
		$category_id = $categories[0]->cat_ID;

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
			<section class="aside-cats">
				<div class="aside-cats-wrapper">
					<?php the_category( ', ' ); ?>
				</div>
			</section>
			<div class="aside-title">
				<h1 class="aside-title-text"><?php echo $theTitle; ?></h1>
			</div>
			<div class="aside-excert">
				<p class="aside-title-text">
					<?php echo $theExcerpt; ?>
				</p>
			</div>
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
							 // Readmore Module
							 echo '<div class="reademore">';
							 $args = array(
								 'orderby' => 'rand',
								 'posts_per_page' => 3,
								 'author' => 1,
								 'post__not_in' => array($thePostId)
							 );
							 include ('module-readmore-author.php');
							 echo '</div>';
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
				<?php
				$postcat = get_the_category( $thePostId );
				?>
				<h4 class="section-title">More from <?php echo '<span>' . esc_html( $postcat[0]->name ) . '</span>'; ?></h4>
				<div class="author-readmore-wrapper-loop">

					 <?php
					 // Readmore Module
					 echo '<div class="reademore">';
					 $args = array(
						 'orderby' => 'rand',
						 'posts_per_page' => 3,
						 'category__and' => array($category_id),
						 'post__not_in' => array($thePostId)
					 );
					 include ('module-readmore-cat.php');
					 echo '</div>';
					 ?>

				</div>


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
