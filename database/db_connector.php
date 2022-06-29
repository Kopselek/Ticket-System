<?php

$dbhost = "localhost";
$dbuser = "root";

class DBConnector
{
    //config
    private $host = "localhost";
    private $user = "root";
    private $password = "/lJtBN!GiIO8I[gh";

    private $database = "tsdb";
    private $database_table = "users";

    private $sql_user = "user";
    private $sql_password = "password";

    private $conn;

    function Connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    function Disconnect()
    {
        $this->conn->close();
    }

    function TryLoginUser($login, $password)
    {
        $user_exist = $this->IsUserInDatabase($login);
        if (!$user_exist) {
            echo "User does not exist! Please register first.";
            return;
        }

        $password_matches = $this->IsPasswordMatching($login, $password);
        if (!$password_matches) {
            echo "Login or Password does not match.";
            return;
        }

        return true;
    }

    function IsUserInDatabase($login)
    {
        $sql = "SELECT * FROM `{$this->database_table}` WHERE `{$this->sql_user}` = '{$login}';";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    function CreateUser($login, $password, $email)
    {
        $sql = "INSERT INTO `users` (`user`, `password`, `email`) VALUES ('{$login}', '$password', '$email');";
        if ($this->conn->query($sql)) {
            echo "Registration complete! " . "<a href='../'> Please Log in!</a>";
        } else {
            echo "Registration error";
        }
    }

    function CreateTicket($user, $title, $message)
    {
        $sql = "INSERT INTO `tickets` (`id`, `user`, `title`, `message`, `date`) VALUES (NULL, '{$user}', '{$title}', '{$message}', current_timestamp())";
        if ($this->conn->query($sql)) {
            echo "Sucessful!";
        } else {
            echo "Sending Ticket error";
        }
    }

    private function IsPasswordMatching($login, $password)
    {
        $sql = "SELECT * FROM `{$this->database_table}` WHERE `{$this->sql_user}` = '{$login}' AND `{$this->sql_password}` = '{$password}';";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }
}
