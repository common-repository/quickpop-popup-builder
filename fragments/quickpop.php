<?php 

$status = carbon_get_post_meta( $post_id, 'qp_status' );

if ( $status === 'qp_disabled' ) {
	return;
}

$title = carbon_get_post_meta( $post_id, 'qp_title' );
$body = carbon_get_post_meta( $post_id, 'qp_body' );

$delay = carbon_get_post_meta( $post_id, 'qp_settings_delay' );

$form_button_text = carbon_get_post_meta( $post_id, 'qp_field_form_button_text' );
$form_field_required = carbon_get_post_meta( $post_id, 'qp_form_required' );
$form_field_placeholder = carbon_get_post_meta( $post_id, 'qp_field_placeholder' );
$form_message = carbon_get_post_meta( $post_id, 'qp_field_form_message' );
$form_button_color = carbon_get_post_meta( $post_id, 'qp_form_button_color' );
$form_field_background = carbon_get_post_meta( $post_id, 'qp_form_field_background' );
$form_field_border = carbon_get_post_meta( $post_id, 'qp_form_field_border' );

$action_button_text = carbon_get_post_meta( $post_id, 'qp_button_text' );
$action_button_url = carbon_get_post_meta( $post_id, 'qp_button_link' );
$action_button_new_tab = carbon_get_post_meta( $post_id, 'qp_button_new_tab' );
$action_button_color = carbon_get_post_meta( $post_id, 'qp_standard_button_color' );

$include_button = carbon_get_post_meta( $post_id, 'qp_include_button' );
$include_form = carbon_get_post_meta( $post_id, 'qp_include_form' );
$overlay_opacity = carbon_get_post_meta( $post_id, 'qp_overlay_opacity' );

?>

<div data-id="<?php echo $post_id; ?>" id="qp-popup-<?php echo $post_id; ?>" class="qp-popup qp-js-popup" data-delay="<?php echo ! empty( $delay ) && is_numeric( $delay ) ? esc_html( $delay ) : '0'; ?>">
	<div class="qp-popup__inner">
		<div class="qp-popup__body">
			<a href="#" class="qp-popup__btn-close qp-js-hide-popup">
				<span></span>
				
				<span></span>
			</a>

			<?php if ( ! empty( $title ) ) : ?>
				<h2 class="qp-popup__title"><?php echo strip_tags( apply_filters( 'the_content', $title ), '<br><strong><span><u><em>' ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $body ) ) : ?>
				<div class="qp-popup__entry">
					<?php echo apply_filters( 'the_content', $body ); ?>
				</div><!-- /.qp-popup__entry -->
			<?php endif; ?>

			<?php if ( ! empty( $include_form ) ) : ?>
				<div class="qp-popup__form">
					<form action="<?php echo MBQP_PLUGIN_URL . 'ajax/quickpop-submit.php' ?>" method="post" novalidate>
						<div class="qp-popup__form-body">
							<div class="qp-popup__form-controls">
								<label class="qp-label-hidden" for="qp-popup-form-email-field">Email Address</label>

								<input
								id="qp-popup-form-email-field"
								name="qp-popup-form-email-field"
								type="text"
								placeholder="<?php echo ! empty( $form_field_placeholder ) ? esc_html( $form_field_placeholder ) : ''; ?>"
								<?php echo ! empty( $form_field_required ) ? 'required' : '' ?>>
							</div><!-- /.qp-popup__form-controls -->
						</div><!-- /.qp-popup__form-body -->
						
						<div class="qp-popup__form-foot">
							<button 
							data-hover-color="<?php echo ! empty( $form_button_color ) ? $form_button_color : '#4e83cb'; ?>"
							style="background-color: <?php ! empty( $form_button_color ) ? $form_button_color . ';' : '#4e83cb;'; ?>"
							type="submit"
							class="qp-js-btn-hover">
								<?php echo ! empty( $form_button_text ) ? $form_button_text : 'Submit'; ?>
							</button>
						</div><!-- /.qp-popup__form-foot -->

						<?php if ( ! empty( $include_button ) ) : ?>
							<div class="qp-popup__actions">
								<a
								data-hover-color="<?php echo ! empty( $action_button_color ) ? $action_button_color : '#f55388'; ?>"
								style="
								background-color: <?php echo ! empty( $action_button_color ) ? $action_button_color . ';' : '#f55388;'; ?>
								border-color: <?php echo ! empty( $action_button_color ) ? $action_button_color . ';' : '#f55388;'; ?>
								"
								<?php echo ! empty( $action_button_new_tab ) ? ' target="_BLANK" ' : ''; ?> 
								href="<?php echo ! empty( $action_button_url ) ? esc_html( $action_button_url ) : '$'; ?>"
								class="qp-popup__btn qp-js-btn-hover">
									<?php echo esc_html( $action_button_text ); ?>
								</a>
							</div><!-- /.qp-popup__actions -->
						<?php endif; ?>
					</form>
				</div><!-- /.qp-popup__form -->
			<?php endif; ?>

			<?php if ( ! empty( $include_button ) && empty( $include_form ) ) : ?>
				<div class="qp-popup__actions">
					<a
					data-hover-color="<?php echo ! empty( $action_button_color ) ? $action_button_color : '#f55388'; ?>"
					style="
					background-color: <?php echo ! empty( $action_button_color ) ? $action_button_color . ';' : '#f55388;'; ?>
					border-color: <?php echo ! empty( $action_button_color ) ? $action_button_color . ';' : '#f55388;'; ?>
					"
					<?php echo ! empty( $action_button_new_tab ) ? ' target="_BLANK" ' : ''; ?> 
					href="<?php echo ! empty( $action_button_url ) ? esc_html( $action_button_url ) : '$'; ?>"
					class="qp-popup__btn qp-js-btn-hover">
					<?php echo esc_html( $action_button_text ); ?>
				</a>
			</div><!-- /.qp-popup__actions -->
		<?php endif; ?>
		</div><!-- /.qp-popup__body -->

		<?php if ( ! empty( $form_message ) ) : ?>
			<div class="qp-popup__body qp-popup__body--success">
				<a href="#" class="qp-popup__btn-close qp-js-hide-popup">
					<span></span>
					
					<span></span>
				</a>

				<h2 class="qp-popup__title"><?php echo esc_html( $form_message ) ?></h2>

				<a href="#" class="qp-popup__btn qp-js-hide-popup"><?php echo __( 'Close Window', 'mb-qp' ); ?></a>
			</div><!-- /.qp-popup__body qp-popup__body-/-success -->
		<?php endif; ?>
	</div><!-- /.qp-popup__inner -->
</div><!-- /.qp-popup -->