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
                'admin_cols' => [
                    'reviewer' => [
                        'title' => __('Reviewer', $td),
                        'meta_key' => 'testimonial_author_name',
                        'function' => function(){
                            $name = get_field('testimonial_author_name');
                            $title = get_field('testimonial_author_title');

                            if($name): ?>

                                <strong><?= $name ?></strong><br/>
                                <?= $title ?>

                            <?php endif;

                        },
                    ],
                    'intro' => [
                        'title' => __('Intro', $td),
                        'function' => function(){
                            echo get_the_excerpt();
                        },
                    ]
                ],
            ],
        );
    }
}
