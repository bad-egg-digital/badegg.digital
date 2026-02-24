<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockColumnedHeading extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.columned-heading.render',
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
            'headingClasses' => $this->headingClasses(),
            'hClasses' => $this->hClasses(),
            'editorClasses' => $this->editorClasses(),
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
        $tinyTitle = get_field('tiny_title');

        if($tinyTitle) {
            return ($hSize + 1);
        } else {
            return $hSize;
        }
    }

    public function classes()
    {
        $fields = [
            'tiny_title',
        ];

        $props = [];

        foreach($fields as $field):
            $props[$field] = get_field($field);
        endforeach;

        $classes = [
            'columned-heading-cols',
        ];

        if($props['tiny_title'])
            $classes[] = 'has-tiny-title';

        return $classes;
    }

    public function headingClasses()
    {
        $fields = [
            'width',
        ];

        $props = [];

        foreach($fields as $field):
            $props[$field] = get_field('heading_' . $field);
        endforeach;

        $classes = [
            'columned-heading-col',
            'columned-heading-col-heading',
        ];

        if($props['width'])
            $classes[] = 'columned-heading-col-heading-' . $props['width'];

        return $classes;
    }

    public function hClasses()
    {
        $fields = [
            'colour',
            'tint',
            'tiny_title',
        ];

        $props = [];

        foreach($fields as $field):
            $props[$field] = get_field($field);
        endforeach;

        $classes = [
            'section-title',
        ];

        $colourClass = '';

        if($props['colour'])
            $colourClass = $props['colour'];

        if(!in_array($props['colour'], [0, '0', 'white', 'black']) && $props['tint'])
            $colourClass .= '-' . $props['tint'];

        if($colourClass)
            $classes[] = $colourClass;

        if($props['tiny_title'])
            $classes[] = 'subhead';

        return $classes;
    }

    public function editorClasses()
    {
        // $fields = [
        //     'width',
        //     'focal',
        //     'rounded',
        //     'fill',
        //     'fit',
        // ];

        // $props = [];

        // foreach($fields as $field):
        //     $props[$field] = get_field('image_' . $field);
        // endforeach;

        $classes = [
            'columned-heading-col',
            'columned-heading-col-editor',
            'wysiwyg',
        ];

        return $classes;
    }
}
