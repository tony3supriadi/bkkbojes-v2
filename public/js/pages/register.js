$(function () {
    $('#password')
        .on('focus', () => {
            $('.password_eyes .input-group-text').addClass('border-primary');
        })
        .on('focusout', () => {
            $('.password_eyes .input-group-text').removeClass('border-primary');
        });
    
    $('#password_confirmation')
        .on('focus', () => {
            $('.confirmation_eyes .input-group-text').addClass('border-primary');
        })
        .on('focusout', () => {
            $('.confirmation_eyes .input-group-text').removeClass('border-primary');
        });
    
    var showing = false;
    $('.password_eyes .input-group-text').on('click', () => {
        showing = !showing;
        if (showing) {
            $('.password_eyes .input-group-text i').removeClass('la-eye-slash').addClass('la-eye');
            $('#password').attr('type', 'text').focus();
        } else {
            $('.password_eyes .input-group-text i').removeClass('la-eye').addClass('la-eye-slash');
            $('#password').attr('type', 'password').focus();
        }
    })

    var confirm = false;
    $('.confirmation_eyes .input-group-text').on('click', () => {
        confirm = !confirm;
        if (confirm) {
            $('.confirmation_eyes .input-group-text i').removeClass('la-eye-slash').addClass('la-eye');
            $('#password_confirmation').attr('type', 'text').focus();
        } else {
            $('.confirmation_eyes .input-group-text i').removeClass('la-eye').addClass('la-eye-slash');
            $('#password_confirmation').attr('type', 'password').focus();
        }
    })
})