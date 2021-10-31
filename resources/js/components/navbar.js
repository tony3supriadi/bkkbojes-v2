$(function () {
    var open = false;
    $('#navigation-mobile-toggler').on('click', function () {
        open = !open;
        if (open) {
            $('.navigation-mobile').addClass('show');
            $('.navbar-toggler .navbar-toggler-icon').addClass('d-none');
            $('.navbar-toggler .la-times').removeClass('d-none');
        } else {
            $('.navigation-mobile').removeClass('show');
            $('.navbar-toggler .navbar-toggler-icon').removeClass('d-none');
            $('.navbar-toggler .la-times').addClass('d-none');
        }
    });

    var otherOpen = false;
    $('#other-menu').on('click', function () {
        otherOpen = !otherOpen;
        if (otherOpen) {
            $('#other-menu-dropdown').addClass('hidden');
        } else {
            $('#other-menu-dropdown').removeClass('hidden');
        }
    })
})