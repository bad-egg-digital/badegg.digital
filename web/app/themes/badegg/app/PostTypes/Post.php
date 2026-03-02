<?php

namespace App\PostTypes;
use App\View\Composers;

class Post
{
    public function __construct()
    {
        add_action( 'pre_get_posts', [$this, 'archive'], 1);
        // add_filter( 'post_type_labels_post', [$this, 'labels']);
        add_filter( 'register_post_post_type_args', [$this, 'args'], 10, 2 );
        add_filter( 'pre_post_link', [$this, 'permalink'], 10, 3);
    }

    public function archive($query)
    {
        if(!$query->is_main_query() || is_admin()) return;

        if($query->is_home()):

            $Index = new Composers\Index;
            $latestPostID = $Index->get_latestPostID();
            $pageForPosts = get_post(get_option('page_for_posts'));

            if(has_block('badegg/latest-post', $pageForPosts)) {
                $query->set('post__not_in', [$latestPostID]);
            }

        endif;
    }

    public function labels($labels)
    {
        $labels->singular_name = __('Article', 'badegg');
        $labels->name = __('Articles', 'badegg');
        $labels->menu_name = __('News', 'badegg');

        return $labels;
    }

    public function args($args, $postType)
    {
        $args['rewrite'] = ['slug' => $this->slug()];
        // $args['menu_icon'] = 'dashicons-welcome-widgets-menus';
        return $args;
    }

    public function permalink($permalink, $post, $leavename)
    {
        if (get_post_type($post) == 'post')
            return $this->slug() . $permalink;
        else
            return $permalink;
    }

    public function slug()
    {
        $page_for_posts = get_option('page_for_posts');

        if(!$page_for_posts) return;

        $slug_for_posts = get_post_field('post_name', $page_for_posts);

        return $slug_for_posts;
    }

}
