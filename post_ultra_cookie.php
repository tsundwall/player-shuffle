<?php

$key = $_POST["key"];
$val = $_POST["val"];
$type = $_POST["type"];

$filled = $val[0];
$players = $val[1];

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

$keys_players[$key] = $players;
$keys_filled[$key] = $filled;

$json_players = json_encode($keys_players);
$json_filled = json_encode($keys_filled);

if ($type == 'nfl'){
    file_put_contents('ultra_cookies_nfl_players.json',$json_players);
    file_put_contents('ultra_cookies_nfl_filled.json',$json_filled);
}
else{
    file_put_contents('ultra_cookies_mlb_players.json',$json_players);
    file_put_contents('ultra_cookies_mlb_filled.json',$json_filled);
}

?>