<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockColouredCards extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.coloured-cards.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'cards' => get_field('cards'),
        ];
    }

    public static function cardClasses($props = [])
    {
        $defaultProps = [
            'colour' => null,
            'tint' => null,
            'contrast' => false,
            'texture' => false,
        ];

        $props = wp_parse_args($props, $defaultProps);

        $classes = [
            'card',
            'card-coloured',
            'rounded',
        ];

        if($props['colour']) {
            $colour = 'bg-' . $props['colour'];

            if($props['tint'] && !in_array($props['tint'], ['0', 0, 'white', 'black']))
                $colour .= '-' . $props['tint'];

            $classes[] = $colour;

            if($props['texture'])
                $classes = array_merge($classes, ['bg-image', 'bg-texture-' . $props['colour']]);
        }

        if($props['texture'])
            $classes[] = 'has-bg-image';

        if($props['contrast'])
            $classes[] = 'knockout';

        return $classes;

    }
}
