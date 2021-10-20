<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('title') :: Bursa Kerja Khusus | SMK Negeri 1 Bojongsari</title>

    <!-- Icons-->
    <link href="{{ asset('admin/vendors/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">

    <!-- Main styles for this application-->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="app {{ $page == 'blank' ? 'flex-row align-items-center' : 'aside-menu-fixed sidebar-lg-show' }}">
    @yield('main-content')

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('admin/vendors/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/popper.js/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/pace-progress/js/pace.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/@coreui/coreui/js/coreui.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/pnotify/js/Pnotify.js') }}"></script>
    <script src="{{ asset('admin/vendors/pnotify/js/PnotifyButtons.js') }}"></script>
    <script src="{{ asset('admin/vendors/pnotify/js/PnotifyConfirm.js') }}"></script>
    <script src="{{ asset('admin/vendors/pnotify/js/PnotifyMobile.js') }}"></script>
    <script src="{{ asset('admin/vendors/pnotify/js/PnotifyNonBlock.js') }}"></script>
    <script>
        PNotify.defaults.styling = 'bootstrap4';
    </script>

    @stack('scripts')
</body>

</html>