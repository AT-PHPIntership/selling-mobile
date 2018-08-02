<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('admin.title')}}</title>
    <link href="{{ url('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ url('/admin/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('admin.please_sign_in') }}</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" type="email" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">{{ __('admin.remember_me') }}
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">{{ __('admin.login') }}</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('admin/js/sb-admin-2.js') }}"></script>
</body>
</html>
