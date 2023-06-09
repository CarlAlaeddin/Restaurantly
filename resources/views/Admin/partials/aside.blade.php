<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.index') }}">
                <i class="bi bi-person-square"></i>
                <span>Profile</span>
            </a>
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
                    <a href="{{ route('menu.create') }}">
                        <i class="fs-5 bi bi-plus"></i>
                        <span>New Menu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('menu.index') }}">
                        <i class="fs-5 bi bi-eyeglasses"></i>
                        <span>All Menu</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tag-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tags"></i>
                <span>Tags</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tag-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('tag.create') }}">
                        <i class="fs-5 bi bi-plus"></i>
                        <span>New Tag</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tag.index') }}">
                        <i class="fs-5 bi bi-eyeglasses"></i>
                        <span>All Tags</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bookmark-fill"></i>
                <span>Category</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('category.create') }}">
                        <i class="fs-5 bi bi-plus"></i>
                        <span>New Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}">
                        <i class="fs-5 bi bi-eyeglasses"></i>
                        <span>All Category</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#gallery-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="gallery-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('gallery.create') }}">
                        <i class="fs-5 bi bi-plus"></i>
                        <span>New Photo</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('gallery.index') }}">
                        <i class="fs-5 bi bi-eyeglasses"></i>
                        <span>All Photos</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#event-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-calendar-event"></i>
                <span>Event</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="event-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('event.create') }}">
                        <i class="fs-5 bi bi-plus"></i>
                        <span>New event</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('event.index') }}">
                        <i class="fs-5 bi bi-eyeglasses"></i>
                        <span>All events</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#special-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-up"></i>
                <span>Special Menu</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="special-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('special.create') }}">
                        <i class="fs-5 bi bi-plus"></i>
                        <span>New Item</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('special.index') }}">
                        <i class="fs-5 bi bi-eyeglasses"></i>
                        <span>All Special menu</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Components Nav -->


        @if(auth()->user()->profile->role === 1)
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#chef" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-dash"></i>
                    <span>Chef</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="chef" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('reserve.create') }}">
                            <i class="fs-5 bi bi-plus"></i>
                            <span>New Reserve</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reserve.index') }}">
                            <i class="fs-5 bi bi-eyeglasses"></i>
                            <span>All Reserve</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Components Nav -->

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
                <a class="nav-link collapsed" data-bs-target="#reserve-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-life-preserver"></i>
                    <span>Reserve</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="reserve-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('reserve.create') }}">
                            <i class="fs-5 bi bi-plus"></i>
                            <span>New Reserve</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reserve.index') }}">
                            <i class="fs-5 bi bi-eyeglasses"></i>
                            <span>All Reserve</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Components Nav -->
        @endif

    </ul>

</aside><!-- End Sidebar-->
