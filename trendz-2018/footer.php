




<footer id="footer" class="footer">
	<div class="container footer-wrapper">
		<div class="row footer-wrapper-main">


			<div class="col-12 footer-menu">
				<ul class="menu menu-footer">
					<?php
					// WP_Query arguments
					$args_menufooter = array(
						'post_type'              => array( 'menufooter' ),
					);
					// The Query
					$query_menufooter = new WP_Query( $args_menufooter );
					// The Loop
					if ( $query_menufooter->have_posts() ) {

						while ( $query_menufooter->have_posts() ) {
							$query_menufooter->the_post();

							$var_menuheader_title = get_the_title();
							$var_menu_link_type = get_field('menu_link_type');

							echo '<li class="menu-item level-1 ">';

							if ($var_menu_link_type == 'freelink') {

								$var_menu_link_free = get_field('menu_link_free');
								echo '<a class="menu-item-link" href="' . $var_menu_link_free . '">' . $var_menuheader_title . '</a>';

							} elseif ($var_menu_link_type == 'pagelink') {

								$var_menu_link_page = get_field('menu_link_page');
								echo '<a class="menu-item-link" href="' . $var_menu_link_page . '">' . $var_menuheader_title . '</a>';

							} elseif ($var_menu_link_type == 'categorylink') {

								$terms = get_field('menu_link_tax');

								if( $terms ):
									foreach( $terms as $term ):
										echo '<a class="menu-item-link" href="' . get_term_link( $term ) . '">' . $var_menuheader_title . '</a>';
									endforeach;
								endif;

							} else {
								//
							}

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
				<a class="footer-social-link rss" href="<?php bloginfo('rss2_url'); ?>" target="_blank">
					<i class="fa fa-rss" aria-hidden="true"></i>
				</a>
				<a class="footer-social-link icsc" href="https://www.icsc.org/" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/images/icsc.png" alt="icsc logo"/>
				</a>
			</div>

			<div class="col-12 footer-icscmobile">
				<a class="footer-social-link icsc" href="https://www.icsc.org/" target="_blank">
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
