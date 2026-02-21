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
                    'services' => [
                        'title' => __('Services', $td),
                        'function' => function(){
                            $services = get_field('testimonial_service');

                            $links = [];

                            if($services){
                                foreach($services as $service) {
                                    $links[] = '<a href="' . admin_url('post.php?post=' . $service . '&action=edit') . '">' . get_the_title($service) . '</a>';
                                }
                            }

                            echo implode(', ', $links);
                        }
                    ],
                    'Projects' => [
                        'title' => __('Projects', $td),
                        'function' => function(){
                            $projects = get_field('testimonial_project');

                            $links = [];

                            if($projects){
                                foreach($projects as $project) {
                                    $links[] = '<a href="' . admin_url('post.php?post=' . $project . '&action=edit') . '">' . get_the_title($project) . '</a>';
                                }
                            }

                            echo implode(', ', $links);
                        }
                    ],
                    'intro' => [
                        'title' => __('Intro', $td),
                        'function' => function(){
                            global $post;
                        ?>
                            <strong><?= $post->post_excerpt ?></strong><br/>
                            <?= apply_filters('the_content', $post->post_content) ?>

                        <?php
                        },
                    ],
                ],
            ],
        );
    }
}
