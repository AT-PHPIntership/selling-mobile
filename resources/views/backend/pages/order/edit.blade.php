@extends('backend.master')
@section('title', __('admin.detail_order'))
@section('content')
<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <div class="row">
        <div class="col-md-12">
          <div class="container123 col-md-8" style="">
            <h4></h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="col-md-2 text-center" colspan="2">@lang('admin.order_info')</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>@lang('admin.customer_info')</td>
                  <td>{{ $data->user['username'] }}</td>
                </tr>
                <tr>
                  <td>@lang('admin.date_checkout')</td>
                  <td>{{ $data->date_checkout }}</td>
                </tr>
                <tr>
                  <td>@lang('admin.phone')</td>
                  <td>{{ $data->user['phonenumber'] }}</td>
                </tr>
                <tr>
                  <td>@lang('admin.address')</td>
                  <td>{{ $data->user['address'] }}</td>
                </tr>
                <tr>
                  <td>@lang('admin.email')</td>
                  <td>{{ $data->user['email'] }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
            <tr role="row">
              <th class="col-md-1 text-center" >@lang('admin.stt')</th>
              <th class="col-md-4">@lang('admin.product_name')</th>
              <th class="col-md-2">@lang('admin.quantity')</th>
              <th class="col-md-2">@lang('admin.price')</th>
            </thead>
            <tbody>
            @foreach($orders as $key => $item)
              <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price_color_value * $item->quantity) }}@lang('admin.vnd')</td>
              </tr>
            @endforeach
            <tr>
              <td colspan="3" class="text-center"><b>@lang('admin.total_price')</b></td>
              <td colspan="1"><b class="text-red">{{ number_format($item->amount) }}@lang('admin.vnd')</b></td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12">
        <form action="{{ route('admin.orders.update', ['id' => $data->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="col-md-8"></div>
          <div class="col-md-4">
          <div class="form-inline">
            <label>@lang('admin.order_status')</label><br/>
            <select name="status" class="form-control input-inline" style="width: 200px">
              <option value="{{ config('setting.order.status.pending') }}" {{ old('status', $data->status) == config('setting.order.status.pending') ? 'selected' : '' }}>@lang('admin.pending')</option>
              <option value="{{ config('setting.order.status.approve') }}" {{ old('status', $data->status) == config('setting.order.status.approve') ? 'selected' : '' }}>@lang('admin.approve')</option>
              <option value="{{ config('setting.order.status.cancel') }}" {{ old('status', $data->status) == config('setting.order.status.cancel') ? 'selected' : '' }}>@lang('admin.cancel')</option>
            </select>
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
