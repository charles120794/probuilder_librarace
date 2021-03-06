@extends('layouts.layout')
@section('title', 'Book Group')
@section('content')
@push('datatable-css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
<section class="content-header">
    <h1> &nbsp; </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('librarace.route',['path' => 'librarace']) }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><i class="fa fa-cog"></i> Maintenance </li>
        <li class="active"> Book Group Setup </li>
    </ol>
</section>
<section class="content">
    @include('errors.alerts')
    <div class="box box-primary">
        <div class="box-body" id="users_box" style="min-height: 75vh;">
            <div class="panel panel-default">
                <div class="panel-heading clearfix" style="background-color: white;">
                    <h3 class="panel-title pull-left">
                        <label><i class="fa fa-list"></i> BOOK GROUP SETUP </label>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a href="#allcategory" data-toggle="tab"><b> <i class="fa fa-list"></i> ALL GROUP     </b></a></li>
                            <li><a href="#addcategory" data-toggle="tab"><b> <i class="fa fa-plus"></i> ADD GROUP </b></a></li>
                            <li class="active"><a href="#editcategory" data-toggle="tab"><b> <i class="fa fa-edit"></i> EDIT GROUP </b></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="allcategory">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @include('pages.admin.librarace.includes.tablebookscategory')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="addcategory">
                            <div class="panel panel-default">
                                <div class="panel-body" style="overflow-x: auto;">
                                    @include('pages.admin.librarace.forms.formaddcategory')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="editcategory">
                            <div class="panel panel-default">
                                <div class="panel-body" style="overflow-x: auto;">
                                    @include('pages.admin.librarace.forms.formeditcategory')
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