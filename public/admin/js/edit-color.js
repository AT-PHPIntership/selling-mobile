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
          $("#colorValue").html("<input class='form-control' type='text' value='"+ data[0].price_color_value + "' name='price_color_value' >");
          $("#colorType").html("<input class='form-control' type='text' value='"+ data[0].price_color_type + "' name='price_color_type' >");
          $("#quantity").html("<input class='form-control' type='text' value='"+ data[0].quantity + "' name='quantity' >");
        }
      });
      
    });
  });
});
