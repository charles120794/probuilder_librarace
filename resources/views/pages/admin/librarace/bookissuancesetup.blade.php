@extends('layouts.layout')
@section('title', 'Book Issuance')
@section('content')
@push('datatable-css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
<section class="content-header">
    <h1> &nbsp; </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('librarace.route',['path' => 'librarace']) }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active"> Book Issuance </li>
    </ol>
</section>
<section class="content">
    @include('errors.alerts')
    <div class="box box-primary">
        <div class="box-body" id="users_box" style="min-height: 75vh;">
            <div class="panel panel-default">
                <div class="panel-heading clearfix" style="background-color: white;">
                    <h3 class="panel-title pull-left">
                        <label><i class="fa fa-book"></i> BOOK ISSUANCE </label>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="nav-tabs-custom"> 
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#approvedrequest" data-toggle="tab"><b> <i class="fa fa-list"></i> APPROVED REQUEST </b></a></li>
                            <li><a href="#cancelledrequest" data-toggle="tab"><b> <i class="fa fa-list"></i> CANCELLED REQUEST </b></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active fade in" id="approvedrequest"> 
                            <div class="panel panel-default">
                                <div class="panel-body" style="overflow-x: auto;">
                                    @include('pages.admin.librarace.includes.tablebooksrequests')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cancelledrequest"> 
                            <div class="panel panel-default">
                                <div class="panel-body" style="overflow-x: auto;">
                                    @include('pages.admin.librarace.includes.tablebooksrequestscancelled')
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @include('pages.admin.librarace.modal.modalrequests')
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
    function modalshowrequestdetails(evt)
    {
        $('#modalrequests').modal('show');
        $.ajax({
            url: $(evt).attr('href'),
            dataType: 'html',
            success: function(data){
                $('#modalrequests #modalrequestsbody').html(data);
            }
        });
        return false;
    }
</script>
@endpush
@endsection