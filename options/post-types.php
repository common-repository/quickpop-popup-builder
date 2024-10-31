<?php

register_post_type( 'qp_popup', array(
	'labels' => array(
		'name' => __( 'QuickPop', 'crb' ),
		'singular_name' => __( 'QuickPopup', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new QuickPopup', 'crb' ),
		'view_item' => __( 'View QuickPopup', 'crb' ),
		'edit_item' => __( 'Edit QuickPopup', 'crb' ),
		'new_item' => __( 'New QuickPopup', 'crb' ),
		'view_item' => __( 'View QuickPopup', 'crb' ),
		'search_items' => __( 'Search QuickPopups', 'crb' ),
		'not_found' =>__( 'No popups found', 'crb' ),
		'not_found_in_trash' => __( 'No popups found in trash', 'crb' ),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'show_in_menu' => false,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'qp-popups',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => '',
	'supports' => array( 'title' ),
) );

register_post_type( 'qp_submissions', array(
	'labels' => array(
		'name' => __( 'Submissions', 'crb' ),
		'singular_name' => __( 'Submission', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Submission', 'crb' ),
		'view_item' => __( 'View Submission', 'crb' ),
		'edit_item' => __( 'Edit Submission', 'crb' ),
		'new_item' => __( 'New Submission', 'crb' ),
		'view_item' => __( 'View Submission', 'crb' ),
		'search_items' => __( 'Search Submissions', 'crb' ),
		'not_found' =>__( 'No submissions found', 'crb' ),
		'not_found_in_trash' => __( 'No submissions found in trash', 'crb' ),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'show_in_menu' => false,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'qp-submissions',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => '',
	'supports' => array( 'title' ),
) );