$(document).ready(function() {
  $('#colorProduct').on('change', function() {
    $('#show-color-product').show();
    $("#colorProduct").each(function () {
      $('#colorProduct').on('change', function() {
        if ( $('#colorProduct').val() == "" ) {
          $('#show-color-product').hide();
        }
      });
      var idColor = $(this).val();
      var idProduct = document.getElementById('idProduct').value;
      $.ajax({
        type: "GET",
        url:'/admin/products/'+idProduct+'/colors/'+idColor,
        success: function( data ) {
          $("#colorValue").html("<input class='form-control' type='text' value='"+ data[0].price_color_value + "' disabled >");
          $("#colorType").html("<input class='form-control' type='text' value='"+ data[0].price_color_type + "' disabled >");
          $("#quantity").html("<input class='form-control' type='text' value='"+ data[0].quantity + "' disabled >");
          $("#colProImg").attr("src", "/admin/images/products/" + data[0].path_image);
        }
      });
    });
  });
});
