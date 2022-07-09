<?php
include __DIR__ . "/Config/Autoloader.php";

$site = new CreateTicketSite();

?>

<body>
    <?php echo (isset($site) && $site instanceof BaseSite) ? $site->render_site() : failed_render_site(); ?>
</body>

<?php function failed_render_site(): string
{
    return 'Failed to Load Site!';
}
?>