<?php session_start();
include '../database/db_connector.php';

$user = $_SESSION['login'];
$id = $_POST['ticket-id'];
$ticket_content = $_POST['ticket-content'];

if (!isset($_SESSION["login"])) {
    header("Location:../");
}

if (empty($ticket_content)) {
    echo '<span style="color:#F00;text-align:center;">Please fill ticket correctly!</span>';
} else {
    $conn = new DBConnector();
    $conn->Connect();
    $ticket = $conn->GetTicket($id);
    $owner = $ticket[0]["own_user"];
    $title = $ticket[0]["title"];
    $conn->CreateTicketMessage($id, $owner, 0, $user, $title, $ticket_content);
    $conn->Disconnect();
    echo "Sucessful!";
}
