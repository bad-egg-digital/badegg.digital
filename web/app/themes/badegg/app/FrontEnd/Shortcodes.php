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
            'direction' => 'right-down',
            'text' => '',
            'colour' => 'tertiary-dark',
            'size' => 2,
        ], $atts, 'arrow_cta' );

        $html = '';

        if($atts['text'] || $content):
            ob_start(); ?>

                <div class="arrow-cta">
                    <h<?= $atts['size'] ?> class="<?= $atts['colour'] ?>">
                        <span><?= $content ?: $atts['text'] ?></span> <i class="arrow-cta-arrow arrow-cta-<?= $atts['direction'] ?>">&nbsp;</i>
                    </h<?= $atts['size'] ?>>
                </div>

            <?php $html = ob_get_clean();
        endif;

        return $html;
    }
}
