function showUserInfo(response) {
  let user = response.result;
  token = localStorage.getItem('login-token');
  if(token) {
    $('#textMessage').hide();
    $('#userNameInfo').val(user.username);
    $('#addressInfo').val(user.address);
    $('#phonenumberInfo').val(user.phonenumber);
    $('#emailInfo').val(user.email);
    $('#avatarInfo').val(user.avatar);
  }
}
function editUserInfo() {
  $.ajax({
    url: "/api/users/profile",
    type: "put",
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
    },
    data: {
      'phonenumber'  : $('#phonenumberInfo').val(),
      'address'  : $('#addressInfo').val(),
      'avatar' : $('#avatarInfo').val(),
    },
    success: function(response) {
      console.log(response);
      $('#textMessage').show().text('Update your information suscessful! ');
    },
    error: function (response) {
      $('#textMessage').show().text(response.responseJSON.message);
    }
  });
}
$(document).ready(function () {
  token = localStorage.getItem('login-token');
  if(token) {
    $.ajax({
      url: "/api/users/info",
      type: "get",
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      },
      success: function(response) {
        showUserInfo(response);
      }
    });
  
    $('#btnUpdateInfo').on('click', function(event) {
      event.preventDefault();
      editUserInfo();
    });
  } else {
    $('#textMessage').html('You are not sign in or do not have account. Please sign in or sign up account!');
    $('#profileForm').hide();
  } 
});
