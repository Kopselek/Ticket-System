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

foreach ($list as $ticket) {
    $html = $html . "<p>Ticket {$ticket[0]}</p><br>";
}

echo $html;
