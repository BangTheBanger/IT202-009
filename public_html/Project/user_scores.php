<?php 
require(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    die(header("Location: login.php"));
}
?>
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
$stmt->execute([":username" => $username]);
$scorelist = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($scorelist);
echo "<br>";
var_dump($scorelist["score"]);

$lastten = [];
for ($i = 0; $i < 10; $i++) {

}

?>