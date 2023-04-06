<?php

namespace Boombit;

class Enqueue_Assets
{

    public static function enqueue_styles()
    {
        wp_register_style('theme_style', get_template_directory_uri() . '/static/style.css');
        wp_enqueue_style('theme_style');
    }

    public static function enqueue_scripts()
    {
        wp_register_script('theme_script', get_template_directory_uri() . '/static/site.js', ['jquery'], true);
        wp_enqueue_script('theme_script');
    }
}
