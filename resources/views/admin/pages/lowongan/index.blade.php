@extends('admin.layouts.app')

@section('title', 'Lowongan')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h3>
        <span class="la la-file"></span>
        <span class="text-capitalize">Lowongan</span>
    </h3>

    <div>
        @can('lowongan-delete')
        <button type="button" class="btn btn-danger text-white btn-bulk-destroy" disabled>
            <i class="la la-trash"></i> Hapus Masal
        </button>
        @endcan

        @can('lowongan-create')
        <a href="{{ route('admin.lowongan.create') }}" class="btn btn-primary text-white">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-12 py-2">
        <a href="{{ route('admin.lowongan.index') }}">Belum Beakhir</a>
        <span class="text-muted mx-2">|</span>
        <a href="{{ route('admin.lowongan.index') }}?lowongan=beakhir">Sudah Berakhir</a>
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
                url: '/app/v1/bkk-admin/lowongan?type=json',
                dataSrc: (data) => {
                    return data;
                }
            },
            ordering: false,
            columns: [{
                    defaultContent: '',
                    title: '',
                    className: 'select-checkbox pr-1 pl-2',
                    width: '10px'
                }, {
                    data: 'judul',
                    title: 'Judul',
                }, {
                    data: 'mitra_nama',
                    title: 'Mitra / Perusahaan',
                    render: (data, type, row, meta) => {
                        return data ? `
                        <p class="m-0">${data} <span class="text-muted">(${row.kabupaten_nama}, ${row.provinsi_nama})</span></p>
                    ` : '-';
                    },
                }, {
                    data: 'tanggal_berakhir',
                    title: 'Tgl. Berakhir',
                    width: '15%'
                },
                {
                    data: 'counter',
                    title: 'Visitor',
                    width: '8%',
                    className: 'text-right'
                }, {
                    defaultContent: '',
                    title: 'Aksi',
                    width: '12%',
                    className: 'text-right',
                    render: (data, type, row, meta) => {
                        return `
                        <a href="/app/v1/bkk-admin/lowongan/${row.encryptid}" class="mx-1 text-secondary text-decoration-none">
                            <i class="la la-list"></i>
                        </a>

                        @can('lowongan-update')
                        <a href="/app/v1/bkk-admin/lowongan/${row.encryptid}/ubah" class="mx-1 text-primary text-decoration-none">
                            <i class="fa fa-edit"></i>
                        </a>
                        @endcan

                        @can('lowongan-delete')
                        <a href="javascript:void(0)" onclick="action_destroy('/app/v1/bkk-admin/lowongan/${row.encryptid}')" class="mx-1 text-danger text-decoration-none btn-destroy">
                            <i class="fa fa-trash"></i>
                        </a>
                        @endcan
                    `;
                    }
                }
            ],
            rowCallback: (row, data, index) => {
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