<?php session_start();
include __DIR__ . "/Config/Autoloader.php";

$site = new LoginSite();
$js = 'index.js';
$conn;

if (isset($_SESSION["login"])) {
    $conn = new DBConnector();
    if (isset($_GET["ticket"])) {
        $site = new TicketSite($_SESSION["login"], $conn, $_GET["ticket"]);
        $js = 'ticket.js';
    } else {
        $site = new PanelSite($_SESSION["login"], $conn);
        $js = 'panel.js';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ticket-System showed me how php is fine">
    <meta name="author" content="Kopselek">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ticket-System</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script language="javascript" src="Public/<?php echo $js ?>" type="text/javascript"></script>
</head>

<body>
    <?php echo (isset($site) && $site instanceof BaseSite) ? $site->render_site() : failed_render_site(); ?>
</body>

</html>

<?php function failed_render_site(): string
{
    return 'Failed to Load Site!';
}
?>