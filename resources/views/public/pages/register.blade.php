@extends('public.layouts.master')
@section('home')
<link rel="stylesheet" type="text/css" href="{{ url('/user/css/style-register.css') }}"/>
<div class="container">
  <center><h3>Register Account</h3></center>
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
      <p class="contact"><label for="name">Name</label></p>
      <input id="regisUsername" name="name" placeholder="Enter your name" required=""type="text">
      <p class="contact"><label for="email">Email</label></p>
      <input id="regisEmail" name="email" placeholder="example@domain.com" required="" type="email">
      <p class="contact"><label for="password">Create a password</label></p>
      <input id="regisPassword" type="password" name="password" required="">
      <p class="contact"><label for="reassword">Confirm your password</label></p>
      <input type="password" id="rePassword" name="repassword" required="">
      <p class="contact"><label for="phonenumber">Your Phone</label></p>
      <input id="regisPhonenumber" name="phonenumber" placeholder="Enter your number" required="" type="text">
      <p class="contact"><label for="address">Address</label></p>
      <input id="regisAddress" name="address" placeholder="Enter your address" required="" type="text">
      <p class="contact"><label for="avatar">Avatar</label></p>
      <input type="file" id="regisAvatar" class="form-control" name="avatar[]" placeholder="" multiple="multiple">
      <input class="buttom" name="submit" tabindex="5" value="Register" type="submit">
    </form>
  </div>
@endsection
