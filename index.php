<?php
require_once __DIR__ . "/Site/Util/HtmlElement.php";
require_once __DIR__ . "/Site/Util/Form.php";
require_once __DIR__ . "/Site/Util/Mist/Button.php";
require_once __DIR__ . "/Site/Util/Input/BaseInput.php";
require_once __DIR__ . "/Site/Util/Input/TextInput.php";
require_once __DIR__ . "/Site/Util/Input/PasswordInput.php";

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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ticket-Panel</title>
</head>

<body>
    <?php echo $form->render() ?>
</body>

</html>