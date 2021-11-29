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
<table style="width:33%">
  <tr>
    <th>Scores</th>
    <th>Time</th>
  </tr>
  <?php 
    if(count($scorelist) > 0){
        if (count($scorelist) > 10) {
            for ($i = 0; $i < 10; $i++) {
                $score = $scorelist[$i]["score"];
                $time = $scorelist[$i]["CREATED"];
                echo '<tr>';
                echo '<td>'. $score .'</td>';
                echo '<td>'. $time .'</td>';
                echo '</tr>';
            }
        } else {
            for ($i = 0; $i < count($scorelist); $i++) {
                $score = $scorelist[$i]["score"];
                $time = $scorelist[$i]["CREATED"];
                echo '<tr>';
                echo '<td>'. $score .'</td>';
                echo '<td>'. $time .'</td>';
                echo '</tr>';
            }
        }
        
    }
  
  ?>
</table>
</body>