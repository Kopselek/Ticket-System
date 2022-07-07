<?php
include __DIR__ . "/Config/Autoloader.php";

$form = new Form('form-login', "POST", '', 'msg');
$form->addElement(new TextInput('Login', 'login'));
$form->addElement(new PasswordInput('Password', 'password'));
$form->addElement(new Button('login-checkbox', 'Submit'));

//session_start();
// if (isset($_SESSION["login"])) {
//     //logged
// } else {
//     //unlogged
// }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ticket-System show me how php is fine">
    <meta name="author" content="Kopselek">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ticket-System</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script language="javascript" src="Public/login.js" type="text/javascript"></script>
</head>

<body>
    <?php echo $form->render() ?>
</body>

</html>