$(document).ready(function() {
  $('#colorProduct').on('change', function() {
    $("#colorProduct").each(function () {
      var idColor = $(this).val();
      var idProduct = document.getElementById('idProduct').value;
      $.ajax({
        type: "GET",
        url:'/admin/products/'+idProduct+'/colors/'+idColor,
        success: function( data ) {
          $("#colorValue").html("<input class='form-control' type='text' value='"+ data[0].price_color_value + "' name='price_color_value' >");
          $("#colorType").html("<input class='form-control' type='text' value='"+ data[0].price_color_type + "' name='price_color_type' >");
          $("#quantity").html("<input class='form-control' type='text' value='"+ data[0].quantity + "' name='quantity' >");
          $("#colProImg").attr('src', data[0].path_color );
          
        }
      });
      
    });
  });
});
function imagesPreview(input, placeToInsertImagePreview) {
  if (input.files) {
    var filesAmount = input.files.length;
    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();
      reader.onload = function(event) {
          $($.parseHTML('<img>'))
          .addClass('img-responsive thumbnail')
          .attr('src', event.target.result)
          .appendTo(placeToInsertImagePreview);
      }
      reader.readAsDataURL(input.files[i]);
    }
  }
};
$('#product-images').on('change', function() {
  imagesPreview(this, 'div.photo');
});
$('#col_pro_img').on('change', function() {
  imagesPreview(this, 'div.photo-color');
});
