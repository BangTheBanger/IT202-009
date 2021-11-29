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
$stmt = $db->prepare("SELECT score, CREATED FROM scores WHERE username = :username ORDER BY CREATED DESC");
$stmt->execute([":username" => $username]);
$stmtbool = $stmt;
$scorelist = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*
var_dump($scorelist);
echo "<br>";
var_dump($scorelist[0]["score"]);
*/
?>

<body>
<table style="width:100%">
  <tr>
    <th>Scores</th>
    <th>Time</th>
  </tr>
  <?php 
    if(count($scorelist) > 0){
        for ($i = 0; $i < 10; $i++) {
            try {
                $score = $scorelist[$i]["score"];
                $time = $scorelist[$i]["CREATED"];
                echo '<tr>';
                echo '<td>'. $score .'</td>';
                echo '<td>'. $time .'</td>';
                echo '</tr>';
            } catch(Exception $e) {
            }
        }
    }
  
  ?>
</table>
</body>