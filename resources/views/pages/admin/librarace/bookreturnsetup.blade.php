@extends('layouts.layout')
@section('title', 'Book Return')
@section('content')
<section class="content-header">
    <h1> &nbsp; </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('librarace.route',['path' => 'librarace']) }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active"> Book Return </li>
    </ol>
</section>
<section class="content">
    @include('errors.alerts')
</section>
@endsection