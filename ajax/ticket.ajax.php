<?php session_start();
include '../database/db_connector.php';

$user = $_SESSION['login'];
$ticket = $_POST['ticket'];
$ticket_content = $_POST['ticket-content'];

if (!isset($_SESSION["login"])) {
    header("Location:../");
}

if (empty($ticket) || empty($ticket_content)) {
    echo '<span style="color:#F00;text-align:center;">Please fill ticket correctly!</span>';
} else {
    $conn = new DBConnector();
    $conn->Connect();
    $conn->CreateTicket($user, $ticket, $ticket_content);
    $user_tickets = $conn->GetUserTickets($user);
    $conn->Disconnect();
}
