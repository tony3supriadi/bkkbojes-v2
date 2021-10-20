@extends('admin.layouts.app')

@section('title', 'Pengaturan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-cog"></span>
        <span class="text-capitalize">pengaturan</span>
    </h3>
</div>

<div class="card card-body">
    <table class="table table-hover table-striped datatable"></table>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables/css/dataTables.bootstrap4.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var selected = [];
        $('.datatable').DataTable({
            width: '100%',
            processing: true,
            ajax: {
                url: '/app/v1/bkk-admin/pengaturan?type=json',
                dataSrc: (data) => {
                    return data;
                }
            },
            ordering: false,
            columns: [{
                data: 'nama',
                title: 'Pengaturan'
            }, {
                defaultContent: '',
                title: 'Aksi',
                width: '15%',
                className: 'text-right',
                render: (data, type, row, meta) => {
                    return `
                        <a href="/app/v1/bkk-admin/pengaturan/${row.encryptId}/ubah" class="mx-1 text-primary text-decoration-none">
                            <i class="fa fa-edit"></i> Ubah
                        </a>
                    `;
                }
            }],
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