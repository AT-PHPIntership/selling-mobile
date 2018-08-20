<!--NAVIGATION -->
<div id="navigation">
  <!-- container -->
  <div class="container">
    <div id="responsive-nav">
      <!-- category nav -->
      <div class="category-nav show-on-click">
        <span class="category-header">{{ __('user/index.categories') }}<i class="fa fa-list"></i></span>
        <ul id="js-categories" class="category-list">
        <li><a href="#">View All</a></li>
      </ul>
    </div>
    <!-- /category nav -->
    <!-- menu nav -->
    <div class="menu-nav">
      <span class="menu-header">{{ __('user/index.menu.title') }}<i class="fa fa-bars"></i></span>
      <ul class="menu-list">
        <li><a href="#">{{ __('user/index.menu.home') }}</a></li>
        <li><a href="#">{{ __('user/index.menu.shop') }}</a></li>
        <li><a href="#">{{ __('user/index.menu.sales') }}</a></li>
        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ __('user/index.menu.pages') }} <i class="fa fa-caret-down"></i></a>
        <ul class="custom-menu">
          <li><a href="index.html">{{ __('user/index.menu.home') }}</a></li>
          <li><a href="products.html">{{ __('user/index.menu.products') }}</a></li>
          <li><a href="product-page.html">{{ __('user/index.menu.product_detail') }}</a></li>
          <li><a href="checkout.html">{{ __('user/index.checkout') }}</a></li>
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
<script src="{{ url('user/js/category.js') }}"></script>
