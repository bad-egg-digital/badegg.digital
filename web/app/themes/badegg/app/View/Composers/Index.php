<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Index extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'index',
    ];

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    public function with()
    {
        if(is_home()) {
            $postType = get_post_type_object('post');
        } else {
            $postType = get_queried_object();
        }

        $postTypeSlug = $postType->name;
        $pageForPosts = ($postTypeSlug == 'post') ? get_option('page_for_posts') : get_field('page_for_' . $postTypeSlug, 'option');

        return [
            'post_type' => $postTypeSlug,
            'page_for_posts' => $pageForPosts,
            'post' => get_post($pageForPosts),
        ];
    }

    public function get_latestPostID()
    {
        $posts = get_posts([
            'post_type' => 'post',
            'order' => 'DESC',
            'orderby' => 'date',
            'numberposts' => 1,
            'post_status' => 'publish',
            'fields' => 'ids',
        ]);

        if($posts) {
            return $posts[0];
        } else {
            return 0;
        }
    }

    public function get_firstCategory($postID, $tax = 'category')
    {
        if(!$postID) return false;

        $terms = wp_get_post_terms($postID, $tax);

        if($terms) {
            return $terms[0];
        } else {
            return false;
        }
    }

}
