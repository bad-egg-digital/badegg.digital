<?php

namespace App\Admin;

class Integrations
{
    public function __construct()
    {
        add_action( 'wp_head',  [$this, 'FathomAnalytics']);
        add_action( 'wp_head',  [$this, 'PlausibleAnalytics']);
        add_action( 'wp_footer',  [$this, 'FontAwesomeKit'], 100);
    }

    public function FathomAnalytics()
    {
        $fathomID = get_field('badegg_integrations_fathom_id', 'option');

        if($fathomID && WP_ENV == 'production'): ?>

<!-- Fathom - beautiful, simple website analytics -->
<script src="https://cdn.usefathom.com/script.js" data-site="<?= $fathomID ?>" defer></script>
<!-- / Fathom -->

        <?php endif;
    }

    public function PlausibleAnalytics()
    {
        $plausible = get_field('badegg_plausible_analytics', 'option');
        $host = @$plausible['host'];
        $id = @$plausible['id'];

        if(filter_var($host, FILTER_VALIDATE_URL) && $host && $id && WP_ENV == 'production'): ?>

<!-- Privacy-friendly analytics by Plausible -->
<script async src="<?= rtrim($host, '/') ?>/js/pa-<?= $id ?>js"></script>
<script>
window.plausible=window.plausible||function(){(plausible.q=plausible.q||[]).push(arguments)},plausible.init=plausible.init||function(i){plausible.o=i||{}};
plausible.init()
</script>

        <?php endif;
    }

    public function FontAwesomeKit()
    {
        $kit = get_field('badegg_integrations_fontawesome_kit', 'option');

        if($kit): ?>

<!-- FontAwesome Kit -->
<script src="https://kit.fontawesome.com/<?= $kit ?>.js" defer crossorigin="anonymous"></script>
<!-- / FontAwesome Kit -->

        <?php endif;
    }
}
