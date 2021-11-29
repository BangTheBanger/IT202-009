
<?php 
require(__DIR__ . "/../../partials/nav.php");

$score = se($_POST, "data", null, false);
// var_dump ($score);
// var_dump ($username);

if (is_logged_in()) {
    $username = get_username();
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO scores (username, score) VALUES(:username, :score)");
    if ($score > 0) {
        $stmt->execute([":username" => $username, ":score" => $score]);
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Breakout!</title>
</head>

<form method="post" name="scoresubmit" method="post" action="game.php">
  <input type="hidden" name="data" value="">
  <input type="submit" name="send" value="submit" id="scoresubmit">
</form>

<body>
    <div> <?php //TODO: One of the divs around Canvas are where I will put the scores ?>

    </div>
    
    <canvas id="canvas"></canvas>

    <div>
    <table style="width:33%">
        <tr>
            <th>User</th>
            <th>Scores</th>
        </tr>
    </table>
    </div>
    <script src="breakout.js"></script>
</body>
<?php 
function dailyScores() {
    $db = getDB();
    $username = get_username();
    $stmt = $db->prepare("SELECT score, username FROM scores WHERE CREATED <= CURRENT_TIMESTAMP AND CREATED > CURRENT_TIMESTAMP - interval 1 WEEK ORDER BY score DESC");
    $stmt->execute([":username" => $username]);
    $scorelist = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($scorelist) <= 0) {
        echo "<p>There are no weekly scores to show.</p>";

    } else if (count($scorelist) > 10) {
        for ($i = 0; $i < 10; $i++) {
            $username = $scorelist[$i]["username"];
            $score = $scorelist[$i]["score"];
            
            echo '<tr>';
            echo '<td>'. $username .'</td>';
            echo '<td>'. $score .'</td>';
            echo '</tr>';
        }
    } else {
        for ($i = 0; $i < 10; $i++) {
            $username = $scorelist[$i]["username"];
            $score = $scorelist[$i]["score"];
            
            echo '<tr>';
            echo '<td>'. $username .'</td>';
            echo '<td>'. $score .'</td>';
            echo '</tr>';
        }
    }
}
function monthlyScores() {
    $db = getDB();
    $username = get_username();
    $stmt = $db->prepare("SELECT score, username FROM scores WHERE CREATED <= CURRENT_TIMESTAMP AND CREATED > CURRENT_TIMESTAMP - interval 1 MONTH ORDER BY score DESC");
    $stmt->execute([":username" => $username]);
    $scorelist = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($scorelist) <= 0) {
        echo "<p>There are no monthly scores to show.</p>";

    } else if (count($scorelist) > 10) {
        for ($i = 0; $i < 10; $i++) {
            $username = $scorelist[$i]["username"];
            $score = $scorelist[$i]["score"];
            
            echo '<tr>';
            echo '<td>'. $username .'</td>';
            echo '<td>'. $score .'</td>';
            echo '</tr>';
        }
    } else {
        for ($i = 0; $i < 10; $i++) {
            $username = $scorelist[$i]["username"];
            $score = $scorelist[$i]["score"];
            
            echo '<tr>';
            echo '<td>'. $username .'</td>';
            echo '<td>'. $score .'</td>';
            echo '</tr>';
        }
    }
}
function allScores() {
    $db = getDB();
    $username = get_username();
    $stmt = $db->prepare("SELECT score, username FROM scores ORDER BY score DESC");
    $stmt->execute([":username" => $username]);
    $scorelist = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($scorelist) <= 0) {
        echo "<p>There are no scores to show.</p>";

    } else if (count($scorelist) > 10) {
        for ($i = 0; $i < 10; $i++) {
            $username = $scorelist[$i]["username"];
            $score = $scorelist[$i]["score"];
            
            echo '<tr>';
            echo '<td>'. $username .'</td>';
            echo '<td>'. $score .'</td>';
            echo '</tr>';
        }
    } else {
        for ($i = 0; $i < 10; $i++) {
            $username = $scorelist[$i]["username"];
            $score = $scorelist[$i]["score"];
            
            echo '<tr>';
            echo '<td>'. $username .'</td>';
            echo '<td>'. $score .'</td>';
            echo '</tr>';
        }
    }
}



?>