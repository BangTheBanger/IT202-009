
<?php 
require(__DIR__ . "/../../partials/nav.php");
/*
$score = se($_POST, "data", null, false);

if (is_logged_in()) {
    $username = get_username();
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO scores (username, score) VALUES(:username, :score)");
    $stmt->execute([":username" => $username, ":score" => $score]);
} else {
    $username = "Guest";
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO scores (username, score) VALUES(:username, :score)");
    $stmt->execute([":username" => $username, ":score" => $score]);
}*/
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Breakout!</title>
</head>

<form method="post" name="scoresubmit" method="post" action="game.php">
  <input type="hidden" name="data" value="">
  <input type="submit" name="send" value="submit">
</form>

<body>
    
    <canvas id="canvas"></canvas>
    <div class="high-score"></div>
    <script src="breakout.js"></script>
</body>
<?php 




?>