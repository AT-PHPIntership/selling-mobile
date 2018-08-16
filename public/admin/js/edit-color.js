$(document).ready(function() {
  $('#colorProduct').on('change', function() {
    $("#colorProduct").each(function () {
      var idColor = $(this).val();
      alert(idColor);
      $.ajax({
        type: "GET",
        url:'/admin/products/color/'+idColor,
        success: function( data ) {
          $("#colorValue").html("<input class='form-control' type='text' value='"+ data.price_color_value + "' name='price_color_value' >");
          $("#colorType").html("<input class='form-control' type='text' value='"+ data.price_color_type + "' name='price_color_type' >");
          $("#quantity").html("<input class='form-control' type='text' value='"+ data.quantity + "' name='quantity' >");
        }
      });
      
    });
  });
});