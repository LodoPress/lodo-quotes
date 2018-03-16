<?php

function quotes_init() {
	register_post_type( 'quotes', array(
		'labels'            => array(
			'name'                => __( 'Quotes', 'quote-generator' ),
			'singular_name'       => __( 'Quotes', 'quote-generator' ),
			'all_items'           => __( 'All Quotes', 'quote-generator' ),
			'new_item'            => __( 'New Quotes', 'quote-generator' ),
			'add_new'             => __( 'Add New', 'quote-generator' ),
			'add_new_item'        => __( 'Add New Quotes', 'quote-generator' ),
			'edit_item'           => __( 'Edit Quotes', 'quote-generator' ),
			'view_item'           => __( 'View Quotes', 'quote-generator' ),
			'search_items'        => __( 'Search Quotes', 'quote-generator' ),
			'not_found'           => __( 'No Quotes found', 'quote-generator' ),
			'not_found_in_trash'  => __( 'No Quotes found in trash', 'quote-generator' ),
			'parent_item_colon'   => __( 'Parent Quotes', 'quote-generator' ),
			'menu_name'           => __( 'Quotes', 'quote-generator' ),
		),
		'public'            => false,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => false,
		'rewrite'           => false,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-format-quote',
		'show_in_rest'      => true,
		'rest_base'         => 'quotes',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'quotes_init' );

function quotes_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['quotes'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Quotes updated. <a target="_blank" href="%s">View Quotes</a>', 'quote-generator'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'quote-generator'),
		3 => __('Custom field deleted.', 'quote-generator'),
		4 => __('Quotes updated.', 'quote-generator'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Quotes restored to revision from %s', 'quote-generator'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Quotes published. <a href="%s">View Quotes</a>', 'quote-generator'), esc_url( $permalink ) ),
		7 => __('Quotes saved.', 'quote-generator'),
		8 => sprintf( __('Quotes submitted. <a target="_blank" href="%s">Preview Quotes</a>', 'quote-generator'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Quotes scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Quotes</a>', 'quote-generator'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Quotes draft updated. <a target="_blank" href="%s">Preview Quotes</a>', 'quote-generator'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'quotes_updated_messages' );
