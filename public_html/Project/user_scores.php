<?php require(__DIR__ . "/../../partials/nav.php");?>
<head>
    <title>Latest Scores</title>
</head>

<?php
/*
$stmt = $db->prepare("INSERT INTO scores (username, score) VALUES(:username, :score)");
$stmt->execute([":username" => $username, ":score" => $score]);
*/
$db = getDB();
$username = get_username();
$stmt = $db->prepare("SELECT FROM scores (username, score) WHERE username IS $username");
$stmt->execute();
var_dump($stmt);
$scorelist = [];
$lastten = [];
for ($i = 0; $i < 10; $i++) {

}

?>