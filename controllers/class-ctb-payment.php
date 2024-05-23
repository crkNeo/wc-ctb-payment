<?php

class ctb_Payment{
    /**
     * Initialize
     * @return void
     */
    public function init(){
        add_action('plugins_loaded',array($this,'load_payment_class'));
        add_filter('woocommerce_payment_gateways',array($this,'add_payment_gateway'));
    }

    /**
     * Load required payment method classes.
     *
     * @return void
     */
    public function load_payment_class(){
        $file = __DIR__ . '/../includes/class-wc-gateway-ctb.php';
        if (file_exists($file)){
            include $file;
        }
    }
    /**
     * Load gateways and hook in functions.
     *
     * @param array $methods Payment methods.
     * @return array
     */
    public function add_payment_gateway($methods){

        $methods['ctb'] = 'WC_ctb_Credit_Card_Payment';
        return $methods;
    }

}