$(document).ready(function () {
    $(document).on('click', '#ticket-submit', function (e) {  
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
                if(msg == 'Sucessful!'){
                    $('#ticket-content').val('');
                    location.reload(true);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
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