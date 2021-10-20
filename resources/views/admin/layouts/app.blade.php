@extends('admin.layouts.main', ['page' => 'app'])

@section('main-content')
@include('admin.layouts.inc.header')
<div class="app-body">
    @include('admin.layouts.inc.sidebar')
    @yield('content')
</div>
@endsection