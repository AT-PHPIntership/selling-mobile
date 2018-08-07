@extends('backend.master')
@section('title', __('category.admin.title') )
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{ __('category.admin.add.title') }}</h2>
            <div class="clearfix"></div>
          </div>
          @include('backend.message')
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="{{ route('admin.categories.store') }}">
              @include('backend.error')
              @csrf
              @method('POST')
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('category.admin.add.name') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="{{ __('category.admin.add.placeholder_name') }}" name="name" value="{{ old('name') }}">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('category.admin.add.parent_category') }}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="parent_id">
                    <option value=""></option>
                    @foreach ($listCategoriesParent as $list)
                    <option value="{{ $list->id }}" {{ (collect(old('parent_id'))->contains($list->id)) ? 'selected':'' }}>{{ $list->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">{{ __('category.admin.add.reset') }}</button>
                  <button type="submit" class="btn btn-success">{{ __('category.admin.add.submit') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
