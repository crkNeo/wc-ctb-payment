<?php

class WC_ctb_Credit_Card_Payment extends WC_Payment_Gateway
{



    public function __construct(){
          $this->id = 'ctb';
          $this->icon = '';
          $this->has_fields = false;
          $this->method_title = __('ctb Credit card', 'wc-ctb-payment');
          $this->method_description = __('with credit card', 'wc-ctb-payment');

          //載入設定
          $this->init_form_fields();
          $this->init_settings();

          //取得後台資料
          $this->merID = $this->get_option('merID');
          $this->MerchantID = $this->get_option('MerchantID');
          $this->TerminalID = $this->get_option('TerminalID');

          add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
          add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'receipt_page' ) );
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


    public function process_payment( $order_id ) {
        $order = wc_get_order( $order_id );

        // 標記訂單為正在處理
//        $order->update_status( 'on-hold', __( 'Awaiting CTB payment', 'woocommerce' ) );

        // 清空購物車
        WC()->cart->empty_cart();

        // 重定向到收據頁面
        return array(
            'result'   => 'success',
            'redirect' => $order->get_checkout_payment_url( true )
        );
    }
    public function receipt_page( $order_id ) {
        echo '<p>' . __( 'Thank you for your order, please click the button below to pay with CTB.', 'woocommerce' ) . '</p>';
        echo $this->generate_ctb_form( $order_id );
    }
    public function generate_ctb_form( $order_id ) {
        $order = wc_get_order( $order_id );



        // 取得訂單編號和總金額
        $lidm = $order->get_order_number();
        $purch_amt = intval($order->get_total() * 100); // 總金額，以分為單位

        // 生成 POST 表單
        $form = '<form id="ctb_payment_form" method="post" action="https://www.focas-test.fisc.com.tw/FOCAS_WEBPOS/online/" target="_self">';
        $form .= '<input type="hidden" name="MerchantID" value="' . esc_attr( $this->MerchantID ) . '">';
        $form .= '<input type="hidden" name="TerminalID" value="' . esc_attr( $this->TerminalID) . '">';
        $form .= '<input type="hidden" name="merID" value="' . esc_attr( $this->merID) . '">';
        $form .= '<input type="hidden" name="lidm" value="' . esc_attr( $lidm ) . '">';
        $form .= '<input type="hidden" name="purchAmt" value="' . esc_attr( $purch_amt ) . '">';
        $form .= '<input type="hidden" name="AutoCap" value="0">';
        $form .= '</form>';
        $form .= '<script type="text/javascript">document.getElementById("ctb_payment_form").submit();</script>';

        return $form;
    }
}

