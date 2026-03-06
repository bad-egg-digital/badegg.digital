<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class MenuMobile extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'components.menu-mobile',
    ];

    public function __construct()
    {
        add_filter( 'wp_nav_menu_objects', [$this, 'add_menu_elements'], 10, 2);
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $props = [];

        return $props;
    }

    public function add_menu_elements($items, $args)
    {
        if($args->theme_location != 'mobile_navigation') return $items;

        foreach($items as $item) {

           $icon = get_field('fontawesome_solid', $item);

           if($icon) {
            $item->title = '<i class="fa fa-' . $icon . '">&nbsp;</i><span>' . $item->title . '</span>';
           }
        }

        return $items;

    }
}
