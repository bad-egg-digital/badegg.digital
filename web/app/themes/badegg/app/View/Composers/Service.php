<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Service extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-service',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'cardClasses' => $this->cardClasses(),
        ];
    }

    public function cardClasses()
    {
        $id = get_the_ID();

        $colour = get_field('colour', $id);
        $tint = get_field('tint', $id);
        $contrast = get_field('contrast', $id);

        $classes = [
            'card',
            'card-service',
            'rounded',
        ];

        if($colour) {
            $colourClass = 'bg-' . $colour;

            if($tint && !in_array($colour, [0, '0', 'black', 'white'])) $colourClass .= '-' . $tint;

            $classes = array_merge($classes,[
                $colourClass,
                'bg-image',
                'bg-filter',
                'has-bg-image',
            ]);
        }

        if($contrast)
            $classes[] = 'knockout';


        return $classes;
    }
}
