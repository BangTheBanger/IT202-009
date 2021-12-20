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
    //  $scorelist = [0 => ['user_id' => 36, 'username' => 'admin', 'score' => 101]];
    //  $data['score']
//
// Pagination
    if ( !isset ($_GET['cursor']) ) { $cursor = 1; } 
    else                            { $cursor = $_GET['cursor']; }
    $itemperpage = 10;
    $offset      = $itemperpage*($cursor-1);
    $totalrows   = count($scorelist);
    $pageamount  = ceil($totalrows / $itemperpage);

//
?>
<table style="width:auto">
    <?php if (count($scorelist) > 0) : ?>
        <h1>High Scores</h1>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Total Score</th>
        </tr>
    <?php endif; ?>
    <?php if (count($scorelist) > 10) : ?>
        <?php for ($pageindex = 1; $pageindex <= 10; $pageindex++) : ?>
            <?php if ($cursor == $pageindex) : ?>
                <?php 
                    if(($pagetotal*($cursor-1)) == 0) {
                        $currentpagetotal = 10;
                    } else {
                        $currentpagetotal = count($complist)-($pagetotal*($cursor-1));
                    }
                ?>
                <? foreach ($complist as $user => $data) : ?>
                    <td><?php echo "<a href = 'profile.php?id='". $data['user_id'] . ">". $data['user_id'] . "</a>" ?></td>
                    <td><?php se($data, "username") ?></td>
                    <td><?php se($data, "score") ?></td>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endfor; ?>
        <?php for($cursor = 1; $cursor <= $pageamount; $cursor++) : ?>
            <a class="cursoranchor" href = <?php echo "home.php?cursor=" . $cursor ?>>Page <?php se($cursor)?></a>
        <?php endfor; ?>



    <?php elseif (count($scorelist) <= 10) : ?>
        <?php foreach ($scorelist as $user => $data) : ?>
            <tr>
                <td><?php echo "<a href = 'profile.php?id=". $data['user_id'] . "'>". $data['user_id'] . "</a>" ?></td>
                <td><?php se($data, "username") ?></td>
                <td><?php se($data, "score") ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <td>No Results to Show</td>
    <?php endif; ?>
</table>





<?php
require(__DIR__ . "/../../partials/flash.php");
?>