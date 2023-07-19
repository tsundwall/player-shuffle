<?php
$all_players = [];
if ($file = fopen("players.csv", "r")) {
    while (!feof($file)) {
        $line = fgets($file);
        $lst = explode(",", $line);
        $name = $lst[1];
        $years = $lst[2];
        $str = $name . ' (' . $years . ')';
        array_push($all_players, $str);
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .cell {
        border: 1px solid #f8f8f8;
    }

    .cell-btn {
        border: 0px !important;
    }

    button:hover,
    button:active {
        background-color: #ffecb7 !important;
    }

    .col-1-33 {
        width: 2% !important;
        padding: 0px 0px 0px 0px !important;
    }

    button {
        width: 100%;
        height: 100%;
    }

    .logo {
        width: 100%;
    }

    .spacing-left {
        margin-left: 5%;
    }

    .logo-row {

        position: -webkit-sticky;
        position: sticky;
        top: 0;
        background-color: #fff;
    }

    .spacing-top {
        margin-top: 5%;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        background-color: #fff;
    }

    .logo-row-div {
        border-left: 0px !important;
    }

    .logo-col-div {
        border-top: 0px !important;
    }

    .empty {
        border-top: 0px !important;
        border-left: 0px !important;
    }

    .btn-grey {
        background-color: #d9dedc;
        border-radius: 0px;
    }

    .tooltip {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
        opacity: 0.75;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        position: absolute;
        z-index: 1;
        top: -15px;
        right: 105%;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }

    .cell:hover .tooltiptext {
        visibility: visible;
    }

    #status {
        font-size: 20px;
        font-weight: bold;
        padding-bottom: 20px;
    }
</style>

<script>
    var players = '';
    var filled = '';
    var total = 0;

    if (Cookies.get('id_nfl') == undefined) {

        Cookies.set('id_nfl', Math.floor(Math.random() * 1000000), {
            expires: 9000
        });
    }

    function resetCookie() {
        Cookies.set('id_nfl', Math.floor(Math.random() * 1000000), {
            expires: 9000
        });
        Cookies.set('filled', [''], {
            expires: 9000
        });
        Cookies.set('players', [''], {
            expires: 9000
        });
    }

    function prefillGrid(index) {
        index = index.split(',')
        r = parseInt(index[0]);
        c = parseInt(index[1]);
        $('#grid .row').eq(r + 3).children('div').eq(c + 2).css('background-color', '#5cb85c');
        $('#grid .row').eq(r + 3).children('div').eq(c + 2).find('button').remove();

    }

    function prefillTooltips(item) {

        item = item.split('/');
        pos = item[0]
        name = item[1]
        r = parseInt(pos.split(',')[0]);
        c = parseInt(pos.split(',')[1]);
        $('#grid .row').eq(r + 3).children('div').eq(c + 2).append('<div class="tooltip"><span class="tooltiptext">'.concat(name, '</span></div>'));


    }


    $(window).on('load', function() {

        $.ajax({
            type: "POST",
            url: "fetch_ultra_cookie",
            data: {
                key: Cookies.get('id_nfl'),
                type: 'nfl'
            },
            success: function(response) {
                if (response) {

                    response = response.split('&');
                    filled_l = response[1].split(';');
                    filled_l.forEach(prefillGrid);
                    filled_players_l = response[0].split(';');
                    filled_players_l.forEach(prefillTooltips);
                    filled = response[1];
                    players = response[0];
                    total = players.split(';').length - 1;
                    $('#status').text(total.toString().concat(' / 480 Correct'));
                }


            }
        });
    });



    var curr_r = 1000;
    var curr_c = 1000;

    function highlight(r, c) {

        $('.logo-row-div').eq(r).css('background-color', '#9edb81');
        $('.logo-col-div').eq(c).css('background-color', '#9edb81');
    }

    function unhighlight(r, c) {

        $('.logo-row-div').eq(r).removeAttr('style');
        $('.logo-col-div').eq(c).removeAttr('style');
    }

    function validate(r, c) {

        curr_r = parseInt(r);
        curr_c = parseInt(c);

    }

    $(document).ready(function() {
        $('#search-input').change(function() {
            $.ajax({
                type: "POST",
                url: "ultra_grid_response",
                data: {
                    idx: curr_r.toString().concat(',', curr_c.toString()),
                    name: $('#search-input').val().split(' (')[0],
                    type: 'nfl'
                },
                success: function(response) {
                    if (response) {
                        $('#grid .row').eq(curr_r + 3).children('div').eq(curr_c + 2).css('background-color', '#5cb85c');
                        $('#grid .row').eq(curr_r + 3).children('div').eq(curr_c + 2).find('button').remove();
                        // var v = Cookies.get('filled');
                        filled = filled.concat(';', [curr_r, curr_c].join(','));

                        // var v1 = Cookies.get('players');
                        players = players.concat(';', [curr_r, curr_c].join(','), '/', $('#search-input').val().split(' (')[0]);

                        prefillTooltips(''.concat([curr_r, curr_c].join(','), '/', $('#search-input').val().split(' (')[0]));
                        total = players.split(';').length - 1;
                        $('#status').text(total.toString().concat(' / 420 Correct'));

                        $.ajax({
                            type: "POST",
                            url: "post_ultra_cookie",
                            data: {
                                key: Cookies.get('id_nfl'),
                                val: [filled, players],
                                type: 'nfl'
                            },
                            success: function(response) {}
                        });
                        $('#player-search').modal('hide');
                        var dList = document.querySelector('#'.concat($('#search-input').val().replace(/[^A-Za-z0-9\-]/g, "")));
                        dList.remove(0);

                    } else {
                        $('#grid .row').eq(curr_r + 3).children('div').eq(curr_c + 2).find('button').first().css('background-color', 'red');
                    }
                    $('#player-search').modal('hide');
                    $('#search-input').val('');

                }
            }).done();



        });
    });
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra NFL Grid</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-light" style='padding-bottom:0px' ;>
        <a class="navbar-brand" href="#" style="padding-left: 20px;font-size:40px;">Player <i class='fa fa-times' style='font-size:40px;'></i> Shuffle</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs" role="tablist" style='padding-top:15px;'>
                <li class="nav-item">
                    <button type='button' id='daily-tab' class="active nav-link" onclick='window.open("/","_blank")' aria-selected="true" role='tab'>Daily Grid</a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <button type='button' id='nfl-ultra-tab' class="active nav-link" onclick='window.open("ultra_grid_mlb","_blank")' aria-selected="false" role='tab'>Ultra MLB Grid</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id='grid'>

        <div id="player-search" class="modal fade" tabindex="-1">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body row">
                        <div class="autocomplete col" style="width:300px;">
                            <input list='players' id="search-input" type="text" autocomplete='off' name="search-input" placeholder="Find Player..." style="width:100%;height:50px;">
                            <datalist id="players">
                                <?php
                                $json_players = file_get_contents('ultra_cookies_nfl_players.json');
                                $keys_players = json_decode($json_players, true);
                                foreach ($all_players as $player) {

                                    if (strpos($keys_players[$_COOKIE['id_nfl']], explode(' (', $player)[0]) == false) {
                                        $player_collapse = preg_replace('/[^A-Za-z0-9\-]/', '', $player);
                                        echo '<option id =' . $player_collapse . ' value="' . $player . '">' . $player . '</option>';
                                    }
                                }
                                ?>
                            </datalist>
                        </div>


                        <!-- <input id="search-submit" class = "btn btn-success col-2" type="Submit"> -->
                    </div>
                </div>
            </div>
        </div>

        <?php




        $teams = ['ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GNB', 'HOU', 'IND', 'JAX', 'KAN', 'LAC', 'LAR', 'LVR', 'MIA', 'MIN', 'NOR', 'NWE', 'NYG', 'NYJ', 'PHI', 'PIT', 'SEA', 'SFO', 'TAM', 'TEN', 'WAS'];


        echo '<div class="row spacing-top"><span class="offset-4 col-4" id="status">/480 Correct</span></div>';
        echo '<div class="row logo-row">';
        echo '<div class="spacing-left col-1-33"></div>';
        echo '<div class="cell col-1-33 empty"></div>';

        foreach ($teams as $team) {
            echo '<div class="cell col-1-33 logo-col-div">';
            echo '<img class="logo" src=logos/' . $team . '.png' . ' />';
            echo '</div>';
        }
        echo '</div>';

        $ct_r = 0;
        foreach ($teams as $team_r) {
            echo '<div class="row">';
            echo '<div class="spacing-left col-1-33"></div>';
            echo '<div class="cell col-1-33 logo-row-div">';
            echo '<img class="logo" src=logos/' . $team_r . '.png' . ' />';
            echo '</div>';
            $ct_c = 0;
            foreach ($teams as $team_c) {


                if ($team_r < $team_c) {
                    echo '<div class="cell cell-btn col-1-33" onmouseover=highlight(\'' . $ct_r . '\',\'' . $ct_c . '\') onmouseout=unhighlight(\'' . $ct_r . '\',\'' . $ct_c . '\') >';
                    echo '<button class="btn btn-grey" data-bs-toggle="modal" data-bs-target="#player-search"  onclick=validate(\'' . $ct_r . '\',\'' . $ct_c . '\')></button>';
                } else {
                    echo '<div class="cell col-1-33">';
                }

                echo '</div>';
                $ct_c++;
            }
            echo '</div>';
            $ct_r++;
        }

        ?>
        <div>
</body>

</html>