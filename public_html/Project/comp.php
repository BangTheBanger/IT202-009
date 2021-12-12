<?php
require(__DIR__ . "/../../partials/nav.php");/*
if (!is_logged_in()) {
    die(header("Location: login.php"));
}*/


$compname = se($_POST, "compname", "", false);
if (isset($_POST["compname"]) && isset($_POST["1reward"])) {
    $reward1 = se($_POST, "1reward", "", false);
    $reward2 = se($_POST, "2reward", "", false);
    $reward3 = se($_POST, "3reward", "", false);
    $compcost = se($_POST, "compcost", "", false);
    $duration = se($_POST, "duration", "", false);
    $minscore = se($_POST, "minscore", "", false);
    $minplayers = se($_POST, "minplayers", "", false);

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
    /*
    if (strlen($a) < 1000) {
        flash("Message", "warning");
        $hasError = true;
    }
    */
    if (empty($duration)) {
        flash("The Duration must not be empty", "warning");
        $hasError = true;
    }
    if (empty($minscore)) {
        flash("The Minimum Score to Qualify must not be empty", "warning");
        $hasError = true;
    }
    if (empty($minplayers)) {
        flash("The Minimum Amount of Players for Payout must not be empty", "warning");
        $hasError = true;
    }

    echo '<pre>' . var_export($compname) . '</pre>';
    echo '<pre>' . var_export($reward1) . '</pre>';
    echo '<pre>' . var_export($reward2) . '</pre>';
    echo '<pre>' . var_export($reward3) . '</pre>';
    echo '<pre>' . var_export($compcost) . '</pre>';
    echo '<pre>' . var_export($duration) . '</pre>';
    echo '<pre>' . var_export($minscore) . '</pre>';
    echo '<pre>' . var_export($minplayers) . '</pre>';

/*
    if (!$hasError) {
        $db = getDB();
        $stmt = $db->prepare(
            "INSERT INTO competitions (name, duration, starting_reward, join_fee, min_participants, min_score, first_place_per, second_place_per, third_place_per, cost_to_create)
            VALUES (:name, :duration, :startreward, :joinfee, :minplayer, :minscore, :reward1, :reward2, :reward3, :cost);");
        try {
            $r = $stmt->execute([]);


        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
*/
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
                <label for="compname">Competition Name:</label>
                <input type="text" name="compname" required minlength="2" />
            </div>
            <div>
                <label for="1reward">First Place Reward: %</label>
                <input type="number" name="1reward" min="0" max="100"/>
            </div>
            <div>
                <label for="2reward">Second Place Reward: %</label>
                <input type="number" name="2reward" min="0" max="100"/>
            </div>
            <div>
                <label for="3reward">Third Place Reward: %</label>
                <input type="number" name="3reward" min="0" max="100"/>
            </div>
            <div>
                <label for="checkfree">Check if you wish the tournament to be free to join</label>
                <input type="checkbox" id="isfree" name="checkfree" onclick="freeclick()"/>
            </div>
            <div id="notfreecost">
                <label for="compcost">Competition Cost:</label>
                <input type="number" id="notfreecostinput" name="compcost" min="0"/>
            </div>
            <div>
                <label for="duration">Duration (in days):</label>
                <input type="number" name="duration" min="1"/>
            </div>
            <div>
                <label for="minscore">Minimum Score to Qualify:</label>
                <input type="number" name="minscore" min="0"/>
            </div>
            <div>
                <label for="minplayers">Minimum Amount of Players for Payout:</label>
                <input type="number" name="minplayers" min="3"/>
            </div>
            <div><p><?php echo "The cost of creating the competition is: " ?></p></div>


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
                    costdivin.value = "0"
                } else {
                    costdiv.style.display="block";
                    costdivin.value = "0"
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