<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <div>
            <a class="sidebar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo_64.png') }}" alt="">
                <span class="align-middle">Vitagora</span>
            </a>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Général
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false" href="{{ url('/') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders align-middle"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                    <span class="align-middle">Dashboard</span>
                    <i class="iconTab fa-solid fa-chevron-right fa-rotate-90"></i>
                </a>
                <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link displayTab" href="{{ url('Notation') }}"><i class="fa-solid fa-caret-down fa-rotate-270"></i> Notations</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('Management') }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="align-middle">Management</span>
                </a>
            </li>
        </ul>
    </div>
</nav>