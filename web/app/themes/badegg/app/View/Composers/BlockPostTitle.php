<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockPostTitle extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        // 'blocks.post-title.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {


        return [
            // 'latestPostID' => $latestPostID,
            // 'latestPost' => $latestPost,
            // 'latestPostCategory' => $EntryMeta->get_firstTerm($latestPostID, 'category'),
        ];
    }


}
