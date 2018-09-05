@extends('backend.master')
@section('title', 'List Categories')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{ __('category.admin.show.title') }}</h2>
            <div class="clearfix"></div>
          </div>
          @include('backend.message')
          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title col-md-4">{{ __('category.admin.table.id') }}</th>
                    <th class="column-title col-md-4">{{ __('category.admin.table.name') }}</th>
                    <th class="column-title no-link last"><center class="nobr">{{ __('category.admin.table.action') }}</center></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $item)
                  <tr class="even pointer">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                      <form class="col-md-4">
                        <a class="btn btn-primary" href="{{ route('admin.categories.show', ['id' => $item->id]) }}"><i class="fa fa-eye icon-size" ></i></a>
                      </form>
                      <form class="col-md-4">
                        <a class="btn btn-primary" id="edit{{ $item->id }}" href="{{ route('admin.categories.edit', ['id' => $item->id] ) }}"><i class="fa fa-edit"></i></a>
                      </form>
                      <form onsubmit="return confirm('{{__('category.admin.message.msg_del')}}');" class="col-md-4" action="{{ route('admin.categories.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="deleted{{ $item->id }}" class="btn btn-danger" type="submit">
                          <i class="fa fa-trash icon-size"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $categories->render() }}
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
                <a href="#" class="btn btn-success">{{ __('category.admin.add.back')}}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection