<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockImageText extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.image-text.render',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'classes' => $this->classes(),
            'textClasses' => $this->textClasses(),
            'imageClasses' => $this->imageClasses(),
            'hSizeTiny' => $this->hSizeTiny(),
            'hSize' => $this->hSize(),
        ];
    }

    public function hSizeTiny()
    {
        $hsize = (int) get_field('hsize') ?: 2;

        return $hsize;

    }

    public function hSize()
    {
        $hSize = (int) get_field('hsize') ?: 2;
        $tinyTitle = get_field('h1');

        if($tinyTitle) {
            return ($hSize + 1);
        } else {
            return $hSize;
        }
    }

    public function classes()
    {
        $fields = [
            'stacked_image_first',
            'stacked_image_hide',
            'columns_image_first',
            'columns_vertical_align',
        ];

        $props = [];

        foreach($fields as $field):
            $props[$field] = get_field($field);
        endforeach;

        $classes = [
            'image-text-cols',
        ];

        if($props['stacked_image_first'])
            $classes[] = 'stacked-image-first';

        if($props['stacked_image_hide'])
            $classes[] = 'stacked-image-hide';

        if($props['columns_image_first'])
            $classes[] = 'columns-image-first';

        if($props['columns_vertical_align'])
            $classes[] = 'image-text-cols-' . $props['columns_vertical_align'];

        return $classes;
    }

    public function textClasses()
    {
        $fields = [
            'width',
            'padding',
        ];

        $props = [];

        foreach($fields as $field):
            $props[$field] = get_field('text_' . $field);
        endforeach;

        $classes = [
            'image-text-col',
            'image-text-text',
        ];

        if($props['width'])
            $classes[] = 'image-text-text-' . $props['width'];

        if($props['padding'])
            $classes[] = 'inner inner-zero-x';

        return $classes;
    }

    public function imageClasses()
    {
        $fields = [
            'width',
            'focal',
            'rounded',
            'fill',
            'fit',
        ];

        $props = [];

        foreach($fields as $field):
            $props[$field] = get_field('image_' . $field);
        endforeach;

        $classes = [
            'image-text-col',
            'image-text-image',
        ];

        if($props['width'])
            $classes[] = 'image-text-image-' . $props['width'];

        if($props['focal'])
            $classes[] = 'image-text-image-focal-' . $props['focal'];

        if($props['rounded'])
            $classes[] = 'image-text-image-rounded';

        if($props['fill'])
            $classes[] = 'image-text-image-fill';

        if($props['fit'])
            $classes[] = 'image-text-image-contain';

        return $classes;
    }
}
