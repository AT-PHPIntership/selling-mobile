@extends('public.layouts.master')
@section('home')
<div class="banner" style="margin-top:10px;">
  <p class="message full alert-info left text-center form-group" id="textMessage"></p>
  <div class="container">
    <div class="">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row form">
            <div class="col-md-3">
              <img id="avataruser" class="img-responsive thumbnail" src="http://www.uic.mx/posgrados/files/2018/05/default-user.png">
            </div>
            <div class="col-md-6" style="width:50%; margin-left: 10%">
              <form method="POST" data-ajax="true" data-ajax-failure="checkMember" data-ajax-method="Post" data-ajax-success="checkMember" enctype="multipart/form-data" id="inforForm" method="post">
                @csrf
                <p class="contact"><label for="name">{{ __('user/register.name') }}</label></p>
                <input id="userNameInfo" name="name" placeholder="Enter your name" required=""type="text">
                <p class="contact"><label for="email">{{ __('user/register.email') }}</label></p>
                <input id="emailInfo" name="email" placeholder="example@domain.com" required="" type="email" disabled>
                <p class="contact"><label for="phonenumber">{{ __('user/register.phonenumber') }}</label></p>
                <input id="phonenumberInfo" name="phonenumber" placeholder="Enter your number" required="" type="text">
                <p class="contact"><label for="address">{{ __('user/register.address') }}</label></p>
                <input id="addressInfo" name="address" placeholder="Enter your address" required="" type="text">
                <p class="contact"><label for="avatar">{{ __('user/register.avatar') }}</label></p>
                <input type="file" id="avatarInfo"  name="avatar[]" placeholder="" multiple="multiple">
                <button type="submit" id="btnUpdateInfo" class="btn btn btn-success"><i class="fa fa-sign-in" ></i>Save</button>
                <a href="#" class="btn btn btn-danger"><i class="fa fa-close"></i>Back</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/user/js/info-user.js"></script>
@endsection