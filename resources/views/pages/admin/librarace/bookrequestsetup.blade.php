@extends('layouts.layout')
@section('title', 'Book Request')
@section('content')
@push('datatable-css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
<section class="content-header">
    <h1> &nbsp; </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('librarace.route',['path' => 'librarace']) }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active"> Book Request </li>
    </ol>
</section>
<section class="content">
    @include('errors.alerts')
    <div class="box box-primary">
    	<div class="box-body" id="users_box">
    		<div class="panel panel-default">
    			<div class="panel-heading clearfix" style="background-color: white;">
    				<h3 class="panel-title pull-left">
    					<label><i class="fa fa-book fa-fw"></i> BOOK REQUEST </label>
    				</h3>
    			</div>
    			<div class="panel-body">
    				<div class="nav-tabs-custom"> 
    				    <ul class="nav nav-tabs">
    				        <li class="active"><a href="#allrequest" data-toggle="tab"><b> <i class="fa fa-plus"></i> CREATE REQUEST </b></a></li>
    				    </ul>
    				</div>
    				<div class="tab-content">
    					<div class="tab-pane active fade in" id="allrequest"> 
    						<div class="panel panel-default">
    							<div class="panel-body" style="overflow-x: auto;">
    								@include('pages.admin.librarace.forms.formaddbooksrequest')
    							</div>
    						</div>
    					</div>
    				</div>	
    			</div>
    		</div>
    	</div>
    </div>
    @include('pages.admin.librarace.modal.modalselectstudent')
    @include('pages.admin.librarace.modal.modalselectbook')
</section>
@push('datatable-script')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endpush
@push('scripts')
<script>
  	$(function () {
		$('.datatable').DataTable();
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
    function btnSelectBookModal(evt)
    {
        $('#book_modal').modal('show');
        var data_count = $(evt).data('count');
        $('#book_modal #tosetbookitemcount').val(data_count);
    }
    function selectedBook(evt)
    {
        var data_id = $('#book_modal #tosetbookitemcount').val(); 
        var data_item = $(evt).data('item');
        var data_book = $(evt).data('book');
        $('#book_id' + data_id).val(data_book);
        $('#book_title' + data_id).val(data_item);
        // $(evt).closest('tr').remove();
        $('#book_modal').modal('hide');
    }
    function selectedStudent(evt)
    {
        var data_code = $(evt).data('code');
        var data_fullname = $(evt).data('fullname');
        $('#student_id').val(data_code);
        $('#student_name').val(data_fullname);
        // $(evt).closest('tr').remove();
        $('#modalselectstudent').modal('hide');
    }
    function appendBook()
    {

        var book_count = $('.book-row').length;

        var html_book = '<tr class="book-row">'
            +'<td style="padding: 0px;">'
                +'<div class="input-group input-group-sm" style="width: 100%;">'
                    +'<input type="hidden" name="book[' + book_count + '][book_id]" id="book_id' + book_count + '">'
                    +'<input type="text" class="form-control" style="border-radius: 0px;" id="book_title' + book_count + '" name="book[' + book_count + '][book_title]">'
                    +'<span class="input-group-btn">'
                        +'<button type="button" class="btn btn-info btn-flat btn-select-book-modal" onclick="return btnSelectBookModal(this)" data-count="' + book_count + '"><i class="fa fa-search"></i></button>'
                    +'</span>'
                +'</div>'
            +'</td>'
            +'<td style="padding: 0px;">'
                +'<input type="date" name="book[' + book_count + '][date_from]" class="form-control input-sm" required>'
            +'</td>'
            +'<td style="padding: 0px;">'
                +'<input type="date" name="book[' + book_count + '][date_to]" class="form-control input-sm" required>'
            +'</td>'
            +'<td style="padding: 0px;">'
                +'<button type="button" onclick="return $(this).closest(\'tr\').remove();" class="btn btn-default btn-sm"><i class="fa fa-remove"></i></button>'
            +'</td>'
        +'</tr>';

        $('#appendbookhere').append(html_book);

    }
</script>
@endpush
@endsection