<?php
$context = Timber::context();
$context['post'] = new Timber\Post();
error_log(print_r($context['post'],true));
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
$all_speakers = [];
for ($i=0; $i < $talks_count; $i++) {
    $speakers = Timber::get_posts([
        'post_type' => 'speakers',
        'post__in' => $context['talks'][$i]->speakers
    ]);
    $context['talks'][$i]->speakers = $speakers;
    array_push($all_speakers,...$speakers);
}
$context['all_speakers'] =$all_speakers;
Timber::render('single-conference.twig', $context);
