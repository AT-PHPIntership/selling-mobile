<header>
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
  <div id="header">
    <div class="container">
      <div class="pull-left">
        <div class="header-logo">
          <a class="logo" href="#">
            <img src="{{ url('user/img/logo.png') }}" alt="">
          </a>
        </div>
        <div class="header-search">
          <form id="formSearch" method="GET">
            @csrf
            <input id="txtSearch" name="keyword" class="input search-input" type="text" placeholder="Enter your keyword">
            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
      <div class="pull-right">
        <ul class="header-btns">
          <li class="header-account dropdown default-dropdown">
            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
              <div class="header-btns-icon">
                <i class="fa fa-user-o"></i>
              </div>
              <strong id="userName" class="text-uppercase">{{ __('user/index.login') }}<i class="fa fa-caret-down"></i></strong>
            </div>
            <a class="text-uppercase" id="userLogout">
              <i class="fa fa-sign-out"></i>{{__('user/index.logout')}}
            </a>
            <ul class="custom-menu">
              <li><a id="profile" href="{{ route('user.profile') }}"><i class="fa fa-user-o"></i>{{ __('user/index.account') }}</a></li>
              <li><a href="#"><i class="fa fa-check"></i>{{ __('user/index.checkout') }}</a></li>
              <li><a id="login" data-toggle="modal" data-target="#loginModal"><i class="fa fa-unlock-alt"></i>{{ __('user/index.login') }}</a></li>
              <li><a id="register" href="{{ route('user.register') }}"><i class="fa fa-user-plus"></i>{{ __('user/index.create') }}</a></li>
            </ul>
          </li>
          <li class="header-cart dropdown default-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <div class="header-btns-icon">
                <i class="fa fa-shopping-cart"></i>
                <span id="totalQty" class="qty"></span>
              </div>
              <strong class="text-uppercase">{{ __('user/index.cart') }}</strong>
            </a>
            <div class="custom-menu">
              <div id="shopping-cart">
                <div class="shopping-cart-list">
                  <div id="js-cart-info">
                  </div>
                  <div class="product-total">
                    <span>Total Price: </span>
                    <span id="totalPrice"></span>
                  </div>
                </div>
                <div class="shopping-cart-btns">
                  <a href="{{ route('user.detail-order') }}" class="main-btn">{{ __('user/index.view_cart') }}</a>
                  <button class="primary-btn">{{ __('user/index.checkout') }} <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-toggle">
            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
@include('public.pages.login')
<script src="{{ url('user/js/logout.js') }}"></script>
