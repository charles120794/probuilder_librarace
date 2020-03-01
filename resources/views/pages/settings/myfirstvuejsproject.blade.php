<!DOCTYPE html>
<html>
<head>
    <title> Vue Js </title>

    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">

</head>
<body>

    <h1> Hello Vue </h1>

    <div class="container" id="activity">
        <activity-component></activity-component>
    </div>

    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('/js/vue.js')}}"></script>

    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

</body>
</html>