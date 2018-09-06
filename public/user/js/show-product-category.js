function toCurrency(number, currencyType = 'VND')
{
  switch (currencyType) {
    case "VND" :
      return new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(number);
    default :
      return new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(number);

  }
}
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
$(document).ready(function() {
  var url = "/api/show-products" + window.location.search;
  var id = parseInt(getParameterByName('category_id'));
  var name = getParameterByName('name');
  var current_page;
  $.ajax({
    url: url,
    type: "get",
     success: function (result) {
      var productsLayout = '';
      $.each(result.result.data, function (index, product) {
        console.log(product);
        if ( id === product.categories.id){
          productsLayout +=
          '<div class="col-md-3 col-sm-6 col-xs-6">' +
            '<div class="product product-single">' +
              '<div class="product-thumb">' +
                '<a href="" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                '<img style="width: 150px; height:200px; margin: 0 auto" src="'+ '/admin/images/products/' + product.color_products[0].path_image + '" class="img-responsive" >' +
              '</div>' +
              '<div class="product-body text-center">' +
                '<h3 class="product-price" price="'+ Math.round(product.actual_price, 0) +'">'+ toCurrency(product.actual_price) +' <del class="product-old-price">'+ toCurrency(product.price) +'</del></h3>' +
              '</div>' +
              '<h2 class="product-name text-center"><a href="#">'+ product.name +'</a></h2>' +
              '<div class="product-btns">' +
                '<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>' +
                '<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>' +
                '<button id="'+ product.id +'" onclick="addToCart(this)" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>' +
              '</div>' +
            '</div>' +
          '</div>';
        }
        if ( name != null && product.name.toUpperCase().search(name.toUpperCase()) !== -1 ){
          productsLayout +=
          '<div class="col-md-3 col-sm-6 col-xs-6">' +
            '<div class="product product-single">' +
              '<div class="product-thumb">' +
                '<a href="#" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>' +
                '<img src="' + '/admin/images/products/' + product.color_products[0].path_image + '" class="img-responsive" >' +
              '</div>' +
              '<div class="product-body text-center">' +
                '<h3 class="product-price" price="'+ Math.round(product.actual_price, 0) +'">'+ toCurrency(product.actual_price) +' <del class="product-old-price">'+ toCurrency(product.price) +'</del></h3>' +
              '</div>' +
              '<h2 class="product-name text-center"><a href="#">'+ product.name +'</a></h2>' +
              '<div class="product-btns">' +
                '<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>' +
                '<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>' +
                '<button id="'+ product.id +'" onclick="addToCart(this)" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>' +
              '</div>' +
            '</div>' +
          '</div>';
        }
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
    },
    error: function (error) {
      console.log(error);
    }
  });
});
