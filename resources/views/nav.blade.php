<div id="navbar" class="bg-dark p-3">
    <ul class="nav">
        <li class="nav-item">
            <a href="http://localhost:8000/home" class="nav-link {{ $title == 'Home' ? 'highlight' : '' }}">Home</a>
        </li>
        <li class="nav-item">
            <a href="http://localhost:8000/manage" class="nav-link {{ $title == 'Manage' ? 'highlight' : '' }}">Manage</a>
        </li>
        <li class="nav-item">
            <a href="http://localhost:8000/search" class="nav-link {{ $title == 'Search' ? 'highlight' : '' }}">Search</a>
        </li>
        <li class="nav-item">
            <a href="http://localhost:8000/about" class="nav-link {{ $title == 'About' ? 'highlight' : '' }}">About</a>
        </li>
    </ul>
</div>