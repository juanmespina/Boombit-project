<?php
$context = Timber::context();

$context['background_color'] = get_field('background_color');
$context['text_color'] = get_field('text_color');
$context['title_color'] = get_field('title_color');
$context['conference_row_background_color'] = get_field('conference_row_background_color');
$context['conference_row_margin'] = get_field('conference_row_margin');
$context['conference_row_padding'] = get_field('conference_row_padding');
$context['text_column_background_color'] = get_field('text_column_background_color');
$context['text_column_padding'] = get_field('text_column_padding');
$context['text_column_minimum_height'] = get_field('text_column_minimum_height');
$context['title_column_background_color'] = get_field('title_column_background_color');
$context['title_column_padding'] = get_field('title_column_padding');
$context['title_column_minimum_height'] = get_field('title_column_minimum_height');
$context['show_banner'] = get_field('show_banner');
$context['layout'] = get_field('layout');

$post_per_page = get_field('post_per_page');
$order =  get_field('order') !== null && get_field('order')=='asc'?:'desc';
if (!isset($post_per_page) ||  ($post_per_page < 1 && $post_per_page !=-1 )) {
    $post_per_page = 1;
}

if (!isset($_GET['paged']) || !$_GET['paged'] ){
    $paged = 1;
}

$args = array(
    'post_type' => 'conference',
    'posts_per_page' => $post_per_page,
    'paged' => $paged,
    'order'=> strtoupper($order),
    'meta_key'=> 'start_date',
    'order_by' => 'meta_key'
);
$context['show_all_conferences']= $post_per_page == -1;
$context['posts'] = new Timber\PostQuery($args);
Timber::render('acf-blocks/all-conferences.twig', $context);

