<?php

namespace Boombit;

class Custom_Post_Types
{
    public static function register_custom_post_types()
    {   
        self::register_post_type('conference', 'Conferences', 'Conference', 'dashicons-calendar-alt', 'conferences');
        self::register_post_type('talk', 'Talks', 'Talk', 'dashicons-microphone', 'talks');
        self::register_post_type('speaker', 'Speakers', 'Speaker', 'dashicons-businessman', 'speakers', false);
    }

    private static function register_post_type($post_type, $plural_name, $singular_name, $icon, $slug, $public = true)
    {
        $labels = array(
            'name'               => $plural_name,
            'singular_name'      => $singular_name,
            'menu_name'          => $plural_name,
            'name_admin_bar'     => $singular_name,
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New ' . $singular_name,
            'new_item'           => 'New ' . $singular_name,
            'edit_item'          => 'Edit ' . $singular_name,
            'view_item'          => 'View ' . $singular_name,
            'all_items'          => 'All ' . $plural_name,
            'search_items'       => 'Search ' . $plural_name,
            'parent_item_colon'  => 'Parent ' . $plural_name . ':',
            'not_found'          => 'No ' . $plural_name . ' found.',
            'not_found_in_trash' => 'No ' . $plural_name . ' found in Trash.'
        );
    
        $args = array(
            'labels'              => $labels,
            'public'              => $public,
            'has_archive'         => true,
            'menu_icon'           => $icon,
            'supports'            => array('title'),
            'rewrite'             => array('slug' => $slug),
            'show_in_rest'        => true
        );
        
        register_post_type($post_type, $args);
    }
}