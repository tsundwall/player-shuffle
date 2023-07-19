<?php

$key = $_POST["key"];
$type = $_POST["type"];

if ($type == 'nfl'){
    $json_players = file_get_contents('ultra_cookies_nfl_players.json');
    $json_filled = file_get_contents('ultra_cookies_nfl_filled.json');
}

else{
    $json_players = file_get_contents('ultra_cookies_mlb_players.json');
    $json_filled = file_get_contents('ultra_cookies_mlb_filled.json');
}

$keys_players = json_decode($json_players,true);

$keys_filled = json_decode($json_filled,true);

if (!is_null($keys_players)){

if (array_key_exists($key,$keys_players)){
    echo $keys_players[$key];
}
else{ echo '';}

echo '&';

if (array_key_exists($key,$keys_filled)){
    echo $keys_filled[$key];
}

else{ echo '';}
}

?>