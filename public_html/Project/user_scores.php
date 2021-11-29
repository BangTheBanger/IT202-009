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
$stmt = $db->prepare("SELECT score, CREATED FROM scores WHERE username = :username");
$scorelist = $stmt->execute([":username" => $username]);
var_dump($scorelist);
$scorelist = [];
$lastten = [];
for ($i = 0; $i < 10; $i++) {

}

?>