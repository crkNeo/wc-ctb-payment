<?php

$setting = array(
    'enabled' => array(
        'title' => __( 'Enable/Disable', 'wc-ctb-payment' ),
        'type' => 'checkbox',
        'label' => __( 'Enable Credit Card Payment', 'wc-ctb-payment' ),
        'default' => 'no'
    ),

    'title' => array(
        'title' => __( 'Title', 'wc-ctb-payment' ),
        'type' => 'text',
        'description' => __( 'This controls the title which the user sees during checkout.', 'wc-ctb-payment' ),
        'default' => __( 'CTB Credit Card', 'wc-ctb-payment' ),
        'desc_tip' => false,
    ),

    'description' => array(
        'title' => __( 'Description', 'wc-ctb-payment' ),
        'type' => 'text',
        'description' => __('Allow your costomers make payment with credit ard though out CTB.','wc-ctb-payment'),
        'default' => __('Have your customers pay with credit card.','wc-ctb-payment'),
        'desc_tip' => false,
    ),

    'order_button_text' => array(
        'title' => __('Pay Button', 'wc-ctb-payment'),
        'type' => 'text',
        'description'=>__('Set if the place order button should be renamed on selection.','wc-ctb-payment'),
        'default'=> __('Process to Pay','wc-ctb-payment'),
        'desc_tip' => false,
    ),

    'test_Details' => array(
        'title' => __('TEST API credentials', 'wc-ctb-payment'),
        'type' => 'title',
    ),
    'test_merID' => array(
        'title' => __('test_merID', 'wc-ctb-payment'),
        'type' => 'text',
    ),
    'test_MerchantID' => array(
        'title' => __('test_MerchantID', 'wc-ctb-payment'),
        'type' => 'text',
    ),
    'test_TerminalID' => array(
        'title' => __('test_TerminalID', 'wc-ctb-payment'),
        'type' => 'text',
    ),

);

return $setting;