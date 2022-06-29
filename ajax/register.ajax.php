<?php session_start();
include '../database/db_connector.php';


$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

if (empty($login) || empty($password) || empty($email)) {
    echo '<span style="color:#F00;text-align:center;">Please fill login, password and email correctly!</span>';
} else {
    $conn = new DBConnector();
    $conn->Connect();
    if ($conn->IsUserInDatabase($login)) {
        echo '<span style="color:#F00;text-align:center;">Username is taken!</span>';
    } else {
        $conn->CreateUser($login, $password, $email);
    }
    $conn->Disconnect();
}
