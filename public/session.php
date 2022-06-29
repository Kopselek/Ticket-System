<?php session_start();  ?>


<html>

<head>
    <meta charset="UTF-8" />
    <title> Ticket Panel </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script language="javascript" src="session.js" type="text/javascript"></script>
</head>

<body>

    <?php
    if (!isset($_SESSION["login"])) {
        header("Location:../");
    } else {
        echo "<h1>Welcome {$_SESSION["login"]}</h1> create new ticket here!";
    }
    ?>
    <br>
    <form id="form" method="POST" action="">
        <input type="text" name="ticket" id="ticket" placeholder="Ticket title" require>
        <br>
        <textarea rows="4" cols="50" name="ticket-content" id="ticket-content" form="form" placeholder="Ticket message" require></textarea>
        <br>
        <button id="ticket-submit">Submit</button>
    </form>
    <div id="msg"></div>
</body>

</html>