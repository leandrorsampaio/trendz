<div class="wp-single-wrapper container authorpage">

	<div class="row wp-single-wrapper-row">
		<div class="col-12 page-header">
			<h3 class="page-header-title">Contributors</h3>
		</div>
	</div>

	<div class="row wp-single-wrapper-row">
		<div class="col-12 authorsintro">
			<?php the_content(); ?>
		</div>
	</div>

	<div class="row wp-single-wrapper-row">

		<div class="col-12 authorslist">
			<?php
			$blogusers = get_users();
			// Array of WP_User objects.
			foreach ( $blogusers as $user ) {
				//
				$theAuthorFirstName = get_the_author_meta('user_firstname', $user->ID);
				$theAuthorLastName = get_the_author_meta('user_lastname', $user->ID);
				$theAuthorCompleteName = $theAuthorFirstName . ' ' . $theAuthorLastName;
				//
				echo '<div class="authorslist-item" >';
				echo '<a class="authorslist-item-link" href="' . get_author_posts_url($user->ID) . '">';
				echo '<img src="' . get_field('author_photo', 'user_'.$user->ID) . '" />';
				echo '<span>' . $theAuthorCompleteName . '<span>';
				echo '</a>';
				echo '</div>';
			}
			?>
		</div>

	</div>


</div>
