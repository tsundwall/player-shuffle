<?php

$path_end = $_POST["path"];

if (isset($_POST["input"])){

$idx = $_POST["idx"];
$input = $_POST["input"];

$key = [];

$input = explode(' (',$input)[0];

if ($file = fopen("key". $idx . "_mlb" . $path_end . ".txt", "r")) {
    $key = [];
    $key_full = [];
    while(!feof($file)) {
        $line = fgets($file);
        $lst = explode(";",$line);
        $name = $lst[0];
        array_push($key,$name);
        array_push($key_full,$lst);

    }
    fclose($file);
}

$path = "";
$found_idx = array_search($input,$key);
$found = in_array($input,$key);
// echo array_search($input,$key);

if ($found){
    echo $key_full[$found_idx][2] . ';';

    if ($key_full[$found_idx][3] != ""){

        // echo explode("/",$key_full[$found_idx][3])[8];
        echo $key_full[$found_idx][3];

    } else { echo 'noimage';}

} else { echo '';}

} else{
    $completed = $_POST["completed"];

    $lst = [];
    $difficulty = [];
    $ct = 0;
    if ($file = fopen("scores_mlb" . $path_end . ".txt", "r")) {
        
        while(!feof($file)) {

            $line = fgets($file);
            if (in_array($ct,$completed) == false){
        
            $item = explode(";",$line)[1];
            // $img = explode("/",explode(";",$line)[2])[8];
            $img = explode(";",$line)[2];

            array_push($lst,$ct . ";" . $item . ';' . $img);

        }
            $ct = $ct+1;
    }}

    $ret = "";

    foreach($lst as $res){
        $ret = $ret . $res . ",";
    }
    $ret = substr($ret, 0, -1);
    echo $ret;
    }

?>