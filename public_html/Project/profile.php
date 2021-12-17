<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    if (!is_logged_in()) {
        die(header("Location: login.php"));
    }
    
    $db = getDB();

    if($_GET) {
        $pageuserid = $_GET['id'];
        $isOwner = false;
        //Point update >
            $update = $db->prepare("UPDATE users SET points = (SELECT IFNULL(SUM(pointchange), 0) FROM pointhistory WHERE user_id = :uid) WHERE id = :uid");
            $update->execute([":uid" => $pageuserid]);
        //
        //Score history update >
            $stmt = $db->prepare("SELECT score, CREATED FROM scores WHERE user_id = :username ORDER BY CREATED DESC");
            $stmt->execute([":username" => $pageuserid]);
            $scorelist = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //
        $fetchuser = $db->prepare("SELECT id, username, email, points, public FROM users WHERE id = :uid LIMIT 1");
        $fetchuser->execute([":uid" => $pageuserid]);
        $user = $fetchuser->fetch(PDO::FETCH_ASSOC);
    } else {
        $username = get_user_id();
        $isOwner = true;
        $email = get_user_email();
        $userid = get_user_id();
        //Point UPDATE >
            $update = $db->prepare("UPDATE users SET points = (SELECT IFNULL(SUM(pointchange), 0) FROM pointhistory WHERE user_id = :uid) WHERE id = :uid");
            $update->execute([":uid" => $username]);
        //
        //Score history SELECT >
            $stmt = $db->prepare("SELECT score, CREATED FROM scores WHERE user_id = :username ORDER BY CREATED DESC");
            $stmt->execute([":username" => $username]);
            $scorelist = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //
        //Comp history SELECT >
            $stmt = $db->prepare("SELECT competitions.id, name, expiration FROM competitions JOIN competitionparticipants 
                                    ON competitions.id = competitionparticipants.comp_id WHERE user_id = :username");
            //
            $stmt->execute([":username" => $username]);
            $complist = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //
        $fetchowner = $db->prepare("SELECT id, email, username, points, public from users where id = :id LIMIT 1");
        $fetchowner->execute([":id" => get_user_id()]);
        $user = $fetchowner->fetch(PDO::FETCH_ASSOC);
        //Saving form data for user data
            if (isset($_POST["save"])) {
                $email = se($_POST, "email", null, false);
                $username = se($_POST, "username", null, false);
        
                $params = [":email" => $email, ":username" => $username, ":id" => get_user_id()];
                $db = getDB();
                $stmt = $db->prepare("UPDATE users set email = :email, username = :username where id = :id");
                try {
                    $stmt->execute($params);
                } catch (Exception $e) {
                    if ($e->errorInfo[1] === 1062) {
                        //https://www.php.net/manual/en/function.preg-match.php
                        preg_match("/users.(\w+)/", $e->errorInfo[2], $matches);
                        if (isset($matches[1])) {
                            flash("The chosen " . $matches[1] . " is not available.", "warning");
                        } else {
                            //TOD0 come up with a nice error message
                            echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                        }
                    } else {
                        //TOD0 come up with a nice error message
                        echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                    }
                }
                //select fresh data from table
                try {
                    if ($user) {
                        //$_SESSION["user"] = $user;
                        $_SESSION["user"]["email"] = $user["email"];
                        $_SESSION["user"]["username"] = $user["username"];
                    } else {
                        flash("User doesn't exist", "danger");
                    }
                } catch (Exception $e) {
                    flash("An unexpected error occurred, please try again", "danger");
                    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
        
        
                //check/update password
                $current_password = se($_POST, "currentPassword", null, false);
                $new_password = se($_POST, "newPassword", null, false);
                $confirm_password = se($_POST, "confirmPassword", null, false);
                if (!empty($current_password)) {
                    if (!empty($new_password) && !empty($confirm_password)) {
                        if ($new_password === $confirm_password) {
                            //TOD0 validate current
                            $stmt = $db->prepare("SELECT password from users where id = :id");
                            try {
                                $stmt->execute([":id" => get_user_id()]);
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                if (isset($result["password"])) {
                                    if (password_verify($current_password, $result["password"])) {
                                        $query = "UPDATE users set password = :password where id = :id";
                                        $stmt = $db->prepare($query);
                                        $stmt->execute([
                                            ":id" => get_user_id(),
                                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                                        ]);
        
                                        flash("Password reset", "success");
                                    } else {
                                        flash("Current password is invalid", "warning");
                                    }
                                }
                            } catch (Exception $e) {
                                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                            }
                        } else {
                            flash("New passwords don't match", "warning");
                        }
                    }
                } else {
                    flash("Please type your current password", "warning");
                }
            }
        //
        //Switch user public status
            try{
                if ( isset($_POST["publicize"]) ) {
                    if ($user['public'] == 0) {
                        $publicstatusswitch = $db->prepare("UPDATE users SET public = (true) WHERE id = :uid");
                        $publicstatusswitch->execute([":uid" => get_user_id()]);
                    } else {
                        $publicstatusswitch = $db->prepare("UPDATE users SET public = (false) WHERE id = :uid");
                        $publicstatusswitch->execute([":uid" => get_user_id()]);
                    }
                    die(header("Location: profile.php"));
                }
            } catch (Exception $e) {
                
            }
        //
    }

    // var dump $scorelist
        /*
            var_dump($scorelist);
            echo "<br>";
            var_dump($scorelist[0]["score"]);
        */
    //
?>

<style>
    p {
        margin-top: 20px;
        text-align: center;
    }
    h1 {
        margin-top: 20px;
        text-align: center;
    }
    * {
        box-sizing: border-box;
    }
    .column {
        float: center;
        width: 50%;
        padding: 10px;
    }
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<?php if ($isOwner) : ?>
    <title><?php echo $user['username']; ?>'s Profile</title>
    <h1><?php echo $user['username']; ?>'s Profile</h1>
    <form method="POST" onsubmit="return validate(this);">
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php se($email); ?>" />
        </div>
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php se(get_username()); ?>" />
        </div>
        <!-- DO NOT PRELOAD PASSWORD -->
        <div>Password Reset</div>
        <div class="mb-3">
            <label for="cp">Current Password</label>
            <input type="password" name="currentPassword" id="cp" />
        </div>
        <div class="mb-3">
            <label for="np">New Password</label>
            <input type="password" name="newPassword" id="np" />
        </div>
        <div class="mb-3">
            <label for="conp">Confirm Password</label>
            <input type="password" name="confirmPassword" id="conp" />
        </div>
        <input type="submit" value="Update Profile" name="save" />
    </form>
    <form method="POST" onsubmit="return validate(this);">
        <p>Your current profile status is: <?php if($user['public'] == 0) {echo "Private";} else {echo "Public";} ?></p>
        <input type="submit" value="Change Profile Publicity Status" name="publicize" />
    </form>
    <?php echo  "<p>Your Total Points: ", $user['points'] . "</p>"; ?>

    <script>
        function validate(form) {
            let pw = form.newPassword.value;
            let con = form.confirmPassword.value;
            let isValid = true;
            //TOD0 add other client side validation....

            //example of using flash via javascript
            //find the flash container, create a new element, appendChild
            if (pw !== con) {
                //find the container
                let flash = document.getElementById("flash");
                //create a div (or whatever wrapper we want)
                let outerDiv = document.createElement("div");
                outerDiv.className = "row justify-content-center";
                let innerDiv = document.createElement("div");

                //apply the CSS (these are bootstrap classes which we'll learn later)
                innerDiv.className = "alert alert-warning";
                //set the content
                innerDiv.innerText = "Password and Confirm password must match";

                outerDiv.appendChild(innerDiv);
                //add the element to the DOM (if we don't it merely exists in memory)
                flash.appendChild(outerDiv);
                isValid = false;
            }
            return isValid;
        }
    </script>

    <div class="row">
        <div class="column" id="scorehist">
            <h3 class="tableh">Score History</h3>
            <table style="width:33%">
                <tr>
                    <th>Scores</th>
                    <th>Time</th>
                </tr>
                <?php 
                    if (count($scorelist) > 10) {
                        for ($i = 0; $i < 10; $i++) {
                            $score = $scorelist[$i]["score"];
                            $time = $scorelist[$i]["CREATED"];
                            
                            echo '<tr>';
                            echo '<td>'. $score .'</td>';
                            echo '<td>'. $time .'</td>';
                            echo '</tr>';
                        }
                    }
                    
                    else if (count($scorelist) > 0) {
                        for ($i = 0; $i < count($scorelist); $i++) {
                            $score = $scorelist[$i]["score"];
                            $time = $scorelist[$i]["CREATED"];

                            echo '<tr>';
                            echo '<td>'. $score .'</td>';
                            echo '<td>'. $time .'</td>';
                            echo '</tr>';
                        }
                    }
                
                ?>
            </table>
        </div>

        <div class="column" id="comphist">
            <h3>Competition History</h3>
            <table style="width:33%">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Expiration</th>
                </tr>
                <?php 
                    if (count($complist) > 10) {
                        for ($i = 0; $i < 10; $i++) {
                            $compid = $complist[$i]["id"];
                            $compname = $complist[$i]["name"];
                            $compexpiration = $complist[$i]["expiration"];
                            
                            echo '<tr>';
                            echo '<td>'. $compid .'</td>';
                            echo '<td>'. $compname .'</td>';
                            echo '<td>'. $compexpiration .'</td>';
                            echo '</tr>';
                        }
                    }
                    
                    else if (count($complist) > 0) {
                        for ($i = 0; $i < count($complist); $i++) {
                            $compid = $complist[$i]["id"];
                            $compname = $complist[$i]["name"];
                            $compexpiration = $complist[$i]["expiration"];
                            
                            echo '<tr>';
                            echo '<td>'. $compid .'</td>';
                            echo '<td>'. $compname .'</td>';
                            echo '<td>'. $compexpiration .'</td>';
                            echo '</tr>';
                        }
                    }
                
                ?>
            </table>
        </div>

    </div>
<?php endif; ?>

<?php if (!$isOwner) : ?>
    <?php 
    ?>
    <?php 
    if($user['public'] == 0) {
        echo "<h1>This profile is not public.</h1>";
    } else {
        echo "<h2>", $user['username'], "'s Profile</h2>";
        echo  "<p>Total Points: ", $user['points'] . "</p>";

    }
    ?>


    <?php if ($user['public'] == 1) : ?>
        <table style="width:33%">
            <tr>
                <th>Scores</th>
                <th>Time</th>
            </tr>
            <?php 
                if (count($scorelist) > 10) {
                    for ($i = 0; $i < 10; $i++) {
                        $score = $scorelist[$i]["score"];
                        $time = $scorelist[$i]["CREATED"];
                        
                        echo '<tr>';
                        echo '<td>'. $score .'</td>';
                        echo '<td>'. $time .'</td>';
                        echo '</tr>';
                    }
                }
                
                else if (count($scorelist) > 0) {
                    for ($i = 0; $i < count($scorelist); $i++) {
                        $score = $scorelist[$i]["score"];
                        $time = $scorelist[$i]["CREATED"];

                        echo '<tr>';
                        echo '<td>'. $score .'</td>';
                        echo '<td>'. $time .'</td>';
                        echo '</tr>';
                    }
                }
            ?>
        </table>
    <?php endif; ?>
<?php endif; ?>

<?php
    require_once(__DIR__ . "/../../partials/flash.php");
?>