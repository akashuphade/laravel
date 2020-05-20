<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Photoshow</a>
  
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link {{ (Request::is('/')) ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ (Request::is('request/create')) ? 'active' : '' }}" href="request/create">Insert student</a>
        </li>
    </ul>

</nav>