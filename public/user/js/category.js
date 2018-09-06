$(document).ready(function() {
  $.ajax({
    url: "/api/categories",
    type: "get",
    success: function(result) {
      let html = '';
      result.result.forEach(category => {
        html += '<li class="dropdown side-dropdown">' +
                    '<a href="/products?category_id='+category.id+'" >'+category.name+'</a>'+
                    '<button class="dropdown-toggle fa fa-angle-right" data-toggle="dropdown" aria-expanded="true"></button>';
        html += '<div class="custom-menu clearfix">' +
                '<div class="row">' +
                '<ul class="list-links">';
        if(category.childrens){
          category.childrens.forEach(childcategory => {
            html +='<div class="col-md-4">' +
                      '<a href="/products?category_id='+childcategory.id+'">'+childcategory.name +'</a>'+
                  '</div>';
          });
        }

        html += '</div>' + '</ul>' + '</li>';

      });
      $('#js-categories').append(html);
    }
  });
});
