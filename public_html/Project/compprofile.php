<?php
    require(__DIR__ . "/../../partials/nav.php");
    $db = getDB();

    if(isset($_GET['compid'])) {
        $compid = $_GET['compid'];
        $stmt = $db->prepare("SELECT * FROM competitions WHERE id = :compid LIMIT 1");
        $stmt->execute([":compid" => $compid]);
        $comp = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $db->prepare("SELECT user_id, username, SUM(score) AS score, MAX(scores.CREATED) as CREATED FROM scores JOIN users ON scores.user_id = users.id 
                            WHERE scores.CREATED BETWEEN 
                            (SELECT competitions.CREATED FROM competitions WHERE id = :compid) AND (SELECT competitions.expiration FROM competitions WHERE id = :compid) 
                            GROUP BY user_id ORDER BY score DESC"
        );
        $stmt->execute([":compid" => $compid]);
        $userlist = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {
        die(header("Location: comp.php"));
    }
?>
<style>
    h1.title { 
        text-align: center;
    }
</style>
<body>
    <h1><?php se($comp['name']) ?>'s Stats</h1>
    <h3>Competition was Created at: <?php se($comp['CREATED']) ?></h3>
    <h3>Competition <?php if($comp['paid_out'] == 1) {echo "Expired at: ";} else {echo "Expires at: ";} se($comp['expiration']); ?></h3>
    <h3>The Current Reward Totals at: <?php se($comp['current_reward']); ?></h3>
    <h3>The Fee to Join is: <?php se($comp['join_fee']); ?></h3>
    <h3>The Total Amount of Participants is: <?php se($comp['current_participants']); ?></h3>
    <table style="width:auto">
        <h1 class="title">The Top 10 Leaderboard</h1>
        <tr>
            <th>Position</th>
            <th>User ID</th>
            <th>Username</th>
            <th>Competition Total Score</th>
        </tr>

        <?php $position = 1; foreach($userlist as $user => $data) : ?>
            <tr <?php if($data['user_id'] == get_user_id()) {echo "class='highlight'";} ?>>
                <td><?php se($position); $position++;?></td>
                <td><?php echo "<a href = 'profile.php?id=". $data['user_id'] . "'>". $data['user_id'] . "</a>" ?></td>
                <td><?php se($data, "username") ?></td>
                <td><?php se($data, "score") ?></td>
            </tr>

        <?php endforeach; ?>


    </table>
</body>