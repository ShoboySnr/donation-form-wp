<?php 

include_once('santizes.php');

add_action('customize_register', function ($wp_customize) {
    $wp_customize->add_section('simple_local_donation', array(
    'title' => __('Simple Local Donation Settings'),
    'description' =>'Enter your API Settings to start using the plugin',
    'priority' => 105,
    'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_setting( 'active_payment_method', array(
    'capability' => 'edit_theme_options',
    'default' => '',
    'type' => 'theme_mod',
    ));

    $wp_customize->add_control( 'active_payment_method_control', array(
    'type' => 'select',
    'section' => 'simple_local_donation', // Add a default or your own section
    'label' => __( 'Select active payment method' ),
    'description' => __( 'Please select the active payment method to use' ),
    'choices' => array(
        '' => __( 'Select active payment methods' ),
        'paystack' => __( 'Paystack' ),
        'ravepay' => __( 'Rave Pay' ),
    ),
    'settings' => __('active_payment_method'),
    ) );

    $wp_customize->add_setting('rave_public_key');
    $wp_customize->add_control( 'rave_secret_key', array(
    'label' => __( 'Enter Rave Publishable Key', '' ),
    'section' => __('simple_local_donation'),
    'settings' => __('rave_public_key'),
    'type' => 'text',
    'description' => __( 'Enter your Rave Pay Publishable Key. Find how to get your key <a href="https://developer.flutterwave.com/docs/api-keys" target="_blank">here</a>' ),
    ));

    $wp_customize->add_setting('paystack_public_key');
    $wp_customize->add_control( 'paystack_secret_key', array(
    'label' => __( 'Enter Paystack Public Key', '' ),
    'section' => __('simple_local_donation'),
    'settings' => __('paystack_public_key'),
    'type' => 'text',
    'description' => __( 'Enter your Paystack Public Key. Find how to get your key <a href="https://developer.flutterwave.com/docs/api-keys" target="_blank">here</a>' ),
    ));

});