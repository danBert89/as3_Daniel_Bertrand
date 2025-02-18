<div id="navbar">
    <ul>
        <li>
            <a href="http://localhost:8000/home" class="{{ $title == 'Home' ? 'highlight' : '' }}">Home</a>
        </li>
        <li>
            <a href="http://localhost:8000/manage" class="{{ $title == 'Manage' ? 'highlight' : '' }}">Manage</a>
        </li>
        <li>
            <a href="http://localhost:8000/search" class="{{ $title == 'Search' ? 'highlight' : '' }}">Search</a>
        </li>
        <li>
            <a href="http://localhost:8000/about" class="{{ $title == 'About' ? 'highlight' : '' }}">About</a>
        </li>
    </ul>
</div>