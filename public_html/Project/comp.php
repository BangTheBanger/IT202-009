<?php
require(__DIR__ . "/../../partials/nav.php");

if (!is_logged_in()) {die(header("Location: login.php"));}


/*
if (strlen($a) < 1000) {
    flash("Message", "warning");
    $hasError = true;
}
*/


if (isset($_POST["compname"]) && isset($_POST["1reward"]) && isset($_POST["2reward"]) && isset($_POST["3reward"]) && 
    isset($_POST["compcost"]) && isset($_POST["duration"]) && isset($_POST["minscore"]) && isset($_POST["minplayers"])) {
    try {
    $compname = se($_POST, "compname", "", false);
    $reward1 = se($_POST, "1reward", "", false);
    $reward2 = se($_POST, "2reward", "", false);
    $reward3 = se($_POST, "3reward", "", false);
    $compcost = se($_POST, "compcost", "", false);
    $duration = se($_POST, "duration", "", false);
    $minscore = se($_POST, "minscore", "", false);
    $minplayers = se($_POST, "minplayers", "", false);
    $compcreatecost = 2;
    }  catch (Exception $e) {
        flash("<pre>" . "Error Code: F000 - Bad Competition Submit" . "</pre>", "danger");
    }
    $hasError = false;

    if (empty($compname)) {
        flash("Competition Name must not be empty", "warning");
        $hasError = true;
    }
    if (empty($reward1)) {
        flash("The First Place Reward must not be empty", "warning");
        $hasError = true;
    }
    if (empty($reward2)) {
        flash("The Second Place Reward must not be empty", "warning");
        $hasError = true;
    }
    if (empty($reward3)) {
        flash("The Third Place Reward must not be empty", "warning");
        $hasError = true;
    }
    if (($reward1 + $reward2 + $reward3) < 100 || ($reward1 + $reward2 + $reward3) > 100) {
        flash ("The rewards must equal a total of 100%", "warning");
        $hasError = true;
        $multiplyRewards = false;
    } else {
        $reward1 /= 100;
        $reward1 = round($reward1, 2);
        $reward2 /= 100;
        $reward2 = round($reward2, 2);
        $reward3 /= 100;
        $reward3 = round($reward3, 2);
        $multiplyRewards = true;
    }
    if (empty($compcost) && $compcost != "0") {
        flash("The Competition Cost must not be empty", "warning");
        $hasError = true;
    } else {
        $compcost = (int)$compcost;
    }
    if (empty($duration)) {
        flash("The Duration must not be empty", "warning");
        $hasError = true;
    } else {
        $duration = (int)$duration;
    }
    if (empty($minscore)) {
        flash("The Minimum Score to Qualify must not be empty", "warning");
        $hasError = true;
    } else {
        $minscore = (int)$minscore;
    }
    if (empty($minplayers)) {
        flash("The Minimum Amount of Players for Payout must not be empty", "warning");
        $hasError = true;
    } else {
        $minplayers = (int)$minplayers;
    }
    
    /*
        // Uncomment for variable checks on the page. 
        if (true) {
            echo '<pre>' . "compname = ", var_dump($compname) . '</pre>';
            echo '<pre>' . "reward1 = ", var_dump($reward1) . '</pre>';
            echo '<pre>' . "reward2 = ", var_dump($reward2) . '</pre>';
            echo '<pre>' . "reward3 = ", var_dump($reward3) . '</pre>';
            echo '<pre>' . "compcost = ", var_dump($compcost) . '</pre>';
            echo '<pre>' . "duration = ", var_dump($duration) . '</pre>';
            echo '<pre>' . "minscore = ", var_dump($minscore) . '</pre>';
            echo '<pre>' . "minplayers = ", var_dump($minplayers) . '</pre>';
        }
    */

    if (!$hasError) {                   //Submitting to Competitions table
        $db = getDB();
        $stmt = $db->prepare(
            "INSERT INTO competitions (name, duration, starting_reward, join_fee, min_participants, min_score, first_place_per, second_place_per, third_place_per, cost_to_create,
                                        expiration, current_reward,  current_participants, paid_out)

            VALUES (:name, :duration, :startreward, :joinfee, :minplayer, :minscore, :reward1, :reward2, :reward3, :cost, 
                ((DATE_ADD(CURRENT_TIMESTAMP, INTERVAL :duration DAY))), :startreward, 1, false);
                ");

        try {
            try {
                $fetchuserpoints = $db->prepare("SELECT points FROM users WHERE id = :uid");
                $fetchuserpoints->execute([":uid" => get_user_id()]);
                $pointtotal = $fetchuserpoints->fetchAll(PDO::FETCH_ASSOC);
                if ($pointtotal[0]['points'] > $compcreatecost) {
                    try {
                        $stmt->execute([":name" => $compname, ":duration" => $duration, ":startreward" => 1, ":joinfee" => $compcost, ":minplayer" => $minplayers,
                                            ":minscore" => $minscore, ":reward1" => $reward1, ":reward2" => $reward2, ":reward3" => $reward3, ":cost" => $compcreatecost]);
                        $updatepoints = $db->prepare("INSERT INTO pointhistory (user_id, pointchange) VALUES (:uid, :cost);");
                        $updatepoints->execute([":uid" => get_user_id(), ":cost" => ($compcreatecost*-1)]);
                        echo "<script> (function() {var clear = document.getElementsByClassName('tobecleared'); 
                                var test = document.getElementById('TEST'); test.innerHTML = clear; }) </script>";
                        $compname = "";
                        $reward1 = "";
                        $reward2 = "";
                        $reward3 = "";
                        $compcost = "";
                        $duration = "";
                        $minscore = "";
                        $minplayers = "";
                        flash("Competition Created!", "success");
                    } catch (Exception $e) {
                        flash( "Error Code: F001 - Bad Competition Submit", "danger");
                    }
                }
            } catch (Exception $e) {
                flash( "Error Code: F002 - Couldn't retrieve data", "danger");
            }
            

        } catch (Exception $e) {
            flash( "Error Code: F000 - Unknown Error", "danger");
        }
    }
}
?>

<html>
<head>
    <style>
        * {
            box-sizing: border-box;
        }
        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        form {
            text-align: left;
            align-self: left;
            align-items: left;
            align-content: left;
        }
    </style>
</head>

<body>

    <div class="row">
    <div class="column" id="existcomp">
        <h2>Existing Competitions</h2>
        <p>Comp 1</p>
    </div>
    <div class="column" id="newcomp">
        <h2>Create a Competition</h2>
        
        <form onsubmit="return validate(this)" method="POST">
            <div>
                <label for="compname" class="tobecleared">Competition Name:</label>
                <input type="text" name="compname" required minlength="2" required value="<?php if(!(empty($compname))) {se($compname);} ?>"/>
            </div>
            <div>
                <label for="1reward" class="tobecleared">First Place Reward: %</label>
                <input type="number" name="1reward" min="0" max="100" required value="<?php if(!(empty($reward1))) {if($multiplyRewards) {se($reward1*100);} else {se($reward1);}} ?>"/>
            </div>
            <div>
                <label for="2reward" class="tobecleared">Second Place Reward: %</label>
                <input type="number" name="2reward" min="0" max="100" required value="<?php if(!(empty($reward2))) {if($multiplyRewards) {se($reward2*100);} else {se($reward2);}} ?>"/>
            </div>
            <div>
                <label for="3reward" class="tobecleared">Third Place Reward: %</label>
                <input type="number" name="3reward" min="0" max="100" required value="<?php if(!(empty($reward3))) {if($multiplyRewards) {se($reward3*100);} else {se($reward3);}} ?>"/>
            </div>
            <div>
                <label for="checkfree">Check if you wish the tournament to be free to join</label>
                <input type="checkbox" id="isfree" name="checkfree" onclick="freeclick()"/>
            </div>
            <div id="notfreecost">
                <label for="compcost" class="tobecleared">Competition Cost:</label>
                <input type="number" id="notfreecostinput" name="compcost" min="0" required value="<?php if(!(empty($compcost))) {se($compcost);} ?>"/>
            </div>
            <div>
                <label for="duration" class="tobecleared">Duration (in days):</label>
                <input type="number" name="duration" min="1" required value="<?php if(!(empty($duration))) {se($duration);} ?>"/>
            </div>
            <div>
                <label for="minscore" class="tobecleared">Minimum Score to Qualify:</label>
                <input type="number" name="minscore" min="0" required value="<?php if(!(empty($minscore))) {se($minscore);} ?>"/>
            </div>
            <div>
                <label for="minplayers" class="tobecleared">Minimum Amount of Players for Payout:</label>
                <input type="number" name="minplayers" min="3" required value="<?php if(!(empty($minplayers))) {se($minplayers);} ?>"/>
            </div>
            <div><p><?php echo "The cost of creating the competition is: " . 1+1;?></p></div>


            <input type="submit" value="Create" />
        </form>
        <p id = "TEST"></p>  
        <script>
            function validate(form) {
                return true;
            }
            function freeclick() {
                var chkbox = document.getElementById("isfree")
                var costdiv = document.getElementById("notfreecost")
                var costdivin = document.getElementById("notfreecostinput")
                if (chkbox.checked==true){
                    costdiv.style.display="none";
                    costdivin.value = "0";
                } else {
                    costdiv.style.display="block";
                    costdivin.value = "0";
                }
            }
            /*
            window.onload = clearForms();
            function clearForms() {
                var clear = document.getElementsByClassName("tobecleared");
                var test = document.getElementById("TEST");
                test.innerHTML = clear;
            }
            */
            ;(function() {
                var clear = document.getElementsByClassName('tobecleared'); 
                var test = document.getElementById('TEST'); 
                test.innerHTML = clear;
            })
        </script>

    </div>
    </div>

</body>
</html>

<?php 
require(__DIR__ . "/../../partials/flash.php");
?>