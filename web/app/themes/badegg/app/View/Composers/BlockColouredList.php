<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockColouredList extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.coloured-list.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'list' => get_field('list'),
            'listItemClasses' => $this->listItemClasses(),
        ];
    }

    public static function listItemClasses()
    {

        $colour = get_field('colour');
        $tint = get_field('tint');
        $contrast = get_field('contrast');

        $classes = [
            'coloured-list-item',
            'rounded',
        ];

        if($colour) {
            $colourClass = 'bg-' . $colour;

            if($tint && !in_array($tint, ['0', 0, 'white', 'black']))
                $colourClass .= '-' . $tint;

            $classes[] = $colourClass;
        }

        if($contrast)
            $classes[] = 'knockout';

        return $classes;

    }
}
