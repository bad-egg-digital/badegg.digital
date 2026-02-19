<?php

namespace App\PostTypes;

class Project
{
    public function __construct()
    {
        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        $td = 'sage';
        $postType = 'project';

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
                'menu_icon' => 'dashicons-art',
                'rewrite' => [
                    'slug' => 'work',
                ],
                'has_archive' => true,
                'capability_type' => 'page',
            ],
        );
    }
}
