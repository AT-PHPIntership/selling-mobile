$(document).ready(function() {
  $('#colorProduct').on('change', function() {
    $("#colorProduct").each(function () {
      var idColor = $(this).val();
      alert(idColor);
      $.ajax({
        type: "GET",
        url:'/admin/products/color/'+idColor,
        success: function( data ) {
          $("#colorValue").html("<input class='form-control' type='text' value='"+ data.price_color_value + "' disabled >");
          $("#colorType").html("<input class='form-control' type='text' value='"+ data.price_color_type + "' disabled >");
          $("#quantity").html("<input class='form-control' type='text' value='"+ data.quantity + "' disabled >");
        }
      });
      
    });
  });
});