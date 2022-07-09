$(document).ready(function () {
    $(document).on('click', '#login-checkbox', function (e) {
        e.preventDefault();
        var form = $('#form').serialize();
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: form,
            url: '/Ajax/login.ajax.php',
            success: function (msg) {
                $('#msg').html(msg);
                if(msg == 'logged') location.reload();
            },
            function (xhr, ajaxOptions, thrownError) {
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
    $(document).on('click', '#register-site-checkbox', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'register.php',
            success: function (msg) { 
                document.body.innerHTML = msg;
            }
        });
        return false;
    });

    $(document).on('click', '#register-checkbox', function (e) {
        e.preventDefault();
        var form = $('#form').serialize();
        $.ajax({
            type: 'POST',
            method: 'POST',
            data: form,
            url: '/ajax/register.ajax.php',
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
});