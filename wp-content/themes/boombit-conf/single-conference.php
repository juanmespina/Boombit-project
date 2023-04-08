<?php
$context = Timber::context();
$context['post'] = new Timber\Post();
$context['talks'] = Timber::get_posts([
    'post_type' => 'talk',
    'meta_query' => array(
        array(
            'key' => 'conference',
            'value' => '"' . $post->ID . '"', 
            'compare' => 'LIKE'
        )
    )
]);
$talks_count = count($context['talks'] );
for ($i=0; $i < $talks_count; $i++) {
    $speakers = Timber::get_posts([
        'post_type' => 'speakers',
        'post__in' => $context['talks'][$i]->speakers
    ]);
    $context['talks'][$i]->speakers = $speakers;
}
Timber::render('single-conference.twig', $context);
