$(document).ready(function () {
    $.ajax({
      url: "/api"+window.location.pathname,
      type: "get",
      success: function(response){
        console.log(response);
        $('.product-name').html(response.result.name);
        $('.product-price').html(response.result.price);
        $('#description').html(response.result.description);
        response.result.images.forEach(image => {
          $('.show-images').attr('src', 'admin/images/products/'+ image.path_image);

        }); 
        var html = '';
        response.result.images.forEach(image => {
          html += '<div class="product-view">' +
                  '<img src="admin/images/products/'+ image.path_image +'" alt="">' +
                  '</div>';
        }); 
        $('#product-main-view').html(html);
        $('#product-view').html(html);
      },
      error: function (error) {
        console.log(error);
      }
    });
})