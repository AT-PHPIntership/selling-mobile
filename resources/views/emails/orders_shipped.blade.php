<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h2>Welcome to phone.com</h2>
    <p>Tkanks you for ordering</p>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($order->products as $product)
            @foreach ($product->colorProducts as $price)
              @foreach ($order->orderDetails as $detail)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->quantity * $price->price_color_value }}</td>
              @endforeach
            @endforeach
          @endforeach
        </tr>
        <tr>
          <td colspan="3" class="text-center"><b>@lang('admin.total_price')</b></td>
          <td colspan="1"><b class="text-red">{{ number_format($order->total_price) }}@lang('admin.vnd')</b></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
