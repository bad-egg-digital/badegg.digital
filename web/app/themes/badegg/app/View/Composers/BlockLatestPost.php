<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockLatestPost extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.latest-post.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $EntryMeta = new \App\FrontEnd\EntryMeta;
        $Archives = new \App\Admin\Archives;

        $latestPostID = $this->get_latestPostID();
        $latestPost = get_post($latestPostID);

        return [
            'latestPostID' => $latestPostID,
            'latestPost' => $latestPost,
            'latestPostCategory' => $EntryMeta->get_firstTerm($latestPostID, 'category'),
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
}
