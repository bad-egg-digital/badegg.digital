<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockHero extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.hero.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'curlyBraceLeft' => @file_get_contents(get_theme_file_path('resources/images/curly-brace-left.svg')),
        ];
    }
}
