<?php

namespace App\FrontEnd;

class Menus
{
    public function __construct()
    {
        add_filter( 'wp_nav_menu_objects', [$this, 'header'], 10, 2);
        add_filter( 'wp_nav_menu_objects', [$this, 'mobile'], 10, 2);
        add_filter( 'wp_nav_menu_items', [$this, 'footer'], 10, 2);
    }

    public function header($items, $args)
    {
        if($args->theme_location != 'primary_navigation') return $items;

        $count = count($items);
        $half = ceil($count / 2);

        foreach($items as $x => $item):
            if($x === 1):
                $item->classes[] = 'menu-item-order-' . $half;
                $item->classes[] = 'menu-item-logo';

                ob_start(); ?>

                    <span class="visually-hidden"><?= $item->title ?></span>
                    <?= \Roots\view("sections.header.header-brand")->render() ?>

                <?php $item->title = ob_get_clean();

            elseif($x < $half + 1):
                $item->classes[] = 'menu-item-order-' . ($x - 1);


            elseif($x >= $half):
                $item->classes[] = 'menu-item-order-' . ($x);

            endif;

        endforeach;

        return $items;
    }

    public function mobile($items, $args)
    {
        if($args->theme_location != 'mobile_navigation') return $items;

        foreach($items as $item) {
           $icon = get_field('fontawesome_solid', $item);
           if($icon) $item->title = '<i class="fa fa-' . $icon . '">&nbsp;</i><span>' . $item->title . '</span>';
        }

        return $items;
    }

    public function footer($items, $args)
    {
        if($args->theme_location != 'footer_navigation') return $items;

        $dom = new \DomDocument();
        $dom->strictErrorChecking = false;
        @$dom->loadHTML($items);

        $finder = new \DomXPath($dom);

        $wrapper = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' footer-nav ')]");
        $listItems = @$dom->getElementsByTagName('li');

        if(!$wrapper || !$listItems) return $Items;

        $footerBrand = $dom->createDocumentFragment();
        $footerBrand->appendXML(\Roots\view("sections.footer.footer-brand")->render());

        $contactInfo = $dom->createDocumentFragment();
        $contactInfo->appendXML(\Roots\view("partials.contact-info", ['class' => 'sub-menu'])->render());

        $firstItem = $listItems[0];
        $lastItem = $listItems[count($listItems) - 1];

        $firstItemClass = $firstItem->getAttribute('class');
        $firstItem->setAttribute('class', $firstItemClass . ' menu-item-has-children menu-item-logo-footer');

        $firstAnchor = $firstItem->childNodes->item(0);
        $firstAnchorInner = $firstAnchor->childNodes[0];
        $firstAnchorInnerHTML = $firstAnchor->ownerDocument->saveHTML($firstAnchorInner);

        $firstAnchorSpan = $dom->createDocumentFragment();
        $firstAnchorSpan->appendXML('<span class="visually-hidden">' . $firstAnchorInnerHTML . '</span>');
        $firstAnchorInner->parentNode->replaceChild($firstAnchorSpan, $firstAnchorInner);

        $firstAnchor->appendChild($footerBrand);

        $lastItemClass = $lastItem->getAttribute('class');
        $lastItem->setAttribute('class', $lastItemClass . ' menu-item-has-children');
        $lastItem->appendChild($contactInfo);

        return $dom->saveHTML($wrapper[0]);
    }
}
