<?php

namespace App\FrontEnd;

class Shortcodes
{
    public function __construct()
    {
        add_shortcode('arrow_cta', [$this, 'arrow_cta']);
    }

    public function arrow_cta($atts, $content = null)
    {
        $atts = shortcode_atts([
            'direction' => 'right',
            'angle' => 0,
            'text' => '',
            'colour' => 'tertiary-dark',
            'size' => 2,
        ], $atts, 'arrow_cta' );

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
