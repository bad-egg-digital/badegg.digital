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
        $Index = new Index;

        $latestPostID = $Index->get_latestPostID();
        $latestPost = get_post($latestPostID);

        return [
            'latestPostID' => $latestPostID,
            'latestPost' => $latestPost,
            'latestPostCategory' => $Index->get_firstCategory($latestPostID, 'category'),
        ];
    }
}
