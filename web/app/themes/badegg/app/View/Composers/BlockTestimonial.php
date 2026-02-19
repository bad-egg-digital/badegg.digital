<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockTestimonial extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.testimonial.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'testimonial' => $this->get_testimonial(),
        ];
    }

    public function get_testimonial()
    {
        $source = get_field('source');
        $select = get_field('select');

        if($source == 'select') {
            return $select;
        } else {
            return $this->random();
        }
    }

    public function random()
    {
        $testimonial = get_posts([
            'post_type' => 'testimonial',
            'orderby' => 'rand',
            'numberposts' => 1,
        ]);

        if($testimonial) {
            return $testimonial[0];
        } else {
            return false;
        }
    }
}
