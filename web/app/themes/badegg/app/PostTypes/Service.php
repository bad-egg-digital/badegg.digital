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
                    'excerpt',
                    'page-attributes',
                ],
                'menu_icon' => 'dashicons-editor-code',
                'rewrite' => [
                    'slug' => 'services',
                ],
                'has_archive' => false,
                'capability_type' => 'page',
                'admin_cols' => [
                    'service_card_name' => [
                        'title' => __('Short Name', $td),
                        'meta_key' => 'service_card_name',
                        'sortable' => false,
                    ],
                    'service_card_quote' => [
                        'title' => __('User story', $td),
                        'meta_key' => 'service_card_quote',
                        'sortable' => false,
                    ],
                    'service_card_cta' => [
                        'title' => __('Call to action', $td),
                        'meta_key' => 'service_card_cta',
                        'sortable' => false,
                    ],
                    'projects' => [
                        'title' => __('Projects', $td),
                        'function' => function(){
                            $projects = get_field('service_project');

                            $links = [];

                            if($projects){
                                foreach($projects as $project) {
                                    $links[] = '<a href="' . admin_url('post.php?post=' . $project . '&action=edit') . '">' . get_the_title($project) . '</a>';
                                }
                            }

                            echo implode(', ', $links);
                        }
                    ],
                    'testimonials' => [
                        'title' => __('Reviewers', $td),
                        'function' => function(){
                            $services = get_field('testimonial_service');

                            $links = [];

                            if($services){
                                foreach($services as $service) {
                                    $links[] = '<a href="' . admin_url('post.php?post=' . $service . '&action=edit') . '">' . get_field('testimonial_author_name', $service) . '</a>';
                                }
                            }

                            echo implode(', ', $links);
                        }
                    ],
                ],
            ],
        );
    }
}
