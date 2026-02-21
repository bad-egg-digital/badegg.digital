<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Utilities;

class BlockPeople extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.people.render',
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
            'people' => $this->get_people(),
            'hcolour' => $CssClasses->colourTint([
                'colour' => get_field('settings')['bg_colour'],
                'tint' => get_field('settings')['bg_tint'],
            ]),
        ];
    }

    public function get_people()
    {
        $source = get_field('source');
        $select = get_field('select');

        if($source == 'select') {
            return $select;
        } else {
            return get_posts([
                'post_type' => 'person',
                'orderby' => 'menu_order title',
                'numberposts' => -1,
            ]);
        }
    }
}
