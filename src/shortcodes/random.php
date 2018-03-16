<?php

function quotes_shortcode_random( $atts ) {

	$atts = shortcode_atts( [
		'count' => 1,
		'category' => '',
	], $atts, 'random-quote' );

	$args = [
		'post_type' => 'quotes',
		'post_status' => 'publish',
		'posts_per_page' => absint( $atts['count'] ),
		'no_found_rows' => true,
		'orderby' => 'rand',
	];

	if ( ! empty( $atts['category'] ) ) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'quote-category',
				'field' => 'slug',
				'terms' => sanitize_text_field( $atts['category'] )
			]
		];
	}

	$quotes = new WP_Query( $args );
	$html = '';

	if ( $quotes->have_posts() ) :
		$html .= '<div class="random-quotes-container">';
		while ( $quotes->have_posts() ):
			$quotes->the_post();
			$html .= '<blockquote>';
			$html .= get_the_content();
			$html .= '<cite>' . get_the_title() . '</cite>';
			$html .= '</blockquote>';
		endwhile;
	endif;

	return $html;

}

add_shortcode( 'random-quote', 'quotes_shortcode_random' );
