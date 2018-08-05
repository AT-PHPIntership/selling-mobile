@if (count($errors))
  <div class="form-group">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <center><p>{{ $error }}</p></center>
        @endforeach
      </ul>
    </div>
  </div>
@endif
<div class="box">
  @if (Session::has('message'))
    <div class="alert alert-{{ Session::get('alert-class') }}">
      {{ Session::get('message') }}
    </div>
  @endif
</div>
