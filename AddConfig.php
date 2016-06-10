<?php
$read = file_get_contents('./TGXavier/Config.txt');
$read = unserialize($read);

if ($argv[1] == 'Store') { 
     $read[$argv[2]]['State'] = $argv[3];
     $read[$argv[2]]['Told'] = $argv[5];
}

if ($argv[1] == 'Get') { 
    print($read[$argv[2]][$argv[3]]);
}

if ($argv[1] == 'Remove') {
    unset($read[$argv[2]]);
}

$data = serialize($read);

file_put_contents('./TGXavier/Config.txt',$data);

