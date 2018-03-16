<?php

function quote_category_init() {
	register_taxonomy( 'quote-category', array( 'quotes' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Quote Category', 'quote-generator' ),
			'singular_name'              => _x( 'Quote Categories', 'taxonomy general name', 'quote-generator' ),
			'search_items'               => __( 'Search Quote Category', 'quote-generator' ),
			'popular_items'              => __( 'Popular Quote Category', 'quote-generator' ),
			'all_items'                  => __( 'All Quote Category', 'quote-generator' ),
			'parent_item'                => __( 'Parent Quote Categories', 'quote-generator' ),
			'parent_item_colon'          => __( 'Parent Quote Categories:', 'quote-generator' ),
			'edit_item'                  => __( 'Edit Quote Categories', 'quote-generator' ),
			'update_item'                => __( 'Update Quote Categories', 'quote-generator' ),
			'add_new_item'               => __( 'New Quote Categories', 'quote-generator' ),
			'new_item_name'              => __( 'New Quote Categories', 'quote-generator' ),
			'separate_items_with_commas' => __( 'Separate Quote Category with commas', 'quote-generator' ),
			'add_or_remove_items'        => __( 'Add or remove Quote Category', 'quote-generator' ),
			'choose_from_most_used'      => __( 'Choose from the most used Quote Category', 'quote-generator' ),
			'not_found'                  => __( 'No Quote Category found.', 'quote-generator' ),
			'menu_name'                  => __( 'Quote Category', 'quote-generator' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'quote-category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'quote_category_init' );
