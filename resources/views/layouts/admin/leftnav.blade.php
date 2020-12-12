  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('AdminLTE/index3.html') }}" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>


      <div class="sidebar">

          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Resources
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  <li class="nav-item">
                      <a href="{{ url('/Country') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Country</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/City') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>City</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ url('/News') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>News</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('search-page-advanced')}}" class="nav-link">
                          <i class="fa fa-search"></i>
                          <p>Search Paging</p>
                      </a>
                  </li>


                          <li class="nav-item">
                              <a href="{{ url('/Category') }}" class="nav-link">
                                  <i class="fa fa-cog"></i>
                                  <p>Category</p>
                              </a>
                          </li>

                              <a href="#" class="nav-link">
                                  <i class="fa fa-file"></i>
                                  <p>
                                     category
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ url('/Category/index') }}" class="nav-link">
                                          <i class="fa fa-list"></i>
                                          <p>All categories</p>
                                      </a>
                                  </li>

                                  <li class="nav-item">
                                      <a href="{{ url('/Category/search-paging') }}" class="nav-link">
                                          <i class="fa fa-search"></i>
                                          <p>Search Paging</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>

    <!-- Sidebar -->

  </aside>