




<footer id="footer" class="footer">
	<div class="container footer-wrapper">
		<div class="row footer-wrapper-main">


			<div class="col-12 footer-menu">
				<ul class="menu menu-footer">
					<?php
					// WP_Query arguments
					$args_menufooter = array(
						'post_type'              => array( 'menufooter' ),
						'order'                  => 'ASC'
					);
					// The Query
					$query_menufooter = new WP_Query( $args_menufooter );
					// The Loop
					if ( $query_menufooter->have_posts() ) {

						while ( $query_menufooter->have_posts() ) {
							$query_menufooter->the_post();

							$var_menufooter_title = get_the_title();
							$var_menufooter_link = get_field('menu_link');

							echo '<li class="menu-item">';
							echo '<a class="menu-item-link" href="' . $var_menufooter_link . '">' . $var_menufooter_title . '</a>';
							echo '</li>';
						}

					} else {
						// no posts found
					}
					// Restore original Post Data
					wp_reset_postdata();
					?>
				</ul>
			</div>
			<div class="col-12 footer-newsletter">
				<h5 class="footer-newsletter-title">Sign Up For Our News Letter</h5>
				<?php
					echo do_shortcode( '[yikes-mailchimp form="1"]' );
				?>
			</div>
			<div class="col-12 footer-logos">
				<a class="footer-social-link facebook" href="#">
					<i class="fa fa-facebook" aria-hidden="true"></i>
				</a>
				<a class="footer-social-link twitter" href="#">
					<i class="fa fa-twitter" aria-hidden="true"></i>
				</a>
				<a class="footer-social-link linkedin" href="#">
					<i class="fa fa-linkedin" aria-hidden="true"></i>
				</a>
				<a class="footer-social-link rss" href="#">
					<i class="fa fa-rss" aria-hidden="true"></i>
				</a>
				<a class="footer-social-link icsc" href="#">
					<img src="<?php echo get_template_directory_uri(); ?>/images/icsc.png" alt="icsc logo"/>
				</a>
			</div>

			<div class="col-12 footer-icscmobile">
				<a class="footer-social-link icsc" href="#">
					<img src="<?php echo get_template_directory_uri(); ?>/images/icsc.png" alt="icsc logo"/>
				</a>
			</div>

		</div>
	</div>
</footer>


<div id="footerbar" class="footerbar">
	<p>
		® Mall Media InC. All Rights Reserved
	</p>
</div>


</div><!-- #wrapper -->

    <?php wp_footer(); ?>
</body>
</html>
