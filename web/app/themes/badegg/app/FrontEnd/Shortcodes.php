<?php

namespace App\FrontEnd;

class Shortcodes
{
    public function __construct()
    {
        add_shortcode('button', [$this, 'button']);
        add_shortcode('arrow_cta', [$this, 'arrow_cta']);
    }

    public function button($atts)
    {
        $atts = shortcode_atts([
            'href' => '#',
            'text' => __('click here', 'badegg'),
            'colour' => 'tertiary',
            'class' => '',
            'size' => '',
            'target' => '',
            'rel' => '',
        ], $atts );

        $classes = [
            'btn',
            $atts['colour'],
        ];

        if($atts['class']) $classes[] = $atts['class'];
        if($atts['size']) $classes[] = $atts['size'];

        $attributes = [
            'href' => $atts['href'],
            'class' => implode(' ', $classes),
        ];

        if($atts['target']) $attributes['target'] = $atts['target'];
        if($atts['rel']) $attributes['rel'] = $atts['rel'];

        $html = '';

            ob_start(); ?>

                <p class="shortcode-btn"><a<?php foreach($attributes as $att => $value) { echo ' ' . $att . '="' . $value . '"'; } ?>><?= $atts['text'] ?></a></p>

            <?php $html = ob_get_clean();


        return $html;
    }

    public function arrow_cta($atts, $content = null)
    {
        $atts = shortcode_atts([
            'direction' => 'right',
            'angle' => 0,
            'text' => '',
            'colour' => 'tertiary-dark',
            'size' => 2,
        ], $atts );

        $html = '';
        $innerHTML = '';

        $angle = (int)str_replace('deg', '', $atts['angle']);
        if(($angle > 0) && $atts['direction'] == 'left') $angle = $angle * -1;

        $arrow = "<i class=\"arrow-cta-arrow\" style=\"rotate: {$angle}deg\"></i>";
        $heading = "<span>" . ( $content ?: $atts['text']) . "</span>";

        if($atts['direction'] == 'left') $innerHTML .= $arrow;
        $innerHTML .= $heading;
        if($atts['direction'] == 'right') $innerHTML .= $arrow;


        if($atts['text'] || $content):
            ob_start(); ?>

                <div class="arrow-cta <?= $atts['direction'] ?> section-m">
                    <h<?= $atts['size'] ?> class="arrow-cta-heading <?= $atts['colour'] ?>">
                        <?= $innerHTML ?>
                    </h<?= $atts['size'] ?>>
                </div>

            <?php $html = ob_get_clean();
        endif;

        return $html;
    }
}
