<?php 

$query = new WP_Query( array(
	'post_type' => 'qp_popup',
) );

$posts = $query->posts;

?>

<section class="section-qp-popup">
	<div class="section__logo">
		<img src="<?php echo MBQP_PLUGIN_URL . 'images/quickpop-logo.png' ?>"/>
	</div><!-- /.section__logo -->

	<div class="section__inner">
		<div class="section__content">
			<header class="section__head">
				<p><?php _e( 'Popup Library', 'mb-qp' ) ?></p>
			</header><!-- /.section__head -->

			<div class="section__body">
				<div class="qp-popups">
					<?php if ( $query->have_posts() ): ?>
						<div class="qp-popups__head">
							<p><?php _e( 'Title', 'mb-qp' ) ?></p>
						</div><!-- /.qp-popups__head -->

						<div class="qp-popups__body">
							<ul>
								<?php foreach ( $posts as $post ) : ?>
									<li>
										<div class="qp-popup">
											<div class="qp-popup__content">
												<p><a href="<?php echo get_edit_post_link( $post->ID ); ?>"><?php echo get_the_title( $post->ID ) ?></p></a>
											</div><!-- /.qp-popup__content -->

											<div class="qp-popup__actions">
												<ul>
													<li>
														<a class="qp-popup__btn-edit" href="<?php echo get_edit_post_link( $post->ID ) ?>">
															<img src="<?php echo MBQP_PLUGIN_URL . 'images/ico-edit.png' ?>" alt="" />
														</a>
													</li>
												</ul>
											</div><!-- /.qp-popup__actions -->
										</div><!-- /.qp-popup -->
									</li>
								<?php endforeach; ?>
							</ul>
						</div><!-- /.qp-popups__body -->
					<?php endif ?>
				</div><!-- /.qp-popups -->
			</div><!-- /.section__body -->

			<?php if ( ! isset( $_COOKIE['qp_library_upsell_hidden'] ) ): ?>
				<div class="qp-upsell">
					<div class="qp-upsell__head">
						<div class="qp-upsell__head-image">
							<img width="72" height="72" src="<?php echo MBQP_PLUGIN_URL . 'images/logo-upsell.png' ?>" alt="" />
						</div><!-- /.qp-upsell__head-image -->

						<div class="qp-upsell__head-content">
							<p>
								<?php _e( 'The free version of Brindle QuickPop is limited to a single, site-wide popup. Want unlimited popups with tons of additional features? ', 'mb-qp' ) ?>

								<a target="_blank" href="https://mybrindle.com/product/best-popup-builder-wordpress/">
									<?php _e( 'Try QuickPop Pro', 'mb-qp' ) ?>
								</a>

								<?php _e( ' for advanced features like...', 'mb-qp' ) ?>
							</p>
						</div><!-- /.qp-upsell__head-content -->
					</div><!-- /.qp-upsell__head -->

					<div class="qp-upsell__body">
						<div class="qp-upsell__cols">
							<div class="qp-upsell__col">
								<p>
									<strong><?php _e( 'Unlimited Popups: ', 'mb-qp' ) ?></strong>

									<?php _e( 'Build an unlimited library of custom popups, each with their own settings.', 'mb-qp' ) ?>
								</p>

								<p>
									<strong><?php _e( 'Advanced Styling: ' ) ?></strong>

									<?php _e( 'Popups of any size, rounded corners, button styles, gradients, overlays, animations, font sizes...truly build any popup you can imagine.', 'mb-qp' ) ?>
								</p>

								<p>
									<strong><?php _e( 'Popup Events: ', 'mb-qp' ) ?></strong>

									<?php _e( 'Trigger popups on link-click or on site exit, set timings, assign different popups to specific pages or events, and other behaviors.', 'mb-qp' ) ?>
								</p>
							</div><!-- /.qp-upsell__col -->

							<div class="qp-upsell__col">
								<p>
									<strong><?php _e( 'Mega Popups: ' ) ?></strong>

									<?php _e( 'Add a seamless ‘hero’ image to build the ultimate, attention grabbing popup.', 'mb-qp' ) ?>
								</p>

								<p>
									<strong><?php _e( 'Advanced Forms: ', 'mb-qp' ) ?></strong>

									<?php _e( 'Customize popup forms with multiple fields and styling options. Create a beautiful contact form, promote products with exclusive offers, and more.', 'mb-qp' ) ?>
								</p>

								<p>
									<strong><?php _e( '3rd Party Integration: ', 'mb-qp' ) ?></strong>

									<?php _e( 'Sync emails, track conversions, and other benefits of integrating your campaigns from favorite services like Mailchimp and Hubspot.', 'mb-qp' ) ?>
								</p>
							</div><!-- /.qp-upsell__col -->
						</div><!-- /.qp-upsell__cols -->
					</div><!-- /.qp-upsell__body -->

					<div class="qp-upsell__foot">
						<a target="_blank" href="https://mybrindle.com/product/best-popup-builder-wordpress/" class="qp-upsell__btn"><?php _e( 'Try QuickPop Pro FREE', 'mb-qp' ) ?></a>

						<span class="qp-upsell__message"><?php _e( 'No risk 3 day free trial!', 'mb-qp' ) ?></span>

						<a href="#" class="qp-upsell__snooze js-upsell-snooze"><?php _e( 'Snooze this message', 'mb-qp' ) ?></a>
					</div><!-- /.qp-upsell__foot -->
				</div><!-- /.qp-upsell -->
			<?php endif ?>
		</div><!-- /.section__content -->
		
		<?php if ( ! isset( $_COOKIE['qp_library_upsell_hidden'] ) ): ?>
			<div class="section__sidebar">
				<div class="qp-upsell-ad">
					<img width="207" height="183" src="<?php echo MBQP_PLUGIN_URL . 'images/qp-upsell-sidebar.png' ?>" alt="" />

					<p>
						<strong><?php _e( 'Want even more features?', 'mb-qp' ); ?></strong>
						
						<br>

						<?php _e( 'Access advanced style options, popup events, advanced forms, integration with services like Mailchimp/Hubspot, and more. Upgrade now to create the ultimate library of popups!', 'mb-q[' ) ?>
					</p>

					<a target="_blank" href="https://mybrindle.com/product/best-popup-builder-wordpress/" class="qp-upsell-ad__btn">
						<strong><?php _e( 'Try QuickPop Pro FREE', 'mb-qp' ); ?></strong>

						<br>

						<?php _e( 'No risk 3 day free trial', 'mb-qp' ); ?>
					</a>
				</div><!-- /.qp-upsell-ad -->
			</div><!-- /.section__sidebar -->
		<?php endif; ?>
	</div><!-- /.section__inner -->
</section><!-- /.section-qp-popup -->