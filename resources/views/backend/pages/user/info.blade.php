@extends('backend.master')
@section('title', __('admin.user_info'))
@section('content')
<div class="row">
    <div class="col-md-3">
    <div class="text-center">
      <img src="{{ url($user->avatar) }}" class="img-avatar-info avatar img-circle" alt="avatar">
    </div>
    </div>
    <div class="col-md-9 personal-info">
    <h3>Personal info</h3>
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('admin.username') }}</label>
        <div class="col-lg-8">
        <input class="form-control" type="text" value="{{ $user->username }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('admin.email') }}</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" value="{{ $user->email }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('admin.address') }}</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $user->address }}" disabled>
        </div>
      </div>
      <div class="form-group">
          <label class="col-md-3 control-label">{{ __('admin.phone') }}</label>
          <div class="col-md-8">
            <input class="form-control" type="text" value="{{ $user->phonenumber }}" disabled>
          </div>
        </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('admin.role') }}</label>
        <div class="col-md-8">
          <label class="control-label" >{{ $user->currentRole }}</label>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
          <a href="#" class="btn btn-primary">{{ __('admin.edit') }}</a>
          <input type="reset" class="btn btn-default" value="Cancel">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
