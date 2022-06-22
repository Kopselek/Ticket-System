$(document).ready(function () {
    $(document).on('click', '#login_checkbox', function (e) {
        e.preventDefault();
        var form = $('#form').serialize();
        $('#ajax-loader').show();
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: form,
            url: '/ajax/rejestracja.ajax.php',
            success: function (msg) {
                $('#ajax-loader').hide();
                $('#msg').html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#ajax-loader').hide();
                $('#msg').html(
                    '<div class="alert alert-danger">Błąd. Spróbuj ponownie. Kod błędu: ' +
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
