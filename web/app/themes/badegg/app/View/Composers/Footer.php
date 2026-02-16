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

        return $props;
    }
}
