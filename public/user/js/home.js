$(document).ready(function() {
    $.ajax({
        url: "/api/show-product",
        type: "GET",
        success: function (result) {
            let html = '';
            var number_format = toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            result.result.forEach(product => {
                html += '<div class="col-md-3 col-sm-6 col-xs-6">' +
                  '<div class="product product-single">' +
                    '<div class="product-thumb">' +
                      '<a href="#" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                      '<img src=' + 'user/img/product01.jpg' + ' class="img-responsive" >' +
                    '</div>' +
                    '<div class="product-body text-center">' +
                      '<h3 class="product-price ">'+ product.price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '  <del class="product-old-price">1000000</del></h3> VNĐ' +
                    '</div>' +
                      '<h2 class="product-name text-center"><a href="#">'+ product.name +'</a></h2>' +
                      '<div class="product-btns">' +
                        '<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>' +
                        '<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>' +
                        '<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>' +
                      '</div>' +
                    '</div>';

                html += '</div>';
            });
            $('#js-product-promotions').append(html);
        }
    })
})
