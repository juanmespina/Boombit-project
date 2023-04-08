<?php
require_once __DIR__ . '/vendor/autoload.php';

use Boombit\StarterSite;
use Boombit\Enqueue_Assets;
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



add_action('wp_enqueue_scripts', [Enqueue_Assets::class, 'enqueue_styles'], 10);
add_action('wp_enqueue_scripts', [Enqueue_Assets::class, 'enqueue_scripts'], 10);

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


function register_conference_post_type()
{
	$labels = array(
		'name'               => 'Conferences',
		'singular_name'      => 'Conference',
		'menu_name'          => 'Conferences',
		'name_admin_bar'     => 'Conference',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Conference',
		'new_item'           => 'New Conference',
		'edit_item'          => 'Edit Conference',
		'view_item'          => 'View Conference',
		'all_items'          => 'All Conferences',
		'search_items'       => 'Search Conferences',
		'parent_item_colon'  => 'Parent Conferences:',
		'not_found'          => 'No conferences found.',
		'not_found_in_trash' => 'No conferences found in Trash.'
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-calendar-alt',
		'supports'            => array('title', 'editor', 'thumbnail'),
		'rewrite'             => array('slug' => 'conferences'),
		'show_in_rest'        => true
	);

	register_post_type('conference', $args);
}

add_action('init', 'register_conference_post_type');

function register_talk_post_type()
{

	$labels = array(
		'name'               => 'Talks',
		'singular_name'      => 'Talk',
		'menu_name'          => 'Talks',
		'name_admin_bar'     => 'Talk',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Talk',
		'new_item'           => 'New Talk',
		'edit_item'          => 'Edit Talk',
		'view_item'          => 'View Talk',
		'all_items'          => 'All Talks',
		'search_items'       => 'Search Talks',
		'parent_item_colon'  => 'Parent Talks:',
		'not_found'          => 'No talks found.',
		'not_found_in_trash' => 'No talks found in Trash.'
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-microphone',
		'supports'            => array('title', 'editor', 'thumbnail'),
		'rewrite'             => array('slug' => 'talks'),
		'show_in_rest'        => true
	);

	register_post_type('talk', $args);
}

add_action('init', 'register_talk_post_type');

function create_speakers_post_type()
{
	$labels = array(
		'name'               => 'Speakers',
		'singular_name'      => 'Speaker',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Speaker',
		'edit_item'          => 'Edit Speaker',
		'new_item'           => 'New Speaker',
		'all_items'          => 'All Speakers',
		'view_item'          => 'View Speaker',
		'search_items'       => 'Search Speakers',
		'not_found'          => 'No speakers found',
		'not_found_in_trash' => 'No speakers found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Speakers'
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array('slug' => 'speakers'),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => null,
		'supports'            => array('title', 'editor', 'thumbnail'),
		'menu_icon'           => 'dashicons-businessman'
	);

	register_post_type('speakers', $args);
}

add_action('init', 'create_speakers_post_type');


function create_topics_taxonomy()
{
	$labels = array(
		'name'                       => 'Topics',
		'singular_name'              => 'Topic',
		'search_items'               => 'Search Topics',
		'popular_items'              => 'Popular Topics',
		'all_items'                  => 'All Topics',
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => 'Edit Topic',
		'update_item'                => 'Update Topic',
		'add_new_item'               => 'Add New Topic',
		'new_item_name'              => 'New Topic Name',
		'separate_items_with_commas' => 'Separate topics with commas',
		'add_or_remove_items'        => 'Add or remove topics',
		'choose_from_most_used'      => 'Choose from the most used topics',
		'not_found'                  => 'No topics found.',
		'menu_name'                  => 'Topics',
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array('slug' => 'topic'),
	);

	register_taxonomy('topic', array('conference', 'talk'), $args);
}

add_action('init', 'create_topics_taxonomy');

// function add_topics_to_conferences_and_talks()
// {
// 	register_taxonomy_for_object_type('topic', 'conference');
// 	register_taxonomy_for_object_type('topic', 'talk');
// }

// add_action('init', 'add_topics_to_conferences_and_talks');


function register_expertise_taxonomy()
{
	$labels = array(
		'name'              => 'Expertise',
		'singular_name'     => 'Expertise',
		'search_items'      => 'Search Expertise',
		'all_items'         => 'All Expertise',
		'parent_item'       => 'Parent Expertise',
		'parent_item_colon' => 'Parent Expertise:',
		'edit_item'         => 'Edit Expertise',
		'update_item'       => 'Update Expertise',
		'add_new_item'      => 'Add New Expertise',
		'new_item_name'     => 'New Expertise Name',
		'menu_name'         => 'Expertise',
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);

	register_taxonomy('expertise', array('speakers'), $args);
}
add_action('init', 'register_expertise_taxonomy', 0);
