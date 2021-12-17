<?php
    require(__DIR__ . "/../../../partials/nav.php");
    if (!has_role("admin")) {
        flash("You don't have permission to view this page", "warning");
        die(header("Location: $BASE_PATH" . "home.php"));
    }
    $db = getDB();


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

    //TODO: Has Looked Up an ID
        if(isset($_POST['compid'])) {
            $compid = $_POST['compid'];
        }
    //

    //TODO: Hasn't Looked Up an ID
        else {
            //make id = compedit not display
        }
    //

    //TODO: Submit Competition Edit
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
            //
            $hasError = false;
            $compcreationsuccess = false;


        }
    //


?>

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
                                    $compname = $complist[$listindex]["name"];
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
                            }
                        }

                        for($cursor = 1; $cursor <= $pageamount; $cursor++) {
                            echo '<a class="cursoranchor" href = "edit_comps.php?cursor=' . $cursor . '">Page ' . $cursor . ' </a>';
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
                    }
                
                ?>
            </table>
        </div>
        <div class="column" id="editcomp">
            <h2>Edit Competition</h2>
            
            <div id = "editform">
                <form onsubmit="return validate(this)" method="POST">
                    <div id = "compname">
                        <label for="compname">Competition Name:</label>
                        <input type="text" name="compname" required minlength="2" autocomplete="off" required value="<?php se($compname) ?>"/>
                    </div>
                    <div id = "1reward">
                        <label for="1reward">First Place Reward: %</label>
                        <input type="number" name="1reward" min="0" max="100" required value="<?php if(!(empty($reward1))) {if($multiplyRewards) {se($reward1*100);} else {se($reward1);}} ?>"/>
                    </div>
                    <div id = "2reward">
                        <label for="2reward">Second Place Reward: %</label>
                        <input type="number" name="2reward" min="0" max="100" required value="<?php if(!(empty($reward2))) {if($multiplyRewards) {se($reward2*100);} else {se($reward2);}} ?>"/>
                    </div>
                    <div id = "3reward">
                        <label for="3reward">Third Place Reward: %</label>
                        <input type="number" name="3reward" min="0" max="100" required value="<?php if(!(empty($reward3))) {if($multiplyRewards) {se($reward3*100);} else {se($reward3);}} ?>"/>
                    </div>
                    <div id = "notfreecost">
                        <label for="compcost">Competition Cost:</label>
                        <input type="number" id="notfreecostinput" name="compcost" min="0" required value="<?php se($compcost) ?>"/>
                    </div>
                    <div id = "duration">
                        <label for="duration">Duration (in days):</label>
                        <input type="number" name="duration" min="1" required value="<?php se($duration) ?>"/>
                    </div>
                    <div id = "minscore">
                        <label for="minscore">Minimum Score to Qualify:</label>
                        <input type="number" name="minscore" min="0" required value="<?php se($minscore) ?>"/>
                    </div>
                    <div id = "minplayers">
                        <label for="minplayers">Minimum Amount of Players for Payout:</label>
                        <input type="number" name="minplayers" min="3" required value="<?php se($minplayers) ?>"/>
                    </div>
                    <input type="submit" value="Edit" />
                </form>
                <?php echo "<br><br><br>" ?>
            </div>

            <div id="lookupcomp">
                <form onsubmit="return validate(this)" method="POST">
                    <div>
                        <label for="compid" class="tobecleared">Competition ID:</label>
                        <input type="number" name="compid" required value="<?php if(!(empty($compid))) {se($compid);} ?>"/>
                    </div>
                </form>
            </div>
            <script>
                function validate(form) {
                    return true;
                }
            </script>

        </div>

    </div>

</body>