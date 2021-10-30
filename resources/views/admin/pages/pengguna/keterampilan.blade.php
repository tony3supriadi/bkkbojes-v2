@extends('admin.layouts.app')

@section('title', 'Pengguna')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-user"></span>
        <span class="text-capitalize">Pengguna</span>
    </h3>

    <div>
        @can('pengguna-update')
        <a href="{{ route('admin.pengguna.edit', encrypt($pengguna->id)) }}" role="button" class="btn btn-secondary">
            <i class="la la-edit"></i> Ubah
        </a>
        @endcan

        @can('pengguna-delete')
        <button type="button" onclick="action_destroy(`{{ route('admin.pengguna.destroy', encrypt($pengguna->id)) }}`)" class="btn btn-destroy btn-danger">
            <i class="la la-trash"></i> Hapus
        </button>
        @endcan

        @can('pengguna-create')
        <a href="{{ route('admin.pengguna.create') }}" role="button" class="btn btn-primary">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="card">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.show' ? 'active' : '' }}" href="{{ route('admin.pengguna.show', encrypt($pengguna->id)) }}">Personal</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.pengalaman' ? 'active' : '' }}" href="{{ route('admin.pengguna.pengalaman', encrypt($pengguna->id)) }}">Pengalaman</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.pendidikan' ? 'active' : '' }}" href="{{ route('admin.pengguna.pendidikan', encrypt($pengguna->id)) }}">Pendidikan</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.keterampilan' ? 'active' : '' }}" href="{{ route('admin.pengguna.keterampilan', encrypt($pengguna->id)) }}">Keterampilan</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.organisasi' ? 'active' : '' }}" href="{{ route('admin.pengguna.organisasi', encrypt($pengguna->id)) }}">Organisasi</a></li>
        </ul>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped datatable" width="100%"></table>
    </div>
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
    $(document).ready(function() {
        $('.datatable').DataTable({
            width: '100%',
            processing: true,
            ajax: {
                url: "/app/v1/bkk-admin/pengguna/{{ encrypt($pengguna->id) }}/keterampilan?type=json",
                dataSrc: (data) => {
                    return data;
                }
            },
            ordering: false,
            columns: [{
                data: 'keterampilan',
                title: 'Keterampilan'
            }, {
                data: 'level',
                title: 'Level'
            }],
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