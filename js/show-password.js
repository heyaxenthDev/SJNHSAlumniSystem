    $('#togglePassword').click(function () {
        const passwordField = $('#yourPassword');
        const passwordFieldType = passwordField.attr('type');
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).html('<i class="bx bxs-hide"></i>');
        } else {
            passwordField.attr('type', 'password');
            $(this).html('<i class="bx bxs-show"></i>');
        }
    });