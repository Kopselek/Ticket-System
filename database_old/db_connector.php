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
    private $database_ticket_table = "tickets";

    private $sql_user = "user";
    private $sql_password = "password";
    private $sql_email = "email";

    private $ticket_ticketid = "ticket_id";
    private $ticket_ownuser = "own_user";
    private $ticket_id = "id";
    private $ticket_user = "user";
    private $ticket_title = "title";
    private $ticket_message = "message";
    private $ticket_date = "date";

    private $permission = "admin";

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
        $login = $this->RealEscapeString($login);
        $password = $this->RealEscapeString($password);

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
        $login = $this->RealEscapeString($login);

        $sql = "SELECT * FROM `{$this->database_table}` WHERE `{$this->sql_user}` = '{$login}';";
        $result = $this->conn->query($sql);
        if ($result->fetch_array()) {
            return true;
        }
        return false;
    }

    function CreateUser($login, $password, $email)
    {
        $login = $this->RealEscapeString($login);
        $password = $this->RealEscapeString($password);
        $email = $this->RealEscapeString($email);

        $sql = "INSERT INTO `{$this->database_table}` (`{$this->sql_user}`, `{$this->sql_password}`, `{$this->sql_email}`) VALUES ('{$login}', '$password', '$email');";
        if ($this->conn->query($sql)) {
            echo "Registration complete! " . "<a href='../'> Please Log in!</a>";
        } else {
            echo "Registration error";
        }
    }

    function CreateTicket($user, $title, $message)
    {
        $user = $this->RealEscapeString($user);
        $title = $this->RealEscapeString($title);
        $message = $this->RealEscapeString($message);

        $get_ticket = "MAX(`{$this->ticket_ticketid}`)";
        $sql = "SELECT {$get_ticket} FROM `{$this->database_ticket_table}`;";
        $result = $this->conn->query($sql);
        $ticket_new = 1 + $result->fetch_assoc()[$get_ticket];
        $ticket_message = $this->CreateTicketMessage($ticket_new, $user, 0, $user, $title, $message);
        if ($ticket_message) {
            echo "Correctly created ticket!";
            return $ticket_new;
        }
    }

    function CreateTicketMessage($ticket_id, $own_user, $id, $user, $title, $message)
    {
        $ticket_id = $this->RealEscapeString($ticket_id);
        $own_user = $this->RealEscapeString($own_user);
        $id = $this->RealEscapeString($id);
        $user = $this->RealEscapeString($user);
        $title = $this->RealEscapeString($title);
        $message = $this->RealEscapeString($message);

        $sql = "INSERT INTO `{$this->database_ticket_table}` (`{$this->ticket_ticketid}`, `{$this->ticket_ownuser}`, `{$this->ticket_id}`, `{$this->ticket_user}`, `{$this->ticket_title}`, `{$this->ticket_message}`, `{$this->ticket_date}`) 
        VALUES ('{$ticket_id}', '{$own_user}', '{$id}', '{$user}', '{$title}', '{$message}', current_timestamp());";
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }

    function GetUserTickets($user)
    {
        $user = $this->RealEscapeString($user);

        $sql = "";
        if ($this->UserIsAdmin($user)) {
            $sql = "SELECT * FROM {$this->database_ticket_table};";
        } else {
            $sql = "SELECT `{$this->ticket_ticketid}` FROM `{$this->database_ticket_table}` WHERE `{$this->ticket_ownuser}` = '{$user}';";
        }
        $result = $this->conn->query($sql);
        if ($result->fetch_array()) {
            return $result->fetch_all();
        }
        return null;
    }

    function GetTicket($id)
    {
        $id = $this->RealEscapeString($id);

        $sql = "SELECT * FROM `{$this->database_ticket_table}` WHERE `{$this->ticket_ticketid}` = {$id};";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function UserHavePermissionToTicket($user, $id)
    {
        $user = $this->RealEscapeString($user);
        $id = $this->RealEscapeString($id);

        if ($this->UserIsAdmin($user)) {
            return true;
        }
        $sql = "SELECT * FROM `{$this->database_ticket_table}` WHERE `{$this->ticket_ownuser}` = '{$user}' AND `{$this->ticket_ticketid}` = {$id};";
        $result = $this->conn->query($sql);
        if ($result->fetch_array()) {
            return true;
        }
        return false;
    }
    function UserIsAdmin($user)
    {
        $user = $this->RealEscapeString($user);

        $sql = "SELECT * FROM `{$this->database_table}` WHERE `{$this->sql_user}` = '{$user}' AND `{$this->permission}` = 1;";
        $result = $this->conn->query($sql);
        if ($result->fetch_array()) {
            return true;
        }
        return false;
    }

    function IsPasswordMatching($login, $password)
    {
        $login = $this->RealEscapeString($login);
        $password = $this->RealEscapeString($password);

        $sql = "SELECT * FROM `{$this->database_table}` WHERE `{$this->sql_user}` = '{$login}' AND `{$this->sql_password}` = '{$password}';";
        $result = $this->conn->query($sql);
        if ($result->fetch_array()) {
            return true;
        }
        return false;
    }

    private function RealEscapeString($variable)
    {
        return $this->conn->real_escape_string($variable);
    }
}
