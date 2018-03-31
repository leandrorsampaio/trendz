<?php
	//$thePostId = get_the_ID();
	$theTitle = get_the_title();
	$theContent = get_the_content()
?>

<div class="wp-single-wrapper container authorpage">



	<div class="row wp-single-wrapper-row">


		<aside class="col-12 col-md-4 aside">
			<div class="aside-title">
				<h1 class="aside-title-text"><?php echo $theTitle; ?></h1>
			</div>
		</aside>




		<div class="col-12 col-md-8 mainside">

			<article class="article">
				<div class="article-content">
					<div class="article-content-wrapper">
						<div class="wysiwyg-content">
							<?php echo $theContent; ?>
						</div>
					</div>
				</div>
			</article>

			<

		</div>
	</div>


</div>
