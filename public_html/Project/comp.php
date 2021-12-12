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
    if ($checkfree){
        flash("","");
        $hasError = true;
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
