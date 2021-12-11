<?php
require(__DIR__ . "/../../partials/nav.php");
/*
if (!is_logged_in()) {
    die(header("Location: login.php"));
}
*/


$email = se($_POST, "email", "", false);
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $password = se($_POST, "password", "", false);


    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    if (str_contains($email, "@")) {
        //sanitize
        $email = sanitize_email($email);
        //validate
        if (!is_valid_email($email)) {
            flash("Invalid email address", "warning");
            $hasError = true;
        }
    } else {
        if (!preg_match('/^[a-z0-9_-]{3,30}$/i', $email)) {
            flash("Username must only be alphanumeric and can only contain - or _", "warning");
            $hasError = true;
        }
    }
    if (empty($password)) {
        flash("password must not be empty", "warning");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password too short", "warning");
        $hasError = true;
    }
    if (!$hasError) {
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from users where email = :email OR username = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        flash("Welcome $email");
                        $_SESSION["user"] = $user;
                        //lookup potential roles
                        try {
                            $stmt = $db->prepare("SELECT roles.name FROM roles JOIN user_roles on roles.id = user_roles.role_id
                            where user_roles.user_id = :user_id and roles.is_active = 1 and user_roles.is_active = 1");
                            $stmt->execute([":user_id" => $user["id"]]);
                            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                            //save roles or empty array
                        } catch (Exception $e) {

                        }
                        die(header("Location: home.php"));
                    } else {
                        flash("Invalid password", "danger");
                    }
                } else {
                    flash("Account not found", "danger");
                }
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
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
                <label for="1reward">First Place Reward %:</label>
                <input type="text" name="1reward"/>
            </div>
            <div>
                <label for="2reward">Second Place Reward %:</label>
                <input type="text" name="2reward"/>
            </div>
            <div>
                <label for="3reward">Third Place Reward %:</label>
                <input type="text" name="3reward"/>
            </div>
            <div>
                <label for="checkfree">Check if you wish the tournament to be free to join</label>
                <input type="checkbox" id="isfree" name="checkfree" onclick="freeclick()"/>
                <div id="notfreecost">
                    <label for="compcost">Competition Cost:</label>
                    <input type="text" name="compcost"/>
                </div>
            </div>
            


            <input type="submit" value="Create" />
        </form>
        <script>
            function validate(form) {
                return true;
            }
            function freeclick() {
                var chkbox = document.getElementById("isfree")
                var costdiv = document.getElementById("notfreecost")
                if (chkbox.checked==true){
                    text.style.display="none";
                } else {
                    text.style.display="block";
                }
            }
        </script>

    </div>
    </div>

</body>
</html>
