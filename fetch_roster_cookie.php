<?php

$key = $_POST["key"];
$type = $_POST["type"];

if ($type == 'nfl'){
    $json_players = file_get_contents('roster_cookies_nfl_players.json');
}

else{
    $json_players = file_get_contents('roster_cookies_mlb_players.json');
}

$keys_players = json_decode($json_players,true);

if (!is_null($keys_players)){

if (array_key_exists($key,$keys_players)){
    // foreach ($keys_players as $team_key){
    //     foreach ($iter as $keys_players[$team_key]){
    //     echo $iter . ';';
    //     }
    //     echo '&';
    echo $keys_players[$key];

}
}

else{ echo '';}

?>