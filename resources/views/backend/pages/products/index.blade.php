@extends('backend.master')
@section('title', __('product.admin.list.title') )
@section('content')
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <div class="header">
          <h2>Product</h2>
        </div>
        <div class="body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>{{__('product.admin.table.id')}}</th>
                <th>{{__('product.admin.table.image')}}</th>
                <th>{{__('product.admin.table.name')}}</th>
                <th>{{__('product.admin.table.quantity')}}</th>
                <th>{{__('product.admin.table.manufacturing_date')}}</th>
                <th>{{__('product.admin.table.color')}}</th>
                <th>{{__('product.admin.table.action')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td><img class="img-responsive thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Qsw_ECf6sVU8xTKXhSyfXlfgwHojXM_7JQxlB8N2sACGfeu2"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->manufacturing_date}}</td>
                <td>
                  @foreach ($product->colorProducts as $item_color)
                  <a href="{{ route('admin.products.show', ['id' => $item_color->id]) }}">{{ $item_color->color }}</a>
                  @endforeach
                </td>
                <td>
                  <form class="col-md-4">
                    <a class="btn btn-primary" href="{{ route('admin.products.showchild', ['id' => $product->id]) }}"><i class="fa fa-eye icon-size" ></i></a>
                  </form>
                  <form class="col-md-4">
                    <a class="btn btn-primary" id="edit{{ $product->id }}" href="{{ route('admin.products.edit', ['id' => $product->id]) }}"><i class="fa fa-edit"></i></a>
                  </form>
                  <form class="col-md-4" method="POST" action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" id="deleted{{ $product->id }}">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('@lang('product.admin.message.msg_del')')"><i class="fa fa-trash icon-size" ></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $products->render() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection