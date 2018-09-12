@extends('public.layouts.master')
@section('home')
<!-- BREADCRUMB -->
<div id="breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Products</a></li>
      <li><a href="#">Category</a></li>
      <li class="active">Product Name Goes Here</li>
    </ul>
  </div>
</div>
<!-- /BREADCRUMB -->
<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!--  Product Details -->
      <div class="product product-details clearfix">
        <div class="col-md-6">
          <div id="product-main-view">
            <div class="product-view">
              <img id="product-main-view-1" src="" alt="">
            </div>
            <div class="product-view">
              <img id="product-main-view-2" src="" alt="">
            </div>
            <div class="product-view">
              <img id="product-main-view-3" src="" alt="">
            </div>
            <div class="product-view">
              <img id="product-main-view-4" src="{{ url('admin/images/products/HTC-1.jpg') }}" alt="">
            </div>
          </div>
          <div id="product-view">
            <div class="product-view">
              <img id="productview-1" src="" alt="">
            </div>
            <div class="product-view">
              <img id="productview-2" src="" alt="">
            </div>
            <div class="product-view">
              <img id="productview-3" src="" alt="">
            </div>
            <div class="product-view">
              <img id="productview-4" src="" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="product-body">
            <div class="product-label">
              <span>SALE: </span>
                <span class="sale"></span>
              </div>
            <h2 class="product-name"></h2>
            <h3 class="product-price"></h3>
            <div>
              <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i>
              </div>
            </div>
            <p><strong>Manufacturing Date:</strong><span id="manufacturing_date"></span></p>
            <p><strong>Brand:</strong> SELLING-MOBLE</p>
            <p id="description"></p>
            <div class="product-options">
              <ul class="color-option">
                <li><span class="text-uppercase">Color:</span></li>
                <li class="color-product"></li>
              </ul>
            </div>
            <div class="product-btns">
              <div class="qty-input">
                <span class="text-uppercase">QTY: </span>
                <input class="input" type="number">
              </div>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
              <div class="pull-right">
                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Product Details -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<script src="/user/js/product-details.js"></script>
<!-- /section -->
@endsection