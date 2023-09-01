<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Huy Đẹp Trai</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./?page=dashboard" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-cart-shopping"></i>
              <p>
                Quản Lý Sản Phẩm
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/?page=product&action=list&categori=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/?page=product&action=add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/?page=product&action=edit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sửa sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-newspaper"></i>
              <p>
                Quản Lý Bài Viết
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/?page=posts&action=list&categori=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/?page=posts&action=add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/?page=posts&action=edit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sửa bài viết</p>
                </a>
            </li>
              </ul>
            </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-cart-shopping"></i>
              <p>
                Quản Lý Người Dùng
                <i class="fas fa-angle-left right" aria-hidden="true"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/?page=users&action=list" class="nav-link">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Danh sách người dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/?page=users&action=add" class="nav-link">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Thêm người dùng</p>
                </a>
              </li>
            </ul>
          </li>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-cart-shopping"></i>
              <p>
                Quản Lý Đơn Hàng
                <i class="fas fa-angle-left right" aria-hidden="true"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/?page=order&action=list" class="nav-link">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Danh sách Đơn Hàng</p>
                </a>
              </li>
            </ul>
          </li>
        </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>