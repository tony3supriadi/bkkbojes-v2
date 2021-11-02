@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card-group mb-3">
    <div class="card">
        <div class="card-body">
            <div class="text-medium-emphasis text-end mb-2">
                <span class="fa fa-user fa-3x text-secondary"></span>
            </div>
            <div class="fs-4 fw-semibold">{{ number_format($total_pengguna, 0, ',', '.') }}</div>
            <small class="text-medium-emphasis text-uppercase fw-semibold">Total Pengguna</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="text-medium-emphasis text-end mb-2">
                <span class="fa fa-user fa-3x text-secondary"></span>
            </div>
            <div class="fs-4 fw-semibold">{{ number_format($jml_alumni, 0, ',', '.') }}</div>
            <small class="text-medium-emphasis text-uppercase fw-semibold">JUMLAH ALUMNI</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="text-medium-emphasis text-end mb-2">
                <span class="fa fa-user fa-3x text-secondary"></span>
            </div>
            <div class="fs-4 fw-semibold">{{ number_format($jml_siswa, 0, ',', '.') }}</div>
            <small class="text-medium-emphasis text-uppercase fw-semibold">JUMLAH SISWA</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="text-medium-emphasis text-end mb-2">
                <span class="fa fa-user fa-3x text-secondary"></span>
            </div>
            <div class="fs-4 fw-semibold">{{ number_format($jml_umum, 0, ',', '.') }}</div>
            <small class="text-medium-emphasis text-uppercase fw-semibold">JUMLAH UMUM</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="text-medium-emphasis text-end mb-2">
                <span class="fa fa-user fa-3x text-secondary"></span>
            </div>
            <div class="fs-4 fw-semibold">{{ number_format($sudah_bekerja, 0, ',', '.') }}</div>
            <small class="text-medium-emphasis text-uppercase fw-semibold">SUDAH BEKERJA</small>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        DAFTAR LOWONGAN AKTIF
    </div>
    <div class="card-body p-0">
        <table class="table datatable w-100 mt-0">
            <tr></tr>
        </table>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables/css/select.dataTables.min.css') }}">
<style>
    .dataTables_info,
    .dataTables_paginate {
        padding: .5rem;
    }

    .table.dataTable {
        margin-top: 0 !important;
    }
</style>
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
            searching: false,
            lengthChange: false,
            select: {
                style: 'api',
                selector: 'td:first-child .select-checkbox'
            },
            ajax: {
                url: "/app/v1/bkk-admin/dashboard?type=json" + "{{ request()->get('mitra') && request()->get('mitra') == 'unggulan' ? '&mitra=unggulan' : '' }}",
                dataSrc: (data) => {
                    return data;
                }
            },
            ordering: false,
            columns: [{
                    data: 'judul',
                    title: 'Judul',
                }, {
                    data: 'tanggal_berakhir',
                    title: 'Tgl. Berakhir',
                    width: '15%'
                },
                {
                    data: 'applicant',
                    title: 'Pelamar',
                    width: '8%',
                    className: 'text-right'
                }, {
                    defaultContent: '',
                    title: '',
                    width: '5%',
                    className: 'text-right',
                    render: (data, type, row, meta) => {
                        return `
                        <a href="/app/v1/bkk-admin/lowongan/${row.encryptid}" class="mx-1 text-secondary text-decoration-none">
                            <i class="fa fa-id-card"></i>
                        </a>
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
                emptyTable: "Tidak ada lamaran yang aktif.",
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