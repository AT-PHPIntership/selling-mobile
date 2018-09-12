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
$(document).ready(function(){
  $('.delImage').on('click', function() {
    if (confirm($(this).data('confirm'))) {
      delImage($(this).attr('data-id'));
    }
  });
});
var input = $('#del_image');
function delImage(ImageId) {
  document.getElementById("remove-" + ImageId).addEventListener("click", function(){
    document.getElementById("tr-" + ImageId).remove();
    input.val( input.val() + ImageId + "," );
  });
}
