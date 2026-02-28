<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_load_css', '__return_false');

add_filter('body_class', __NAMESPACE__ . '\\remove_bodyClasses', 10, 3);
function remove_bodyClasses($wp_classes, $extra_classes) {
    $post = get_post();
    $post_id = get_the_ID();
    $post_type = get_post_type($post_id);
    $slug = @$post->post_name;

    $wp_classes = array_diff($wp_classes, [
        'postid-' . $post_id,
        'page-id-' . $post_id,
        $post_type,
        $slug,
    ]);

    $better_classes = [];

    if(is_singular()) {
        $better_classes[] = 'wp-singular-' . $post_type;
        $better_classes[] = 'slug-' . $slug;
    }

    return array_merge( $wp_classes, $better_classes, (array) $extra_classes);
}


add_filter('post_class', __NAMESPACE__ . '\\remove_postClasses', 10, 3);
function remove_postClasses($classes, $class, $post_id) {
    $classes = array_diff($classes, [
        'hentry',
        'post-' . $post_id,
        'status-' . get_post_status($post_id),
        get_post_type($post_id),
        // 'type-' . get_post_type($post_id),
    ]);

    return $classes;
}

add_filter('body_class', __NAMESPACE__ . '\\firstBlockContrast');
function firstBlockContrast($classes)
{
    $post = get_post();

    if(is_archive()) {
        $postType = @get_queried_object()->name;
        $postID = get_field('page_for_' . $postType, 'option');
        $post = get_post($postID);
    } elseif(is_home()) {
        $postID = get_option('page_for_posts');
        $post = get_post($postID);
    }

    if($post) {
        $blocks = parse_blocks($post->post_content);
        $firstBlock = @$blocks[0];
        $contrast = @$firstBlock['attrs']['data']['settings_contrast'];

        if($contrast) {
            $classes[] = 'has-first-block-knockout';
        }
    }

    return $classes;
}
