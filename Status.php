<?php

define('BOT_TOKEN', '188344587:AAHzfOqFv0jJr6wR5VDTZzeeNl1X88Xv0II'); 

define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
$chatID = '-113952372';
$reply = sendMessage();

$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=";


$fp = fsockopen("s1.aayushbibhuti.com", 22005, $errno, $errstr, 5);
if (!$fp) {
	$mta = "OFFLINE\n";
} else {
	$mta = "ONLINE\n";
    fclose($fp);	
}

$fp2 = fsockopen("s1.aayushbibhuti.com", 80, $errno, $errstr, 5);
if (!$fp2) {
    $web = "OFFLINE\n";
} else { 
    $web = "ONLINE\n";
    fclose($fp2);
}

$fp3 = fsockopen("s1.aayushbibhuti.com", 8888, $errno, $errstr, 5);
if (!$fp3) {
$hugo = "OFFLINE\n";
	
} else {
$hugo = "ONLINE\n";
    fclose($fp3);
}

$fp4 = fsockopen("s1.aayushbibhuti.com", 6667, $errno, $errstr, 5);
if (!$fp4) {
$irc = "OFFLINE\n";
	
} else {
$irc = "ONLINE\n";
    fclose($fp4);
}

exec("sudo ps aux | grep -i 'bopm' | grep -v grep", $pids);
if(empty($pids)) {
       $bopm = "OFFLINE\n";
} else {
       $bopm = "ONLINE\n";
}

exec("sudo ps aux | grep -i 'php bot.php' | grep -v grep", $pids1);
if(empty($pids1)) {
       $stats = "OFFLINE\n";
} else {
       $stats = "ONLINE\n";
}

exec("sudo ps aux | grep -i 'relay-bot.pl' | grep -v grep", $pids2);
if(empty($pids2)) {
       $abrn = "OFFLINE\n";
} else {
       $abrn = "ONLINE\n";
}


$reply = sendMessage($mta,$irc,$web,$hugo,$abrn,$bopm,$stats,$argv[1]);
file_get_contents($sendto.$reply);


function sendMessage($mta,$irc,$web,$hugo,$abrn,$bopm,$stats,$arg)
     {
   if ($arg == 'anytimestatus') {
	$message = "Here is the service status, Sir\n\n Service Check:\n MTA Server: $mta IRC Server: $irc Website: $web\n BOT Check:\n Hugo: $hugo ABRN: $abrn Proxy Check Bot: $bopm Stats Bot: $stats";
   $message = urlencode($message);
   return $message; 
       }
   $message = "Here are the results for the routine check, Sir\n\n Service Check:\n MTA Server: $mta IRC Server: $irc Website: $web\n BOT Check:\n Hugo: $hugo ABRN: $abrn Proxy Check Bot: $bopm Stats Bot: $stats";
   $message = urlencode($message);
   return $message; 
	 }

