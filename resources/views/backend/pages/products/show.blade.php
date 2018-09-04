@extends('backend.master')
@section('title',__('product.admin.show.title') )
@section('content')
@include('backend.message')
<div class="row clearfix">
  <div class="col-md-3">
    <div class="text-center">
      @if ($product->images->first()['path_image'])
        @if (strpos($product->images->first()['path_image'], 'https://') !== false)
          <img class="img-responsive thumbnail" src="{{ $product->images->first()['path_image'] }}">
        @else
          <img class="img-responsive thumbnail" src="{{ url('admin/images/products/'.$product->images->first()['path_image']) }}">
        @endif
      @else
        <img class="img-responsive thumbnail" url="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Qsw_ECf6sVU8xTKXhSyfXlfgwHojXM_7JQxlB8N2sACGfeu2">
      @endif
    </div>
  </div>
  <div class="col-md-9 personal-info">
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
          <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back</a>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('product.admin.table.id') }}:</label>
        <div class="col-lg-8">
          <input id="idProduct" class="form-control" type="text" value="{{ $product->id }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('product.admin.table.name') }}:</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" value="{{ $product->name }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.manufacturing_date') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->manufacturing_date }}" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.price') }}:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="{{ $product->price }}" disabled>
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
          <textarea type="text" name="description" rows="5" value="{{ old('description', $product->description) }}" class="form-control" placeholder="" >{{ $product->description }}</textarea>
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
        <label class="col-md-3 control-label">{{ __('product.admin.table.color') }}</label>
        <div class="col-md-8">
          <select id="colorProduct" class="form-control" name="colorProduct">
            <option value="">--SELECT COLOR PRODUCT--</option>
            @foreach ($product->colorProducts as $itemColor)
            <option value="{{ $itemColor->id }}">{{ $itemColor->color }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.price_color_value') }}:</label>
        <div id="colorValue" class="col-md-8">
          <input class="form-control" type="text" value="" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.price_color_type') }}:</label>
        <div id="colorType" class="col-md-8">
          <input class="form-control" type="text" value="" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">{{ __('product.admin.table.quantity') }}:</label>
        <div id="quantity" class="col-md-8">
          <input class="form-control" type="text" value="" disabled>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="{{ url('admin/js/show-color.js') }}"></script>
@endsection
