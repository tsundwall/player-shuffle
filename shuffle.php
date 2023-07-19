<?php

$command = escapeshellcmd('/home/x125xo57hl96/.local/bin/python3 shuffle_mlb.py'); 
$output = shell_exec($command);
echo $output;
$command = escapeshellcmd('/home/x125xo57hl96/.local/bin/python3 shuffle.py');
$output2 = shell_exec($command);
echo $output2;
?>