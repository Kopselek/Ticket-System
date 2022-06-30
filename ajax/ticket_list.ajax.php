<?php session_start();
include '../database/db_connector.php';

$user = $_SESSION['login'];

if (!isset($_SESSION["login"])) {
    header("Location:../");
}

$html = "<h2>Your Tickets:</h2><br>";

$conn = new DBConnector();
$conn->Connect();

$list = $conn->GetUserTickets($user);
if (!is_null($list)) {
    foreach ($list as $ticket) {
        $html = $html . "<a href='?ticket={$ticket[0]}' >Ticket {$ticket[0]}</a><br>";
    }
}

echo $html;
