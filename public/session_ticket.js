$(document).ready(function () {
    var blockSending = false;
    $(document).on('click', '#ticket-submit', function (e) {  
        if(blockSending) { return; }
        blockSending = true;
        e.preventDefault();
        var form = $('#form').serialize();
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const ticket = urlParams.get('ticket');
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: `ticket-id=${ticket}&` + form,
            url: '/ajax/ticket_message.ajax.php',
            success: function(msg) {
                blockSending = false;
                if(msg == 'Sucessful!'){
                    $('#ticket-content').val('');
                    location.reload(true);
                }
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