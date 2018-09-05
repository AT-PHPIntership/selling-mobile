@extends('public.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ url('user/css/view-cart.css') }}">
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th class="text-center" style="width:10%">Image</th>
        <th class="text-center">Product Name</th>
        <th style="width:15%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
    </tr>
    </thead>
    <tbody id="js-show-cart">
    </tbody>
    <tfoot>
      <tr>
        <td><a href="{{ route('user.home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Total: <p id="js-total-price"></p> </strong></td>
        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
      </tr>
    </tfoot>
  </table>
</div>
<script src="{{ url('user/js/index.js?v=1') }}"></script>
<script src="{{ url('user/js/add-to-cart.js') }}"></script>
@endsection
