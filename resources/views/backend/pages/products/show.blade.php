@extends('backend.master')
@section('title', __('product.admin.list.title') )
@section('content')
<div class="row clearfix">
  <div class="col-md-3">
    <div class="text-center">
      @foreach ($imageProduct as $item_image)
        @if ($item_image)
          @if (strpos($item_image->path, 'http://') !== false)
            <img class="img-responsive thumbnail" src="{{ $item_image->path }}">
          @else
            <img class="img-responsive thumbnail" src="{{ url('admin/images/products/'.$item_image->path) }}">
          @endif
        @else
          <img class="img-responsive thumbnail" url="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Qsw_ECf6sVU8xTKXhSyfXlfgwHojXM_7JQxlB8N2sACGfeu2">
        @endif
      @endforeach
    </div>
  </div>
  <div class="col-md-9 personal-info">
    <h3>{{ __('product.admin.show.title') }}</h3>
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('product.admin.table.id') }}:</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" value="{{ $product->id }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('product.admin.table.name') }}:</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" value="{{ $product->name }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.quantity') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->quantity }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.manufacturing_date') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->manufacturing_date }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.status') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->status }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.producer') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->producer }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.detail') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->detail }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.description') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->description }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.category_id') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->category_id }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.created_at') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->created_at }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.updated_at') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->updated_at }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.deleted_at') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->deleted_at }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.color') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $colorProduct->color }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.unit_price') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $colorProduct->unit_price }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
          <a href="#" class="btn btn-primary">Back</a>
          <input type="reset" class="btn btn-default" value="Cancel">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
