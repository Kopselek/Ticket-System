<?php
include __DIR__ . "/Config/Autoloader.php";

$form = new Form();
$form->addElement(new TextInput('login', 'Login'));
$form->addElement(new PasswordInput('password', 'Password'));
$form->addElement(new Button('Submit'));

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
</head>

<body>
    <?php echo $form->render() ?>
</body>

</html>