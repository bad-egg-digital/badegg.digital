<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.footer.footer',
        'partials.contact-info',
    ];

    public function __construct()
    {
        add_filter( 'wp_nav_menu_items', [$this, 'add_menu_elements'], 10, 2);
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $props = [];

        $fields = [
            'legal',
            'number',
            'tel',
            'email',
        ];

        foreach($fields as $field) {
            $props['company_' . $field] = get_field('badegg_company_' . $field, 'option');
        }

        return $props;
    }

    public function add_menu_elements($items, $args)
    {
        if($args->theme_location != 'footer_navigation') return $items;
        if($args->container_class != 'nav-footer-container') return $items;

        $dom = new \DomDocument();
        $dom->strictErrorChecking = false;
        @$dom->loadHTML($items);

        $listItems = @$dom->getElementsByTagName('li');

        if($listItems) {
            $footerBrand = $dom->createDocumentFragment();
            $footerBrand->appendXML(\Roots\view("sections.footer.footer-brand")->render());

            $contactInfo = $dom->createDocumentFragment();
            $contactInfo->appendXML(\Roots\view("partials.contact-info", ['class' => 'sub-menu'])->render());

            $firstItem = $listItems[0];
            $lastItem = $listItems[count($listItems) - 1];

            $firstItemClass = $firstItem->getAttribute('class');
            $firstItem->setAttribute('class', $firstItemClass . ' menu-item-has-children');
            $firstItem->appendChild($footerBrand);

            $lastItemClass = $lastItem->getAttribute('class');
            $lastItem->setAttribute('class', $lastItemClass . ' menu-item-has-children');
            $lastItem->appendChild($contactInfo);
        }

        $wrapper = @$dom->getElementsByTagName('div');

        if($wrapper) {
            return $dom->saveHTML($wrapper[0]);
        } else {
            return $items;
        }
    }
}
