@extends('layouts.layout')

@section('title', 'Book Management')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">

<section class="content-header">
    <h1> &nbsp; </h1>
    <ol class="breadcrumb">
        <li><a href="/librarace/librarace"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active"><i class="fa fa-user"></i> Book Manager </li>
    </ol>
</section>

<section class="content">
    
    @include('errors.alerts')

    <div class="box box-primary">
        <div class="box-body" id="users_box" style="min-height: 75vh;">
            <div class="panel panel-default">
                <div class="panel-heading clearfix" style="background-color: white;">
                    <h3 class="panel-title pull-left">
                        <label><i class="fa fa-list"></i> BOOK MANAGER </label>
                    </h3>
                </div>
                <div class="panel-body">

                    <div class="nav-tabs-custom"> 
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#allborrowed" data-toggle="tab"><b> <i class="fa fa-list"></i> REQUEST </b><span class="badge bg-light-blue">1</span></a></li>
                            <li><a href="#allapproved" data-toggle="tab"><b> <i class="fa fa-list"></i> APPROVED </b><span class="badge bg-light-blue">1</span></a></li>
                            <li><a href="#allcancelled" data-toggle="tab"><b> <i class="fa fa-list"></i> CANCELLED </b><span class="badge bg-light-blue">1</span></a></li>
                        </ul>
                    </div>

                    <div class="tab-content">

                        <div class="tab-pane active fade in" id="allborrowed" style="overflow-x: auto;"> 
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="min-width: 100px;"> ID </th>
                                                <th class="text-center" style="min-width: 150px;"> BORROWERS NAME </th>
                                                <th class="text-center" style="min-width: 150px;"> CONTACT NO. </th>
                                                <th class="text-center" style="min-width: 150px;"> EMAIL ADDRESS </th>
                                                <th class="text-center" style="min-width: 150px;"> BOOK STATUS </th>
                                                <th class="text-center" style="min-width: 150px;"> DATE FROM </th>
                                                <th class="text-center" style="min-width: 150px;"> DATE TO </th>

                                                <th class="text-center" style="min-width: 150px;"> APPROVED BY </th>
                                                <th class="text-center" style="min-width: 150px;"> APPROVED DATE </th>
                                                <th class="text-center" style="min-width: 150px;"> ISSUED BY </th>
                                                <th class="text-center" style="min-width: 150px;"> DATE ISSUED </th>
                                                <th class="text-center" style="min-width: 150px;"> DATE RETURNED </th>

                                                <th class="text-center" style="min-width: 150px;"> CREATED BY </th>
                                                <th class="text-center" style="min-width: 150px;"> CREATED DATE </th>
                                                <th class="text-center" style="min-width: 150px;"> CANCELLED BY </th>
                                                <th class="text-center" style="min-width: 150px;"> CANCELLED DATE </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach(app('LibraraceBorrow')->get() as $key => $value)

                                                <tr>
                                                    <td> {{ $value->usersInfo->user_code }} </td>
                                                    <td> {{ $value->usersInfo->user_firstname }} {{ $value->usersInfo->user_middlename }} {{ $value->usersInfo->user_lastname }} </td>
                                                    <td> {{ $value->usersInfo->user_contact }} </td>
                                                    <td> {{ $value->usersInfo->user_email }} </td>
                                                    <td style="font-weight: bold; color: green;"> 
                                                        {{ ($value->status == 'N') ? 'NEW' : '' }}
                                                        {{ ($value->status == 'A') ? 'APPROVED' : '' }} 
                                                        {{ ($value->status == 'P') ? 'ON BORROWED' : '' }}  
                                                        {{ ($value->status == 'C') ? 'CANCELLED' : '' }} 
                                                    </td>
                                                    <td> {{ date('Y-m-d',strtotime($value->date_from)) }} </td>
                                                    <td> {{ date('Y-m-d',strtotime($value->date_to)) }} </td>
                                                    <td> {{ (count($value->approverInfo) > 0) ? $value->approverInfo->firstname : '' }}</td>
                                                    <td> {{ (!is_null($value->approved_date)) ? date('Y-m-d',strtotime($value->approved_date)) : ''}}</td>
                                                    <td> {{ (count($value->issuerInfo) > 0) ? $value->issuerInfo->firstname : '' }}</td>
                                                    <td> {{ (!is_null($value->date_issued)) ? date('Y-m-d',strtotime($value->date_issued)) : '' }}</td>
                                                    <td> {{ (!is_null($value->date_returned)) ? date('Y-m-d',strtotime($value->date_returned)) : '' }}</td>
                                                    <td> {{ (count($value->creatorInfo) > 0) ? $value->creatorInfo->firstname : 'ON MOBILE' }}</td>
                                                    <td> {{ (!is_null($value->created_date)) ? date('Y-m-d',strtotime($value->created_date)) : ''}}</td>
                                                    <td> {{ (count($value->cancellerInfo) > 0) ? $value->cancellerInfo->firstname : '' }}</td>
                                                    <td> {{ (!is_null($value->date_cancelled)) ? date('Y-m-d',strtotime($value->date_cancelled)) : ''}}</td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="addnewdetails"> 

                        </div>

                    </div>  
                </div>
            </div>
        </div>
    </div>

    @include('pages.admin.librarace.modal.modalselectstudent')

    @include('pages.admin.librarace.modal.modalselectbook')

</section>

@push('scripts')

<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
    $(function () {
        $('.select2').select2();
        $('[data-toggle="tooltip"]').tooltip();
    });
    function selectedStudent(event) {
        $.ajax({
            url: '{{ route('librarace.route',['path' => $path, 'action' => 'librarace-search-student-no','id' => Crypt::encrypt('')]) }}',
            method:"POST",
            data: { 'student' : $('#' +event.id).data('student') },
            dataType: 'json',
            success: function(data){
                $('#student_id').val(data.student_id);
                $('#student_name').val(data.student_name);
                $('#member_modal').modal('hide');
            }
        });
    }
    function appendBook() {
        var html_book = '<tr class="book-row">'
            +'<td style="padding: 0px;">'
                +'<div class="input-group input-group-sm" style="width: 100%;">'
                    +'<input type="hidden" id="book_id" name="book_id[]">'
                    +'<input type="text" class="form-control" style="border-radius: 0px;" id="book_title" name="book_title[]">'
                    +'<span class="input-group-btn">'
                        +'<button type="button" data-toggle="modal" data-target="#book_modal" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>'
                    +'</span>'
                +'</div>'
            +'</td>'
            +'<td style="padding: 0px;">'
                +'<input type="date" name="date_from[]" class="form-control input-sm" required>'
            +'</td>'
            +'<td style="padding: 0px;">'
                +'<input type="date" name="date_to[]" class="form-control input-sm" required>'
            +'</td>'
        '</tr>';
        
    }
</script>
@endpush
<!-- /.content -->
@endsection