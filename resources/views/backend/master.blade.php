<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('admin.title_dash') }}</title>
    <link href="{{ url('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ url('/admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('/admin/css/master.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        @include('backend.header')
        @include('backend.sidebar')
    </nav>
    <div id="wrapper">
        <div id="page-wrapper">
            @include('backend.error')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('admin/js/sb-admin-2.js') }}"></script>
    <script src="{{ url('admin/js/my-jquery.js') }}"></script>
</body>
</html>
