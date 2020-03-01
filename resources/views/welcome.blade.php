<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title> PB | Pro-Builder Web Services </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/iCheck/square/blue.css') }}">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <style type="text/css">
        .user 
        {
            float: left;
            text-shadow: 1px 1px 3px #84F55C;
        }

        .head-title
        {
            padding: 10px;
            text-align: center;
            /*background-image: linear-gradient(#A3A3A3, #d2d6de);*/
        }
        .main-module-footer
        {
            background-color: #FFF;
            padding: 15px;
        }
        .module-title
        {
            margin-bottom: 25px;
            border-bottom: 1px solid #999;
        }
    </style>
    <body class="hold-transition login-page" style="background-image: linear-gradient(#e6e6e6 , #A3A3A3); background-repeat: no-repeat; background-size: cover;">
        <div class="container" style="height: 100vh;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="head-title">
                            <a href="{{ request()->root() }}" target="_blank" style="color: #2A860A; text-shadow: 1px 1px 3px #84F55C; opacity: 1; font-size: 16px; font-weight: 100; font-family: arial; width: 100%">
                                <div style="width: 100%; padding: 0px 0px 0px 0px;">
                                    {{ $webdata->thisUser()->hasCompany['company_name'] }}
                                    <hr style="border-color: #2A860A; margin-top: 5px; margin-bottom: 5px;">
                                    <b style="font-size: 20px;">
                                    {{ $webdata->thisUser()->hasCompany['company_description'] }}
                                    </b><br>
                                    {{ $webdata->thisUser()->hasCompany['company_tagline'] }} <br>
                                    {{ $webdata->thisUser()->hasCompany['company_location'] }}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="module-title clearfix"> 
                        <h1 style="color: #00c0ef;  font-size: 25px; font-weight: 600; font-family: arial; width: 100%">
                            <div class="user"> {{ $webdata->thisUser()->firstname }} {{ $webdata->thisUser()->lastname }} </div>
                            <button type="button" onclick="document.getElementById('logout-form').submit();" class="btn btn-primary pull-right btn-sm" style="bottom: 10px;"> LOG OUT </button>
                        </h1>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    @include('errors.alerts')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php 
                            $modulesAccess = $webdata->getModuleAccess($webdata->thisUser()->id);

                            $usersModule = $webdata->usersModuleAccess($modulesAccess);

                            if(count($usersModule) == 1){
                                $colSize = 'col-xs-12 col-sm-6 col-md-6 col-lg-12';
                            }
                            else if(count($usersModule) == 2)
                            {
                                $colSize = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
                            }
                            else if(count($usersModule) == 3)
                            {
                                $colSize = 'col-xs-12 col-sm-6 col-md-6 col-lg-4';
                            }
                            else
                            {
                                $colSize = 'col-xs-12 col-sm-6 col-md-6 col-lg-3';
                            }
                        ?>
                        @foreach($usersModule as $key => $value)
                        <div class="{{ $colSize }}">
                            <div class="small-box {{ $value->module_class }}" style="box-shadow: 0px 2px 10px 3px #ACB3AB;">
                                <div class="inner">
                                    <h3>&nbsp;</h3>
                                    <p> &nbsp;</p>
                                </div>
                                <div class="icon">
                                    <i class="{{ $value->module_icon }}"></i>
                                </div>
                                <a href="{{ $value->module_route }}" class="small-box-footer" style="padding: 10px; cursor: pointer;">
                                    <label style="cursor: pointer;"> {{ $value->module_description }} </label>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-module-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b> Version </b> {{ config('app.probuilder.version') }}
                </div>
                <strong>Copyright &copy; {{ (date('Y') == config('app.probuilder.since')) ? '' : config('app.probuilder.since').'-' }}{{ date('Y') }} 
                 - All rights reserved. </strong>
            </div>
        </footer>
        <!-- jQuery 3 -->
        <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>

        <script type="text/javascript">
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
</html>