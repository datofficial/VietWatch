<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('dashboard.index') }}" class="logo" style="text-decoration: none;">
                <h1 class="navbar-brand text-white" style="font-size: 24px; margin: 0; text-align: justify;">
                    <i class="fas fa-home" style="margin-right: 10px;"></i>VietWatch
                </h1>
            </a>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item" style="text-align: left;">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-user"></i>
                        <p>Quản lý khách hàng</p>
                    </a>
                </li>
                {{-- <li class="nav-item" style="text-align: left;">
                    <a href="{{ route('orders.index') }}">
                        <i class="fas fa-box"></i>
                        <p>Quản lý đơn hàng</p>
                    </a>
                </li> --}}
                <li class="nav-item" style="text-align: left;">
                    <a data-bs-toggle="collapse" href="#watchManagement" aria-expanded="false">
                        <i class="fas fa-watch"></i>
                        <p>Quản lý đồng hồ</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="watchManagement">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('watches.index') }}">
                                    <span class="sub-item">Quản lý đồng hồ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categories.index') }}">
                                    <span class="sub-item">Quản lý danh mục</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('manufacturers.index') }}">
                                    <span class="sub-item">Quản lý nhà sản xuất</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('material_straps.index') }}">
                                    <span class="sub-item">Quản lý chất liệu dây đeo</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('colors.index') }}">
                                    <span class="sub-item">Quản lý màu sắc</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item" style="text-align: left;">
                    <a href="{{ route('detail_watches.index') }}">
                        <i class="fas fa-credit-card"></i>
                        <p>Quản lý chi tiết đồng hồ</p>
                    </a>
                </li>
                <li class="nav-item" style="text-align: left;">
                    <a href="{{ route('payment_methods.index') }}">
                        <i class="fas fa-credit-card"></i>
                        <p>Quản lý phương thức thanh toán</p>
                    </a>
                </li>
                {{-- <li class="nav-item" style="text-align: left;">
                    <a data-bs-toggle="collapse" href="#cityManagement" aria-expanded="false">
                        <i class="fas fa-city"></i>
                        <p>Quản lý đơn vị hành chính</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="cityManagement">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('cities.index') }}">
                                    <span class="sub-item">Quản lý thành phố</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('districts.index') }}">
                                    <span class="sub-item">Quản lý quận/huyện</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wards.index') }}">
                                    <span class="sub-item">Quản lý phường/xã</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</div>

<style>
    .sidebar {
        background-color: #343a40;
        color: #ffffff;
    }
    .sidebar .nav-item a {
        color: #ffffff;
    }
    .sidebar .nav-item a:hover {
        background-color: #495057;
        color: #ffffff;
    }
    .sidebar .nav-item.active > a {
        background-color: #007bff;
        color: #ffffff;
    }
    .sidebar .nav-item .collapse .sub-item {
        padding-left: 30px;
    }
    .sidebar .sidebar-wrapper {
        overflow-y: auto;
        height: 100%;
    }
</style>
