$(document).ready(function () {
  $('#registerform').on('submit', function (event) {
    event.preventDefault();
      $.ajax({
        url: "/api/register",
        type: "post",
        headers: {
          'Accept': 'application/json',
        },
        data: {
          username: $('#regisUsername').val(),
          email: $('#regisEmail').val(),
          password: $('#regisPassword').val(),
          repassword: $('#rePassword').val(),
          phonenumber: $('#regisPhonenumber').val(),
          address: $('#regisAddress').val(),
          avatar: $('#regisAvatar').val(),
        },
        success: function (response) {
          $('#divShow').hide();
          localStorage.setItem('login-token', response.result.token);
          localStorage.setItem('username', response.result.user.username);
          $('#userName').html(response.result.user.username);
          window.location.href = 'http://' + window.location.hostname;
        },
        error: function (response) {
          errors = (response.responseJSON.error);
          var html = '';
          $.each(errors, function(key, value) {
          html += value +'<br>';
          console.log(value);
          });
          $('#showError').html(html);
          $('#divShow').show();
        }
      });
  });
})