<?php

namespace App\PostTypes;

class Person
{
    public function __construct()
    {
        add_action('init', [$this, 'register']);
        add_filter( 'manage_person_posts_columns', [$this, 'columns'], 100);
        add_action( 'admin_head', [$this, 'admin_head'], 100);
    }

    public function register()
    {
        $td = 'sage';
        $postType = 'person';

        register_extended_post_type(
            $postType,
            [
                'menu_position' => 28,
                'supports' => [
                    'title',
                    'excerpt',
                    'excerpt-below-title',
                    'editor',
                    'page-attributes',
                    'thumbnail',
                ],
                'menu_icon' => 'dashicons-businessperson',
                'rewrite' => false,
                'has_archive' => false,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'capability_type' => 'page',
                'show_in_nav_menus' => false,
                'featured_image' => __('Portrait', $td),
                'enter_title_here' => __('Enter the person\'s full name.', $td),
                'show_in_rest' => true,
                'block_editor' => false,
                'admin_cols' => [
                    'portrait' => [
                        'title' => __('Portrait', $td),
                        'featured_image' => 'thumbnail',
                        'width' => 48,
                        'height' => 48,
                    ],
                ],
            ],
            [
                'plural' => __('People', $td),
            ],
        );
    }

    public function columns($columns)
    {
        $reordered = [];

        foreach($columns as $column => $content) {
            if($column == 'title') {
                $reordered['portrait'] = '';
            }

            $reordered[$column] = $content;
        }

        return $reordered;
    }

    public function admin_head()
    {
        global $post_type;

        if(!$post_type == 'person') return;

        ?>
            <style type="text/css">
                .column-portrait { width: 48px; }
                .column-portrait::before { content: none !important; }
                @media (max-width: 782px) { .column-portrait { display: none !important; } }
            </style>

        <?php
    }
}
