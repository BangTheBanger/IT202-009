<?php
require(__DIR__ . "/../../partials/nav.php");
/*
if (!is_logged_in()) {
    die(header("Location: login.php"));
}
*/
?>

<html>
<head>
    <style>
        * {
            box-sizing: border-box;
        }
        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>

    <div class="row">
    <div class="column">
        <h2>Existing Competitions</h2>
        <p>Comp 1</p>
    </div>
    <div class="column">
        <h2>Create a Competition</h2>
        <p>Params</p>
    </div>
    </div>

</body>
</html>
