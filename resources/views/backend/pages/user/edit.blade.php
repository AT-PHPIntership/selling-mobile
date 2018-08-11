@extends('backend.master')
@section('title', __('admin.edit_user'))
@section('content')
<div class="row">
  <form class="form-horizontal" role="form" action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-md-3">
      <div class="text-center">
        <img src="{{ url($user->avatar) }}" class="img-avatar-info avatar img-circle" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" name="avatar" class="form-control">
        @if ($errors->has('avatar'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('avatar') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="col-md-8 personal-info">
    <h3>Personal info</h3>
      <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('admin.username') }}</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="username" value="{{ old('username', $user->username) }}">
          @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('admin.email') }}</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="email" value="{{ old('email', $user->email) }}" disabled>
          @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('admin.address') }}</label>
        <div class="col-md-8">
          <input class="form-control" type="text" name="address" value="{{ old('address', $user->address) }}">
          @if ($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('admin.phone') }}</label>
        <div class="col-md-8">
          <input class="form-control" type="text" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}">
          @if ($errors->has('phonenumber'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phonenumber') }}</strong>
            </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('admin.role') }}</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <label class="radio-inline">
            <input type="radio" name="role" id="role" value="{{ config('setting.role.admin') }}" {{ old('role', $user->role == config('setting.role.admin') ? 'checked' : '') }}>
            {{ __('admin.admin') }}
          </label>
          <label class="radio-inline">
            <input type="radio" name="role" id="role" value="{{ config('setting.role.member') }}" {{ old('role', $user->role == config('setting.role.member') ? 'checked' : '') }}>
            {{ __('admin.member') }}
          </label>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
          <button type="submit" class="btn btn-primary">{{ __('admin.submit') }}</button>
          <input type="reset" class="btn btn-default" value="Cancel">
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
