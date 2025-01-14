<?php 

use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;


/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertYmdToMdy')) {

    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}

/*
 * Method for check status  
 */

if(!function_exists('checkStatus')) {

    function checkStatus($status) {
        if($status == 'pending') {
            return "<span class='badge badge-warning'>" . $status."</span>";
        } elseif($status == 'success') {
            return "<span class='badge badge-success'>" . $status."</span>";
        }elseif($status == 'disable') {
            return "<span class='badge badge-danger'>" . $status."</span>";
        }
    }
}

/**
 * Method check credit card (Mastercard , visa card, ....)
*/

if(!function_exists('checkCreditCard')) {
    function checkCreditCard($card_number) {
        return 'hello world ';
    }
}

/***
 * Method admin url()
 */

 if(!function_exists('admin_url')) {
    function admin_url($url) {
        return url(prefix_url(). '/admin/'.$url);
    }
 }

 if(!function_exists('image_encrypt')){
    function image_encrypt($asset) {
        return hash('sha256', '<img class="img-fluid" src="'. asset($asset) .'">');
    }
 }

 if(!function_exists('is_active')) {
    function is_active() {
        return (request()->is(request()->path()) ? 'active' : '');
    }
 }

 if(!function_exists('clear_tag')) {
    function clear_tag($html) {
       return htmlentities($html , ENT_QUOTES, 'UTF-8', false);
    }
 }

 if(!function_exists('decode_html')) {
    function decode_html($script) {
        return html_entity_decode($script);
    }
 }

 // admin redirect
 if(!function_exists('admin_redirect')) {
    function admin_redirect($url) {
        return redirect(prefix_url().'/admin/'. $url);
    }
 }

 // Encryption function
 if(!function_exists('encrypt')) {
    function encrypt($data, $encryptionKey) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-128-CBC'));
        $encrypted = openssl_encrypt($data, 'AES-128-CBC', $encryptionKey, 0, $iv);
        return base64_encode($iv . $encrypted);
    }
 }

 // Decryption function
 if(!function_exists('decrypt')) {
    function decrypt($encryptedData, $encryptionKey) {
        $encryptedData = base64_decode($encryptedData);
        $ivLength = openssl_cipher_iv_length('AES-128-CBC');
        $iv = substr($encryptedData, 0, $ivLength);
        $encrypted = substr($encryptedData, $ivLength);
        return openssl_decrypt($encrypted, 'AES-128-CBC', $encryptionKey, 0, $iv);
    }
 }

 if(!function_exists('prefix_url')) {
    function prefix_url() {

        $site_prefix = DB::table('settings')->first()->site_prefix;
        return $site_prefix;
    }
 }