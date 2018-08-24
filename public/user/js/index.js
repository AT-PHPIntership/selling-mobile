$(document).ready(function() {
    $.ajax({
        url: "/api/show-product-promotion",
        type: "GET",
        success: function (result) {
          var html = '';
          $.each(result.result, function(index, product) {
            var promotion = product.promotions[0]['promotion_value'];
            var color = product.color_products[0]['price_color_value'];
            var price_currencies = product.price + color;
            var price_percent = product.price + product.price * (color/100);
            var color_type = product.color_products[0]['price_color_type']
            var price_color_check = (color_type == 'currencies' ? price_currencies : price_percent);
            var price_promotion_currencies = price_color_check - promotion;
            var price_promotion_percent = price_color_check - price_color_check * (promotion/100);
            var promotion_type = product.promotions[0]['promotion_type'];
            var price_promotion_check = (promotion_type == 'currencies' ? price_promotion_currencies : price_promotion_percent);
            html += '<div class="col-md-3 col-sm-6 col-xs-6">' +
                        '<div class="product product-single">' +
                          '<div class="product-thumb">' +
                            '<a href="#" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                            '<img src="user/img/product01.jpg" class="img-responsive" >' +
                          '</div>' +
                          '<div class="product-body text-center">' +
                            '<h3 class="product-price ">'+ price_promotion_check.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") +' <del class="product-old-price">'+ price_currencies.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") +'</del></h3> VNĐ' +
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

$(document).ready(function() {
  $.ajax({
      url: "/api/show-products",
      type: "GET",
      success: function (result) {
        var html = '';
        var paginate = '';
        $.each(result.result.data, function(index, product) {
          console.log(product);
            var color = product.color_products[0]['price_color_value'];
            var price_currencies = product.price + color;
            var price_percent = product.price + product.price * (color/100);
            var color_type = product.color_products[0]['price_color_type']
            var price_color_check = (color_type == 'currencies' ? price_currencies : price_percent);

            // check exists table promotions
            if (product.promotions.length > 0) {
              var promotion = product.promotions[0]['promotion_value'];
              var price_promotion_currencies = price_color_check - promotion;
              var price_promotion_percent = price_color_check - price_color_check * (promotion/100);
              var promotion_type = product.promotions[0]['promotion_type'];
              var price_promotion_check = (promotion_type == 'currencies' ? price_promotion_currencies : price_promotion_percent);
              var promotion_from_date = new Date(product.promotions[0]['from_date']).getTime();
              var promotion_to_date = new Date(product.promotions[0]['to_date']).getTime();

              // check exists date promotion
              if (promotion_from_date <= $.now() && promotion_to_date >= $.now()) {
                html += '<div class="col-md-3 col-sm-6 col-xs-6">' +
                            '<div class="product product-single">' +
                              '<div class="product-thumb">' +
                                '<a href="#" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                                '<img src="user/img/product01.jpg" class="img-responsive" >' +
                              '</div>' +
                              '<div class="product-body text-center">' +
                                '<h3 class="product-price ">'+ price_promotion_check.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") +' <del class="product-old-price">'+ price_color_check.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") +'</del></h3> VNĐ' +
                              '</div>' +
                              '<h2 class="product-name text-center"><a href="#">'+ product.name +'</a></h2>' +
                              '<div class="product-btns">' +
                                '<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>' +
                                '<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>' +
                                '<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>' +
                              '</div>' +
                            '</div>';
                html += '</div>';
              } else {
                html += '<div class="col-md-3 col-sm-6 col-xs-6">' +
                            '<div class="product product-single">' +
                              '<div class="product-thumb">' +
                                '<a href="#" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                                '<img src="user/img/product01.jpg" class="img-responsive" >' +
                              '</div>' +
                              '<div class="product-body text-center">' +
                                '<h3 class="product-price ">'+ price_color_check.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") +'</h3> VNĐ' +
                              '</div>' +
                              '<h2 class="product-name text-center"><a href="#">'+ product.name +'</a></h2>' +
                              '<div class="product-btns">' +
                                '<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>' +
                                '<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>' +
                                '<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>' +
                              '</div>' +
                            '</div>';
                html += '</div>';
              }
            } else {
                html += '<div class="col-md-3 col-sm-6 col-xs-6">' +
                            '<div class="product product-single">' +
                              '<div class="product-thumb">' +
                                '<a href="#" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                                '<img src="user/img/product01.jpg" class="img-responsive" >' +
                              '</div>' +
                              '<div class="product-body text-center">' +
                                '<h3 class="product-price ">'+ price_color_check.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") +'</h3> VNĐ' +
                              '</div>' +
                              '<h2 class="product-name text-center"><a href="#">'+ product.name +'</a></h2>' +
                              '<div class="product-btns">' +
                                '<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>' +
                                '<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>' +
                                '<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>' +
                              '</div>' +
                            '</div>';
                html += '</div>';
            }
        });
        $('#js-show-products').append(html);
        // paginate += '{{ result->links() }}';
        // $('#js-paginate').append(paginate);
      }
  })
})
