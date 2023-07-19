<?php

$key = $_POST["key"];
$players = $_POST["val"];
$type = $_POST["type"];


if ($type == 'nfl'){
    $json_players = file_get_contents('roster_cookies_nfl_players.json');
}

else{
    $json_players = file_get_contents('roster_cookies_mlb_players.json');
}

$keys_players = json_decode($json_players,true);

$keys_players[$key] = $players;

$json_players = json_encode($keys_players);

if ($type == 'nfl'){
    file_put_contents('roster_cookies_nfl_players.json',$json_players);
}
else{
    file_put_contents('roster_cookies_mlb_players.json',$json_players);
}

?>