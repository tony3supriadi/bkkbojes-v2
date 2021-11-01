$(function () {
    $('#password')
        .on('focus', () => {
            $('.input-group-append .input-group-text').addClass('border-primary');
        })
        .on('focusout', () => {
            $('.input-group-append .input-group-text').removeClass('border-primary');
        });
    
    $('#password_confirmation')
        .on('focus', () => {
            $('.input-group-append .input-group-text').addClass('border-primary');
        })
        .on('focusout', () => {
            $('.input-group-append .input-group-text').removeClass('border-primary');
        });
    
    var showing = false;
    $('.input-group-append .input-group-text').on('click', () => {
        showing = !showing;
        if (showing) {
            $('.input-group-append .input-group-text i').removeClass('la-eye-slash').addClass('la-eye');
            $('#password').attr('type', 'text').focus();
        } else {
            $('.input-group-append .input-group-text i').removeClass('la-eye').addClass('la-eye-slash');
            $('#password').attr('type', 'password').focus();
        }
    })

    var showingRPassword = false;
    $('.input-group-append.password .input-group-text').on('click', () => {
        showingRPassword = !showingRPassword;
        if (showingRPassword) {
            $('.input-group-append.password .input-group-text i').removeClass('la-eye-slash').addClass('la-eye');
            $('#password').attr('type', 'text').focus();
        } else {
            $('.input-group-append.password .input-group-text i').removeClass('la-eye').addClass('la-eye-slash');
            $('#password').attr('type', 'password').focus();
        }
    })

    var showingRConfirm = false;
    $('.input-group-append.confirmation').on('click', () => {
        showingRConfirm = !showingRConfirm;
        if (showingRConfirm) {
            $('.input-group-append.confirmation .input-group-text i').removeClass('la-eye-slash').addClass('la-eye');
            $('#password_confirmation').attr('type', 'text').focus();
        } else {
            $('.input-group-append.confirmation .input-group-text i').removeClass('la-eye').addClass('la-eye-slash');
            $('#password_confirmation').attr('type', 'password').focus();
        }
    })
})