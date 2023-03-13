@php
$nameRoute = Route::currentRouteName();
@endphp
<!-- partial:partials/_sidebar.html -->
{{-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a @if ($userlist->role == 9) href="{{ route('admin.users.profile') }}" @endif class="nav-link">
                <div class="nav-profile-image">
                    @if ($userlist->role == 9)
                        <img src={{ $userlist->picture }} alt="profile">
                    @endif
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">
                        @if ($userlist->role == 9)
                            {{ $userlist->email }}
                        @endif
                    </span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li @if ($nameRoute == 'admin.users.getList') class="nav-item active" @endif>

            <a class="nav-link" href="{{ route('admin.users.getList') }}">
                <span class="menu-title">Trang chủ Admin</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li @if ($nameRoute == 'admin.users.listuser') class="nav-item active" @endif>
            <a class="nav-link" href="{{ route('admin.users.listuser') }}">
                <span class="menu-title">Trang chủ Users</span>
                <i class="mdi mdi-worker"></i>
            </a>
        </li>
        <li @if ($nameRoute == 'admin.category.getList') class="nav-item active" @endif>
            <a class="nav-link" href="{{ route('admin.category.getList') }}">
                <span class="menu-title">Thể loại sản phẩm</span>
                <i class="mdi mdi-reproduction"></i>
            </a>
        </li>
        <li class="nav-item {{ $nameRoute == 'admin.product.getproductList'  ?'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.product.getproductList') }}">
                <span class="menu-title">Sản phẩm</span>
                <i class=" mdi mdi-compare
                "></i>
            </a>
        </li>

        <li @if ($nameRoute == 'admin.users.getcartlist') class="nav-item active" @endif>
            <a class="nav-link" href="{{ route('admin.users.getcartlist') }}">
                <span class="menu-title">Giỏ hàng</span>
                <i class=" mdi mdi-cart-outline
                "></i>
            </a>
        </li>
        <li @if ($nameRoute == 'admin.authenticate.Logout') class="nav-item active" @endif>
            <a class="nav-link" href="http://127.0.0.1:8000/home">
                <span class="menu-title">Trang chủ Users</span>
                <i class="mdi mdi-beats"></i>
            </a>
        </li>
        <li @if ($nameRoute == 'admin.authenticate.Logout') class="nav-item active" @endif>
            <a class="nav-link" href="{{ route('admin.authenticate.Logout') }}">
                <span class="menu-title">Đăng xuất</span>
                <i class="mdi mdi-power"></i>
            </a>
        </li>
    </ul>
</nav> --}}
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            @if ($userlist->role == 9)
                <a href="{{ route('admin.users.profile') }}"  class="nav-link">@endif
                    <div class="nav-profile-image">
                        @if ($userlist->role == 9)
                            <img src="{{ $userlist->picture }}" alt="profile">
                        @endif
                        <span class="login-status online"></span>
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">
                            @if ($userlist->role == 9)
                                {{ $userlist->email }}
                            @endif
                        </span>
                        <span class="text-secondary text-small">Project Manager</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
        </li>
        <li class="nav-item {{ $nameRoute == 'admin.users.getList' ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.users.getList') }}">
                <span class="menu-title">Quản trị viên</span>
                <i class=" mdi menu-icon mdi-account-key"></i>
            </a>
        </li>
        <li class="nav-item {{ $nameRoute == 'admin.users.listuser' ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.users.listuser') }}">
                <span class="menu-title">Khách hàng</span>
                <i class=" mdi  menu-icon mdi-account-multiple-outline"></i>
            </a>
        </li>
        <li class="nav-item {{ $nameRoute == 'admin.category.getList' ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.category.getList') }}">
                <span class="menu-title">Danh mục sản phẩm</span>
                <i class="mdi menu-icon mdi-airballoon"></i>
            </a>
        </li>
        <li class="nav-item {{ $nameRoute == 'admin.product.getproductList' ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.product.getproductList') }}">
                <span class="menu-title">Sản phẩm</span>
                <i class="mdi menu-icon mdi-barley"></i>
            </a>
        </li>
        <li class="nav-item {{ $nameRoute == 'admin.users.getcartlist' ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.users.getcartlist') }}">
                <span class="menu-title">Giỏ hàng</span>
                <i class="mdi menu-icon mdi-basket"></i>
            </a>
        </li>
        <li class="nav-item {{ $nameRoute == 'admin.authenticate.Logout' ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.authenticate.Logout') }}">
                <span class="menu-title">Đăng xuất</span>
                <i class="mdi menu-icon mdi-power"></i>
            </a>
        </li>
    </ul>
</nav>
