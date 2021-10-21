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
        <button type="button" onclick="action_destroy(`{{ route('admin.users.destroy', encrypt($user->id)) }}`)" class="btn btn-destroy btn-danger">
            <i class="la la-trash"></i> Hapus
        </button>
        @endcan

        @can('users-create')
        <a href="{{ route('admin.users.create') }}" role="button" class="btn btn-primary">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.users.update', encrypt($user->id)) }}" method="post">
        @csrf
        @method('put')

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-save btn-primary">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : $user->name }}" class="form-control @error('name') is-invalid @enderror" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') ? old('email') : $user->email }}" class="form-control @error('email') is-invalid @enderror" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') ? old('username') : $user->username }}" class="form-control @error('username') is-invalid @enderror" />
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />
            </div>

            <div class="form-group">
                <label for="roles">Roles</label>
                <input type="text" value="{{ $userRole[0] }}" class="form-control select2-values">
                <div class="d-none select2-selection">
                    <select name="roles" data-placeholder="" id="roles" class="form-control select2 @error('roles') is-invalid @enderror">
                        <option value=""></option>
                        @foreach($roles as $role)
                        <option value="{{ $role }}" <?= old('roles') == $role ? 'selected' : '' ?> <?= $userRole[0] == $role ? 'selected' : '' ?>>{{$role}}</option>
                        @endforeach
                    </select>
                </div>
                @error('roles')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-save btn-primary">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2-bootstrap.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/vendors/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        'use strict';

        $(".select2").select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%'
        });
    });
</script>
@endpush