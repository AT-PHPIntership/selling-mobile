var cart = JSON.parse(localStorage.getItem('cart'));
var totalPrice = localStorage.getItem('totalPrice');

// reload page
$(document).ready(function(){
    $('body').ready(function() {
        $('#totalQty').text(getTotalQty());
        $('#totalPrice').text(getTotalPrice());
        $('#js-total-price').text(getTotalPrice());
        showCart();
        loadListCart();
        modifyCart();
        removeCart();
    })
});

function addToCart(e) {
    if (!cart) {
        cart = [];
    }
    var idProduct = $(e).attr("id");
    var price = $(e).parent().parent().find(".product-price").attr("price");
    var nameProduct = $(e).parent().parent().find(".product-name").text();
    var imageProduct = $(e).parent().parent().find(".img-product img").attr("src");
    var data;
    var html = '';

    if ( cart.length > 0) {
        // Check duplicate idProduct
        var resultObject = findId(idProduct, cart);
        if (!resultObject) {
            data = {idProduct: idProduct, price: price, nameProduct: nameProduct, imageProduct: imageProduct, quantity: 1};
            cart.push(data);
        } else {
            for (var j = 0; j < cart.length; j++) {
                if (cart[j].idProduct === idProduct) {
                    cart[j].quantity += 1;
                }
            }
        }
    } else {
        data = {idProduct: idProduct, price: price, nameProduct: nameProduct, imageProduct: imageProduct, quantity: 1};
        cart.push(data);
    }
    localStorage.setItem("cart", JSON.stringify(cart));

    //reload page
    $('#totalQty').text(getTotalQty());
    $('#totalPrice').text(getTotalPrice());
    loadListCart();
    removeCart();
    localStoreTotalPrice();
}

function loadListCart() {
    var html = '';
    $.each(cart, function(key, value) {
        html += '<div class="product product-widget">' +
            '<div class="product-thumb">' +
                '<img src="'+ value.imageProduct +'" alt="">' +
            '</div>' +
            '<div class="product-body">' +
                '<h3 class="product-price">'+ toCurrency(value.price) +'<span class="qty"> x '+ value.quantity +'</span></h3>' +
                '<h2 class="product-name"><a href="#">'+ value.nameProduct +'</a></h2>' +
            '</div>'+
            '<button id="'+ value.idProduct +'" onlick="removeCart(this)" class="cancel-btn"><i class="fa fa-trash"></i></button>' +
        '</div>';
    });
    $('#js-cart-info').html(html);
}

function removeCart(e) {
    var idProduct = $(e).attr("id");
    var html = '';

    for (var i = 0; i < cart.length; i++) {
        if (cart[i].idProduct === idProduct) {
            cart.splice(i, 1);
            localStorage.setItem("cart",JSON.stringify(cart));
        }
    }
    // reload page cart list
    $('#totalQty').text(getTotalQty());
    $('#totalPrice').text(getTotalPrice());
    $('#js-total-price').text(getTotalPrice());
    showCart();
    $.each(cart, function(key, value) {
        html += '<div class="product product-widget">' +
            '<div class="product-thumb">' +
                '<img src="'+ value.imageProduct +'" alt="">' +
            '</div>' +
            '<div class="product-body">' +
                '<h3 class="product-price">'+ toCurrency(value.price) +'<span class="qty"> x '+ value.quantity +'</span></h3>' +
                '<h2 class="product-name"><a href="#">'+ value.nameProduct +'</a></h2>' +
            '</div>' +
            '<button id="'+ value.idProduct +'" onclick="removeCart(this)" class="cancel-btn"><i class="fa fa-trash"></i></button>' +
        '</div>';
    });
    $('#js-cart-info').html(html);
    localStoreTotalPrice();
}

function findId(id, data) {
    for (var i = 0; i < data.length; i++) {
        if (data[i].idProduct === id) {
            return data[i];
        }
    }
}

function getTotalQty() {
    var totalQty = 0;
    $.each(cart, function(key, value) {
        totalQty += value.quantity;
    });
    return totalQty;
}

function getTotalPrice() {
    var totalPrice = 0;
    $.each(cart, function(key, value) {
        totalPrice += value.quantity * value.price;
    });
    return toCurrency(totalPrice);
}

function showCart() {
    var listCart = '';
    $.each(cart, function(key, value) {
        listCart += '<tr>' +
            '<td data-th="Product">' +
              '<img src="'+ value.imageProduct +'" class="img-responsive"/>' +
            '</td>'+
            '<td class="text-center" data-th="Product_Name">' +
                '<h4>'+ value.nameProduct +'</h4>' +
            '</td>' +
            '<td data-th="Price">'+ toCurrency(value.price) +'</td>' +
            '<td data-th="Quantity">' +
              '<input onchange="modifyCart(this)" type="number" class="form-control text-center" value="'+ value.quantity +'">' +
            '</td>' +
            '<td data-th="Subtotal" class="text-center">'+ toCurrency(value.price * value.quantity) +'</td>' +
            '<td class="actions" data-th="">' +
              '<button id="'+ value.idProduct +'" onclick="removeCart(this)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>' +
            '</td>' +
        '</tr>';
    });
    $('#js-show-cart').html(listCart);
}

function modifyCart(e) {
    var qty = $(e).val();
    var idProduct = $(e).parent().parent().find('button').attr("id");
    var quantity = parseInt(qty);
    for (var i = 0; i < cart.length; i++) {
        if (cart[i].idProduct === idProduct) {
            if (quantity > 0) {
                cart[i].quantity = quantity;
                localStorage.setItem("cart",JSON.stringify(cart));
            } else {
                alert('Please enter quantity larger than 0');
            }
        }
    }

    // reload page
    $('#totalQty').text(getTotalQty());
    $('#totalPrice').text(getTotalPrice());
    $('#js-total-price').text(getTotalPrice());
    showCart();
    loadListCart();
    removeCart();
    localStoreTotalPrice();
}

function toCurrency(number, currencyType = 'VND')
{
  switch (currencyType) {
    case "VND" :
      return new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(number);
    default :
      return new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(number);

  }
}

function localStoreTotalPrice() {
    var temp = $('#totalPrice').text();
    var totalPrice = temp.replace(/\D+/g, '');
    localStorage.setItem("totalPrice", totalPrice);
}
