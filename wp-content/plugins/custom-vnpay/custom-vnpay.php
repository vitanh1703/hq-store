<?php
/*
Plugin Name: Custom VNPAY Gateway
Description: VNPAY Sandbox Gateway for WooCommerce
Version: 1.0
Author: HQ Store
*/

if (!defined('ABSPATH')) {
    exit;
}

add_filter('woocommerce_payment_gateways', 'custom_add_vnpay_gateway');

function custom_add_vnpay_gateway($gateways)
{
    $gateways[] = 'WC_Gateway_Custom_VNPAY';
    return $gateways;
}

add_action('plugins_loaded', 'custom_init_vnpay_gateway');

function custom_init_vnpay_gateway()
{
    if (!class_exists('WC_Payment_Gateway')) {
        return;
    }

    class WC_Gateway_Custom_VNPAY extends WC_Payment_Gateway
    {

        public function __construct()
        {

            $this->id = 'custom_vnpay';

            $this->icon = '';

            $this->has_fields = false;

            $this->method_title = 'VNPAY';

            $this->method_description = 'Thanh toán qua VNPAY Sandbox';

            $this->supports = array(
                'products'
            );

            $this->init_form_fields();

            $this->init_settings();

            $this->title = $this->get_option('title');

            add_action(
                'woocommerce_update_options_payment_gateways_' . $this->id,
                array($this, 'process_admin_options')
            );

            add_action(
                'woocommerce_api_custom_vnpay',
                array($this, 'vnpay_return_handler')
            );
        }

        public function init_form_fields()
        {
            $this->form_fields = array(

                'enabled' => array(
                    'title' => 'Enable/Disable',
                    'type' => 'checkbox',
                    'label' => 'Enable VNPAY',
                    'default' => 'yes'
                ),

                'title' => array(
                    'title' => 'Title',
                    'type' => 'text',
                    'default' => 'Thanh toán VNPAY'
                )

            );
        }

        public function process_payment($order_id)
        {

            $order = wc_get_order($order_id);

            $vnp_TmnCode = "66ES9672";

            $vnp_HashSecret = "QQ83KS1LRZG4JA9CBSDLQWDVB8OS34IL";

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

            $return_url = home_url('/wc-api/custom_vnpay');

            $vnp_TxnRef = $order_id;

            $vnp_OrderInfo = "Thanh toan don hang #" . $order_id;

            $vnp_OrderType = "billpayment";

            $vnp_Amount = $order->get_total() * 100;

            $vnp_Locale = "vn";

            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(

                "vnp_Version" => "2.1.0",

                "vnp_TmnCode" => $vnp_TmnCode,

                "vnp_Amount" => $vnp_Amount,

                "vnp_Command" => "pay",

                "vnp_CreateDate" => date('YmdHis'),

                "vnp_CurrCode" => "VND",

                "vnp_IpAddr" => $vnp_IpAddr,

                "vnp_Locale" => $vnp_Locale,

                "vnp_OrderInfo" => $vnp_OrderInfo,

                "vnp_OrderType" => $vnp_OrderType,

                "vnp_ReturnUrl" => $return_url,

                "vnp_TxnRef" => $vnp_TxnRef

            );

            ksort($inputData);

            $query = "";

            $hashdata = "";

            foreach ($inputData as $key => $value) {

                $hashdata .= urlencode($key) . "=" . urlencode($value) . '&';

                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $hashdata = rtrim($hashdata, '&');

            $query = rtrim($query, '&');

            $vnpSecureHash = hash_hmac(
                'sha512',
                $hashdata,
                $vnp_HashSecret
            );

            $paymentUrl = $vnp_Url .
                "?" .
                $query .
                '&vnp_SecureHash=' .
                $vnpSecureHash;

            return array(
                'result' => 'success',
                'redirect' => $paymentUrl
            );
        }

        public function vnpay_return_handler()
        {

            if (isset($_GET['vnp_ResponseCode'])) {

                $order_id = $_GET['vnp_TxnRef'];

                $order = wc_get_order($order_id);

                if ($_GET['vnp_ResponseCode'] == '00') {

                    $order->payment_complete();

                    $order->add_order_note(
                        'Thanh toán VNPAY thành công'
                    );

                    WC()->cart->empty_cart();

                    wp_redirect(
                        $this->get_return_url($order)
                    );

                    exit;

                } else {

                    $order->update_status(
                        'failed',
                        'Thanh toán thất bại'
                    );

                    wp_redirect(
                        wc_get_checkout_url()
                    );

                    exit;
                }
            }
        }
    }
}