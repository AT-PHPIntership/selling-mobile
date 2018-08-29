@extends('public.layouts.master')
@section('home')
<link rel="stylesheet" type="text/css" href="{{ url('/user/css/style-register.css') }}"/>
<div class="container">
  <center><h3>{{ __('user/register.title') }}</h3></center>
  <div id="divShow" class="form-group" hidden="">
    <div class="alert alert-danger">
      <ul>
        <center><p id="showError" ></p></center>
      </ul>
    </div>
  </div>
  <div class="form" >
    <form action="" id="registerform" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')
      <p class="contact"><label for="name">{{ __('user/register.name') }}</label></p>
      <input id="regisUsername" name="name" placeholder="Enter your name" required=""type="text">
      <p class="contact"><label for="email">{{ __('user/register.email') }}</label></p>
      <input id="regisEmail" name="email" placeholder="example@domain.com" required="" type="email">
      <p class="contact"><label for="password">{{ __('user/register.password') }}</label></p>
      <input id="regisPassword" type="password" name="password" required="">
      <p class="contact"><label for="password">{{ __('user/register.repassword') }}</label></p>
      <input type="password" id="rePassword" name="repassword" required="">
      <p class="contact"><label for="phonenumber">{{ __('user/register.phonenumber') }}</label></p>
      <input id="regisPhonenumber" name="phonenumber" placeholder="Enter your number" required="" type="text">
      <p class="contact"><label for="address">{{ __('user/register.address') }}</label></p>
      <input id="regisAddress" name="address" placeholder="Enter your address" required="" type="text">
      <p class="contact"><label for="avatar">{{ __('user/register.avatar') }}</label></p>
      <input type="file" id="regisAvatar" class="form-control" name="avatar[]" placeholder="" multiple="multiple">
      <input class="buttom" name="submit" tabindex="5" value="Register" type="submit">
    </form>
  </div>
@endsection
