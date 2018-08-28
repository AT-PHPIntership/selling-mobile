$(document).ready(function () {
  if (localStorage.getItem('login-token')) {
    $('#userLogin').hide();
    $('#userLogout').show();
  } else {
    $('#userLogin').show();
    $('#userLogout').hide();
  }
  $(document).on('submit', 'form', function (event) {
    event.preventDefault();
    $.ajax({
      url: "/api/login",
      type: "post",
      headers: {
        'Accept': 'application/json',
      },
      data: {
        email: $('#email').val(),
        password: $('#password').val()
      },
      success: function (response) {
        localStorage.setItem('login-token', response.result.token);
        localStorage.setItem('username', response.result.user.username);
        $('#userName').html(response.result.user.username);
        window.location.href = 'http://' + window.location.hostname;
      },
      statusCode: {
        401: function (response) {
          alert(response.responseJSON.error);
          $('input[type="password"]').val('');
        }
      }
    });
  })
  if (localStorage.getItem('login-token')) {
    name = localStorage.getItem("username");
    $('#userName').html(name);
  } else {
    $('#userName').html("My Account");
  }
})