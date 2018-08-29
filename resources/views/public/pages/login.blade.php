<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <p class="modal-title">{{ __('user/index.login') }}</p>
      </div>
      <div class="modal-body">
        <form id="formLogin">
          <label for="email">{{ __('user/index.formLogin.email') }}</label><br>
          <input id="email" class="form-control" type="email" required>
          <br>
          <label for="password">{{ __('user/index.formLogin.pass') }}</label><br>
          <input id="password" class="form-control" type="password" required>
          <br>
          <input type="submit" name="btnLogin" id="btnLogin" class="btn btn-warning" value="Login">
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!-- <script src="{{ url('user/js/login.js') }}"></script> -->
<link type="text/css" rel="stylesheet" href="{{ url('user/css/login.css') }}" />
