@extends('backend.master')
@section('title', 'Add User')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="x_panel">
          <div class="clearfix"></div>
          <div class="x_content">
            <br />
          <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="{{ url('admin/user') }}">
              @csrf
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.username') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="{{ __('admin.placeholder_username') }}" name="username" value="{{ old('username') }}">
                  @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.email') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="{{ __('admin.placeholder_email') }}" name="email" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.phone') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="{{ __('admin.placeholder_phone') }}" name="phoneNumber" value="{{ old('phonenumber') }}">
                  @if ($errors->has('phonenumber'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phonenumber') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.address') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="{{ __('admin.placeholder_address') }}" name="address" value="{{ old('address') }}">
                  @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.avatar') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">
                  @if ($errors->has('avatar'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.password') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" class="form-control" placeholder="{{ __('admin.placeholder_password') }}" name="password">
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.repass') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" class="form-control" placeholder="{{ __('admin.placeholder_repass') }}" name="passwordAgain">
                  @if ($errors->has('passwordAgain'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('passwordAgain') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.role') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="radio-inline">
                    <input type="radio" name="role" id="role1" value="{{ config('setting.role.admin') }}" {{ (old('radio_admin') == 'Admin') ? 'checked' : '' }}>
                    {{ __('admin.admin') }}
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="role" id="role2" value="{{ config('setting.role.member') }}" {{ (old('radio_admin') == 'Member') ? 'checked' : '' }}>
                    {{ __('admin.member') }}
                  </label>
                  @if ($errors->has('role'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">{{ __('admin.submit') }}</button>
                  <button type="reset" class="btn btn-primary">{{ __('admin.reset') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
