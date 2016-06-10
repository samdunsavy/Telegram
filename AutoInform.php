<?php
$status = array();
define('BOT_TOKEN', '188344587:AAHzfOqFv0jJr6wR5VDTZzeeNl1X88Xv0II'); 

define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
$chatID = '-113952372';

$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=";


$fp = fsockopen("s1.aayushbibhuti.com", 22005, $errno, $errstr, 5);
if (!$fp) {
	$status['MTA'] = "OFFLINE\n";
} else {
	$status['MTA'] = "ONLINE\n";
    fclose($fp);	
}

$fp2 = fsockopen("s1.aayushbibhuti.com", 80, $errno, $errstr, 5);
if (!$fp2) {
    $status['Website'] = "OFFLINE\n";
} else { 
    $status['Website'] = "ONLINE\n";
    fclose($fp2);
}

$fp3 = fsockopen("s1.aayushbibhuti.com", 8888, $errno, $errstr, 5);
if (!$fp3) {
$status['Hugo'] = "OFFLINE\n";
	
} else {
$status['Hugo'] = "ONLINE\n";
    fclose($fp3);
}

$fp4 = fsockopen("s1.aayushbibhuti.com", 6667, $errno, $errstr, 5);
if (!$fp4) {
$status['IRC'] = "OFFLINE\n";
	
} else {
$status['IRC'] = "ONLINE\n";
    fclose($fp4);
}

exec("sudo ps aux | grep -i 'bopm' | grep -v grep",$pids);
if(empty($pids)) {
       $status['Proxy Checker Bot'] = "OFFLINE\n";
} else {
       $status['Proxy Checker Bot'] = "ONLINE\n";
}

exec("sudo ps aux | grep -i 'php bot.php' | grep -v grep", $pids1);
if(empty($pids1)) {
       $status['Stats Bot'] = "OFFLINE\n";
} else {
       $status['Stats Bot'] = "ONLINE\n";
}

exec("sudo ps aux | grep -i 'relay-bot.pl' | grep -v grep", $pids2);
if(empty($pids2)) {
       $status['ABRN'] = "OFFLINE\n";
} else {
       $status['ABRN'] = "ONLINE\n";
}

$reply = sendMessage($status,$sendto);


function sendMessage($status,$sendto)
     {
if ($status['MTA'] == "OFFLINE\n" || $status['IRC'] == "OFFLINE\n" || $status['Website'] == "OFFLINE\n" || $status['Hugo'] == "OFFLINE\n" || $status['ABRN'] == "OFFLINE\n" || $status['Proxy Checker Bot'] == "OFFLINE\n" || $status['Stats Bot'] == "OFFLINE\n") { 
$offline = array_keys($status, "OFFLINE\n");
$te = '';
foreach ($offline as $t => $Value) {
  exec("/usr/bin/php /home/rock/TGXavier/AddConfig.php Get $Value Told",$toldcheck);
if (empty($toldcheck[0])) { 
      exec("/usr/bin/php /home/rock/TGXavier/AddConfig.php Store $Value OFFLINE Told 1");
     $told = 0;
}
if (!empty($toldcheck[0])) { 
  $told = $toldcheck[0];
}
if ($told < 3) {
         $te = $te.$Value. ": OFFLINE\n";
         ++$told;
       exec("/usr/bin/php /home/rock/TGXavier/AddConfig.php Store $Value OFFLINE Told $told");  
}
}
	$message = "Some services went offline, Sir This message will be shown maximum 3 times\n\n $te";
if ($te) {
   $message = urlencode($message);
   file_get_contents($sendto.$message);
   return $message; 
        }
      }
else {
    $statusk = array_keys($status, "ONLINE\n");

  foreach ($statusk as $y => $Bitch) { 
      exec("/usr/bin/php /home/rock/TGXavier/AddConfig.php Get $Bitch State",$check);
     if ($check[0] == 'OFFLINE') { 
     $message = "$Bitch is back online!";
     exec("/usr/bin/php /home/rock/TGXavier/AddConfig.php Remove $Bitch",$check);
     file_get_contents($sendto.$message);
     return $message;
    }
   }
}
}
