<?php

if ( ! function_exists('custom_post_types') ) {

// Register Custom Post Type
function custom_post_types() {

	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'ccps' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'ccps' ),
		'menu_name'             => __( 'Team', 'ccps' ),
		'name_admin_bar'        => __( 'Team', 'ccps' ),
		'archives'              => __( 'Team Archives', 'ccps' ),
		'attributes'            => __( 'Team Attributes', 'ccps' ),
		'parent_item_colon'     => __( 'Parent Person:', 'ccps' ),
		'all_items'             => __( 'All Persons', 'ccps' ),
		'add_new_item'          => __( 'Add New Person', 'ccps' ),
		'add_new'               => __( 'Add New', 'ccps' ),
		'new_item'              => __( 'New Person', 'ccps' ),
		'edit_item'             => __( 'Edit Person', 'ccps' ),
		'update_item'           => __( 'Update Person', 'ccps' ),
		'view_item'             => __( 'View Person', 'ccps' ),
		'view_items'            => __( 'View Persons', 'ccps' ),
		'search_items'          => __( 'Search Person', 'ccps' ),
		'not_found'             => __( 'Not found', 'ccps' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ccps' ),
		'featured_image'        => __( 'Featured Image', 'ccps' ),
		'set_featured_image'    => __( 'Set featured image', 'ccps' ),
		'remove_featured_image' => __( 'Remove featured image', 'ccps' ),
		'use_featured_image'    => __( 'Use as featured image', 'ccps' ),
		'insert_into_item'      => __( 'Insert into item', 'ccps' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ccps' ),
		'items_list'            => __( 'Persons list', 'ccps' ),
		'items_list_navigation' => __( 'Persons list navigation', 'ccps' ),
		'filter_items_list'     => __( 'Filter items list', 'ccps' ),
	);
	$args = array(
		'label'                 => __( 'Person', 'ccps' ),
		'description'           => __( 'Team Custom Post Type', 'ccps' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'custom_post_types', 0 );

}