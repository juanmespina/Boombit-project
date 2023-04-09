<?php
$context = Timber::get_context();
$args = array(
    'post_type' => 'conference',
    'posts_per_page' => 5,
    'paged' => $context['pagination']->page,
);
$context['conferences'] = Timber::get_posts($args);
$context['pagination'] = Timber::get_pagination();
Timber::render('acf-blocks/all-conferences.twig', $context);
