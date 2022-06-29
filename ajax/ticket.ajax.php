<?php session_start();
include '../database/db_connector.php';

$user = $_SESSION['login'];
$ticket = $_POST['ticket'];
$ticket_content = $_POST['ticket-content'];

if (empty($ticket) || empty($ticket_content)) {
    echo '<span style="color:#F00;text-align:center;">Please fill ticket correctly!</span>';
} else {
    echo 'Sucessful!';
}
