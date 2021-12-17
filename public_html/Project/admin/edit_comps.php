<?php
    require(__DIR__ . "/../../../partials/nav.php");
    if (!has_role("admin")) {
        flash("You don't have permission to view this page", "warning");
        die(header("Location: $BASE_PATH" . "home.php"));
    }
    $db = getDB();
?>