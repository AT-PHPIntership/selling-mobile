@extends('backend.master')
@section('title', __('product.admin.title') )
@section('content')
<div class="row clearfix">
  <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h2 class="card-inside-title">{{__('product.admin.edit.title')}}</h2>
        <div class="row clearfix">
          <div class="col-sm-12">
            <form id="demo-form2" method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">{{ __('product.admin.table.name') }}</label>
                <div class="form-line">
                  <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="manufacturing_date">{{ __('product.admin.table.manufacturing_date') }}</label>
                <div class="input-group">
                  <input type="text" name="manufacturing_date" value="{{ old('manufacturing_date', $product->manufacturing_date) }}" class="form-control" placeholder=""/>
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="price">{{ __('product.admin.table.price') }}</label>
                <div class="form-line">
                  <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
              </div>
              <div class="form-group">
                <label for="producer">{{ __('product.admin.table.producer') }}</label>
                <div class="form-line">
                  <input type="text" name="producer" value="{{ old('producer', $product->producer) }}" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="detail">{{ __('product.admin.table.detail') }}</label>
                <div class="form-line">
                  <input type="text" name="detail" value="{{ old('detail', $product->detail) }}" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="description">{{ __('product.admin.table.description') }}</label>
                <div class="form-line">
                  <textarea type="text" name="description" rows="5" value="{{ old('description', $product->description) }}" class="form-control" placeholder="" >{{ $product->description }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="category_id">{{ __('product.admin.table.category_id') }}</label>
                <div class="form-line">
                  <select class="form-control" name="category_id">
                    <option value=""></option>
                    @foreach ($listCategoriesChild as $list)
                    <option value="{{ $list->id }}" {{ $list->id == $product->category_id ? 'selected' : '' }} }}>{{ old('name', $list->name) }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label for="color_id">{{ __('product.admin.table.color') }}</label>
                <div class="form-line">
                  <select id="colorProduct" class="form-control" name="color_id">
                    <option value="">--SELECT COLOR PRODUCT--</option>
                    @foreach ($product->colorProducts as $itemColor)
                    <option value="{{ $itemColor->id }}">{{ $itemColor->id }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">{{ __('product.admin.table.price_color_value') }}:</label>
                <div id="colorValue" class="form-line">
                  <input class="form-control" type="text" value="" name="price_color_value">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">{{ __('product.admin.table.price_color_type') }}:</label>
                <div id="colorType" class="form-line">
                  <input class="form-control" type="text" value="" name="price_color_type" >
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">{{ __('product.admin.table.quantity') }}:</label>
                <div id="quantity" class="form-line">
                  <input class="form-control" type="text" value="" name="quantity" >
                </div>
              </div>
              
              <div class="form-group">
                <div class="form-group">
                  <label>{{ __('product.admin.table.image') }}</label>
                  <div class="form-line">
                    <input type="file" class="form-control" name="images[]" placeholder="" multiple="multiple">
                  </div>
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('product.admin.add.title') }}</button>&nbsp;
                <button class="btn btn-primary" type="reset">{{ __('product.admin.button.reset') }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ url('admin/js/edit-color.js') }}"></script>
  @endsection