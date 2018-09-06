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
          </div>
          <div id="product-view">
          </div>
        </div>
        <div class="col-md-6">
          <div class="product-body">
            <div class="product-label">
              <span>New</span>
              <span class="sale">-20%</span>
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
              <a href="#">3 Review(s) / Add Review</a>
            </div>
            <p><strong>Availability:</strong> In Stock</p>
            <p><strong>Brand:</strong> E-SHOP</p>
            <p id="description"></p>
            <div class="product-options">
              <ul class="size-option">
                <li><span class="text-uppercase">Size:</span></li>
                <li class="active"><a href="#">S</a></li>
                <li><a href="#">XL</a></li>
                <li><a href="#">SL</a></li>
              </ul>
              <ul class="color-option">
                <li><span class="text-uppercase">Color:</span></li>
                <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                <li><a href="#" style="background-color:#8A2454;"></a></li>
                <li><a href="#" style="background-color:#BF6989;"></a></li>
                <li><a href="#" style="background-color:#9A54D8;"></a></li>
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