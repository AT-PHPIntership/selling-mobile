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
