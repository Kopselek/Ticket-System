$(document).ready(function () {
    $(document).on('click', '#login_checkbox', function (e) {
        e.preventDefault();
        var form = $('#form').serialize();
        $('#ajax-loader').show();
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: form,
            url: '/ajax/login.ajax.php',
            success: function (msg) {
                $('#ajax-loader').hide();
                $('#msg').html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#ajax-loader').hide();
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
    $(document).on('click', '#registration_checkbox', function (e) {
        var url = $(location).attr('href');
        $(location).attr('href', url + 'registration.html');
        return false;
    });

    $(document).on('click', '#register_checkbox', function (e) {
        e.preventDefault();
        var form = $('#form').serialize();
        $('#ajax-loader').show();
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: form,
            url: '/ajax/register.ajax.php',
            success: function (msg) {
                $('#ajax-loader').hide();
                $('#msg').html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#ajax-loader').hide();
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
