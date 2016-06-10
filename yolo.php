<?php define('BOT_TOKEN', '188344587:AAHzfOqFv0jJr6wR5VDTZzeeNl1X88Xv0II'); 

define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

$content = file_get_contents("php://input");

$update = json_decode($content, true); 

$chatID = $update["message"]["chat"]["id"];
$grp = $update["message"]["chat"]["title"];
$user = $update["message"]["chat"]["username"];
$msg = $update["message"]["text"];

$reply = sendMessage($user,$grp,$chatID,$msg);

$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;

file_get_contents($sendto); 

function sendMessage($u,$g,$c,$msg)
     { 
	 if($u == "AayushBibhuti")
	 {		 
	 $message = "Hello Aayush, I am Xavier. Your personal assistant!  ";
	 }
	 if($u == "xavier_r")
	 {
	$message = "Hello Apurav, I am Xavier. Your personal assistant! ";
	 } 
	 if($g == "Quad")
	 {
    $textk = explode(' ',trim($msg));
 if (strpos($textk[0], '/status') !== false) {
     exec("sudo /usr/bin/php /home/rock/TGXavier/Status.php anytimestatus");
   }
   else {
	$message = "Hello 2 amazing guys! I am YOUR Bot used oftenly and you enjoy me! Debug: $msg";
      }
	 } 
     $message = urlencode($message);
	 return $message; 
	 }