<?php

$input = $_POST['name'];
$type = $_POST['type'];
$cookie = $_POST['cookie'];

if ($type == 'nfl'){

}




if ($type == 'nfl'){
    $teams = ['ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GNB', 'HOU', 'IND', 'JAX', 'KAN', 'LAC', 'LAR', 'LVR', 'MIA', 'MIN', 'NOR', 'NWE', 'NYG', 'NYJ', 'PHI', 'PIT', 'SEA', 'SFO', 'TAM', 'TEN', 'WAS'];
    $data = file_get_contents('sampleCollege.json');
    $data_already = file_get_contents('roster_cookies_nfl_players.json');
    $this_year = '-2022';

}
else {
    $teams = ['ARI','ATL','BAL','BOS','CHC','CHW','CIN','CLE','COL','DET','HOU','KCR','LAA','LAD','MIA','MIL','MIN','NYM','NYY','OAK','PHI','PIT','SDP','SFG','SEA','STL','TBR','TEX','TOR','WSN'];
    $data = file_get_contents('mlb_all_stripped.json');
    $data_already = file_get_contents('roster_cookies_mlb_players.json');
    $this_year = '2023';
}

$keys = json_decode($data,true);
$keys_already = json_decode($data_already,true);

$ct = 0;
foreach ($teams as $team){
    $players = $keys[$team];
    foreach($players as $player){
        if ($player[0]==$input && strpos($player[1],$this_year)){
            if (!is_null($keys_already)){
                if(strpos($keys_already[$cookie],$input)){
                    echo 'already';
                    goto exit_inner;
                }
            }
            echo $ct . ',';
            break;
        }
    }
    $ct++;
}

exit_inner:

?>