<?php

$name = $_POST["name"];
$type = $_POST["type"];
$idx = $_POST["idx"];


if ($type == 'nfl'){
    $json = file_get_contents('ultra_key.json');
}

else{
    $json = file_get_contents('ultra_key_mlb.json');
}

$keys = json_decode($json,true);
echo in_array($name,$keys[$idx]);

?>