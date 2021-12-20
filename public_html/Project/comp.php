<?php
    require(__DIR__ . "/../../partials/nav.php");

    if (!is_logged_in()) {die(header("Location: login.php"));}
    $db = getDB();


    /*
    if (strlen($a) < 1000) {
        flash("Message", "warning");
        $hasError = true;
    }
    */
    //List Pagination
        if (!isset ($_GET['cursor']) ) {
            $cursor = 1;
        } else {
            $cursor = $_GET['cursor'];
        }

        $stmt = $db->prepare("SELECT * FROM competitions WHERE paid_out = 0 ORDER BY expiration ASC");
        $stmt->execute();
        $complist = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pagetotal = 10;
        $offset = $pagetotal*($cursor-1);

        $totalrows = count($complist);
        $pageamount= ceil($totalrows / $pagetotal);
    //
    //Submit Competition Create and Join User
        if (isset($_POST["compname"]) && isset($_POST["1reward"]) && isset($_POST["2reward"]) && isset($_POST["3reward"]) && 
            isset($_POST["compcost"]) && isset($_POST["duration"]) && isset($_POST["minscore"]) && isset($_POST["minplayers"])) {
            // Variable declaration
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
                $compcreationsuccess = false;
            //
            // Variable check and sanitization
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
            //
            /*  // Uncomment for variable checks on the page.
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
                $stmt = $db->prepare("INSERT INTO competitions (name, duration, starting_reward, join_fee, min_participants, min_score, first_place_per,
                                                                second_place_per, third_place_per, cost_to_create, expiration)

                                                                VALUES (:name, :duration, :startreward, :joinfee, :minplayer, :minscore, :reward1,
                                                                        :reward2, :reward3, :cost, ((DATE_ADD(CURRENT_TIMESTAMP, INTERVAL :duration DAY))))
                ");

                try {
                    try {
                        $fetchuserpoints = $db->prepare("SELECT points FROM users WHERE id = :uid");
                        $fetchuserpoints->execute([":uid" => get_user_id()]);
                        $pointtotal = $fetchuserpoints->fetchAll(PDO::FETCH_ASSOC);
                        if ($pointtotal[0]['points'] >= $compcreatecost) {
                            try {
                                $stmt->execute([":name" => $compname, ":duration" => $duration, ":startreward" => 1, ":joinfee" => $compcost, ":minplayer" => $minplayers,
                                                    ":minscore" => $minscore, ":reward1" => $reward1, ":reward2" => $reward2, ":reward3" => $reward3, ":cost" => $compcreatecost]);
                                $updatepoints = $db->prepare("INSERT INTO pointhistory (user_id, pointchange) VALUES (:uid, :cost);");
                                $updatepoints->execute([":uid" => get_user_id(), ":cost" => ($compcreatecost*-1)]);
                                $update = $db->prepare("UPDATE users SET points = (SELECT IFNULL(SUM(pointchange), 0) FROM pointhistory WHERE user_id = :uid) WHERE id = :uid");
                                $update->execute([":uid" => get_user_id()]);
                                flash("Competition Created!", "success");
                                $compcreationsuccess = true;
                                if ($compcreationsuccess) {
                                    try {
                                        $findcomp = $db->prepare("SELECT id FROM competitions WHERE (name=:name AND duration=:duration AND join_fee=:joinfee AND min_participants=:minplayer AND 
                                                                    paid_out=0 AND min_score=:minscore AND first_place_per BETWEEN (:reward1m-0.000001) AND (:reward1p+0.000001) AND second_place_per BETWEEN (:reward2m-0.000001) AND (:reward2p+0.000001));");
                                        $findcomp->execute([":name" => $compname, ":duration" => $duration, ":joinfee" => $compcost, ":minplayer" => $minplayers,
                                                            ":minscore" => $minscore, ":reward1m" => ($reward1-0.000001), ":reward1p" => ($reward1+0.000001), ":reward2m" => ($reward2-0.000001), ":reward2p" => ($reward2+0.000001)]);
                                        //
                                        $compid = $findcomp->fetchAll(PDO::FETCH_ASSOC);
                                        $addusertocomp = $db->prepare("INSERT INTO competitionparticipants (comp_id, user_id) VALUES (:compid, :uid);");
                                        $addusertocomp->execute([":compid" => $compid[0]["id"], ":uid" => get_user_id()]);
                                        
                                    
                                    } catch (Exception $e) {
                                        flash( "Error Code: F003 - Could Not Join User", "danger");
                                        $compcreationsuccess = false;
                                    }
                
                                    $compname = "";
                                    $reward1 = "";
                                    $reward2 = "";
                                    $reward3 = "";
                                    $compcost = "";
                                    $duration = "";
                                    $minscore = "";
                                    $minplayers = "";
                
                                }
                                if($compcreationsuccess) {
                                    die(header("Location: comp.php"));
                                }
                            } catch (Exception $e) {
                                flash( "Error Code: F001 - Bad Competition Submit", "danger");
                                $compcreationsuccess = false;
                            }
                        } else {
                            flash("You don't have enough points", "warning");
                            $compcreationsuccess = false;
                        }
                    } catch (Exception $e) {
                        flash( "Error Code: F002 - Couldn't retrieve data", "danger");
                        $compcreationsuccess = false;
                    }
                } catch (Exception $e) {
                    flash( "Error Code: F000 - Unknown Error", "danger");
                    $compcreationsuccess = false;
                }
                
            }
        }
    //

    //User Comp Join
        if(isset($_POST["compjoin"])) {
            try {  //Operation: Casting and Declaring
                $compjoin = se($_POST, "compjoin", "", false);
                $compjoin = (int)$compjoin;
                $hasErrorJoin = false;
            } catch (Exception $e) {
                flash("Error Code: F004 - Bad Operation: Casting and Declaring","danger");
            }
            try{  //Operation: Join
                if (empty($compjoin)) {
                    flash("Competition ID must not be empty", "warning");
                    $hasErrorJoin = true;
                }
                if (!$hasErrorJoin) {
                    $db = getDB();
                    //Inserts user into proper tables if they aren't already registered.
                        try{
                            //INSERT INTO competitionparticipants
                                $stmt = $db->prepare("INSERT INTO competitionparticipants (comp_id, user_id) VALUES (:compid, :uid);");
                                $stmt->execute([":compid" => $compjoin, ":uid" => get_user_id()]);
                            //
                            //UPDATE competitions SET current_participants
                                $stmt = $db->prepare("UPDATE competitions SET current_participants = ( SELECT IFNULL(COUNT(user_id), 0) 
                                                    FROM competitionparticipants WHERE comp_id = :compid ) WHERE comp_id = :compid");
                                //
                                $stmt->execute([":compid" => $compjoin]);
                            //
                            //UPDATE competitions SET current_reward
                                $stmt = $db->prepare("UPDATE competitions SET current_reward = ( SELECT IFNULL (CEILING(0.5*(SELECT IFNULL(COUNT(user_id), 0))), 1) 
                                                    FROM competitionparticipants WHERE comp_id = :compid ) WHERE comp_id = :compid");
                                //
                                $stmt->execute([":compid" => $compjoin]);
                            //
                            flash("Successfully Registered!","success");
                        } catch (Exception $e) {
                            flash("You have already registered for this competition.","info");
                        }
                    //
                }//endif
            } catch (Exception $e) {
                flash("Error Code: F005 - Bad Operation: Join","danger");
            }
            

        }
    //

    // Function for closing out a competition and distributing prizes.
        if(false){

            $db = getDB();
            // Prepare query to fetch competitions
                $fetchCompetitions = $db->prepare("SELECT id, current_participants, min_participants, CREATED, expiration, current_reward, first_place_per, 
                                                    second_place_per, third_place_per FROM competitions WHERE paid_out = 0 AND expiration <= CURRENT_TIMESTAMP;");
            //
            // Execute query to fetch competitions
                $fetchCompetitions->execute();
                $compList = $fetchCompetitions->fetchAll(PDO::FETCH_ASSOC);
            //
            // Prepare queries to fetch users and their scores
                $fetchParticipatingUsers = $db->prepare("SELECT user_id FROM competitionparticipants WHERE comp_id = :compid;");
                $fetchUserScores = $db->prepare("SELECT user_id, score, CREATED FROM scores WHERE CREATED BETWEEN :compcreate AND :compexpire AND user_id = :uid");
            //

            //Looping through competitions
                for ($cli = 0; $cli < count($compList); $cli++) {
                    //Check if payout is necessary based on usercount
                        $playercount = $compList[$i]["current_participants"];
                        $playermin = $compList[$i]["min_participants"];

                        if ($playercount >= $playermin) {
                            //Get a list of all users participating on the competition
                                $fetchParticipatingUsers->execute([":compid" => $compList[$cli]["id"]]);
                                $participatingUsers = $fetchParticipatingUsers->fetchAll(PDO::FETCH_ASSOC);
                            //
                            //Loop through users and get all their cumulative scores
                                $allUserScores = [];
                                for ($ui = 0; $ui < count($participatingUsers); $ui++) {
                                    $totalUserScores = 0;

                                    //Fetch all user scores that are in the range of the competition
                                        $fetchUserScores->execute([":compcreate" => $compList[$cli]["CREATED"], ":compexpire" => $compList[$cli]["expiration"],
                                                                    ":uid" => $participatingUsers[$ui]["user_id"]]);
                                        $userScores = $fetchUserScores->fetchAll(PDO::FETCH_ASSOC);
                                    //
                                    //Loop through the scores to tally up
                                    for ($usi = 0; $usi < count($userScores); $usi++) {
                                        $totalUserScores += (int)$userScores[$usi]["score"];
                                    }
                                    $allUserScores[$participatingUsers[$ui]["user_id"]] = $totalUserScores;
                                }
                            //
                            //Get the top 3
                                $top3 = ["FirstPlace" => [0 => 0], "SecondPlace" => [0 => 0], "ThirdPlace" => [0 => 0]];
                                foreach($allUserScores as $user => $score) {
                                    if ($score > $top3["FirstPlace"]) {
                                        $top3["FirstPlace"] = [$user => $score];
                                    }
                                    else if ($score > $top3["SecondPlace"]) {
                                        $top3["SecondPlace"] = [$user => $score];
                                    }
                                    else if ($score > $top3["ThirdPlace"]) {
                                        $top3["ThirdPlace"] = [$user => $score];
                                    }
                                }
                            //

                            //Calculate rewards
                                $rewards = [];
                                foreach($top3 as $userPlacement => $userArray) {
                                    foreach($userArray as $userID => $userScore) {
                                        if ($userPlacement = "FirstPlace") {
                                            $rewards[$userID] = ceil((((int)($compList[$cli]["current_reward"])) * ((float)($compList[$cli]["first_place_per"]))));
                                        } else if ($userPlacement = "SecondPlace") {
                                            $rewards[$userID] = ceil((((int)($compList[$cli]["current_reward"])) * ((float)($compList[$cli]["second_place_per"]))));
                                        } else if ($userPlacement = "ThirdPlace") {
                                            $rewards[$userID] = ceil((((int)($compList[$cli]["current_reward"])) * ((float)($compList[$cli]["third_place_per"]))));
                                        }
                                    }
                                }
                            //

                            //Prepare queries for rewards
                                $distributeRewards = $db->prepare("INSERT INTO pointhistory (user_id, pointchange, reason) VALUES (:uid, :userPrize, :reason);");
                                $update = $db->prepare("UPDATE users SET points = (SELECT IFNULL(SUM(pointchange), 0) FROM pointhistory WHERE user_id = :uid) WHERE id = :uid");
                                $compUpdate = $db->prepare("UPDATE competitions SET paid_out = true WHERE id = :compid");
                            //
                            //Distribute Prizes
                                foreach($rewards as $UserID => $prize) {
                                    $distributeRewards->execute([":uid" => $UserID, ":userPrize" => $prize, ":reason" => "Competition Reward"]);
                                    $update->execute([":uid" => $UserID]);
                                }
                            //
                            //change paid_out to true
                            $compUpdate->execute([":compid" => $compList[$i]["id"]]);
                        }
                    //
                }
            //
        }
    //

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
            text-align: center;
        }
        .column.right {
            text-align: left;
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
            <table style="width:auto">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Expiration</th>
                    <th>Current Prize</th>
                    <th>Join Fee</th>
                    <th>Total Players</th>
                    <th>Min Players for Payout</th>
                    <th>Min Score to Qualify</th>
                    <th>Prize Distribution</th>
                </tr>
                <?php 
                    if (count($complist) > 10) {
                        for ($pageindex = 1; $pageindex <= 10; $pageindex++) {
                            if ($cursor == $pageindex) {
                                if(($pagetotal*($cursor-1)) == 0) {
                                    $currentpagetotal = 10;
                                } else {
                                    $currentpagetotal = count($complist)-($pagetotal*($cursor-1));
                                }

                                for ($listindex = $offset; $listindex <= $offset+$currentpagetotal-1; $listindex++) {
                                    $compid = $complist[$listindex]["id"];
                                    $listcompname = $complist[$listindex]["name"];
                                    $compexp = $complist[$listindex]["expiration"];
                                    $compprize = $complist[$listindex]["current_reward"];
                                    $compfee = $complist[$listindex]["join_fee"];
                                    $compplayers = $complist[$listindex]["current_participants"];
                                    $compminplayers = $complist[$listindex]["min_participants"];
                                    $compminscore = $complist[$listindex]["min_score"];
                                    $comprew1 = $complist[$listindex]["first_place_per"];
                                    $comprew2 = $complist[$listindex]["second_place_per"];
                                    $comprew3 = $complist[$listindex]["third_place_per"];

                                    $comprew1 *= 100;
                                    $comprew2 *= 100;
                                    $comprew3 *= 100;
                                    
                                    echo '<tr>';
                                    echo '<td>'. $compid .'</td>';
                                    echo '<td>'. $listcompname .'</td>';
                                    echo '<td>'. $compexp .'</td>';
                                    echo '<td>'. $compprize .'</td>';
                                    echo '<td>'. $compfee .'</td>';
                                    echo '<td>'. $compplayers .'</td>';
                                    echo '<td>'. $compminplayers .'</td>';
                                    echo '<td>'. $compminscore .'</td>';
                                    echo '<td>'. '1st: ', $comprew1 . '%, 2nd: ', $comprew2 . '%, 3rd: ', $comprew3 . '%</td>';
                                    echo '</tr>';
                                }
                            }
                        }
                        for($cursor = 1; $cursor <= $pageamount; $cursor++) {
                            echo '<a class="cursoranchor" href = "comp.php?cursor=' . $cursor . '">Page ' . $cursor . '</a>';
                        }
                    }
                    
                    else if (count($complist) > 0) {
                        for ($i = 0; $i < count($complist); $i++) {
                            $compid = $complist[$i]["id"];
                            $compname = $complist[$i]["name"];
                            $compexp = $complist[$i]["expiration"];
                            $compprize = $complist[$i]["current_reward"];
                            $compfee = $complist[$i]["join_fee"];
                            $compplayers = $complist[$i]["current_participants"];
                            $compminplayers = $complist[$i]["min_participants"];
                            $compminscore = $complist[$i]["min_score"];
                            $comprew1 = $complist[$i]["first_place_per"];
                            $comprew2 = $complist[$i]["second_place_per"];
                            $comprew3 = $complist[$i]["third_place_per"];

                            $comprew1 *= 100;
                            $comprew2 *= 100;
                            $comprew3 *= 100;
                            
                            echo '<tr>';
                            echo '<td>'. $compid .'</td>';
                            echo '<td>'. $compname .'</td>';
                            echo '<td>'. $compexp .'</td>';
                            echo '<td>'. $compprize .'</td>';
                            echo '<td>'. $compfee .'</td>';
                            echo '<td>'. $compplayers .'</td>';
                            echo '<td>'. $compminplayers .'</td>';
                            echo '<td>'. $compminscore .'</td>';
                            echo '<td>'. '1st: ', $comprew1 . '%, 2nd: ', $comprew2 . '%, 3rd: ', $comprew3 . '%</td>';
                            echo '</tr>';
                        }
                    } else if (count($complist) <= 0) {
                        echo "No Competitions to Display";
                    }
                
                ?>
            </table>
        </div>
        <div class="column right" id="join">
            <h2>Join Competition</h2>
            <form onsubmit="return validate(this)" method="POST">
                <div>
                    <label for="compjoin">Competition ID:</label>
                    <input type="number" name="compjoin" min="1" required value="<?php if(!(empty($compjoin))) {se($compjoin);} ?>"/>
                </div>

                <input type="submit" value="Join" />
            </form>
        </div>
        <div class="column right" id="newcomp">
            <h2>Create a Competition</h2>
            <form onsubmit="return validate(this)" method="POST">
                <div>
                    <label for="compname">Competition Name:</label>
                    <input type="text" name="compname" required minlength="2" autocomplete="off" required value="<?php if(!(empty($compname))) {se($compname);} ?>"/>
                </div>
                <div>
                    <label for="1reward">First Place Reward: %</label>
                    <input type="number" name="1reward" min="0" max="100" required value="<?php if(!(empty($reward1))) {if($multiplyRewards) {se($reward1*100);} else {se($reward1);}} ?>"/>
                </div>
                <div>
                    <label for="2reward">Second Place Reward: %</label>
                    <input type="number" name="2reward" min="0" max="100" required value="<?php if(!(empty($reward2))) {if($multiplyRewards) {se($reward2*100);} else {se($reward2);}} ?>"/>
                </div>
                <div>
                    <label for="3reward">Third Place Reward: %</label>
                    <input type="number" name="3reward" min="0" max="100" required value="<?php if(!(empty($reward3))) {if($multiplyRewards) {se($reward3*100);} else {se($reward3);}} ?>"/>
                </div>
                <div>
                    <label for="checkfree">Check if you wish the tournament to be free to join</label>
                    <input type="checkbox" id="isfree" name="checkfree" onclick="freeclick()"/>
                </div>
                <div id="notfreecost">
                    <label for="compcost">Competition Cost:</label>
                    <input type="number" id="notfreecostinput" name="compcost" min="0" required value="<?php se($compcost) ?>"/>
                </div>
                <div>
                    <label for="duration">Duration (in days):</label>
                    <input type="number" name="duration" min="1" required value="<?php se($duration) ?>"/>
                </div>
                <div>
                    <label for="minscore">Minimum Score to Qualify:</label>
                    <input type="number" name="minscore" min="0" required value="<?php se($minscore) ?>"/>
                </div>
                <div>
                    <label for="minplayers">Minimum Amount of Players for Payout:</label>
                    <input type="number" name="minplayers" min="3" required value="<?php se($minplayers) ?>"/>
                </div>
                <div><p><?php echo "The cost of creating the competition is: " . 1+1;?></p></div>


                <input type="submit" value="Create" />
            </form>
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
            </script>

        </div>

    </div>

</body>
</html>

<?php 
require(__DIR__ . "/../../partials/flash.php");
?>