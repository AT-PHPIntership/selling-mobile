$(document).ready(function() {
  $.ajax({
    url: "/api/categories",
    type: "get",
    success: function(result) {
      let html = '';
      result.result.forEach(category => {
        let childsHtml = '';
        html += '<li class="dropdown side-dropdown">' +
                    '<a href="/products?category_id='+category.id+'" >'+category.name+'</a>'+
                    '<button class="dropdown-toggle fa fa-angle-right" data-toggle="dropdown" aria-expanded="true"></button>';
        if(category.childrens){
          category.childrens.forEach(childcategory => {
            html += '<div class="custom-menu">' +
                '<div class="row">' +
                  '<div class="col-md-4">' +
                    '<ul class="list-links">' +
                      '<a href="/products?category_id='+childcategory.id+'">'+childcategory.name +'</a>'+
                    '</ul>' +
                    '<hr class="hidden-md hidden-lg">' +
                  '</div>' +
                '</div>' +
                '<div class="row hidden-sm hidden-xs">' +
                  '<div class="col-md-12">' +
                    '<hr>' +
                    '<a class="banner banner-1" href="#">' +
                      '<img src='+'user/img/banner05.jpg'+' >' +
                      '<div class="banner-caption text-center">' +
                        '<h2 class="white-color">NEW COLLECTION</h2>' +
                        '<h3 class="white-color font-weak">HOT DEAL</h3>' +
                      '</div>' +
                    '</a>' +
                  '</div>' +
                '</div>' +
              '</div>';
          });
        }

        html += '</li>';

      });
      $('#js-categories').append(html);
    }
  });
});
