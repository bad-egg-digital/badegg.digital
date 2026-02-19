<?php

namespace App\PostTypes;

class Testimonial
{
    public function __construct()
    {
        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        $td = 'sage';
        $postType = 'testimonial';

        register_extended_post_type(
            $postType,
            [
                'menu_position' => 20,
                // 'show_in_rest' => false,
                'supports' => [
                    'title',
                    'excerpt',
                    'excerpt-below-title',
                    'editor',
                ],
                'menu_icon' => 'dashicons-format-quote',
                'rewrite' => false,
                'has_archive' => false,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'capability_type' => 'page',
                'show_in_nav_menus' => false,
            ],
        );
    }
}
