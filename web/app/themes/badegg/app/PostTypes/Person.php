<?php

namespace App\PostTypes;

class Person
{
    public function __construct()
    {
        add_action('init', [$this, 'register']);
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
                // 'admin_cols' => [
                //     'social_link' => [
                //         'title' => __('Social Link', $td),
                //         'meta_key' => 'fontawesome_brands',
                //         'function' => function(){
                //             $icon = get_field('fontawesome_brands');
                //             $url = get_field('url');
                //         },
                //     ],
                // ],
            ],
            [
                'plural' => __('People', $td),
            ],
        );
    }
}
