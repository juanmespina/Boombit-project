<?php
require_once __DIR__ . '/vendor/autoload.php';

use Boombit\StarterSite;
use Boombit\Enqueue_Assets;
use Boombit\Custom_Post_Types;
use Boombit\Custom_Taxonomy;
use Timber\Timber;

$timber = new Timber();
new StarterSite();

/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */


add_action('init', [Custom_Post_Types::class,'register_custom_post_types']);
add_action('init', [Custom_Taxonomy::class,'register_custom_taxonomies']);
add_action('wp_enqueue_scripts', [Enqueue_Assets::class, 'enqueue_styles'], 10);
add_action('wp_enqueue_scripts', [Enqueue_Assets::class, 'enqueue_scripts'], 10);

if( class_exists('ACF') ) {
	add_action('init', function () {
		register_block_type(dirname(__FILE__) . '/acf/blocks/all-conferences');
	});
}
add_action('after_setup_theme', function () {
	add_theme_support('editor-styles');
	add_editor_style('static/style.css');
});


/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if (!class_exists('Timber')) {

	add_action(
		'admin_notices',
		function () {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function ($template) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('templates', 'views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
	   'page_title' => 'Theme Options',
	   'menu_title' => 'Theme Options',
	   'menu_slug' => 'theme-options',
	   'capability' => 'edit_posts',
	   'redirect' => false
	));
}



