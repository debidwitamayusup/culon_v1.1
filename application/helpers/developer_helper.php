<?php

defined('BASEPATH') OR exit('No direct script access allowed');
#region raga
/*
 * ---------------------------------------------------------------
 * PRINT OUT
 * ---------------------------------------------------------------
 */
if (!function_exists('print_out')) {

    function print_out($params, $die = FALSE) {
        ob_start();
        $header = "";
        $footer = "";

        $header .= '<!DOCTYPE html>' . "\r\n" . '<html lang="en">' . "\r\n" . '<head>' . "\r\n";
        $header .= '<meta charset="utf-8">' . "\r\n";
        $header .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\r\n";
        $header .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n";
        $header .= '<style type="text/css">' . "\r\n";
        $header .= 'code {font-family: Consolas,Monaco,Courier New,Courier,monospace; font-size: 12px; background-color: #f9f9f9; border: 1px solid #D0D0D0; color: #002166;display: block; margin: 14px 0 14px 0; padding: 12px 10px 12px 10px;}' . "\r\n";
        $header .= 'code p {color: #ff0000;}';
        $header .= '</style>' . "\r\n" . '</head>' . "\r\n" . '<body>' . "\r\n";
        $header .= '<code>' . "\r\n" . '<p>[ Debug Print Out Start ]</p>' . "\r\n";

        $footer .= "\r\n" . '<p>[ Debug Print Out End ]</p>' . "\r\n" . '</code>' . "\r\n";
        $footer .= '</body>' . "\r\n" . '</html>' . "\r\n";

        if (!empty($params) or $params != '') {
            if (is_array($params) or is_object($params)) {
                echo $header;
                echo '<pre>';
                print_r($params);
                echo '</pre>';
                echo $footer;
            }
            else {
                $content1 = htmlspecialchars(htmlspecialchars_decode($params, ENT_QUOTES), ENT_QUOTES, 'utf-8');
                $content2 = str_replace(array(' ', "\n"), array('&nbsp;&nbsp;', '<br>'), $content1);
                $content3 = str_replace('&nbsp; ', '&nbsp;&nbsp;', $content2);
                echo $header;
                echo '<pre>';
                print_r($content3);
                echo '</pre>';
                echo $footer;
            }
        }
        else {
            echo $header;
            echo '<pre>';
            print_r('Output data is empty!');
            echo '</pre>';
            echo $footer;
        }

        if ($die) {
            die();
        }
    }

}

/*
 * ---------------------------------------------------------------
 * ARRAY TO STRINGS
 * ---------------------------------------------------------------
 */
if (!function_exists('array_to_strings')) {

    function array_to_strings($array) {

        $output = '';
        if (is_array($array)) {
            foreach ($array as $attribute => $value) {
                if (!empty($attribute) && !empty($value)) {
                    $output .= ' ' . $attribute . '="' . $value . '"';
                }
            }
        }

        return $output;
    }

}

/*
 * ---------------------------------------------------------------
 * OBJECT TO STRINGS
 * ---------------------------------------------------------------
 */
if (!function_exists('object_to_strings')) {

    function object_to_strings($array) {

        $output = '';
        if (is_object($array)) {
            foreach ($array as $attribute => $value) {
                if (!empty($attribute) && !empty($value)) {
                    $output .= ' ' . $attribute . '="' . $value . '"';
                }
            }
        }

        return $output;
    }

}

/*
 * ---------------------------------------------------------------
 * ARRAY TO OBJECT
 * ---------------------------------------------------------------
 */

if (!function_exists('array_to_object')) {

    function array_to_object($array) {
        if ($array == FALSE)
            return FALSE;

        if (is_array($array))
            $array = (object) $array;

        return $array;
    }

}

/*
 * ---------------------------------------------------------------
 * OBJECT TO ARRAY
 * ---------------------------------------------------------------
 */

if (!function_exists('object_to_array')) {

    function object_to_array($data) {
        if (is_array($data) || is_object($data)) {
            $result = array();
            foreach ($data as $key => $value) {
                $result[$key] = object_to_array($value);
            }
            return $result;
        }
        return $data;
    }

}

/*
 * ---------------------------------------------------------------
 * GENERATE CODE USER
 * ---------------------------------------------------------------
 */

if (!function_exists('generate_code_customer')) {

    function generate_code_customer($handphone = '') {
        if (!$handphone) {
            return FALSE;
        }

        $code = substr($handphone, -4) . date('d') . date('m') . substr(date('Y'), -2) . random_string('numeric', 2);

        return $code;
    }

}

/*
 * ---------------------------------------------------------------
 * GENERATE CODE VEHICLE
 * ---------------------------------------------------------------
 */

if (!function_exists('generate_code_vehicle')) {

    function generate_code_vehicle($nopol = '') {
        if (!$nopol) {
            return FALSE;
        }

        $code = substr($nopol, -4) . date('d') . date('m') . substr(date('Y'), -2) . random_string('numeric', 2);

        return $code;
    }

}

/*
 * ---------------------------------------------------------------
 * GENERATE CODE DRIVER
 * FORMAT : HP(4) + KTP(4)
 * ---------------------------------------------------------------
 */

if (!function_exists('generate_code_driver')) {

    function generate_code_driver($handphone = '', $ktp = '') {
        if (!$handphone) {
            return FALSE;
        }
        elseif (!$ktp) {
            return FALSE;
        }

        $code = substr($handphone, -4) . date('d') . date('m') . substr(date('Y'), -2) . substr($ktp, -4);
        return $code;
    }
}

/*
 * ---------------------------------------------------------------
 * GENERATE CODE EMPLOYEE
 * FORMAT : DD-MM-YY-RANDOM 3 digit
 * ---------------------------------------------------------------
 */

if (!function_exists('generate_code_employee')) {

    function generate_code_employee($handphone = '') {
        if (!$handphone) {
            return FALSE;
        }

        $code = date('d') . date('m') . date('y') . random_string('numeric', 3);

        return $code;
    }

}

/*
 * -----------------------------------------------------------------------------
 * CHECKING NUMBER CELLULAR
 * -----------------------------------------------------------------------------
 */

if (!function_exists('checking_num_cell')) {

    function checking_num_cell($handphone = '') {

        $checkJumlahNoHp = strlen($handphone);
        $substring       = substr($handphone, 0, 2);
        if ($substring !== '08' || $checkJumlahNoHp < 10 || $checkJumlahNoHp > 15) {
            return FALSE;
        }

        return TRUE;
    }

}

/*
 * ---------------------------------------------------------------
 * FILES URL
 * ---------------------------------------------------------------
 */
if (!function_exists('files_url')) {

    function files_url() {
        $CI = & get_instance();
        return $CI->config->slash_item('files_url');
    }

}

/*
 * ---------------------------------------------------------------
 * IMAGES URL
 * ---------------------------------------------------------------
 */
if (!function_exists('images_url')) {

    function images_url() {
        $CI = & get_instance();
        return $CI->config->slash_item('images_url');
    }

}

/*
 * ---------------------------------------------------------------
 * SEND SMS
 * ---------------------------------------------------------------
 */
if (!function_exists('SendSMS')) {

    function SendSMS($phone, $msg = '') {
        $userkey = 'free';
        $passkey = 'free';
        $message = $msg;

        //$url = "https://reguler.zenziva.net/apps/smsapibalance.php"; // Cek Balance
        $url = "https://reguler.zenziva.net/apps/smsapi.php"; // Action

        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);

        curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey=' . $userkey . '&passkey=' . $passkey . '&nohp=' . $phone . '&pesan=' . urlencode($message));
        $results = curl_exec($curlHandle);
        $err     = curl_errno($curlHandle);
        curl_close($curlHandle);
    }

}

/*
 * ---------------------------------------------------------------
 * GRABBING CURL
 * ---------------------------------------------------------------
 */
if (!function_exists('grabbingGET')) {

    function grabbingGET($url, $header = array(), $proxy = FALSE) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_HTTPHEADER     => $header,
            CURLOPT_PROXY          => ($proxy) ? '' : '',
            CURLOPT_PROXYPORT      => ($proxy) ? '' : '',
            CURLOPT_PROXYUSERPWD   => ($proxy) ? '' : ''
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }
        else {
            return $response;
        }
    }
#endregion
}
