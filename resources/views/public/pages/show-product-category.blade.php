@extends('public.layouts.master')
@section('home')
<div class="section">
  <div class="container">
    <div class="row">
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Products of Category</h2>
        </div>
      </div>
      <div id="js-show-products" class="row">
      </div>
      <div id="js-pagination" class="row">
      </div>
    </div>
  </div>
</div>
<script src="{{ url('user/js/show-product-category.js') }}"></script>
@endsection
