
$(document).ready(function () {
    var user = JSON.parse(localStorage.getItem('user'));
    var listCart = '';
    $('#js-username').text(user.username);
    $('#js-email').text(user.email);
    $('#js-address').text(user.address);
    $('#js-phone').text(user.phonenumber);

    // $.each(cart, function(key, value) {
    //     listCart += '<tr>' +
    //     '<td class="col-md-9"><em>'+ value.nameProduct +'</em></h4></td>' +
    //     '<td class="col-md-1" style="text-align: center">'+ value.quantity +'</td>' +
    //     '<td class="col-md-1 text-center">'+ value.price +'</td>' +
    //     '<td class="col-md-1 text-center">'+ value.price * value.quantity +'</td>' +
    //   '</tr>';
    // });
    // $('#js-list-cart').append(listCart);
});
