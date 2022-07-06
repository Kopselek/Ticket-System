$(document).ready(function () {
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
                if(msg == 'Sucessful!'){
                    $('#ticket').val('');
                    $('#ticket-content').val('');
                }
                $.ajax({
                    type: 'POST',
                    method: 'POST',
                    url: '/ajax/ticket_list.ajax.php',
                    success: function (msg) { 
                        $('#tickets').html(msg);
                    }
                });
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
    $.ajax({
        type: 'POST',
        method: 'POST',
        url: '/ajax/ticket_list.ajax.php',
        success: function (msg) { 
            $('#tickets').html(msg);
        }
    });
});