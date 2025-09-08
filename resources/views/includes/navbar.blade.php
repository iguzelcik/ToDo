<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('todos.index') }}">TODOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('todos.index') }}">ToDos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('todos.create') ? 'active':'' }}" href="{{ route('todos.create') }}">Create ToDo</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('categories.create') }}">Create Category</a></li>
            <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a></li>
            <li><hr class="dropdown-divider"></li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search" method="GET" action="{{ route('todos.index') }}">
        <input class="form-control me-2" type="search" placeholder="Search ToDo" aria-label="Search" name="search" value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
     <ul class="navbar-nav ms-3">
    @auth
        <!-- Kullanıcı giriş yapmışsa -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    @endauth

    @guest
        <!-- Kullanıcı giriş yapmamışsa -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
    @endguest
</ul>

    </div>
  </div>
</nav>