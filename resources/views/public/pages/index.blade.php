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
          <h2 class="title">Iphone</h2>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
          <div class="product-thumb">
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            <img src="{{ url('user/img/product01.jpg') }}" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-price">$32.50</h3>
            <div class="product-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o empty"></i>
            </div>
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <div class="product-btns">
              <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Sam Sung</h2>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
          <div class="product-thumb">
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
            <img src="{{ url('user/img/product04.jpg') }}" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-price">$32.50</h3>
            <div class="product-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o empty"></i>
            </div>
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <div class="product-btns">
              <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ url('user/js/home.js') }}"></script>
@endsection
