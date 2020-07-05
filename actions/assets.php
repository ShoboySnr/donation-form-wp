<?php

function sld_admin_styles() {
  wp_enqueue_style( 'sld-admin-css', plugins_url('simple-local-donation/assets/css/admin.css'));
}

function sld_frontend_scripts() {
  wp_enqueue_style( 'sld-stylesheets', plugins_url('simple-local-donation/assets/css/custom.css'));
  wp_enqueue_script( 'sld-jquery-scripts', plugins_url('simple-local-donation/assets/js/jquery.min.js'));
  wp_enqueue_script( 'sld-ravepay-scripts', 'https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js');
  wp_enqueue_script( 'sld-paystack-scripts', 'https://js.paystack.co/v1/inline.js');
  wp_enqueue_script( 'sld-custom-scripts', plugins_url('simple-local-donation/assets/js/custom.js'));
}

add_action( 'wp_enqueue_scripts', 'sld_frontend_scripts' );
add_action( 'admin_enqueue_scripts',  'sld_admin_styles');

