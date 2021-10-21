@extends('admin.layouts.app')

@section('title', 'User')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-user"></span>
        <span class="text-capitalize">Users</span>
    </h3>

    <div>
        @can('users-delete')
        <button type="button" class="btn btn-danger text-white btn-bulk-destroy" disabled>
            <i class="la la-trash"></i> Hapus Masal
        </button>
        @endcan

        @can('users-create')
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary text-white">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="card card-body">
    <table class="table table-hover table-striped datatable" width="100%"></table>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables/css/select.dataTables.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables/js/dataTables.select.min.js') }}"></script>
<script type="text/javascript">
    var selected = [];
    $(document).ready(function() {
        $('.datatable').DataTable({
            width: '100%',
            processing: true,
            select: {
                style: 'api',
                selector: 'td:first-child .select-checkbox'
            },
            ajax: {
                url: '/app/v1/bkk-admin/users?type=json',
                dataSrc: (data) => {
                    return data;
                }
            },
            ordering: false,
            columns: [{
                defaultContent: '',
                title: '',
                orderable: false,
                className: 'select-checkbox pr-1 pl-2',
                width: '10px'
            }, {
                data: 'name',
                title: 'Nama',
                orderable: true,
            }, {
                data: 'username',
                title: 'Username',
                orderable: false
            }, {
                data: 'email',
                title: 'E-Mail',
                orderable: false,
            }, {
                defaultContent: '',
                title: 'Roles',
                orderable: false,
                width: '10%',
                render: (data, type, row) => {
                    return row.roles.length > 0 ? `<span class="badge badge-secondary">` + row.roles[0].name + `</span>` : '-';
                }
            }, {
                defaultContent: '',
                title: 'Aksi',
                width: '18%',
                className: 'text-right',
                render: (data, type, row, meta) => {
                    if (row.id != 1) {
                        return `
                            @can('users-update')
                            <a href="/app/v1/bkk-admin/users/${row.encryptid}/ubah" class="mx-1 text-primary text-decoration-none">
                                <i class="fa fa-edit"></i> Ubah
                            </a>
                            @endcan

                            @can('users-delete')
                            <a href="javascript:void(0)" onclick="action_destroy('/app/v1/bkk-admin/users/${row.encryptid}')" class="mx-1 text-danger text-decoration-none btn-destroy">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                            @endcan
                        `;
                    }
                }
            }],
            rowCallback: (row, data, index) => {
                if (data.id == 1) {
                    $('td:first-child', row).removeClass('select-checkbox');
                }

                $('td:first-child', row).on('click', function() {
                    if (!$(row).hasClass('selected')) {
                        $(row).addClass('selected');
                        selected.push(data);
                    } else {
                        $(row).removeClass('selected');
                        selected.splice(selected.indexOf(data.id), 1);
                    }

                    if (selected.length > 0) {
                        $('.btn-bulk-destroy').removeAttr('disabled');
                    } else {
                        $('.btn-bulk-destroy').attr('disabled', 'disabled');
                    }
                });
            },
            language: {
                emptyTable: "Tidak ada data yang tersedia",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                lengthMenu: "Tampilkan _MENU_ entri",
                loadingRecords: "Sedang memuat...",
                processing: "Sedang memproses...",
                search: "Cari",
                zeroRecords: "Tidak ditemukan data yang sesuai",
                thousands: "'",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                },
            }
        });
    });
</script>
@endpush