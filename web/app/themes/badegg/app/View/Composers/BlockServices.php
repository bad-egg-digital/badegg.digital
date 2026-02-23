<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Utilities;

class BlockServices extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.services.render',
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
            'services' => $this->get_services(),
        ];
    }

    public function get_services()
    {
        $source = get_field('source');
        $select = get_field('select');

        $args = [
            'post_type' => 'service',
            'orderby' => 'menu_order title',
            'order' => 'ASC',
            'numberposts' => -1,
        ];

        if($select) {
            $args['post__in'] = $select;
        }

        return new \WP_Query($args);
    }
}
