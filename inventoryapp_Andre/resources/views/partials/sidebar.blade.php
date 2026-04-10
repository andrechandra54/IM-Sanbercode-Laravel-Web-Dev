<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/" class="text-nowrap logo-img">
            <img src="{{asset('template/src/assets/images/logos/logo-light.svg')}}" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">HOME</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">THINGS</span>
            </li>
            @if (Auth::check() && Auth::user()->role === 'admin')
              <li class="sidebar-item">
                <a class="sidebar-link" href="/category" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Category</span>
                </a>
              </li>
            @endif
            <li class="sidebar-item">
              <a class="sidebar-link" href="/product" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Product</span>
              </a>
            </li>
            @if (Auth::check())
              <li class="sidebar-item">
                <a class="sidebar-link" href="/transaction" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Transactions</span>
                </a>
              </li>
            @endif
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>