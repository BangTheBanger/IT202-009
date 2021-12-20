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
        $scorelistalltime = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->prepare("SELECT user_id, username, SUM(score) AS score FROM scores JOIN users ON scores.user_id = users.id WHERE scores.CREATED BETWEEN  DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 MONTH) AND CURRENT_TIMESTAMP GROUP BY user_id ORDER BY score DESC");
        $stmt->execute();
        $scorelistmonthly = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->prepare("SELECT user_id, username, SUM(score) AS score FROM scores JOIN users ON scores.user_id = users.id WHERE scores.CREATED BETWEEN  DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 7 DAY) AND CURRENT_TIMESTAMP GROUP BY user_id ORDER BY score DESC");
        $stmt->execute();
        $scorelistweekly  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //  $scorelist = [0 => ['user_id' => 36, 'username' => 'admin', 'score' => 101]];
        //  $data['score']
    //
    // Lifetime Pagination
        if ( !isset ($_GET['ltcursor']) ) { $cursor = 1; } 
        else                            { $cursor = $_GET['ltcursor']; }
        $itemperpage = 10;
        $offset      = $itemperpage*($cursor-1);
        $totalrows   = count($scorelistalltime);
        $pageamount  = ceil($totalrows / $itemperpage);
    //
    // Monthly Pagination
        if ( !isset ($_GET['mtcursor']) ) { $cursor = 1; } 
        else                            { $cursor = $_GET['mtcursor']; }
        $itemperpage = 10;
        $offset      = $itemperpage*($cursor-1);
        $totalrows   = count($scorelistmonthly);
        $pageamount  = ceil($totalrows / $itemperpage);
    //
    // Weekly Pagination
        if ( !isset ($_GET['wkcursor']) ) { $cursor = 1; } 
        else                            { $cursor = $_GET['wkcursor']; }
        $itemperpage = 10;
        $offset      = $itemperpage*($cursor-1);
        $totalrows   = count($scorelistweekly);
        $pageamount  = ceil($totalrows / $itemperpage);
    //
?>
<style>
    * {
            box-sizing: border-box;
    }
    .column {
        float: left;
        width: 33%;
        padding: 10px;
        text-align: center;
    }
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    .title {
        text-align: center;
    }
</style>

<body>
    <div class="row">
        <div class="column" id="lifetimeboard">
            <table style="width:auto" id = "LifetimeLeaderboard">
                <?php if (count($scorelistalltime) > 0) : ?>
                    <h1 class = "title">Lifetime High Scores</h1>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Total Score</th>
                    </tr>
                <?php endif; ?>
                <?php if (count($scorelistalltime) > 10) : ?>
                    <?php if (isset ($_GET['ltcursor'])) {$cursor = $_GET['ltcursor'];} else {$cursor = 1;} ?>
                    <?php for ($pageindex = 1; $pageindex <= 10; $pageindex++) : ?>
                        <?php if ($cursor == $pageindex) : ?>
                            <?php 
                                if(($pagetotal*($cursor-1)) == 0) {
                                    $currentpagetotal = 10;
                                } else {
                                    $currentpagetotal = count($scorelistalltime)-($pagetotal*($cursor-1));
                                }
                            ?>
                            <? foreach ($scorelistalltime as $user => $data) : ?>
                                <tr <?php if($data['user_id'] == get_user_id()) {echo "class='highlight'";} ?>>
                                    <td><?php echo "<a href = 'profile.php?id=". $data['user_id'] . "'>". $data['user_id'] . "</a>" ?></td>
                                    <td><?php se($data, "username") ?></td>
                                    <td><?php se($data, "score") ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php for($cursor = 1; $cursor <= $pageamount; $cursor++) : ?>
                        <a class="cursoranchor" href = <?php echo "home.php?cursor=" . $cursor ?>>Page <?php se($cursor)?></a>
                    <?php endfor; ?>



                <?php elseif (count($scorelistalltime) <= 10) : ?>
                    <?php foreach ($scorelistalltime as $user => $data) : ?>
                        <tr <?php if($data['user_id'] == get_user_id()) {echo "class='highlight'";} ?>>
                            <td><?php echo "<a href = 'profile.php?id=". $data['user_id'] . "'>". $data['user_id'] . "</a>" ?></td>
                            <td><?php se($data, "username") ?></td>
                            <td><?php se($data, "score") ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <td>No Results to Show</td>
                <?php endif; ?>
            </table>
        </div>
        <div class="column" id="monthlyboard">
            <table style="width:auto" id = "MonthlyLeaderboard">
                <?php if (count($scorelistmonthly) > 0) : ?>
                    <h1 class = "title">Monthly High Scores</h1>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Total Score</th>
                    </tr>
                <?php endif; ?>
                <?php if (count($scorelistmonthly) > 10) : ?>
                    <?php if (isset ($_GET['mtcursor'])) {$cursor = $_GET['mtcursor'];} else {$cursor = 1;} ?>
                    <?php for ($pageindex = 1; $pageindex <= 10; $pageindex++) : ?>
                        <?php if ($cursor == $pageindex) : ?>
                            <?php 
                                if(($pagetotal*($cursor-1)) == 0) {
                                    $currentpagetotal = 10;
                                } else {
                                    $currentpagetotal = count($scorelistmonthly)-($pagetotal*($cursor-1));
                                }
                            ?>
                            <? foreach ($scorelistmonthly as $user => $data) : ?>
                                <tr <?php if($data['user_id'] == get_user_id()) {echo "class='highlight'";} ?>>
                                    <td><?php echo "<a href = 'profile.php?id=". $data['user_id'] . "'>". $data['user_id'] . "</a>" ?></td>
                                    <td><?php se($data, "username") ?></td>
                                    <td><?php se($data, "score") ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php for($cursor = 1; $cursor <= $pageamount; $cursor++) : ?>
                        <a class="cursoranchor" href = <?php echo "home.php?cursor=" . $cursor ?>>Page <?php se($cursor)?></a>
                    <?php endfor; ?>



                <?php elseif (count($scorelistmonthly) <= 10) : ?>
                    <?php foreach ($scorelistmonthly as $user => $data) : ?>
                        <tr <?php if($data['user_id'] == get_user_id()) {echo "class='highlight'";} ?>>
                            <td><?php echo "<a href = 'profile.php?id=". $data['user_id'] . "'>". $data['user_id'] . "</a>" ?></td>
                            <td><?php se($data, "username") ?></td>
                            <td><?php se($data, "score") ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <td>No Results to Show</td>
                <?php endif; ?>
            </table>
        </div>
        <div class="column" id="weeklyboard">
            <table style="width:auto" id = "WeeklyLeaderboard">
                <?php if (count($scorelistweekly) > 0) : ?>
                    <h1 class = "title">Weekly High Scores</h1>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Total Score</th>
                    </tr>
                <?php endif; ?>
                <?php if (count($scorelistweekly) > 10) : ?>
                    <?php if (isset ($_GET['wkcursor'])) {$cursor = $_GET['wkcursor'];} else {$cursor = 1;} ?>
                    <?php for ($pageindex = 1; $pageindex <= 10; $pageindex++) : ?>
                        <?php if ($cursor == $pageindex) : ?>
                            <?php 
                                if(($pagetotal*($cursor-1)) == 0) {
                                    $currentpagetotal = 10;
                                } else {
                                    $currentpagetotal = count($scorelistweekly)-($pagetotal*($cursor-1));
                                }
                            ?>
                            <? foreach ($scorelistweekly as $user => $data) : ?>
                                <tr <?php if($data['user_id'] == get_user_id()) {echo "class='highlight'";} ?>>
                                    <td><?php echo "<a href = 'profile.php?id=". $data['user_id'] . "'>". $data['user_id'] . "</a>" ?></td>
                                    <td><?php se($data, "username") ?></td>
                                    <td><?php se($data, "score") ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php for($cursor = 1; $cursor <= $pageamount; $cursor++) : ?>
                        <a class="cursoranchor" href = <?php echo "home.php?cursor=" . $cursor ?>>Page <?php se($cursor)?></a>
                    <?php endfor; ?>



                <?php elseif (count($scorelistweekly) <= 10) : ?>
                    <?php foreach ($scorelistweekly as $user => $data) : ?>
                        <tr <?php if($data['user_id'] == get_user_id()) {echo "class='highlight'";} ?>>
                            <td><?php echo "<a href = 'profile.php?id=". $data['user_id'] . "'>". $data['user_id'] . "</a>" ?></td>
                            <td><?php se($data, "username") ?></td>
                            <td><?php se($data, "score") ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <td>No Results to Show</td>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>




<?php
require(__DIR__ . "/../../partials/flash.php");
?>