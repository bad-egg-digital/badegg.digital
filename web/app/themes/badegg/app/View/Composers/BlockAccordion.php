<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Utilities;

class BlockAccordion extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.accordion.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'accordionClasses' => $this->accordionClasses(),
        ];
    }

    public static function accordionClasses()
    {
        $CssClasses = new Utilities\CssClasses;

        $colour = get_field('colour');
        $tint = get_field('tint');
        $contrast = get_field('contrast');

        $classes = [
            'inner',
            'inner-smaller',
            'wysiwyg',
        ];

        if($colour)
            $classes[] = 'bg-' . $CssClasses->ColourTintClass($colour, $tint);

        if($contrast)
            $classes[] = 'knockout';

        return $classes;

    }
}
