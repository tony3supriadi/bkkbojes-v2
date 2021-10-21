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
    <link href="{{ asset('admin/vendors/sweetalert/sweetalert2.min.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="app {{ $page == 'blank' ? 'flex-row align-items-center' : 'aside-menu-fixed sidebar-lg-show' }}">
    @yield('main-content')

    <form id="destroy-action" action="" method="post" class="d-none">
        @csrf
        @method('delete')
    </form>

    <form id="bulk-destroy" action="" method="post" class="d-none">
        @csrf
        @method('delete')
        <input type="text" name="ids">
    </form>

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
    <script src="{{ asset('admin/vendors/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script>
        PNotify.defaults.styling = 'bootstrap4';

        $('.btn-edit').on('click', () => {
            $('.btn-edit').addClass('d-none');
            $('.btn-cancel').removeClass('d-none');
            $('.btn-save').removeAttr('disabled');

            $('input').removeAttr('disabled');
        });

        $('.btn-cancel').on('click', () => {
            $('.btn-edit').removeClass('d-none');
            $('.btn-cancel').addClass('d-none');
            $('.btn-save').attr('disabled', 'disabled');

            $('input').attr('disabled', '');
        });

        function action_destroy(url) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Menghapus data tidak akan bisa dikembalikan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-secondary',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#destroy-action').attr('action', url);
                    $('#destroy-action').submit();
                }
            })
        };

        $('.btn-bulk-destroy').on('click', () => {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Menghapus data tidak akan bisa dikembalikan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-secondary',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                $('#bulk-destroy input[name="ids"]').val(JSON.stringify(selected));
                $('#bulk-destroy').submit();
            });
        });
    </script>

    @stack('scripts')

    @if(Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            PNotify.success({
                title: "Berhasil!",
                text: "{{ Session::get('success') }}"
            });
        });
    </script>
    @endif

    @if(Session::has('error'))
    <script type="text/javascript">
        $(document).ready(function() {
            PNotify.error({
                title: "Berhasil!",
                text: "{{ Session::get('success') }}"
            });
        });
    </script>
    @endif
</body>

</html>