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
                    <th>STT</th>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th width="15%" class="column-title no-link last"><center class="nobr">{{ __('category.admin.table.action') }}</center></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $item)
                  <tr class="even pointer">
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ url($item->avatar) }}" class="imgAvatar"></td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phonenumber }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                      <form class="col-md-4">
                        <a class="btn btn-primary" title="Edit" href="#"><i class="fa fa-edit"></i></a>
                      </form>
                      <form class="col-md-4" method="POST" >
                        <button class="btn btn-danger" title="Delete" type="submit"><i class="fa fa-trash icon-size" ></i></button>
                      </form>
                      <form class="col-md-4">
                        <a class="btn btn-primary" title="Info" href="{{ url('admin/user', ['id' => $item->id]) }}"><i class="fa fa-eye icon-size" ></i></a>
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
