
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('data-points.index') }}">
                <i class="icon-cog menu-icon"></i>
                <span class="menu-title">Data Points</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('towns.index') }}">
                <i class="icon-map menu-icon"></i>
                <span class="menu-title">Towns</span>
            </a>
        </li>
    </ul>
</nav>
