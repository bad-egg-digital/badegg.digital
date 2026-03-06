<?php

namespace App\PostTypes;

class Service
{
    public function __construct()
    {
        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        $td = 'sage';
        $postType = 'service';

        register_extended_post_type(
            $postType,
            [
                'menu_position' => 20,
                'show_in_rest' => true,
                'supports' => [
                    'title',
                    'editor',
                    'page-attributes',
                ],
                'menu_icon' => 'dashicons-share',
                'rewrite' => [
                    'slug' => 'services',
                ],
                'has_archive' => false,
                'capability_type' => 'page',
            ],
        );
    }
}
