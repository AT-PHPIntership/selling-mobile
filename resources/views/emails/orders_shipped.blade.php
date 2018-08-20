<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('admin.mail')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h2>@lang('admin.welcome_mail')</h2>
    <p>@lang('admin.tks_order')</p>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>@lang('admin.stt')</th>
          <th>@lang('admin.product_name')</th>
          <th>@lang('admin.quantity')</th>
          <th>@lang('admin.price')</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($order->products as $product)
          @foreach ($order->orderDetails as $quantity)
            @foreach ($quantity->product->colorProducts as $detail)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $quantity->quantity }}</td>
                <td>{{ number_format($quantity->quantity * $detail->price_color_value) }}</td>
              </tr>
            @endforeach
          @endforeach
        @endforeach
        <tr>
          <td colspan="3" class="text-center"><b>@lang('admin.total_price')</b></td>
          <td colspan="1"><b class="text-red">{{ number_format($order->total_price) }}@lang('admin.vnd')</b></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
