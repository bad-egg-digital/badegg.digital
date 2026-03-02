<?php

namespace App\Admin;

class Archives
{
    public function __construct()
    {
        // add_filter('register_post_type_args', [$this, 'args'], 0, 2);
        // add_filter('register_taxonomy_args', [$this, 'args'], 0, 2);
    }

    public function primaryTaxonomy($postType = null)
    {
        switch($postType):
            case 'post':
                return 'category';
            case 'project':
                return 'project_category';
            default:
                return null;
        endswitch;
    }
}
