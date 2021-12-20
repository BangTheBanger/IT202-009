<?php
    require(__DIR__ . "/../../partials/nav.php");
    $db = getDB();

    if(isset($_GET['compid'])) {
        $compid = $_GET['compid'];
        $stmt = $db->prepare("SELECT * FROM competitions WHERE id = :compid LIMIT 1");
        $stmt->execute([":compid" => $compid]);
        $comp = $stmt->fetch(PDO::FETCH_ASSOC);
        $compcreated = $comp['CREATED'];
        $compexp = $comp['expiration'];
        $stmt = $db->prepare("SELECT user_id, SUM(score) as score, MAX(CREATED) as CREATED FROM scores WHERE created BETWEEN :compc AND :compexp GROUP BY user_id");
        $stmt->execute([":compc" => $compcreated, ":compexp" => $compexp]);
        $userlist = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {
        die(header("Location: comp.php"));
    }
?>

<body>
    <h1><?php se($comp['name']) ?>'s Stats</h1>
    <h5>Competition was Created at: <?php se($compcreated) ?></h5>
    <h5>Competition <?php if($comp['paid_out'] == 1) {echo "Expired at: ";} else {echo "Expires at: ";} se($compexp); ?></h5>
    <h5>The Current Reward Totals at: <?php se($comp['current_reward']); ?></h5>
    <h5>The Fee to Join is: <?php se($comp['join_fee']); ?></h5>
    <h5>The Total Amount of Participants is: <?php se($comp['current_participants']); ?></h5>
    <table style="width:auto">
        <h1>The Top 10 Leaderboard</h1>
        <tr>
            <th>Position</th>
            <th>User ID</th>
            <th>Username</th>
            <th>Competition Total Score</th>
        </tr>

        <?php $position = 1; foreach($userlist as $user => $data) : ?>
            <tr>
                <td><?php se($position); $position++;?></td>
                <td><?php echo "<a href = 'profile.php?id='". $data['user_id'] . ">". $data['user_id'] . "</a>" ?></td>
                <td><?php se($data, "username") ?></td>
                <td><?php se($data, "score") ?></td>
            </tr>

        <?php endforeach; ?>


    </table>
</body>