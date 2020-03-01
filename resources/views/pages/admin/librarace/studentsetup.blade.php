@extends('layouts.layout')
@section('title', ' Student Setup')
@section('content')
@push('datatable-css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
<section class="content-header">
    <h1> &nbsp; </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('librarace.route',['path' => 'librarace']) }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active"><i class="fa fa-user"></i> Student Setup </li>
    </ol>
</section>
<section class="content">
    @include('errors.alerts')
    <div class="box box-primary">
        <div class="box-body" id="users_box" style="min-height: 75vh;">
            <div class="panel panel-default">
                <div class="panel-heading clearfix" style="background-color: white;">
                    <h3 class="panel-title pull-left">
                    <label><i class="fa fa-list"></i> STUDENT SETUP </label>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#allstudent" data-toggle="tab"><b> <i class="fa fa-list"></i> ALL STUDENT </b></a></li>
                            <li><a href="#addstudent" data-toggle="tab"><b> <i class="fa fa-plus"></i> ADD STUDENT </b></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active fade in" id="allstudent">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @include('pages.admin.librarace.includes.tablestudents')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="addstudent">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @include('pages.admin.librarace.forms.formaddstudent')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('datatable-script')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endpush
@push('scripts')
<script>
    $(function () {
        $('#datatable').DataTable();
        $('[data-toggle="tooltip"]').tooltip();
    });
    function updateStatus(id,url){
        if($('#'+id).hasClass('fa-toggle-on')){
            $('#'+id).removeClass('fa-toggle-on')
                .removeClass('text-orange')
                .addClass('fa-toggle-off')
                .addClass('text-red');
            tooglestatus(url,0);
        } else if($('#'+id).hasClass('fa-toggle-off')){
            $('#'+id).removeClass('fa-toggle-off')
                .removeClass('text-red')
                .addClass('fa-toggle-on').addClass('text-orange');
            tooglestatus(url,1);
        }
    }
    function tooglestatus(url,stat)
    {
        $.get(url,{status:stat},function(count){ });
    }
</script>
@endpush
@endsection