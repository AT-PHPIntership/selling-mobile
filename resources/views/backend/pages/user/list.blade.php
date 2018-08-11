@extends('backend.master')
@section('title', __('admin.user_list'))
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
                    <th>{{ __('admin.stt') }}</th>
                    <th>{{ __('admin.avatar') }}</th>
                    <th>{{ __('admin.username') }}</th>
                    <th>{{ __('admin.email') }}</th>
                    <th>{{ __('admin.phone') }}</th>
                    <th>{{ __('admin.address') }}</th>
                    <th>{{ __('admin.role') }}</th>
                    <th width="15%" class="column-title no-link last"><center class="nobr">{{ __('category.admin.table.action') }}</center></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $item)
                  <tr class="even pointer">
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ url($item->avatar) }}" class="img-avatar"></td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phonenumber }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->currentRole }}</td>
                    <td>
                      <form class="col-md-4">
                      <a class="btn btn-primary" title="Edit" href="{{ route('admin.users.edit', ['id' => $item->id]) }}"><i class="fa fa-edit"></i></a>
                      </form>
                      <form class="col-md-4">
                        <a class="btn btn-primary" title="Info" href="{{ route('admin.users.show', ['id' => $item->id]) }}"><i class="fa fa-eye icon-size" ></i></a>
                      </form>
                      <form class="col-md-4" action="{{ route('admin.users.destroy', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if ($item->role != config('setting.role.admin'))
                          <button id="deleted" class="btn btn-danger" title="Delete" onclick="return confirm('@lang('admin.mesage_delete')')" type="submit"><i class="fa fa-trash icon-size" ></i></button>
                        @endif
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $users->links() }}
            </div>
            <div class="ln_solid"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
