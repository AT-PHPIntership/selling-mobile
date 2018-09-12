$(document).ready(function () {
    $.ajax({
      url: "/api"+window.location.pathname,
      type: "get",
      success: function(response){
        console.log(response);
        $('.product-name').html(response.result.name);
        $('.product-price').html(response.result.price);
        $('#description').html(response.result.description);
        $('#manufacturing_date').html(response.result.manufacturing_date);
        let i = 1;
        response.result.images.forEach(image => {
          $('#product-main-view-'+ i ).prop('src', 'admin/images/products/'+ image.path_image);
          $('#productview-'+ i ).attr('src', 'admin/images/products/'+ image.path_image);
          smallImg=$('.bzoom_smallthumb_active').parent().find( "div" ).children()[i-1];
          $(smallImg).attr('src','images/products/'+ image.path);
          i++;
        });
        var html = '';
        response.result.color_products.forEach(color_product => {
          html += '<li><a href="#">'+ color_product.color +'</a></li>';
        });
        $('.color-option').append(html);
        $('.sale').append(response.result.promotions[0].promotion_value + "%");
        
      },
      error: function (error) {
        console.log(error);
      }
    });
})