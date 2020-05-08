<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Todo App</a>
  
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link {{ (Request::is('/')) ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ (Request::is('todo/create')) ? 'active' : '' }}" href="/todo/create">Create</a>
        </li>
    </ul>

</nav>