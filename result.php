<?php

$path_end = $_POST["path"];

if (isset($_POST["input"])){

$idx = $_POST["idx"];
$input = $_POST["input"];

$key = [];


$input = explode(' (',$input)[0];

if ($file = fopen("key". $idx . $path_end . ".txt", "r")) {
    $key = [];
    $key_score=[];
    while(!feof($file)) {
        $line = fgets($file);
        $lst = explode(";",$line);
        array_push($key,$lst[0]);
        array_push($key_score,$lst[2]);
        
    }
    fclose($file);
}

$path = "";

if (in_array($input,$key)){
    if (($open = fopen("players.csv", "r")) !== false) {
        while (($data = fgetcsv($open, 1000, ",")) !== false) {
            if ($data[1] == $input){
                $path = $data[5];
                break;
            }
        }
     
        fclose($open);
    }

    echo $key_score[array_search($input,$key)] . ';';
    
    if ($path == ""){
        echo "noimage";
    } else{ echo $path; }



} else { echo ";";}

} else{
    $completed = $_POST["completed"];

    $lst = [];
    $difficulty = [];
    $ct = 0;
    if ($file = fopen("scores" . $path_end . ".txt", "r")) {
        
        while(!feof($file)) {

            $line = fgets($file);
            if (in_array($ct,$completed) == false){
        
            $item = explode(";",$line)[1];

            array_push($lst,$ct . ";" . $item);

        }
            $ct = $ct+1;
    }}

    $final_lst = [];
    foreach($lst as $result){

        $name = explode(";",$result)[1];
        if (($open = fopen("players.csv", "r")) !== false) {
            while (($data = fgetcsv($open, 1000, ",")) !== false) {
                
                if ($data[1] == $name){

                    $path = $data[5];
                    $result = $result . ";" . $path;
                    array_push($final_lst,$result);
                    break;
                }
            }
         
            fclose($open);
        }
    }

    $ret = "";

    foreach($final_lst as $res){
        $ret = $ret . $res . ",";
    }
    $ret = substr($ret, 0, -1);
    echo $ret;
    }

?>