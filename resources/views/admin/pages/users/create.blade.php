@extends('admin.layouts.app')

@section('title', 'User')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-user"></span>
        <span class="text-capitalize">Users</span>
    </h3>
</div>

<div class="card">
    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <input type="hidden" name="email_verified_at" value="{{ date('Y-m-d H:i:s') }}">
        <input type="hidden" name="isadmin" value="1">

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" />
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />
            </div>

            <div class="form-group">
                <label for="name">Hak Akses</label>
                <select name="roles" data-placeholder="" id="roles" class="form-control select2 @error('roles') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($roles as $role)
                    <option value="{{ $role }}" <?= old('roles') == $role ? 'selected' : '' ?>>{{$role}}</option>
                    @endforeach
                </select>

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
                    <button type="submit" class="btn btn-primary">
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