@extends('layouts.layout')

@section('title', 'Add New Menu')

@section('styles') 
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')

<section class="content-header">
    <h1>
        <i class="fa fa-plus"></i> Add New Menu
        <small> Control panel </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active"> <i class="fa fa-flag"></i> Add New Menu </li>
    </ol>
</section>

<div class="content">
    @include('errors.alerts')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Menu Form</h3>
        </div>
        <form class="form-horizontal" action="{{ route('settings.route',['path' => $path, 'action' => 'settings-add-menu' , 'id' => Crypt::encrypt('') ]) }}" method="post"> {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="class" class="col-sm-2 control-label"> Parent </label>
                    <div class="col-sm-10">
                        <select class="form-control selectpicker" name="menu_parent" style="border-radius: 0px;">
                            <option value="0" selected> Main Menu </option>
                            @foreach(app('SystemWindow')->get() as $key => $value)
                            <option value="{{ $value->menu_id }}"> {{ $value->menu_name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="class" class="col-sm-2 control-label"> Icon </label>
                    <div class="col-sm-10">
                        <input type="text" name="menu_icon" class="form-control" placeholder="fa icons">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label"> Description </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="menu_name" placeholder="Description" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="blade" class="col-sm-2 control-label"> Blade Location </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="menu_blade" placeholder="Blade Folder Location">
                    </div>
                </div>
                <div class="form-group">
                    <label for="path" class="col-sm-2 control-label"> Menu Path </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="menu_path" placeholder="Path">
                        <input type="hidden" class="form-control" name="menu_link" value="page">
                    </div>
                </div>
                <div class="form-group">
                    <label for="type" class="col-sm-2 control-label"> Menu Type </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="menu_type">
                            <option value="0"> Without Dropdown </option>
                            <option value="1"> With Dropdown </option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="box-tools pull-right">
                    <button type="submit" class="btn btn-default"> Cancel </button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Submit </button>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
</div>{{-- ./ row --}}
@endsection

@section('scripts')

<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
    $('.selectpicker').select2()
</script>

@endsection