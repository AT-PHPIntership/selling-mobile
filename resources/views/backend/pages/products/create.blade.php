@extends('backend.master')
@section('title', __('product.admin.list.title') )
@section('content')
<div class="row clearfix">
  <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h2 class="card-inside-title">{{__('product.admin.add.title')}}</h2>
        <div class="row clearfix">
          <div class="col-sm-12">
            <form id="demo-form2" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">{{ __('product.admin.table.name') }}</label>
                <div class="form-line">
                  <input type="text" name="name" value="" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="manufacturing_date">{{ __('product.admin.table.manufacturing_date') }}</label>
                <div class="input-group">
                  <input type="text" name="manufacturing_date" value="" class="form-control" placeholder=""/>
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="price">{{ __('product.admin.table.price') }}</label>
                <div class="form-line">
                  <input type="text" name="price" value="" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="producer">{{ __('product.admin.table.producer') }}</label>
                <div class="form-line">
                  <input type="text" name="producer" value="" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="detail">{{ __('product.admin.table.detail') }}</label>
                <div class="form-line">
                  <input type="text" name="detail" value="" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="description">{{ __('product.admin.table.description') }}</label>
                <div class="form-line">
                  <textarea type="text" name="description" rows="5" value="" class="form-control" placeholder="" ></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="category_id">{{ __('product.admin.table.category_id') }}</label>
                <div class="form-line">
                  <select class="form-control" name="category_id">
                    <option value=""></option>
                    @foreach ($listCategoriesChild as $list)
                    <option value="{{ $list->id }}" {{ (collect(old('category_id'))->contains($list->id)) ? 'selected':'' }}>{{ $list->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="color">{{ __('product.admin.table.color') }}</label>
                <div class="form-line">
                  <input type="text" name="color" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label for="price_color_type">{{ __('product.admin.table.price_color_type') }}</label>
                <div class="form-line">
                  <select class="form-control" name="price_color_type">
                    <option value=""></option>
                    <option value="percent">Percent</option>
                    <option value="currencies">Currencies</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label" for="price_color_value">{{ __('product.admin.table.price_color_value') }}</label>
                <div class="form-line">
                  <input type="text" name="price_color_value" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="form-group">
                <label>{{ __('product.admin.table.path_image') }}</label>
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
@endsection
