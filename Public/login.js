$(document).ready(function () {
    $(document).on('click', '#login-checkbox', function (e) {
        e.preventDefault();
        var form = $('#form-login').serialize();
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: form,
            url: '/Ajax/login.ajax.php',
            success: function (msg) {
                $('#msg').html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
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
        $(location).attr('href', url + 'public/registration.html');
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
