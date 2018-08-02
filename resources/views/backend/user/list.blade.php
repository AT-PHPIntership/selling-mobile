@extends('backend.master')
@section('title', __('admin.user_list'))
@section('content')
<style>
  .table-bordered tbody tr td {
    vertical-align: middle;
  }

  .imgAvatar {
    height: 110px;
    width: 100px;
  }

  .pagination {
    float: right;
    margin-right: 60px;
  }
</style>
<div class="row">
  <div class="col-lg-12">
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover" >
        <thead>
            <tr>
              <th>STT</th>
              <th>Avatar</th>
              <th>Username</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Role</th>
              <th style="text-align: center;" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($users as $item)
          <tr class="odd gradeX">
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ url($item->avatar) }}"  class="imgAvatar"
            </td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phonenumber }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->role }}</td>
            <td class="center"><button type="submit" class="btn btn-danger">Delete</a></td>
            <td class="center"><button type="button" class="btn btn-warning">Edit</button></td>
            <td class="center"><a href="{{ url('admin/user', ['id' => $item->id]) }}" class="btn btn-info">Info</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $users->links() }}
  </div>
</div>
@endsection
