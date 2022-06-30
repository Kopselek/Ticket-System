<?php session_start();
include '../database/db_connector.php';

if (!isset($_SESSION["login"])) {
    header("Location:../");
} else {
    if (isset($_GET["ticket"])) {
        $id = $_GET["ticket"];
        $conn = new DBConnector();
        $conn->Connect();
        $permission = $conn->UserHavePermissionToTicket($_SESSION["login"], $id);
        $conn->Disconnect();
        if ($permission) {
            OpenTicketHeader($id);
        } else {
            header("Location:../public/session.php");
        }
    } else {
        CreateTicketHeader();
    }
}

function OpenTicketHeader($id)
{
    echo "<h1>Ticket {$id}</h1><br>";
    $conn = new DBConnector();
    $conn->Connect();
    $tickets = $conn->GetTicket($id);
    $conn->Disconnect();
    $titule = $tickets[0]["title"];
    echo "<h2>Title: {$titule}</h2><br>";
    foreach ($tickets as $ticket) {
        CreateTicketMessage($ticket["user"], $ticket["date"], $ticket["message"]);
    }
    echo file_get_contents("session_ticket.html");
}

function CreateTicketMessage($user, $date, $message)
{
    echo "<div class='ticket'><h2>{$user} - {$date}<h2><textarea readonly>{$message}</textarea></div>";
}

function CreateTicketHeader()
{
    echo "<h1>Welcome {$_SESSION["login"]}</h1> create new ticket here!<br>";
    echo file_get_contents("session_create_ticket.html");
}
