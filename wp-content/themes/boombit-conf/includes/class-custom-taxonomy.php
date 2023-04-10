<?php

namespace Boombit;

class Custom_Taxonomy
{
    public static function register_custom_taxonomies()
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

}