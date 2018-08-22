<!-- HEADER -->
<header>
  <!-- top Header -->
  <div id="top-header">
    <div class="container">
      <div class="pull-left">
        <span>{{ __('user/index.top_header.title') }}</span>
      </div>
      <div class="pull-right">
        <ul class="header-top-links">
          <li><a href="#">{{ __('user/index.top_header.header_top_links.store') }}</a></li>
          <li><a href="#">{{ __('user/index.top_header.header_top_links.newsletter') }}</a></li>
          <li><a href="#">{{ __('user/index.top_header.header_top_links.faq') }}</a></li>
          <li class="dropdown default-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ __('user/index.top_header.header_top_links.language') }} <i class="fa fa-caret-down"></i></a>
            <ul class="custom-menu">
              <li><a href="#">{{ __('user/index.top_header.header_top_links.eng') }}</a></li>
              <li><a href="#">{{ __('user/index.top_header.header_top_links.vn') }}</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /top Header -->
  <!-- header -->
  <div id="header">
    <div class="container">
      <div class="pull-left">
        <!-- Logo -->
        <div class="header-logo">
          <a class="logo" href="#">
            <img src="{{ url('user/img/logo.png') }}" alt="">
          </a>
        </div>
        <!-- /Logo -->
        <!-- Search -->
        <div class="header-search">
          <form>
            <input class="input search-input" type="text" placeholder="Enter your keyword">
            <select class="input search-categories">
              <option value="0">All Categories</option>
              <option value="1">Category 01</option>
              <option value="1">Category 02</option>
            </select>
            <button class="search-btn"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- /Search -->
      </div>
      <div class="pull-right">
        <ul class="header-btns">
          <!-- Account -->
          <li class="header-account dropdown default-dropdown">
            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
              <div class="header-btns-icon">
                <i class="fa fa-user-o"></i>
              </div>
              <strong class="text-uppercase">{{ __('user/index.account') }}<i class="fa fa-caret-down"></i></strong>
            </div>
            <ul class="custom-menu">
              <li><a href="#"><i class="fa fa-user-o"></i>{{ __('user/index.account') }}</a></li>
              <li><a href="#"><i class="fa fa-exchange"></i>{{ __('user/index.compare') }}</a></li>
              <li><a href="#"><i class="fa fa-check"></i>{{ __('user/index.checkout') }}</a></li>
              <li><a id="login" data-toggle="modal" data-target="#loginModal"><i class="fa fa-unlock-alt"></i>{{ __('user/index.login') }}</a></li>
              <li><a href="#"><i class="fa fa-user-plus"></i>{{ __('user/index.create') }}</a></li>
            </ul>
          </li>
          <!-- /Account -->
          <!-- Cart -->
          <li class="header-cart dropdown default-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <div class="header-btns-icon">
                <i class="fa fa-shopping-cart"></i>
                <span class="qty">3</span>
              </div>
              <strong class="text-uppercase">{{ __('user/index.cart') }}</strong>
              <br>
              <span>35.20$</span>
            </a>
            <div class="custom-menu">
              <div id="shopping-cart">
                <div class="shopping-cart-list">
                  <div class="product product-widget">
                    <div class="product-thumb">
                      <img src="{{ url('user/img/thumb-product01.jpg') }}" alt="">
                    </div>
                    <div class="product-body">
                      <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                      <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                    </div>
                    <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                  </div>
                  <div class="product product-widget">
                    <div class="product-thumb">
                      <img src="{{ url('user/img/thumb-product01.jpg') }}" alt="">
                    </div>
                    <div class="product-body">
                      <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                      <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                    </div>
                    <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                  </div>
                </div>
                <div class="shopping-cart-btns">
                  <button class="main-btn">{{ __('user/index.view_cart') }}</button>
                  <button class="primary-btn">{{ __('user/index.checkout') }} <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
            </div>
          </li>
          <!-- /Cart -->
          <!-- Mobile nav toggle-->
          <li class="nav-toggle">
            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
          </li>
          <!-- / Mobile nav toggle -->
        </ul>
      </div>
    </div>
    <!-- header -->
  </div>
  <!-- container -->
</header>
<!-- /HEADER -->
