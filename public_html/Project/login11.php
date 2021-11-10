<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Problem 1</title>
    <meta charset="utf-8" />
    <style>
        
        body {
            background-color: rgb(9, 10, 15);
            color: rgb(136, 136, 136);
        }

        .form-center {
        	display:flex;
         	justify-content: center;
        }
    </style>
</head>

<body>
    <header>
        <h2>Login Page</h2>
    </header>
    
    <div class="form-center">
        <form method="post" autocomplete="on">
            <label for="uname">Username:</label><br>
            <input type="text" id="uname" name="uname"><br>
            <label for="pass">Password:</label><br>
            <input type="password" id="pass" name="pass"><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>

    <?php
        if (isset($_POST["submit"])) {
            login_procedure();
        };


        function random_str($value){
            return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',36)), 0, $value);
        }
        
        function login_procedure() {
            $account = ["id" => -1, "username", "password_hash"];
            $query = "SELECT id, uname, password FROM Users WHERE uname = :username AND password = password_hash LIMIT 1";
            $db = getDB();
            $stmt = $db->prepare($query);
            try {
                

            }
            catch (PDOException $e) {
                echo $e->getMessage;
            }
        }
    ?>