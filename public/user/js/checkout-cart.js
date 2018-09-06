$(document).ready(function () {
    $(document).on('click', '.js-checkout-cart', function(event) {
        event.preventDefault();
        checkLogin();

        $.ajax({
            url: "/api/cart/checkout",
            type: "post",
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Viet ',
            },
            data: {
                'cart' : localStorage.getItem('cart'),
                'userId' : localStorage.getItem('id'),
                'totalPrice': localStorage.getItem('totalPrice'),
                // 'address' : $('#address-orderer').val(),
                // 'customer_note'  : $('#note-orderer').val(),
                // 'delivery_time'  : $('#delivery-time input').val(),
                // 'money_ship' : 50000,
            },
            success: function(response) {
                if(response.code == 200) {
                    console.log(response);
                    // $('#modalMessageCart h3').html(Lang.get('user/cart.thank_you'));
                    // $('#modalMessageCart #modal-message').html(Lang.get('user/cart.message_susscess'));
                    // ModalMessageCart();
                    // modifyCart(0, 'clear')
                }
            },
            error: function (response) {
                alert("Not Oke");
                // if(response.responseJSON.error.products&&response.responseJSON.error.products.length >0){
                //     $('#modalMessageCart h3').html(Lang.get('user/cart.empty_cart'));
                //     $('#modalMessageCart #modal-message').html(Lang.get('user/cart.message_empty_cart'));
                //     ModalMessageCart();
                // }else{
                //     errors = Object.keys(response.responseJSON.error);
                //     errors.forEach(error => {
                //         $('#valmsg-' + error).removeClass('field-validation-valid');
                //         $('#valmsg-' + error).addClass('field-validation-error');
                //         $('#valmsg-' + error).html(response.responseJSON.error[error]);
                //     });
                // }
            }
        });
    });
});
function checkLogin() {
    url = '/checkout-cart';
    if (localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname + url;
    } else {
        $("#loginModal").modal("show");
    }
}
