@extends('public.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ url('user/css/order-cart.css') }}">
<div class="container">
  <div id="head-order-cart" class="row">
    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
      <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
          <address>
            <strong>Info Customer</strong>
            <br>
              <span id="js-username"></span>
            <br>
              <span id="js-email"></span>
            <br>
              <span id="js-address"></span>
            <br>
            <abbr title="Phone">Phone :</abbr><span id="js-phone"></span>
          </address>
        </div>
      </div>
      <div class="row">
        <div class="text-center">
            <h1>Receipt</h1>
        </div>
        </span>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Product</th>
              <th>Quantity</th>
              <th class="text-center">Price</th>
              <th class="text-center">Total</th>
            </tr>
          </thead>
            <tbody>
              <div id="js-list-cart">
                aaaaaaaaa
                <tr>
                  <td class="col-md-9"><em>Baked Rodopa Sheep Feta</em></h4></td>
                  <td class="col-md-1" style="text-align: center"> 2 </td>
                  <td class="col-md-1 text-center">$13</td>
                  <td class="col-md-1 text-center">$26</td>
                </tr>
              </div>
              <tr>
                <td>   </td>
                <td>   </td>
                <td class="text-right"><h4><strong>Total: </strong></h4></td>
                <td class="text-center text-danger"><h4><strong>$31.53</strong></h4></td>
              </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success btn-lg btn-block">
          Pay Now</span>
        </button></td>
    </div>
  </div>
</div>
<script src="{{ url('user/js/order-cart.js') }}"></script>
@endsection
