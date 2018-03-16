<?php
/**
 * Plugin Name:     Quote Generator
 * Description:     Plugin to randomly display quotes from the "Quotes" post type
 * Author:          Ryan Kanner, Taylor Hansen
 * Author URI:      http://lodopress.com
 * Text Domain:     quote-generator
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Quote_Generator
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( dirname( __FILE__ ) . '/src/post-types/quotes.php' );
require_once( dirname( __FILE__ ) . '/src/taxonomies/quote-category.php' );
require_once( dirname( __FILE__ ) . '/src/shortcodes/random.php' );