<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('Backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">Product Management</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Brands
                            <i class="fas fa-angle-left right"></i>
{{--                            <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('brands.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brands.manage') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Brand</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                            {{--                            <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.manage') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Categories</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                            {{--                            <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.manage') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Products</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Location Management</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Division
                            <i class="fas fa-angle-left right"></i>
{{--                            <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('division.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Division</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('division.manage') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Division</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            District
                            <i class="fas fa-angle-left right"></i>
                            {{--                            <span class="badge badge-info right">6</span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('district.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create District</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('district.manage') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Districts</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
