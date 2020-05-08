<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() === 'about' ? 'active' : '' }}" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() === 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() === 'get-messages' ? 'active' : '' }}" href="{{ route('get-messages') }}">Messages</a>
        </li>
        
    </ul>

</nav>