$(document).ready(function () {
    $(document).on('click', '#ticket-submit', function (e) {  
        e.preventDefault();
        var form = $('#form').serialize();
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: form,
            url: '/ajax/ticket.ajax.php',
            success: function(msg) {
                $('#msg').html(msg);
                if(msg == 'Sucessful!'){
                    $('#ticket').val('');
                    $('#ticket-content').val('');
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
        $.ajax({
            type: 'POST',
            method: 'POST',
            url: '/ajax/ticket_list.ajax.php',
            success: function (msg) { 
                $('#tickets').html(msg);
            }
        });
        return false;
    });
});