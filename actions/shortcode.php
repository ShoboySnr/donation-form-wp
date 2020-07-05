<?php

add_action('init', function() {
  add_shortcode('donate-form', function($atts) {
    ob_start();
    $atts = shortcode_atts([
        'amount' => ['1000', '2000', '3000', '5000'],
        'currency' => 'NGN',
    ], $atts);

    include(SLD_PLUGIN_DIR.'/templates/form.php');
    return ob_get_clean();
  });
});
