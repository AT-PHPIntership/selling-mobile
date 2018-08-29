@extends('public.layouts.master')
@section('home')
<div id="home">
  <div class="container">
    <div class="home-wrap">
      <div id="home-slick">
        <div class="banner banner-1">
          <img src="{{ url('user/img/banner01.jpg') }}" alt="">
          <div class="banner-caption text-center">
            <h1>Bags sale</h1>
            <h3 class="white-color font-weak">Up to 50% Discount</h3>
            <button class="primary-btn">Shop Now</button>
          </div>
        </div>
        <div class="banner banner-1">
          <img src="{{ url('user/img/banner02.jpg') }}" alt="">
          <div class="banner-caption">
            <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
            <button class="primary-btn">Shop Now</button>
          </div>
        </div>
        <div class="banner banner-1">
          <img src="{{ url('user/img/banner03.jpg') }}" alt="">
          <div class="banner-caption">
            <h1 class="white-color">New Product <span>Collection</span></h1>
            <button class="primary-btn">Shop Now</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Deal of the day</h2>
        </div>
      </div>
      <div id="js-product-promotions">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Products</h2>
        </div>
      </div>
      <div id="js-show-products"></div>
      <div id="js-paginate"></div>
    </div>
  </div>
</div>
<script src="{{ url('user/js/index.js') }}"></script>
@endsection
