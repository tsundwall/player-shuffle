<?php
    $teams = ['ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GNB', 'HOU', 'IND', 'JAX', 'KAN', 'LAC', 'LAR', 'LVR', 'MIA', 'MIN', 'NOR', 'NWE', 'NYG', 'NYJ', 'PHI', 'PIT', 'SEA', 'SFO', 'TAM', 'TEN', 'WAS'];

    $data = file_get_contents('sampleCollege.json');
    $keys = json_decode($data,true);

    $keys_filtered = [];

    foreach ($teams as $team){
        $keys_filtered[$team] = [];
        foreach ($keys[$team] as $inst){
            if (strpos($inst[1],"-2022")){
                array_push($keys_filtered[$team],$inst);
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="input_roster.css">

<style>
    body{
        font-family: 'Source Code Pro', monospace;
    }
    .logo {
        width: 100%;
    }
    .cell{
        margin-left: 30px;
    }
    .col-1-33 {
        width: 5% !important;
        padding: 0px 0px 0px 0px !important;
    }
    .status-bar{
        background-color: #5cb85c;
        width: 2.5%;
        color: white;
        height: 100%;
        text-align: right;
    }
    .cell {
        border: 1px solid #f8f8f8;
    }
    .field-div.row {
        text-align: right;
    }
    .status-bar-end{
        border-left: 2px solid grey;

    }
    .status-bar-end {
        position: relative;
    }
    .logo-icon {
        height: 70px;
    }
    .field-div{

        position: -webkit-sticky;
        position: sticky;
        top: 0;
        background-color: #fff;
    }


</style>
<script>

    team_modal_data = [[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]];

    function resetCookie(){
        Cookies.set('id_nfl_roster',Math.floor(Math.random() * 1000000),{expires: 9000});
    }

    if (Cookies.get('id_nfl_roster') == undefined){
        Cookies.set('id_nfl_roster',Math.floor(Math.random() * 1000000),{expires: 9000});
    }

    $(window).on('load', function() {
        $.ajax({
    type: "POST",
    url: "fetch_roster_cookie",
    data: { key: Cookies.get('id_nfl_roster'),
            type: 'nfl'
        },
        success: function (response){

        if (response){

        team_results = response.split('&');
        ct = 0;
        for (const team_result of team_results){
            if (team_result != ''){
                team_result_l = team_result.split(';');
            if (ct < 32){
                increaseBar(ct,team_result_l.length-1);
            }


            team_modal_data[ct] = team_result_l.slice(0, -1);

            }
            ct++;
        }

        }


    }});
});

    team_names = ['ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GNB', 'HOU', 'IND', 'JAX', 'KAN', 'LAC', 'LAR', 'LVR', 'MIA', 'MIN', 'NOR', 'NWE', 'NYG', 'NYJ', 'PHI', 'PIT', 'SEA', 'SFO', 'TAM', 'TEN', 'WAS'];

    function increaseBar(idx,delta){
        curr_w = parseFloat($('.status-bar').eq(idx).width() / $('.status-bar').parent().width() * 100);
        progress_text_val = $('.status-bar-end').eq(idx).text();
        progress_tot_val = progress_text_val.split('/')[1];
        progress_ct_val = parseInt(progress_text_val.split('/')[0]);
        progress_ct_val = progress_ct_val + delta;
        delta_pct = delta / parseInt(progress_tot_val) * 98.5;
        next_w = curr_w + delta_pct;
        $('.status-bar').eq(idx).text(parseInt(progress_ct_val/parseFloat(progress_tot_val)*100).toString().concat('%'));
        $('.status-bar').eq(idx).css('width',next_w.toString().concat('%'));
        $('.status-bar-end').eq(idx).text(''.concat(progress_ct_val.toString(),'/',progress_tot_val));


    }

    function getResults(){

        $('.field_v1').prepend('<i class="fa fa-spinner fa-spin" style="font-size:24px;position:absolute;padding:10px"></i>');
        $('#search-input').css('padding-left','40px');
        $.ajax({
                type: "POST",
                url: "roster_lookup",
                data: {
                    name: $('#search-input').val().split(' (')[0],
                    type: 'nfl',
                    cookie: Cookies.get('id_nfl_roster')
                },
                success: function(response) {
                    if (response == 'already'){
                        showNoResultsBanner('Already Entered');
                        $('#search-input').val("");
                    }

                    else if (response){
                        teams = response.split(',');
                        for (const team of teams){
                            if (team!=''){
                                console.log(team);
                                increaseBar(team,1);
                                team_modal_data[team].push($('#search-input').val().split(' (')[0]);
                            }

                        }
                        showResultsBanner(teams,5);

                        players_str = '';
                        for (const team_l of team_modal_data){
                            for (const player of team_l){
                                players_str = players_str.concat(player,";");
                            }
                            players_str = players_str.concat('&');
                        }

                        $.ajax({
                                    type: "POST",
                                    url: "post_roster_cookie",
                                    data: { key: Cookies.get('id_nfl_roster'),
                                            val: players_str,
                                            type: 'nfl'
                                        },
                                        success: function (response){
                                        }});
                                }

                    else {
                        showNoResultsBanner();
                    }

                    $('#search-input').val("");
                    $('.field_v1 i').remove();
                    $('#search-input').css('padding-left','0px');

                }
            });

        }

    function showResultsBanner(indices){

        $('#show-no-results').addClass('d-none');

        $('#show-results-div').empty();
        $('#show-results').removeClass('d-none');
        for (const idx of indices){
            if (idx != ''){
                $('#show-results-div').append('<img class="logo-icon" src="logos/'.concat(team_names[idx],'.png" >'));
            }

        }

    }

    function showNoResultsBanner(msg = undefined){
        $('#show-no-results').removeClass('d-none');
        $('#show-results').addClass('d-none');
        if (msg != undefined){
            $('#show-no-results').text(msg);
        }
    }

    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            getResults();
        }
    });

    $(document).ready(function() {
        $('#btn-close').click(function() {
            $('#show-results').addClass('d-none');
        });
        $('#btn-close-no-results').click(function() {
            $('#show-no-results').addClass('d-none');
        });
    });

    function showModal(idx){
        idx = parseInt(idx);
        $('#summary-modal-div').empty();
        if (team_modal_data[idx].length != 0){
            for (const player of team_modal_data[idx]) {
                $('#summary-modal-div').append('<h5>'.concat(player,'</h5><br>'));
            }
        }
        else{
            $('#summary-modal-div').append('<h5>No players yet!</h5><br>');
        }

        $('#summary-modal').modal('show');

    }

</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roster Build</title>
    <div id="summary-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div id='summary-modal-div' class="modal-body row">
            </div>
        </div>
    </div>
    </div>
    <div id="show-results" class="alert alert-success alert-dismissible fade show d-none row" role="alert">
        <div id="show-results-div" class='col-4 offset-4 d-flex justify-content-center'>
        </div>
        <button type="button" class='btn-close' id="btn-close"></button>
    </div>
    <div id="show-no-results" class="alert alert-danger alert-dismissible fade show d-none row" role="alert">
        <div id="show-no-results-div" class='col-4 offset-2 d-flex justify-content-center'>
        </div>
        Couldn't find player
        <button type="button" class='btn-close' id="btn-close-no-results"></button>
    </div>
    <div class='field-div row'>
        <h6 class= "offset-2 col-2" style="padding-top:15px">Find players here</h6>
        <div class=" col-6 field field_v1">
            <label for="search-input" class="ha-screen-reader">First name</label>
            <input id="search-input" autocomplete="off" class="field__input" placeholder="e.g. Tom Brady">
        </div>
    </div>


    <div id='grid'>

    <?php
        $teams = ['ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GNB', 'HOU', 'IND', 'JAX', 'KAN', 'LAC', 'LAR', 'LVR', 'MIA', 'MIN', 'NOR', 'NWE', 'NYG', 'NYJ', 'PHI', 'PIT', 'SEA', 'SFO', 'TAM', 'TEN', 'WAS'];
        echo '<div class="row spacing-top"><span class="offset-4 col-4" id="status"></span></div>';
        $ct = 0;
        foreach ($teams as $team) {
            echo '<div class="row">';
            echo '<div class="cell col-1-33 logo-col-div">';
            echo '<img onclick = showModal(\'' . $ct . '\') class="logo" src=logos/' . $team . '.png' . ' />';
            echo '</div>';
            echo '<div class="col"><div class="status-bar">0%</div></div>';
            echo '<div class="status-bar-end col-1">0/'. count($keys_filtered[$team]) . '</div>';
            echo '</div>';
            echo '</div>';
            $ct++;
        }
        echo '</div>';
        echo '</div>';


    ?>
</head>
<body>

</body>
</html>
