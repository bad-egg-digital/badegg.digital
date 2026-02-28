<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.header.*',
        'sections.footer.footer-brand',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $props = [
            'logo' => $this->logo(),
            'firstBlockContrast' => $this->firstBlockContrast(),
        ];

        return $props;
    }

    public function logo()
    {
        return @file_get_contents(get_stylesheet_directory() . '/resources/images/logo-bad-egg-digital.svg');
    }

    public function firstBlockContrast()
    {
        $post = get_post();

        if(is_archive() || is_post_type_archive() || is_tax() || is_category() || is_tag()) {
            $postType = @get_queried_object()->name;
            $postID = get_field('page_for_' . $postType, 'option');
            $post = get_post($postID);
        } elseif(is_home()) {
            $postID = get_option('page_for_posts');
            $post = get_post($postID);
        }

        if(!$post) return;

        $blocks = parse_blocks($post->post_content);
        $firstBlock = @$blocks[0];
        $contrast = @$firstBlock['attrs']['data']['settings_contrast'];

        if($contrast) {
            return true;
        } else {
            return false;
        }
    }
}
