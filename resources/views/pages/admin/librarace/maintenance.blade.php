@extends('layouts.layout')

@section('title', ' Title Here ')

@section('content')

<section class="content-header">
    <h1> &nbsp; </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard-here"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    </ol>
</section>

<section class="content">
    
    @include('errors.alerts')

</section>
<!-- /.content -->
@endsection