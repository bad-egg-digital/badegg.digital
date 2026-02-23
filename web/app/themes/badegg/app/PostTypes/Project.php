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
                    'slug' => 'projects',
                ],
                'has_archive' => true,
                'capability_type' => 'page',
                'admin_cols' => [
                    'services' => [
                        'title' => __('Services', $td),
                        'function' => function(){
                            $services = get_field('service_project');

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
                        'title' => __('Reviewers', $td),
                        'function' => function(){
                            $testimonials = get_field('testimonial_project');

                            $links = [];

                            if($testimonials){
                                foreach($testimonials as $testimonial) {
                                    $links[] = '<a href="' . admin_url('post.php?post=' . $testimonial . '&action=edit') . '">' . get_field('testimonial_author_name', $testimonial) . '</a>';
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
