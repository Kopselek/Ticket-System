$(document).ready( function () {
    $(document).on('click', '#logout', function(e) {
        e.preventDefault();
        $.ajax( {
            type: 'POST',
            method: 'POST',
            url: '/Ajax/logout.ajax.php',
        });
        location.reload();
        return false;
    });
});