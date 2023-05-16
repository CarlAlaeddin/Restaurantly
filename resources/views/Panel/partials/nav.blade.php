<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('panel.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Panel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('panel.event') }}">
                    <span data-feather="list" class="align-text-bottom"></span>
                    Create Event
                </a>
            </li>
        </ul>

    </div>
</nav>
