<?php

$teams = [];
if ($file = fopen("teams.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        array_push($teams,$line);
    }
    fclose($file);

}

$teams_mlb = [];
if ($file = fopen("teams_mlb.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        array_push($teams_mlb,$line);

    }
    fclose($file);

}

$teams_shuffle = [];
if ($file = fopen("teams_shuffle.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        array_push($teams_shuffle,$line);
    }
    fclose($file);

}

$teams_mlb_shuffle = [];
if ($file = fopen("teams_mlb_shuffle.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        array_push($teams_mlb_shuffle,$line);

    }
    fclose($file);

}

if ($file = fopen("scores.txt", "r")) {
            $difficulty = [];
            while(!feof($file)) {
                $line = fgets($file);
                $score = explode(";",$line)[0];
                $val = floatval($score);
                switch (true){
                    case $val < 10:
                        $diff = "Impossible";
                        break;
                    case $val < 20:
                        $diff = "Very Difficult";
                        break;
                    case $val < 30:
                        $diff = "Difficult";
                        break;
                    case $val < 40:
                        $diff = "Hard";
                        break;
                    case $val < 50:
                        $diff = "Medium";
                        break;
                    case $val < 80:
                        $diff = "Easy";
                        break;
                    case $val < 100:
                        $diff = "Very Easy";
                        break;
                    default:
                        $diff = "Cakewalk";
                        break;


                }
                array_push($difficulty,$diff);
            }
        }

if ($file = fopen("scores_mlb.txt", "r")) {
    $difficulty_mlb = [];
    while(!feof($file)) {
        $line = fgets($file);
        $score = explode(";",$line)[0];
        $val = floatval($score);
        switch (true){
            case $val < 10:
                $diff = "Impossible";
                break;
            case $val < 20:
                $diff = "Very Difficult";
                break;
            case $val < 30:
                $diff = "Difficult";
                break;
            case $val < 40:
                $diff = "Hard";
                break;
            case $val < 50:
                $diff = "Medium";
                break;
            case $val < 80:
                $diff = "Easy";
                break;
            case $val < 100:
                $diff = "Very Easy";
                break;
            default:
                $diff = "Cakewalk";
                break;


        }
        array_push($difficulty_mlb,$diff);
    }
}
if ($file = fopen("scores_shuffle.txt", "r")) {
    $difficulty_shuffle = [];
    while(!feof($file)) {
        $line = fgets($file);
        $score = explode(";",$line)[0];
        $val = floatval($score);
        switch (true){
            case $val < 10:
                $diff = "Impossible";
                break;
            case $val < 20:
                $diff = "Very Difficult";
                break;
            case $val < 30:
                $diff = "Difficult";
                break;
            case $val < 40:
                $diff = "Hard";
                break;
            case $val < 50:
                $diff = "Medium";
                break;
            case $val < 80:
                $diff = "Easy";
                break;
            case $val < 100:
                $diff = "Very Easy";
                break;
            default:
                $diff = "Cakewalk";
                break;


        }
        array_push($difficulty_shuffle,$diff);
    }
}
if ($file = fopen("scores_mlb_shuffle.txt", "r")) {
    $difficulty_shuffle_mlb = [];
    while(!feof($file)) {
        $line = fgets($file);
        $score = explode(";",$line)[0];
        $val = floatval($score);
        switch (true){
            case $val < 10:
                $diff = "Impossible";
                break;
            case $val < 20:
                $diff = "Very Difficult";
                break;
            case $val < 30:
                $diff = "Difficult";
                break;
            case $val < 40:
                $diff = "Hard";
                break;
            case $val < 50:
                $diff = "Medium";
                break;
            case $val < 80:
                $diff = "Easy";
                break;
            case $val < 100:
                $diff = "Very Easy";
                break;
            default:
                $diff = "Cakewalk";
                break;


        }
        array_push($difficulty_shuffle_mlb,$diff);
    }
}

$all_players = [];
if ($file = fopen("players.csv", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        $lst = explode(",",$line);
        $name = $lst[1];
        $years = $lst[2];
        $str = $name . ' (' . $years . ')';
        array_push($all_players,$str);

    }
    fclose($file);

}

$all_players_mlb = [];
if ($file = fopen("players_mlb.csv", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        $lst = explode(",",$line);
        $name = $lst[1];
        $years = $lst[2];
        $str = $name . ' (' . $years . ')';
        array_push($all_players_mlb,$str);

    }
    fclose($file);

}


?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datalist-css/dist/datalist-css.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/html-to-image@1.11.11/dist/html-to-image.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<style>
    body{
        font-family: 'Source Code Pro', monospace;
    }
    .cell,.logo{
        position: relative;
        height: 150px;
        width: 150px;
    }
    img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    .col-1{
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .cell{
        border: 1px solid #f8f8f8;
    }
    .cell:hover,.cell:active{
        background-color: #ffecb7;
    }
    img {
        height: 100%;
        max-width: 100%;
        display: block;
        margin: auto;
    }
    .guesses {
    text-align:center;
}
    .cell-click{
        background-color: #fff;
        height:100%;
        width:100%;
        border: none;
    }
    .cell-click:hover,.cell-click:active{
        background-color: #ffecb7;
    }
    .modal{
        border-radius: 20px;
    }
    .mlb-logo {
        background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Major_League_Baseball_logo.svg/1200px-Major_League_Baseball_logo.svg.png') no-repeat fixed center;
        height: 20px;
        width: 20px;
        display: block;
        /* background-size: 12px 65px; */
    }
    .btn-div {
    justify-content: center;
    position: relative;
    display: flex;
    align-items: center;
    }
    .btn-bottom{
    width: 100%;
    margin-top: 10px;
    }
    .autocomplete {

    position: relative;
    display: inline-block;
    margin-top: 4px;
    height: 50px;
    width: 100%;
    outline: none;
    border: none;
    padding: 0 20px 0 20px;
    font-size: 20px;
    overflow-y: auto;
    height:100%;
    width:100%;

    }
datalist {
  position: absolute;
  max-height: 20em;
  border: 0 none;
  overflow-x: hidden;
  overflow-y: auto;
}

datalist option {
  font-size: 0.8em;
  padding: 0.3em 1em;
  background-color: #ccc;
  cursor: pointer;
}


datalist option:hover, datalist option:focus {
  color: #fff;
  background-color: #036;
  outline: 0 none;
}

.modal-body{
    padding: 0px 0px 0px 0px !important;
}

textarea:focus, input:focus{
    outline: none;
}

#search-input, #search-input-mlb,
#search-input-shuffle, #search-input-mlb-shuffle {
    border: none;
}
/* 2532x1170 pixels at 460ppi */
@media only screen
    and (max-width: 625px) {
        .cell,.logo{
            height:100px;
            width:100px;
        }

        #ct,#ct-mlb,#ct-shuffle,#ct-mlb-shuffle,.guesses,.diff{
            font-size:10px;

        }
        .cell-click{
            padding-top:50% !important;
        }
        figcaption{
            font-size:9px;
        }
        .top-empty > div{
            height: 100px !important;
        }
        .offset-3{
            margin-left:20px !important;
        }
        .col-md-1{
            width: 148px !important;
        }
        h1 {
            padding-top: 20px;
        }
        .guesses-div {
            margin-left: 5px;
        }
        h3 {
            font-size: 15px;
        }
        .fa.fa-times{
            padding-top:0px !important;
        }
        .navbar-brand{
            font-size: 20px !important;
        }
        .shuffle-btn{
            padding-left:8px !important;
        }
    }
@media only screen
    and (max-width: 425px) {
        .cell,.logo{
            height:85px;
            width:85px;
        }

    }
button#shuffle-btn {
    top: 50%;
    position: relative;
}
.modal {
    /* color: #212121;
    position: relative; */
    backdrop-filter: blur(2px);
    background-color: rgba(0, 0, 0, 0.5);
}

.guesses{
    font-weight: bold;
}

.row.top-empty {
    height: 10%;
}

a.navbar-brand {
    padding-bottom: 0px;
}

li.nav-item {
    font-size: 20px;
}

.bot-btn-div {
    padding-left: 0px;
    padding-right: 0px;
}
</style>
<script>

var mlb_picked = ["","","","","","","","",""];
var nfl_picked = ["","","","","","","","",""];


var score_nfl = 0;
var curr_cell = 0;
var complete = [];
var score_nfl_shuffle = 0;
var curr_cell_shuffle = 0;
var complete_shuffle = [];

var score_mlb = 0;
var curr_cell_mlb = 0;
var complete_mlb = [];
var score_mlb_shuffle = 0;
var curr_cell_mlb_shuffle = 0;
var complete_mlb_shuffle = [];

function trimName(string){
    if (string.length > 15){
        tmp_lst = string.split(' ')
        tmp_lst[0] = tmp_lst[0].slice(0,1).concat('.')
        string = tmp_lst.join(' ')

    }
    return string;
}

function prefillGrid(index,name,link,score,div){ //'this' value is the attribute type passed

    let cellr = Math.floor(index / 3);
    let cellc = index % 3;
    name = name;
    path = '';
    img_src = 'https://st2.depositphotos.com/1424188/6852/i/600/depositphotos_68520495-stock-photo-man-baseball-player-silhouette-isolated.jpg'
    if (div == '#grid'){
        path = 'imgs/';
        img_src = 'https://static.vecteezy.com/system/resources/previews/007/163/494/original/american-football-player-silhouette-free-vector.jpg';
    }
    margin = '-30%';
    if (score == ''){
        margin = '-16%';
    }
    if (name != ''){
        $(div.concat(' .row')).eq(cellr+2).find('div').eq(cellc+1).find('button').remove();
        if (link == 'noimage'){
            $(div.concat(' .row')).eq(cellr+2).find('div').eq(cellc+1).append('<img src="'.concat(img_src,'" /><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption><figcaption style="background-color:black;opacity:.8;margin-top:',margin,';color:#fff">',trimName(name.split("(")[0]),'</figcaption>'));
        } else {

            $(div.concat(' .row')).eq(cellr+2).find('div').eq(cellc+1).append('<img src='.concat(path,link,' /><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption><figcaption style="background-color:black;opacity:.8;margin-top:',margin,';color:#fff">',trimName(name.split("(")[0]),'</figcaption>'));

        }
    }



}

function updateCookie(key,idx,value){
    var v = Cookies.get(key);
    console.log(v);
    v = v.split(',');
    v[idx] = value;
    Cookies.set( key, v, {expires: 9000} );
}

function resetCookies(){
    Cookies.set( 'players_nfl', ['','','','','','','','',''], {expires: 9000} );
    Cookies.set( 'players_nfl_links', ['','','','','','','','',''], {expires: 9000} );
    Cookies.set( 'players_nfl_scores', ['','','','','','','','',''], {expires: 9000} );
    Cookies.set( 'score_nfl', [0], {expires: 9000} );
    Cookies.set( 'guesses', [9], {expires: 9000} );
    Cookies.set( 'players_mlb', ['','','','','','','','',''], {expires: 9000} );
    Cookies.set( 'players_mlb_links', ['','','','','','','','',''], {expires: 9000} );
    Cookies.set( 'players_mlb_scores', ['','','','','','','','',''], {expires: 9000} );
    Cookies.set( 'score_mlb', [0], {expires: 9000} );
    Cookies.set( 'guesses_mlb', [9], {expires: 9000} );
    Cookies.set( 'grid_id', [grid_id], {expires: 9000} );
}

$.ajax({
    type: "POST",
    url: "get_id",
    data: {},
    success: function (response)
                {
                    grid_id = response;
                    if (grid_id != Cookies.get('grid_id')){
                        resetCookies();
                    }
                }
            }).done();



$(window).on('load', function() {
    var v = Cookies.get('players_nfl');
    var v_1 = Cookies.get('players_nfl_links');
    var v_2 = Cookies.get('players_nfl_scores');
    var v1 = Cookies.get('guesses');
    var v2 = Cookies.get('score_nfl');
    var v_mlb = Cookies.get('players_mlb');
    var v_1_mlb = Cookies.get('players_mlb_links');
    var v_2_mlb = Cookies.get('players_mlb_scores');
    var v1_mlb = Cookies.get('guesses_mlb');
    var v2_mlb = Cookies.get('score_mlb');

    if ( v == undefined || v_1 == undefined || v_2 == undefined) {
      Cookies.set( 'players_nfl', ['','','','','','','','',''], {expires: 9000} );
      Cookies.set( 'players_nfl_links', ['','','','','','','','',''], {expires: 9000} );
      Cookies.set( 'players_nfl_scores', ['','','','','','','','',''], {expires: 9000} );
    } else{
        v = v.split(',');
        v_1 = v_1.split(',');
        v_2 = v_2.split(',');
        for (let i = 0;i<v.length;i++){
            prefillGrid(i,v[i],v_1[i],v_2[i],'#grid');
            if (v[i] != ''){
                complete.push(i);
                nfl_picked[i] = v[i];
            }

        }


    }

    if ( v1 == undefined) {
        Cookies.set( 'guesses', [9], {expires: 9000} );
    } else {
        v1 = v1.split(',');
        $('#ct').text(v1);

    }
    if ( v2 == undefined) {
        Cookies.set( 'score_nfl', [0], {expires: 9000} );
    } else{
        score_nfl = v2
    }

    if ( v_mlb == undefined || v_1_mlb == undefined || v_2_mlb == undefined) {
      Cookies.set( 'players_mlb', ['','','','','','','','',''], {expires: 9000} );
      Cookies.set( 'players_mlb_links', ['','','','','','','','',''], {expires: 9000} );
      Cookies.set( 'players_mlb_scores', ['','','','','','','','',''], {expires: 9000} );
    } else{
        v_mlb = v_mlb.split(',');
        v_1_mlb = v_1_mlb.split(',');
        v_2_mlb = v_2_mlb.split(',');
        for (let i = 0;i<v_mlb.length;i++){
            prefillGrid(i,v_mlb[i],v_1_mlb[i],v_2_mlb[i],'#grid-mlb');
            if (v_mlb[i] != ''){
                complete_mlb.push(i);
                mlb_picked[i] = v_mlb[i];
            }
        }

    }

    if ( v1_mlb == undefined) {
        Cookies.set( 'guesses_mlb', [9], {expires: 9000} );
    } else {
        v1_mlb = v1_mlb.split(',');
        $('#ct-mlb').text(v1_mlb);

    }
    if ( v2 == undefined) {
        Cookies.set( 'score_mlb', [0], {expires: 9000} );
    } else{
        score_mlb = v2_mlb
    }
        $('#announce').modal('show');
    });


function focusAndOpenKeyboard(el, timeout) {
  if(!timeout) {
    timeout = 100;
  }
  if(el) {
    // Align temp input element approximately where the input element is
    // so the cursor doesn't jump around
    var __tempEl__ = document.createElement('input');
    __tempEl__.style.position = 'absolute';
    __tempEl__.style.top = (el.offsetTop + 7) + 'px';
    __tempEl__.style.left = el.offsetLeft + 'px';
    __tempEl__.style.height = 0;
    __tempEl__.style.opacity = 0;
    // Put this temp element as a child of the page <body> and focus on it
    document.body.appendChild(__tempEl__);
    __tempEl__.focus();

    // The keyboard is open. Now do a delayed focus on the target element
    setTimeout(function() {
      el.focus();
      el.click();
      // Remove the temp element
      document.body.removeChild(__tempEl__);
    }, timeout);
  }
}



$(document).ready(function() {

    $('.cell-nfl').click(function() {

        setTimeout(function() {
            $('input[id="search-input"]').focus();
        }, 700);

    });

    $('.cell-mlb').click(function() {

        var myElement = document.getElementById('search-input');
        var modalFadeInDuration = 700;
        focusAndOpenKeyboard(myElement, modalFadeInDuration);

    });

    $('.cell-nfl-shuffle').click(function() {

        setTimeout(function() { $('input[id="search-input-shuffle"]').click() }, 700);

    });

    $('.cell-mlb-shuffle').click(function() {

        setTimeout(function() { $('input[id="search-input-mlb-shuffle"]').click() }, 700);

    });


    $('#search-input').keyup(function() {
        const input = $(this);
        input.val().length > 2 ? input.attr({'list': 'players'}) : input.attr({'list': 'fake'});
    });

    $('#search-input-mlb').keyup(function() {
        console.log('ww');
        const input = $(this);
        input.val().length > 2 ? input.attr({'list': 'players-mlb'}) : input.attr({'list': 'fake'});
    });

    $('#search-input-shuffle').keyup(function() {
        const input = $(this);
        input.val().length > 2 ? input.attr({'list': 'players'}) : input.attr({'list': 'fake'});
    });

    $('#search-input-mlb-shuffle').keyup(function() {
        const input = $(this);
        input.val().length > 2 ? input.attr({'list': 'players-mlb'}) : input.attr({'list': 'fake'});
    });
});



function activate(idx){
    curr_cell = idx;
    cellr = Math.floor(curr_cell / 3);
    cellc = curr_cell % 3;
}

function activate_shuffle(idx){
    curr_cell_shuffle = idx;
    cellr_shuffle = Math.floor(curr_cell_shuffle / 3);
    cellc_shuffle = curr_cell_shuffle % 3;
}

$(document).ready(function() {

    if (window.location.href.includes('?shuffle')){
    $('#shuffle-tab').trigger('click');
    $('#shuffle-btn').removeClass('d-none');
    $('.alert').eq(0).removeClass('d-none');
}

$('#shuffle-tab').click(function() {
    $('#shuffle-btn').removeClass('d-none');
});
});

$(document).ready(function() {
$('#daily-tab').click(function() {
    $('#shuffle-btn').addClass('d-none');
});
});

$(document).ready(function() {
$('#shuffle-btn').click(function() {
    $('#shuffle-btn').append('<i class="fa fa-spinner fa-spin"></i>');
    $.ajax({
    type: "POST",
    url: "shuffle",
    data: {},
    success: function (response)
                {
                    let url = window.location.href;
                    if(!url.includes('?shuffle')){
                        url += '?shuffle';
                    }

                    window.location.href = url;
                } }).done();
});
});

$(document).ready(function() {
$('#switch-to-mlb').click(function() {
    $('#grid').addClass('d-none');
    $('#grid-mlb').removeClass('d-none');
});
});

$(document).ready(function() {
$('#switch-to-mlb-shuffle').click(function() {
    console.log('func');
    $('#grid-shuffle').addClass('d-none');
    $('#grid-mlb-shuffle').removeClass('d-none');
});
});

$(document).ready(function() {
$('#search-input').change(function() {
  $.ajax({
    type: "POST",
    url: "result",
    data: { idx: curr_cell,
            input: $("#search-input").val(),
            path: ''},
    success: function (response)
                {

                    lst = response.split(';');
                    score = lst[0];
                    url = lst[1];
                    if (url == ''){
                        $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).find('button').first().css('background-color', 'red');

                    }
                    else if (url == 'noimage'){
                        complete.push(curr_cell);
                        $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).find('button').remove();
                        $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).append('<img src="https://static.vecteezy.com/system/resources/previews/007/163/494/original/american-football-player-silhouette-free-vector.jpg" />'.concat('<figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',trimName($("#search-input").val().split('(')[0]),'</figcaption><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption>'));
                        score_nfl += Number(score);
                        nfl_picked[curr_cell] = $("#search-input").val();
                        updateCookie('players_nfl',curr_cell,$("#search-input").val());
                        updateCookie('players_nfl_link',curr_cell,'noimage');
                        updateCookie('players_nfl_score',curr_cell,score);
                        updateCookie('score_nfl',0,score_nfl);
                    }
                    else {
                        complete.push(curr_cell);
                        $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).find('button').remove();
                        $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).append('<img src='.concat('imgs/',url,' /><figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',trimName($("#search-input").val().split('(')[0]),'</figcaption><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption>'));
                        score_nfl += Number(score);
                        nfl_picked[curr_cell] = $("#search-input").val();
                        updateCookie('players_nfl',curr_cell,$("#search-input").val());
                        updateCookie('players_nfl_links',curr_cell,url);
                        updateCookie('players_nfl_scores',curr_cell,score);
                        updateCookie('score_nfl',0,score_nfl);
                    }

                    let val = parseInt($('#ct').text());
                    val = --val;
                    console.log('val');
                    updateCookie('guesses',0,val);
                    parseInt($('#ct').text(val));
                    if ($('#ct').text() == '0'){
                        $('#result-modal-div').append('<h5>Your Score</h5><br><h3>'.concat(score_nfl,'</h3>'));
                        $('#result-modal').modal('show');
                        node = document.getElementById('grid');
                        html2canvas(node).then(canvas => $('#result-modal').append(canvas));

                        $.ajax({
                            type: "POST",
                            url: "write_nfl",
                            data: {
                                line: nfl_picked
                            },

                        success: function(response){
                            console.log(response);
                        }}).done();

                    }
                    $('#search-input').val('');
                    $('#search-input').attr({'list':''});
                }
  }).done();
  $('#player-search').modal('hide');


});
});

$(document).ready(function() {
$('#giveup-submit').click(function() {
  if (complete.length == 0){
    alert('Get one correct before guessing playa');
  }
  else{
  $.ajax({
    type: "POST",
    url: "result",
    data: { completed: complete,
            path: ''},
    success: function (response)
                {
                    remaining = response.split(",");
                    console.log(remaining);
                    v = Cookies.get('players_nfl').split(',');
                    v1 = Cookies.get('players_nfl_links').split(',');
                    for (let i = 0; i < remaining.length; i++) {
                        group = remaining[i];
                        lst = group.split(";");
                        idx = lst[0];
                        console.log(lst[1]);
                        name = trimName(lst[1]);
                        console.log(name);
                        console.log(lst[1]);
                        img = lst[2];
                        v[idx] = lst[1];
                        v1[idx] = lst[2];
                        console.log(img);
                        cellr = Math.floor(idx / 3);
                        cellc = idx % 3;
                        $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).find('button').remove();
                        if (img == ""){
                            $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).append('<img src="https://static.vecteezy.com/system/resources/previews/007/163/494/original/american-football-player-silhouette-free-vector.jpg" /><figcaption style="background-color:black;opacity:.8;margin-top:-24px;color:#fff">'.concat(name,'</figcaption>'));
                            v1[idx] = 'noimage';
                        }
                        else{
                        $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).find('button').remove();
                        $('#grid .row').eq(cellr+2).find('div').eq(cellc+1).append('<img src='.concat('imgs/',img,' /><figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',name,'</figcaption>'));
                        }
                    }

                    Cookies.set('players_nfl',v,{expires:9000});
                    Cookies.set('players_nfl_links',v1,{expires:9000});

                    $('#ct').text(0);
                    updateCookie('guesses',0,0);
                    $('#player-search').attr("id","player-search-complete");
                    $('#giveup-submit').prop("disabled",true);

                }
  }).done();}
});

});

$(document).ready(function() {
$('#search-input-shuffle').change(function() {
  $.ajax({
    type: "POST",
    url: "result",
    data: { idx: curr_cell_shuffle,
            input: $("#search-input-shuffle").val(),
            path: '_shuffle'
        },
    success: function (response)
                {

                    lst = response.split(';');
                    score = lst[0];
                    url = lst[1];
                    if (url == ''){
                        $('#grid-shuffle .row').eq(cellr_shuffle+2).find('div').eq(cellc_shuffle+1).find('button').first().css('background-color', 'red');

                    }
                    else if (url == 'noimage'){
                        complete_shuffle.push(curr_cell_shuffle);
                        $('#grid-shuffle .row').eq(cellr_shuffle+2).find('div').eq(cellc_shuffle+1).find('button').remove();
                        $('#grid-shuffle .row').eq(cellr_shuffle+2).find('div').eq(cellc_shuffle+1).append('<img src="https://static.vecteezy.com/system/resources/previews/007/163/494/original/american-football-player-silhouette-free-vector.jpg" />'.concat('<figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',trimName($("#search-input-shuffle").val().split('(')[0]),'</figcaption><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption>'));
                        score_nfl_shuffle += Number(score);
                    }
                    else {
                        complete_shuffle.push(curr_cell_shuffle);
                        $('#grid-shuffle .row').eq(cellr_shuffle+2).find('div').eq(cellc_shuffle+1).find('button').remove();
                        $('#grid-shuffle .row').eq(cellr_shuffle+2).find('div').eq(cellc_shuffle+1).append('<img src='.concat('imgs/',url,' /><figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',trimName($("#search-input-shuffle").val().split('(')[0]),'</figcaption><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption>'));
                        score_nfl_shuffle += Number(score);
                    }

                    let val = parseInt($('#ct-shuffle').text());
                    val = --val;
                    parseInt($('#ct-shuffle').text(val));
                    if ($('#ct-shuffle').text() == '0'){
                        $('#result-modal-div').append('<h5>Your Score</h5><br><h3>'.concat(score_nfl_shuffle,'</h3>'));
                        $('#result-modal').modal('show');
                    }
                    $('#search-input-shuffle').val('');
                    $('#search-input-shuffle').attr({'list':''});
                }
  }).done();
  $('#player-search-shuffle').modal('hide');

});
});

$(document).ready(function() {
$('#giveup-submit-shuffle').click(function() {
  if (complete_shuffle.length == 0){
    alert('Get one correct before guessing playa');
  }
  else{
  $.ajax({
    type: "POST",
    url: "result",
    data: { completed: complete_shuffle,
            path: '_shuffle'},
    success: function (response)
                {
                    remaining = response.split(",");
                    for (let i = 0; i < remaining.length; i++) {
                        group = remaining[i];
                        lst = group.split(";");
                        idx = lst[0];
                        name = trimName(lst[1]);
                        img = lst[2];

                        cellr = Math.floor(idx / 3);
                        cellc = idx % 3;
                        $('#grid-shuffle .row').eq(cellr+2).find('div').eq(cellc+1).find('button').remove();
                        if (img == ""){
                            $('#grid-shuffle .row').eq(cellr+2).find('div').eq(cellc+1).append('<img src="https://static.vecteezy.com/system/resources/previews/007/163/494/original/american-football-player-silhouette-free-vector.jpg" /><figcaption style="background-color:black;opacity:.8;margin-top:-24px;color:#fff">'.concat(name,'</figcaption>'));
                        }
                        else{
                        $('#grid-shuffle .row').eq(cellr+2).find('div').eq(cellc+1).find('button').remove();
                        $('#grid-shuffle .row').eq(cellr+2).find('div').eq(cellc+1).append('<img src='.concat('imgs/',img,' /><figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',name,'</figcaption>'));
                        }
                    }

                    $('#ct-shuffle').text(0);
                    $('#player-search-shuffle').attr("id","player-search-complete");
                    $('#giveup-submit-shuffle').prop("disabled",true);
                }
  }).done();}
});

});


function activate_mlb(idx){
    console.log(idx);
    curr_cell_mlb = idx;
    cellr_mlb = Math.floor(curr_cell_mlb / 3);
    cellc_mlb = curr_cell_mlb % 3;
}

function activate_mlb_shuffle(idx){
    console.log(idx);
    curr_cell_mlb_shuffle = idx;
    cellr_mlb_shuffle = Math.floor(curr_cell_mlb_shuffle / 3);
    console.log(cellr_mlb_shuffle);
    cellc_mlb_shuffle = curr_cell_mlb_shuffle % 3;
}

$(document).ready(function() {
$('#switch-to-nfl').click(function() {
    $('#grid').removeClass('d-none');
    $('#grid-mlb').addClass('d-none');
});
});

$(document).ready(function() {
$('#switch-to-nfl-shuffle').click(function() {
    $('#grid-shuffle').removeClass('d-none');
    $('#grid-mlb-shuffle').addClass('d-none');
});
});

$(document).ready(function() {
$('#search-input-mlb').change(function() {
    console.log(curr_cell_mlb);
  $.ajax({
    type: "POST",
    url: "result_mlb",
    data: { idx: curr_cell_mlb,
            input: $("#search-input-mlb").val(),
            path: ''
    },
    success: function (response)
                {

                    if (response == ''){
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).find('button').first().css('background-color', 'red');
                    }
                    else{
                    lst = response.split(';');
                    score_temp = lst[0];
                    url = lst[1];
                    console.log(url);
                    if (url == 'noimage'){

                        complete_mlb.push(curr_cell_mlb);
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).find('button').remove();
                        // $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).css('background-color', 'green');
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).append('<img src="https://st2.depositphotos.com/1424188/6852/i/600/depositphotos_68520495-stock-photo-man-baseball-player-silhouette-isolated.jpg" />'.concat('<figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',trimName($("#search-input-mlb").val().split("(")[0]),'</figcaption><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption>'));
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).val('');
                        score_mlb += Number(score_temp);
                        mlb_picked[curr_cell_mlb] = $("#search-input-mlb").val()

                        updateCookie('players_mlb',curr_cell_mlb,$("#search-input-mlb").val());
                        updateCookie('players_mlb_links',curr_cell_mlb,'noimage');
                        updateCookie('players_mlb_scores',curr_cell_mlb,score_temp);
                        updateCookie('score_mlb',0,score_mlb);
                    }
                    else {
                        complete_mlb.push(curr_cell_mlb);
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).find('button').remove();
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).append('<img src='.concat(url,' /><figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff;">',trimName($("#search-input-mlb").val().split("(")[0]),'</figcaption><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption>'));
                        score_mlb += Number(score_temp);
                        mlb_picked[curr_cell_mlb] = $("#search-input-mlb").val()

                        updateCookie('players_mlb',curr_cell_mlb,$("#search-input-mlb").val());
                        updateCookie('players_mlb_links',curr_cell_mlb,url);
                        updateCookie('players_mlb_scores',curr_cell_mlb,score_temp);
                        updateCookie('score_mlb',0,score_mlb);
                    }

                }

                let val = parseInt($('#ct-mlb').text());
                    val = --val;
                    updateCookie('guesses_mlb',0,val);
                    parseInt($('#ct-mlb').text(val));
                    if ($('#ct-mlb').text() == '0'){
                        $('#result-modal-div').append('<h5>Your Score</h5><br><h3>'.concat(score_mlb,'</h3>'));
                        html2canvas(document.querySelector("#grid-mlb row")).then(canvas => {
                            $('#result-modal-div').eq(0).append(canvas)
                        });
                        $('#result-modal').modal('show');

                        $.ajax({
                            type: "POST",
                            url: "write_mlb",
                            data: {
                                line: mlb_picked
                            },

                        success: function(response){
                            console.log(response);
                        }}).done();
                    }
                    $('#search-input-mlb').val('');
                    $('#search-input-mlb').attr({'list':''});
                }
  }).done();
  $('#player-search-mlb').modal('hide');

});
});

$(document).ready(function() {
$('#search-input-mlb-shuffle').change(function() {
    console.log(curr_cell_mlb_shuffle);
  $.ajax({
    type: "POST",
    url: "result_mlb",
    data: { idx: curr_cell_mlb_shuffle,
            input: $("#search-input-mlb-shuffle").val(),
            path: '_shuffle'
        },
    success: function (response)
                {

                    if (response == ''){
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb_shuffle+2).find('div').eq(cellc_mlb_shuffle+1).find('button').first().css('background-color', 'red');
                    }
                    else{
                    lst = response.split(';');
                    score = lst[0];
                    url = lst[1];

                    if (url == 'noimage'){
                        console.log($("#search-input-mlb-shuffle").val());
                        complete_mlb_shuffle.push(curr_cell_mlb_shuffle);
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb_shuffle+2).find('div').eq(cellc_mlb_shuffle+1).find('button').remove();
                        // $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).css('background-color', 'green');
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb_shuffle+2).find('div').eq(cellc_mlb_shuffle+1).append('<img src="https://st2.depositphotos.com/1424188/6852/i/600/depositphotos_68520495-stock-photo-man-baseball-player-silhouette-isolated.jpg" />'.concat('<figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',trimName($("#search-input-mlb-shuffle").val().split("(")[0]),'</figcaption><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption>'));
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb_shuffle+2).find('div').eq(cellc_mlb_shuffle+1).val('');
                        score_mlb_shuffle += Number(score);
                    }
                    else {
                        complete_mlb_shuffle.push(curr_cell_mlb_shuffle);
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb_shuffle+2).find('div').eq(cellc_mlb_shuffle+1).find('button').remove();
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb_shuffle+2).find('div').eq(cellc_mlb_shuffle+1).append('<img src='.concat(url,' /><figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff;">',trimName($("#search-input-mlb-shuffle").val().split("(")[0]),'</figcaption><figcaption style="color:#fff;background-color:black;bottom: 100%;z-index:1000;position: relative;opacity: .8;width: 20%;">',score,'</figcaption>'));
                        score_mlb_shuffle += Number(score);
                    }

                }

                let val = parseInt($('#ct-mlb-shuffle').text());
                    val = --val;
                    parseInt($('#ct-mlb-shuffle').text(val));
                    if ($('#ct-mlb-shuffle').text() == '0'){
                        $('#result-modal-div').append('<h5>Your Score</h5><br><h3>'.concat(score_mlb_shuffle,'</h3>'));
                        $('#result-modal').modal('show');
                    }
                    $('#search-input-mlb-shuffle').val('');
                    $('#search-input-mlb-shuffle').attr({'list':''});
                }

  }).done();
  $('#player-search-mlb-shuffle').modal('hide');

});
});

$(document).ready(function() {
$('#giveup-submit-mlb').click(function() {

  if (complete_mlb.length == 0){
    alert('Get one correct before guessing playa');
  }

  else{
  $.ajax({
    type: "POST",
    url: "result_mlb",
    data: { completed: complete_mlb,
            path: ''},
    success: function (response)
                {   v = Cookies.get('players_mlb').split(',');
                    v1 = Cookies.get('players_mlb_links').split(',');
                    remaining = response.split(",");
                    for (let i = 0; i < remaining.length; i++) {
                        group = remaining[i];
                        lst = group.split(";");
                        idx = lst[0];
                        name = trimName(lst[1]);
                        img = lst[2];
                        v[idx] = lst[1];
                        v1[idx] = lst[2];
                        console.log(img);
                        cellr_mlb = Math.floor(idx / 3);
                        cellc_mlb = idx % 3;
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).find('button').remove();
                        if (img == ""){
                            $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).append('<img src="https://st2.depositphotos.com/1424188/6852/i/600/depositphotos_68520495-stock-photo-man-baseball-player-silhouette-isolated.jpg" /><figcaption style="background-color:black;opacity:.8;margin-top:-24px;color:#fff">'.concat(name,'</figcaption>'));
                            v1[idx] = 'noimage';
                        }
                        else{
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).find('button').remove();
                        $('#grid-mlb .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).append('<img src='.concat(img,' /><figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',name,'</figcaption>'));
                        }
                    }
                    Cookies.set('players_mlb',v,{expires:9000});
                    Cookies.set('players_mlb_links',v1,{expires:9000});

                    $('#ct-mlb').text(0);
                    updateCookie('guesses_mlb',0,0);
                    $('#player-search-mlb').attr("id","player-search-complete");
                    $('#giveup-submit-mlb').prop("disabled",true);
                }
  }).done();}
});

});

$(document).ready(function() {
$('#giveup-submit-mlb-shuffle').click(function() {
  if (complete_mlb_shuffle.length == 0){
    alert('Get one correct before guessing playa');
  }
  else{
  $.ajax({
    type: "POST",
    url: "result_mlb",
    data: { completed: complete_mlb_shuffle,
            path: '_shuffle'},
    success: function (response)
                {
                    remaining = response.split(",");
                    for (let i = 0; i < remaining.length; i++) {
                        group = remaining[i];
                        lst = group.split(";");
                        idx = lst[0];
                        name = trimName(lst[1]);
                        img = lst[2];
                        console.log(img);
                        cellr_mlb = Math.floor(idx / 3);
                        cellc_mlb = idx % 3;
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).find('button').remove();
                        if (img == ""){
                            $('#grid-mlb-shuffle .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).append('<img src="https://st2.depositphotos.com/1424188/6852/i/600/depositphotos_68520495-stock-photo-man-baseball-player-silhouette-isolated.jpg" /><figcaption style="background-color:black;opacity:.8;margin-top:-24px;color:#fff">'.concat(name,'</figcaption>'));
                        }
                        else{
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).find('button').remove();
                        $('#grid-mlb-shuffle .row').eq(cellr_mlb+2).find('div').eq(cellc_mlb+1).append('<img src='.concat(img,' /><figcaption style="background-color:black;opacity:.8;margin-top:-16%;color:#fff">',name,'</figcaption>'));
                        }
                    }

                    $('#ct-mlb-shuffle').text(0);
                    $('#player-search-mlb-shuffle').attr("id","player-search-complete");
                    $('#giveup-submit-mlb-shuffle').prop("disabled",true);
                }
  }).done();}
});

});

</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Shuffle</title>
</head>
<body>
<div id="result-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div id='result-modal-div' class="modal-body row">
            </div>
        </div>
    </div>
    </div>
    <nav class="navbar navbar-expand navbar-light bg-light" style='padding-bottom:0px';>
    <a class="navbar-brand" href="#"style="padding-left: 20px;font-size:40px;">Player <i class='fa fa-times' style = 'font-size:40px;'></i> Shuffle</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav nav-tabs" role="tablist" style='padding-top:15px;'>
        <li class="nav-item active">
            <button type='button' id='daily-tab' class="nav-link active" data-bs-toggle="tab" data-bs-target="#daily" aria-selected="true" role='tab'>daily</a>
        </li>
        <li class="nav-item">
            <button type='button' id='shuffle-tab' class="nav-link" data-bs-toggle="tab" data-bs-target="#shuffle" aria-selected="false" role='tab'>shuffle</a>
        </li>
        <li class="nav-item d-none d-md-block">
            <button type='button' id='nfl-ultra-tab' class="nav-link"  onclick='window.open("ultra_grid_nfl","_blank")' aria-selected="false" role='tab'>Ultra NFL Grid</a>
        </li>
        <li class="nav-item d-none d-md-block">
            <button type='button' id='mlb-ultra-tab' class="nav-link" onclick='window.open("ultra_grid_mlb","_blank")' aria-selected="false" role='tab'>Ultra MLB Grid</a>
        </li>
        <li class="nav-item d-none d-md-block">
            <button type='button' id='mlb-ultra-tab' class="nav-link" onclick='window.open("roster_build_nfl","_blank")' aria-selected="false" role='tab'>NFL Current Players</a>
        </li>
        <li class="nav-item d-none d-md-block">
            <button type='button' id='mlb-ultra-tab' class="nav-link" onclick='window.open("roster_build_mlb","_blank")' aria-selected="false" role='tab'>MLB Current Players</a>
        </li>
        </ul>
    </div>
    </nav>
    <div class="alert alert-success alert-dismissible show fade d-none" role="alert">
        The NFL and MLB grids on the shuffle tab have been reset!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </div>
    <div class='row top-empty' style='margin-bottom:15px;'>
        <div class="offset-3 logo"></div>
        <div class="logo"></div>
        <div class="logo bot-btn-div">
        <button id='shuffle-btn' class='btn btn-danger d-none' style='width:100%'>Shuffle</button>
        </div>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="daily" role="tabpanel" aria-labelledby="daily-tab">
            <div id="grid" class='grid'>
                <div id="player-search" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body row">
                            <div class="autocomplete col" style="width:300px;">
                                <input list='' id="search-input" type="text" autocomplete='off'  name="search-input" placeholder="Find Player..." style = "width:100%;height:50px;">
                                <datalist id="players">
                                <?php
                                foreach($all_players as $player){
                                    echo '<option value="'. $player . '">' . $player . '</option>';
                                }

                                ?>
                                </datalist>
                            </div>


                            <!-- <input id="search-submit" class = "btn btn-success col-2" type="Submit"> -->
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="offset-3 col-1 logo" style="text-align:center;">
                    <i class='fa fa-times' style="padding-top:20%;font-size:80px;"></i>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos/" . $teams[0]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos/" . $teams[1]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos/" . $teams[2]. ".png"; ?>'/>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos/" . $teams[3]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell active">
                    <button onclick="activate(0)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><?php echo $difficulty[0];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate(1)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><?php echo $difficulty[1];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate(2)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><?php echo $difficulty[2];?></span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos/" . $teams[4]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell">
                    <button onclick="activate(3)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><?php echo $difficulty[3];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate(4)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><?php echo $difficulty[4];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate(5)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><span class='diff'><?php echo $difficulty[5];?></span></button>
                    </div>
                    <div class="col-1 guesses-div">
                        <div class="">
                            <h1 id='ct' class="guesses">9</h1>
                        </div>
                        <div class="">
                            <h4 class="guesses">Guesses Remain</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo" style='text-align:center'>
                        <?php

                        echo (strlen($teams[5]) < 6) ? '<img src=logos/' . trim($teams[5]) . '.png />' : '<h3 style= padding-top:20px;padding-left:20px;>' . $teams[5] . '</h3>'; ?>
                    </div>
                    <div class="col-1 cell">
                    <button onclick="activate(6)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><?php echo $difficulty[6];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate(7)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><?php echo $difficulty[7];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate(8)" data-bs-toggle="modal" data-bs-target="#player-search" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl cell-click"><span class='diff'><?php echo $difficulty[8];?></span></button>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="offset-3 logo"></div>
                    <div class="logo"></div>
                    <div class="logo bot-btn-div">
                    <button class="btn btn-primary btn-bottom" type="button" id="giveup-submit" value="">Give Up</button>
                    <button class="btn btn-primary btn-bottom" type="button" id="switch-to-mlb" value="">Switch to <img style = 'height:18px;width:32px;' src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Major_League_Baseball_logo.svg/1200px-Major_League_Baseball_logo.svg.png' /></button>
                </div>
                </div>
            </div>


            <div id="grid-mlb" class='d-none grid'>
                <div id="player-search-mlb" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body row">
                            <div class="autocomplete col" style="width:300px;">
                                <input list="" id="search-input-mlb" type="text"  autocomplete='off' name="search-input" placeholder="Find Player..."  style="width:100%;height:50px;">
                                <datalist id="players-mlb">
                                <?php
                                foreach($all_players_mlb as $player){
                                    echo '<option value="'. $player . '">' . $player . '</option>';
                                }

                                ?>
                                </datalist>
                            </div>
                            <!-- <input id="search-submit-mlb" class = "btn btn-success col-2" type="Submit"> -->
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="offset-3 col-1 logo" style='text-align:center;'>
                    <i class='fa fa-times' style="padding-top:20%;font-size:80px;"></i>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb[0]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb[1]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb[2]. ".png"; ?>'/>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb[3]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell active">
                    <button onclick="activate_mlb(0)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[0];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb(1)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[1];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb(2)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[2];?></span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb[4]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell">
                    <button onclick="activate_mlb(3)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[3];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb(4)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[4];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb(5)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[5];?></span></button>
                    </div>
                    <div class="col-1 guesses-div">
                        <div class="">
                            <h1 id='ct-mlb' class="guesses">9</h1>
                        </div>
                        <div class="">
                            <h4 class="guesses">Guesses Remain</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo" style='text-align:center'>
                        <?php echo (strlen($teams_mlb[5]) < 6) ? '<img src=logos_mlb/' . trim($teams_mlb[5]) . '.png />' : '<h3 style= padding-top:20px;padding-left:20px;>' . $teams_mlb[5] . '</h3>'; ?>
                    </div>
                    <div class="col-1 cell">
                    <button onclick="activate_mlb(6)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[6];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb(7)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[7];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb(8)" data-bs-toggle="modal" data-bs-target="#player-search-mlb" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb cell-click"><span class='diff'><?php echo $difficulty_mlb[8];?></span></button>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="offset-3 logo"></div>
                    <div class="logo"></div>
                    <div class="logo bot-btn-div">
                    <button class="btn btn-primary btn-bottom" type="button" id="giveup-submit-mlb" value="">Give Up</button>
                    <button class="btn btn-primary btn-bottom" type="button" id="switch-to-nfl" value="">Switch to <img style = 'height:29px;width:21px;' src='https://cdn.cookielaw.org/logos/46acd508-0e8d-40cd-af22-1a8bdfa6da60/e9c29623-f807-422e-9944-964ce7fff1e0/a67792a1-43d4-44d0-8d5e-99ce69b835d9/National_Football_League_logo.svg.png' /></button>
                </div>
                </div>
            </div>

        </div>


        <div class="tab-pane fade" id="shuffle" role="tabpanel" aria-labelledby="shuffle-tab">
            <div id="grid-shuffle" class='grid-shuffle'>
                <div id="player-search-shuffle" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body row">
                            <div class="autocomplete col" style="width:300px;">
                                <input list='' id="search-input-shuffle" type="text"  autocomplete='off' name="search-input" placeholder="Find Player..." style = "width:100%;height:50px;">
                                <datalist id="players">
                                <?php
                                foreach($all_players as $player){
                                    echo '<option value="'. $player . '">' . $player . '</option>';
                                }

                                ?>
                                </datalist>
                            </div>


                            <!-- <input id="search-submit" class = "btn btn-success col-2" type="Submit"> -->
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="offset-3 col-1 logo" style='text-align:center;'>
                        <i class='fa fa-times' style="padding-top:20%;font-size:80px;"></i>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos/" . $teams_shuffle[0]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos/" . $teams_shuffle[1]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos/" . $teams_shuffle[2]. ".png"; ?>'/>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos/" . $teams_shuffle[3]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell active">
                    <button onclick="activate_shuffle(0)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle[0];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_shuffle(1)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle[1];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_shuffle(2)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle[2];?></span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos/" . $teams_shuffle[4]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell">
                    <button onclick="activate_shuffle(3)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle[3];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_shuffle(4)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle[4];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_shuffle(5)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><span class='diff'><?php echo $difficulty_shuffle[5];?></span></button>
                    </div>
                    <div class="col-1 guesses-div">
                        <div class="">
                            <h1 id='ct-shuffle' class="guesses">9</h1>
                        </div>
                        <div class="">
                            <h4 class="guesses">Guesses Remain</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos/" . $teams_shuffle[5]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell">
                    <button onclick="activate_shuffle(6)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle[6];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_shuffle(7)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle[7];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_shuffle(8)" data-bs-toggle="modal" data-bs-target="#player-search-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-nfl-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle[8];?></span></button>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="offset-3 logo"></div>
                    <div class="logo"></div>
                    <div class="logo bot-btn-div">
                    <button class="btn btn-primary btn-bottom" type="button" id="giveup-submit-shuffle" value="">Give Up</button>
                    <button class="btn btn-primary btn-bottom" type="button" id="switch-to-mlb-shuffle" value="">Switch to <img style = 'height:18px;width:32px;' src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Major_League_Baseball_logo.svg/1200px-Major_League_Baseball_logo.svg.png' /></button>
                </div>
                </div>
            </div>




            <div id="grid-mlb-shuffle" class='d-none grid-shuffle'>
                <div id="player-search-mlb-shuffle" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body row">
                            <div class="autocomplete col" style="width:300px;">
                                <input list="" id="search-input-mlb-shuffle" type="text"  autocomplete='off' name="search-input-mlb-shuffle" placeholder="Find Player..."  style="width:100%;height:50px">
                                <datalist id="players-mlb">
                                <?php
                                foreach($all_players_mlb as $player){
                                    echo '<option value="'. $player . '">' . $player . '</option>';
                                }

                                ?>
                                </datalist>
                            </div>
                            <!-- <input id="search-submit-mlb" class = "btn btn-success col-2" type="Submit"> -->
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="offset-3 col-1 logo" style='text-align:center;'>
                        <i class='fa fa-times' style="padding-top:20%;font-size:80px;"></i>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb_shuffle[0]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb_shuffle[1]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb_shuffle[2]. ".png"; ?>'/>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb_shuffle[3]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell active">
                    <button onclick="activate_mlb_shuffle(0)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[0];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb_shuffle(1)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[1];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb_shuffle(2)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[2];?></span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb_shuffle[4]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell">
                    <button onclick="activate_mlb_shuffle(3)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[3];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb_shuffle(4)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[4];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb_shuffle(5)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[5];?></span></button>
                    </div>
                    <div class="col-1 guesses-div">
                        <div class="">
                            <h1 id='ct-mlb-shuffle' class="guesses">9</h1>
                        </div>
                        <div class="">
                            <h4 class="guesses">Guesses Remain</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col-1 logo">
                        <img src='<?php echo "logos_mlb/" . $teams_mlb_shuffle[5]. ".png"; ?>'/>
                    </div>
                    <div class="col-1 cell">
                    <button onclick="activate_mlb_shuffle(6)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[6];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb_shuffle(7)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[7];?></span></button>
                    </div>

                    <div class="col-1 cell">
                    <button onclick="activate_mlb_shuffle(8)" data-bs-toggle="modal" data-bs-target="#player-search-mlb-shuffle" style="cursor: pointer; padding-top:80%" type="button" class="btn cell-mlb-shuffle cell-click"><span class='diff'><?php echo $difficulty_shuffle_mlb[8];?></span></button>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="offset-3 logo"></div>
                    <div class="logo"></div>
                    <div class="logo bot-btn-div">
                    <button class="btn btn-primary btn-bottom" type="button" id="giveup-submit-mlb-shuffle" value="">Give Up</button>
                    <button class="btn btn-primary btn-bottom" type="button" id="switch-to-nfl-shuffle" value="">Switch to <img style = 'height:29px;width:21px;' src='https://cdn.cookielaw.org/logos/46acd508-0e8d-40cd-af22-1a8bdfa6da60/e9c29623-f807-422e-9944-964ce7fff1e0/a67792a1-43d4-44d0-8d5e-99ce69b835d9/National_Football_League_logo.svg.png' /></button>
                </div>

            </div>
        </div>
    </div>

</body>
</html>