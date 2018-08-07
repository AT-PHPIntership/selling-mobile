@extends('backend.master')
@section('title', 'List Categories') )
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{ __('category.admin.edit.title') }}</h2>
            <div class="clearfix"></div>
          </div>
          @include('backend.message') 
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="POST" action="{{ route('admin.categories.update', ['id' => $category['id']]) }}">
            @include('backend.error')
              {{ csrf_field() }}
              @method('PUT')
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('category.admin.add.name') }}</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="{{ old('name', $category->name) }}" name="name">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('category.admin.table.parent_id') }}</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="parent_id">
                    <option value=""></option>
                    @foreach ($listCategoriesParent as $list)
                      <option @if($list->id == $category->parent_id) selected @endif
                        value="{{ $list->id }}">{{ $list->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('category.admin.table.created_at') }}</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="{{ old('created_at', $category->created_at) }}" name="created_at">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('category.admin.table.updated_at') }}</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="{{ old('updated_at', $category->updated_at) }}" name="updated_at">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <a href="{{ route('admin.categories.index') }}" class="btn btn-success">{{ __('category.admin.add.back') }}</a>
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
