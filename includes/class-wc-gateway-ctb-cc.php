<?php

class WC_ctb_Credit_Card_Payment extends WC_Payment_Gateway
{
      public function __construct(){
          $this->id = 'ctb-cc';
          $this->icon = '';
          $this->has_fields = false;
          $this->method_title = __('ctb Credit card', 'wc-ctb-payment');
          $this->method_description = __('with credit card', 'wc-ctb-payment');
          $this->init();
      }
      function init() {
        $this->init_form_fields();
        $this->init_settings();

          add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );

      }
      /**
       * Initialise Gateway Settings Form Fields.
       *
       * @return void
       */
      function init_form_fields()
      {
       $this->form_fields = include __DIR__ . '/settings-cc-payment.php';

       foreach ($this->form_fields as $key => $value){
           $option = $this->get_option($key);

           if ('' !== $option){
               $this->{$key} = $this->get_option($key);
           }
       }
      }

      /**
       * Process the payment and return the result
       * @param int $order_id Order ID.
       *
       * @return array
       */
      public function process_payment($order_id)
      {
              global $woocommerce;
              $order = new WC_Order( $order_id );

              // Mark as on-hold (we're awaiting the cheque)
              $order->update_status('on-hold', __( 'Awaiting cheque payment', 'wc-ctb-payment' ));

              // Remove cart
              $woocommerce->cart->empty_cart();

              // Return thankyou redirect
              return array(
                  'result' => 'success',
                  'redirect' => $this->get_return_url( $order )
              );

      }

}

