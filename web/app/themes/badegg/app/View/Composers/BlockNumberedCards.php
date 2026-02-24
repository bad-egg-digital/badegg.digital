<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Utilities;

class BlockNumberedCards extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.numbered-cards.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $CssClasses = new Utilities\CssClasses;

        return [
            'list' => get_field('list'),
            'listItemClasses' => $this->listItemClasses(),
            'headingColour' => $CssClasses->ColourTintClass([
                'colour' => get_field('colour'),
                'tint' => get_field('tint'),
            ]),
        ];
    }

    public static function listItemClasses()
    {
        $CssClasses = new Utilities\CssClasses;

        $accentColour = $CssClasses->ColourTintClass([
            'colour' => get_field('bg_colour'),
            'tint' => get_field('bg_tint'),
        ]);

        $classes = [
            'card-numbered-number',
            'inner',
            'inner-small',
        ];

        if($accentColour)
            $classes[] = 'bg-' . $accentColour;

        if(get_field('contrast'))
            $classes[] = 'knockout';

        return $classes;
    }
}
