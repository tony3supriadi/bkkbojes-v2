@extends('layouts.app')

@section('content')
<div class="container mb-5 pb-3">
    <div class="row">
        <div class="col-md-3 d-none d-md-inline-block">
            @include('pages.akun.navigation')
        </div>
        <div class="col-md-9">
            <div id="account-page">
                @yield('account-content')
            </div>
        </div>
    </div>
</div>
@endsection