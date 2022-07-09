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
    $(document).on('click', '#create-ticket', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'ticket.php',
            success: function (msg) { 
                document.body.innerHTML = msg;
            }
        });
        return false;
    });

    var blockSending = false;
    $(document).on('click', '#ticket-submit', function (e) {
        if(blockSending) { return false; }

        blockSending = true;
        e.preventDefault();
        var form = $('#form').serialize();
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: form,
            url: '/ajax/ticket.ajax.php',
            success: function(msg) {
                blockSending = false;
                $('#msg').html(msg);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                blockSending = false;
                $('#msg').html(
                    '<div class="alert alert-danger">Error. Try again. Error message: ' +
                        xhr.status +
                        ' - ' +
                        xhr.responseText +
                        '</div>'
                );
            },
        });
        return false;
    });
});