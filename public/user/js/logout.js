$(document).ready(function () {
  $(document).on('click', '#userLogout', function (event) {
    event.preventDefault();
    token = localStorage.getItem('login-token');
    console.log(token);
    if(token) {
      $.ajax({
        url: "/api/logout",
        type: "post",
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + token
        },
        success: function (response) {
          localStorage.removeItem('login-token');
          localStorage.removeItem('username');
          window.location.href = 'http://' + window.location.hostname;
        }
      });
    }
  });
})
