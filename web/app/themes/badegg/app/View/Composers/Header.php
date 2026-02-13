<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.header.*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $props = [
            'logo' => $this->logo(),
        ];

        return $props;
    }

    public function logo()
    {
        return @file_get_contents(get_stylesheet_directory() . '/resources/images/logo-bad-egg-digital.svg');
    }
}
