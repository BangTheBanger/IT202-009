<?php
require(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) { die(header("Location: login.php")); }
$db = getDB();
?>
<title>Homepage</title>
<h1>Home</h1>
<?php
if (is_logged_in()) {
    echo "Welcome home, " . get_username();
    //comment this out if you don't want to see the session variables
    //echo "<pre>" . var_export($_SESSION, true) . "</pre>";
}

// Fetching score data
    $stmt = $db->prepare("SELECT user_id, username, SUM(score) AS score FROM scores JOIN users ON scores.user_id = users.id GROUP BY user_id ORDER BY score DESC");
    $stmt->execute();
    $scorelist = $stmt->fetchAll(PDO::FETCH_ASSOC);
//

?>




<?php
require(__DIR__ . "/../../partials/flash.php");
?>