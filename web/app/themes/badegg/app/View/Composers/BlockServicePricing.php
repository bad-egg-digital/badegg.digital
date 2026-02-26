<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Utilities;

class BlockServicePricing extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.service-pricing.render',
        'partials.content-service-tier',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $specifiedService = get_field('service');
        $post_id = get_the_ID();



        if($specifiedService) {
            $service = $specifiedService;
        } else {
            $service = $post_id;
        }

        $props = [
            'service' => $service,
            'pricing_tiers' => get_field('service_pricing_tiers', $service),
        ];

        return $props;
    }
}
