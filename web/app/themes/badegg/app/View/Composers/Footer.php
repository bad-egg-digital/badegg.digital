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
        'sections.footer.*',
        'partials.contact-info',
        'blocks.contact-cards.render',
    ];

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
            'address',
            'address_mailing',
            'mailing_list',
        ];

        $props['sticker_shape'] = @file_get_contents(get_stylesheet_directory() . '/resources/images/sticker.svg');

        foreach($fields as $field) {
            $props['company_' . $field] = get_field('badegg_company_' . $field, 'option');
        }



        $props['footer_bg_atts'] = $this->background_atts();

        return $props;
    }

    public function background_atts()
    {
        $id = get_field('badegg_footer_bg', 'option');

        if(!$id) return;

        $hero = @wp_get_attachment_image_src($id, 'hero');
        $lazy = @wp_get_attachment_image_src($id, 'lazy');

        $atts = [
            'class' => 'bg-image bg-srcset bg-fixed bg-filter-multiply lazy',
            'style' => 'background-image: url(\''. $lazy[0] .'\');',
            'data-id' => $id,
            'data-size' => 'hero',
            'data-width' => $hero[1],
            'data-height' => $hero[2],
        ];

        return $atts;

    }
}
