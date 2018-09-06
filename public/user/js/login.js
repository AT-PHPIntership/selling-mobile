$(document).ready(function () {
  if (localStorage.getItem('login-token')) {
    $('#userLogin').hide();
    $('#userLogout').show();
    $('#register').hide();
  } else {
    $('#userLogin').show();
    $('#userLogout').hide();
    $('#register').show();
  }
  $('#formLogin').on('submit', function (event) {
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
        localStorage.setItem('id', response.result.user.id);
        localStorage.setItem('user', JSON.stringify(response.result.user));
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
