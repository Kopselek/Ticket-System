<?php session_start();  ?>


<html>

<head>
    <title> Ticket Panel </title>
</head>

<body>
    <?php
    if (!isset($_SESSION["login"])) {
        header("Location:../");
    } else {
        echo "Welcome " . $_SESSION["login"];
    }
    ?>

</body>

</html>