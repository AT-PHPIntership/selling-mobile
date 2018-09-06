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
                          '<div class="product-thumb img-product">' +
                            '<a href="#" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                            '<img src="'+ '/admin/images/products/' + product.color_products[0].path_image +'" class="img-responsive">' +
                          '</div>' +
                          '<div class="product-body text-center">' +
                            '<h3 class="product-price" price="'+ Math.round(price_promotion_check, 0) +'">'+ toCurrency(price_promotion_check) +' <del class="product-old-price">'+ toCurrency(price_currencies) +'</del></h3>' +
                          '</div>' +
                          '<h2 class="product-name text-center"><a id="product-name" href="#">'+ product.name +'</a></h2>' +
                          '<div class="product-btns">' +
                            '<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>' +
                            '<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>' +
                            '<button id="'+ product.id +'" onclick="addToCart(this)" class="add-to-cart primary-btn"><i class="fa fa-shopping-cart "></i> Add to Cart</button>' +
                          '</div>' +
                        '</div>';
            html += '</div>';
          });
          $('#js-product-promotions').append(html);
        }
    })
})

$(document).ready(function() {
  loadProductsData('/api/products');
  $('#js-pagination').on('click', '.page-link', function(e) {
    e.preventDefault();
    loadProductsData($(this).attr('path'));
  });
})

function loadProductsData(url)
{
    $.ajax({
        url: url,
        type: "GET",
        success: function (result) {
            var productsLayout = '';
            $.each(result.result.data, function (index, product) {
               productsLayout +=
                '<div class="col-md-3 col-sm-6 col-xs-6">' +
                  '<div class="product product-single">' +
                    '<div class="product-thumb img-product">' +
                      '<a href="#" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                      '<img src="' + product.color_products[0].path_image + '" class="img-responsive" >' +
                    '</div>' +
                    '<div class="product-body text-center">' +
                      '<h3 class="product-price" price="'+ Math.round(product.actual_price, 0) +'">'+ toCurrency(product.actual_price) +' <del class="product-old-price">'+ toCurrency(product.price) +'</del></h3>' +
                    '</div>' +
                    '<h2 class="product-name text-center"><a id="product-name" href="#">'+ product.name +'</a></h2>' +
                    '<div class="product-btns">' +
                      '<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>' +
                      '<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>' +
                      '<button id="'+ product.id +'" onclick="addToCart(this)" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>' +
                    '</div>' +
                  '</div>' +
                '</div>';
            });  /* end loop */
            $('#js-show-products').html(productsLayout);

            pageLayout = '<ul class="pagination" role="navigation">';
            if (result.result.prev_page_url) {
              pageLayout += '<li class="page-item"><a class="page-link" href="#" alt="'+ result.result.prev_page_url+ '" rel="prev" aria-label="« Previous">‹</a></li>';
            } else {
              pageLayout += '<li class="page-item disabled" aria-disabled="true" aria-label="« Previous">' +
                    '<span class="page-link" aria-hidden="true">‹</span>' +
                    '</li>';
            }
            for (i = 1; i <= result.result.last_page; i++) {
              if (i == result.result.current_page) {
                pageLayout += '<li class="page-item active" aria-current="page"><span class="page-link">' + i + '</span></li>';
              } else {
                pageLayout += '<li class="page-item"><a class="page-link" path="'+result.result.path+'?page='+i+'">'+i+'</a></li>';
              }
            }
            if (result.result.next_page_url) {
              pageLayout += '<li class="page-item" aria-disabled="true" aria-label="Next »">' +
                    '<span class="page-link" aria-hidden="true">›</span>' +
                    '</li>';
            } else {
              pageLayout += '<li class="page-item"><a class="page-link" href="'+result.result.next_page_url+'" rel="next" aria-label="Next »">›</a></li>';
            }
            pageLayout += '</ul>';
            $('#js-pagination').html(pageLayout);

            $('html,body').animate({
                scrollTop: $("#js-show-products").offset().top
            }, 'slow');
        },
        error: function (error) {
          console.log(error);
        }
    })
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

