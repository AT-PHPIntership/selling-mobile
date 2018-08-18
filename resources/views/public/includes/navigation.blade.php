<!--NAVIGATION -->
<div id="navigation">
  <!-- container -->
  <div class="container">
    <div id="responsive-nav">
      <!-- category nav -->
      <div class="category-nav show-on-click">
        <span class="category-header">Categories <i class="fa fa-list"></i></span>
        <ul id="js-categories" class="category-list">
        <li><a href="#">View All</a></li>
      </ul>
    </div>
    <!-- /category nav -->
    <!-- menu nav -->
    <div class="menu-nav">
      <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
      <ul class="menu-list">
        <li><a href="#">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Sales</a></li>
        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
        <ul class="custom-menu">
          <li><a href="index.html">Home</a></li>
          <li><a href="products.html">Products</a></li>
          <li><a href="product-page.html">Product Details</a></li>
          <li><a href="checkout.html">Checkout</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <!-- menu nav -->
</div>
</div>
<!-- /container -->
</div>
<!-- /NAVIGATION -->
<!-- <script src="{{ url('admin/js/edit-color.js') }}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  $.ajax({
    url: "/api/categories",
    type: "get",
    success: function(result) {
      let html = '';
      result.result.forEach(category => {
        let childsHtml = '';
        html += '<li class="dropdown side-dropdown">' +
                    '<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="" >'+category.name+'<i class="fa fa-angle-right"></i></a>';
        if(category.childrens){
          category.childrens.forEach(childcategory => {
            html += '<div class="custom-menu">' +
                '<div class="row">' +
                  '<div class="col-md-4">' +
                    '<ul class="list-links">' +
                      childcategory.name +
                    '</ul>' +
                    '<hr class="hidden-md hidden-lg">' +
                  '</div>' +
                '</div>' +
                '<div class="row hidden-sm hidden-xs">' +
                  '<div class="col-md-12">' +
                    '<hr>' +
                    '<a class="banner banner-1" href="#">' +
                      '<img src="{{ url('user/img/banner05.jpg') }}" alt="">' +
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
</script>
