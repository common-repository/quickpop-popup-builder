<?php 

function mbqp_create_popup_on_plugin_install() {
	$query = new WP_Query( array(
		'post_type' => 'qp_popup',
	) );

	if ( $query->have_posts() ) {
		return;
	}

	// set basic event info
	$new_post = array(
		'post_type' => 'qp_popup',
		'post_title' => 'Site-Wide Popup',
		'post_status' => 'publish',
	);

	$post_id = wp_insert_post( $new_post );
}

function mbqp_register_custom_submenu_page() {
	$query = new WP_Query( array(
		'post_type' => 'qp_popup',
	) );

	$url        = $query->have_posts() ? 'quickpop.php' : 'post-new.php?post_type=qp_popup';
	$callback   = '';

	if ( $query->have_posts() ) {
		$callback = function() {
			include_once MBQP_PLUGIN_DIR . 'templates/quickpop-listing.php';
		};
	}

	add_submenu_page(
		'my-brindle.php',
		'QuickPop',
		'QuickPop',
		'manage_options',
		$url,
		$callback,
		80
	);
}

function mbqp_popup_html() {
	$query = new WP_Query( array(
		'post_type' => 'qp_popup',
	) );

	$posts = $query->posts;

	foreach ( $posts as $post ) {
		$post_id = $post->ID;

		if ( isset( $_COOKIE['hide-popup-' . $post_id] ) ) {
			return;
		}
		
		$visibility = carbon_get_post_meta( $post_id, 'qp_settings_display_pages' );

		if ( $visibility === 'qp_all' ) {
			require_once( MBQP_PLUGIN_DIR . 'fragments' . DIRECTORY_SEPARATOR . 'quickpop.php' );
		} else if ( $visibility === 'mb_home' && is_front_page() ) {
			require_once( MBQP_PLUGIN_DIR . 'fragments' . DIRECTORY_SEPARATOR . 'quickpop.php' );
		}
	}

}

/* Register Admin Sub Menu */
add_action( 'admin_menu', 'mbqp_submissions_submenu', 20 );


function mbqp_submissions_submenu(){
    add_submenu_page(
        'my-brindle.php',
        'Submssions',
        'Submissions',
        'edit_posts',
        'edit.php?post_type=qp_submissions'
    );
}

/**
 * Fix Parent Admin Menu Item
 */
function mbqp_cpt_parent_file_fix( $parent_file ){

    /* Get current screen */
    global $current_screen, $self;

    /**
     * Add upload.php as parent file/menu if
     * it's Post Type list Screen or Edit screen of our post type.
     */
    if ( in_array( $current_screen->base, array( 'post', 'edit' ) ) && in_array( $current_screen->post_type, array( 'qp_submissions', 'qp_popup' ) ) ) {
        $parent_file = 'my-brindle.php';
    }

    return $parent_file;
}

/**
 * Fix Sub Menu Item Highlights
 */
function mbqp_submenu_file_fix( $submenu_file ){

    /* Get current screen */
    global $current_screen, $self;

    if ( in_array( $current_screen->base, array( 'post', 'edit' ) ) ) {
        if ( $current_screen->post_type == 'qp_popup' ) {
	        $submenu_file = 'quickpop.php';
        } elseif ( $current_screen->post_type == 'qp_submissions' ) {
	        $submenu_file = 'edit.php?post_type=qp_submissions';
	    }
	}

    return $submenu_file;
}


add_filter( 'parent_file', 'mbqp_cpt_parent_file_fix' );

add_filter( 'submenu_file', 'mbqp_submenu_file_fix' );

add_action( 'wp_ajax_mbqp_ajax_form_submission', 'mbqp_ajax_form_submission' );
add_action( 'wp_ajax_nopriv_mbqp_ajax_form_submission', 'mbqp_ajax_form_submission' );

function mbqp_ajax_form_submission() {
	$new_post = array(
		'post_type' => 'qp_submissions',
		'post_title' => sanitize_email( $_POST['email'] ),
		'post_date' => Date('Y-m-d H:i:s'),
		'post_status' => 'publish',
	);

	$post_id = wp_insert_post( $new_post );

	wp_die();
}