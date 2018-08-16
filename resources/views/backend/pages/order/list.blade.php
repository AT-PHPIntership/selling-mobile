@extends('backend.master')
@section('title', __('admin.list_order'))
@section('content')
<link href="{{ url('admin/css/my-css.css') }}" rel="stylesheet">
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="clearfix"></div>
          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th>{{ __('admin.id') }}</th>
                    <th>{{ __('admin.username') }}</th>
                    <th>{{ __('admin.address') }}</th>
                    <th>{{ __('admin.email') }}</th>
                    <th>{{ __('admin.date_order') }}</th>
                    <th>{{ __('admin.status') }}</th>
                    <th width="15%" class="column-title no-link last"><center class="nobr">{{ __('category.admin.table.action') }}</center></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($orders as $item)
                  <tr class="even pointer">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user['username'] }}</td>
                    <td>{{ $item->user['address'] }}</td>
                    <td>{{ $item->user['email'] }}</td>
                    <td>{{ $item->date_checkout }}</td>
                    <td>{{ $item->currentStatus }}</td>
                    <td>
                      <form class="col-md-4">
                        <a class="btn btn-primary" title="Detail" href="{{ route('admin.orders.edit', ['id' => $item->id]) }}"><i class="fa fa-eye icon-size" ></i></a>
                      </form>
                      <form class="col-md-4" action="{{ route('admin.orders.destroy', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="deleted" class="btn btn-danger" title="Delete" onclick="return confirm('@lang('admin.mesage_delete')')" type="submit"><i class="fa fa-trash icon-size" ></i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $orders->links() }}
            </div>
            <div class="ln_solid"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
