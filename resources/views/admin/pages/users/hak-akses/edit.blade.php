@extends('admin.layouts.app')

@section('title', 'Ubah Pengaturan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3><span class="la la-cog"></span> <span class="text-capitalize">pengaturan</span></h3>

    <div>
        @can('hak-akses-update')
        <button type="button" class="btn btn-cancel btn-secondary d-none mx-1">
            <i class="la la-refresh"></i> Batal
        </button>
        <button type="button" class="btn btn-edit btn-secondary mx-1">
            <i class="la la-edit"></i> Ubah
        </button>
        @endcan

        @can('hak-akses-delete')
        <button type="button" onclick="action_destroy(`{{ route('admin.hak-akses.destroy', encrypt($role->id)) }}`)" class="btn btn-destroy btn-danger">
            <i class="la la-trash"></i> Hapus
        </button>
        @endcan

        @can('hak-akses-create')
        <a href="{{ route('admin.hak-akses.create') }}" class="btn btn-primary">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.hak-akses.update', encrypt($role->id)) }}" method="post">
        @csrf
        @method('put')

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.hak-akses.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-primary btn-save">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : $role->name }}" class="form-control @error('name') is-invalid @enderror" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <table class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Daftar Modul</th>
                        <th class="text-center">Tabel</th>
                        <th class="text-center">Tambah</th>
                        <th class="text-center">Ubah</th>
                        <th class="text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->fullname }}</td>
                        <td class="text-center">
                            <input type="checkbox" name="permission[]" @if(in_array($permission->id, $rolePermissions)) checked @endif value="{{ $permission->id }}" >
                        </td>
                        <td class="text-center">
                            @if($permission->create != null)
                            <input type="checkbox" name="permission[]" @if(in_array($permission->create->id, $rolePermissions)) checked @endif value="{{ $permission->create->id }}" >
                            @endif
                        </td>
                        <td class="text-center">
                            @if($permission->update != null)
                            <input type="checkbox" name="permission[]" @if(in_array($permission->update->id, $rolePermissions)) checked @endif value="{{ $permission->update->id }}" >
                            @endif
                        </td>
                        <td class="text-center">
                            @if($permission->delete != null)
                            <input type="checkbox" name="permission[]" @if(in_array($permission->delete->id, $rolePermissions)) checked @endif value="{{ $permission->delete->id }}" >
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.hak-akses.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-primary btn-save">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush