<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="index.html">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people-fill"></i>
        <span>User Management</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('user.index') }}">
            <i class="fs-5 bi bi-eyeglasses"></i>
            <span>All Users</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="fs-5 bi bi-person-plus-fill"></i>
            <span>New User</span>
          </a>
        </li>
      </ul>
    </li>
    <!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#contact-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-rolodex"></i>
        <span>Contact</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="contact-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('contact.index') }}">
            <i class="fs-5 bi bi-eyeglasses"></i>
            <span>All Contact</span>
          </a>
        </li>
      </ul>
    </li>
    <!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#menu-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-up"></i>
        <span>Menu</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="menu-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('contact.index') }}">
            <i class="fs-5 bi bi-eyeglasses"></i>
            <span>All Menu</span>
          </a>
        </li>
      </ul>
    </li>
    <!-- End Components Nav -->

    {{-- <li class="nav-heading">Pages</li> --}}

  </ul>

</aside><!-- End Sidebar-->