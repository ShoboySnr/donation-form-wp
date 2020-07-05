<?php

include_once(ABSPATH.'/wp-load.php');

if(isset($_GET['type']) && $_GET['type'] == 'payment_method') getActivePayment();

function getActivePayment() {
  $method = get_theme_mod('active_payment_method');
  // echo json_encode($_POST['type']);
}