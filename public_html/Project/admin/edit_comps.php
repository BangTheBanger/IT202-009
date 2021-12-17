<?php
    require(__DIR__ . "/../../partials/nav.php");
    if (!has_role("admin")) {
        die(header("Location: ./../home.php"));
    }
    $db = getDB();
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

            <?php
                $stmt = $db->prepare("SELECT id, name, expiration, current_reward, join_fee, current_participants, min_participants, min_score, first_place_per, 
                                    second_place_per, third_place_per FROM competitions WHERE paid_out = 0 ORDER BY expiration ASC");
                $stmt->execute();
                $complist = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

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
                        for ($i = 0; $i < 10; $i++) {
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
                <div>
                    <label for="compname">Competition Name:</label>
                    <input type="text" name="compname" required minlength="2" autocomplete="off" required value="<?php se($compname) ?>"/>
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
                <input type="submit" value="Create" />
                </form>
            </div>
            
            <div id="lookupcomp">
                <form onsubmit="return validate(this)" method="POST">
                    <div>
                        <label for="compname" class="tobecleared">Competition Name:</label>
                        <input type="text" name="compname" required minlength="2" required value="<?php if(!(empty($compname))) {se($compname);} ?>"/>
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