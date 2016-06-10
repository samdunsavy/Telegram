<?php

$ram = get_server_memory_usage();
print($ram);


function get_server_memory_usage() {
$free = shell_exec('free'); 
$free = (string)trim($free);
$free_arr = explode("\n", $free); 
$mem = explode(" ", $free_arr[1]);
$mem = array_filter($mem); 
$mem = array_merge($mem); 
$memory_usage = $mem[2]/$mem[1]*100;
$memory_usage = substr($memory_usage,0,5);
return "$memory_usage"; 
}

$cpu_use = trim(shell_exec("cat <(grep 'cpu ' /proc/stat) <(sleep 1 && grep 'cpu ' /proc/stat) | awk -v RS=\"\" '{print ($13-$2+$15-$4)*100/($13-$2+$15-$4+$16-$5)}'"));
print($cpu_use);