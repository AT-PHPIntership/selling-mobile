<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
            </li>
            <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> {{ __('admin.dashboard') }}</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user-plus"></i> {{ __('admin.user') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.users.index') }}">{{ __('admin.user_list') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.create') }}">{{ __('admin.user_add') }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> {{ __('admin.category') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.categories.index') }}">{{ __('admin.category_list') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.create') }}">{{ __('admin.category_add') }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> {{ __('product.admin.title') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.products.index') }}">{{ __('product.admin.list.title') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.create') }}">{{ __('product.admin.add.title') }}</a>
                    </li>
                </ul>
            </li>
            </li>
            <li>
              <a href="#"><i class="fa fa-shopping-cart"></i> {{ __('admin.order') }}<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="{{ route('admin.orders.index') }}">{{ __('admin.order_list') }}</a>
                </li>
              </ul>
            </li>
        </ul>
    </div>
</div>
