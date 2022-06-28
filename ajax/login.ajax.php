<?php session_start();
include '../database/db_connector.php';

$login = $_POST['login'];
$password = $_POST['password'];

if (empty($login) || empty($password)) {
    echo '<span style="color:#F00;text-align:center;">Please fill login and password correctly!</span>';
} else {
    $conn = new DBConnector();
    $conn->Connect();
    $conn->TryLoginUser($login, $password);
    if ($conn) {
        $_SESSION["login"] = $login;
        echo '<script type="text/javascript"> window.open("../public/session.php","_self");</script>';
    }
}
