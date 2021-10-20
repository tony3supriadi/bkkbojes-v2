@extends('admin.layouts.main', ['page' => 'app'])

@section('main-content')
@include('admin.layouts.inc.header')
<div class="app-body">
    @include('admin.layouts.inc.sidebar')
    <main class="main pt-4">
        @yield('breadcrumb')
        <div class=" container-fluid">
            @yield('content')
        </div>
    </main>
</div>
@endsection