<?php session_start();
unset($_SESSION["login"]);
session_destroy();
echo file_get_contents("public/index.html");
