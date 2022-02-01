<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- end --}}

    {{-- Icon FontAwesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    {{-- end --}}

    {{-- Jquery CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- end --}}

    {{-- Font Nunito --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    {{-- end --}}

    <script src="/js/animationIndex.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">

    <title>@yield('title')</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Note & Todo List Apps</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('todo*') ? 'active' : '' }}" aria-current="page" href="/todo">Todo List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('note*') ? 'active' : '' }}" href="/note">Note List</a>
          </li>
        </ul>
        <div class="d-flex mx-4 dropdown">
            <img src="https://picsum.photos/50/50" alt="" class="img-fluid rounded-circle" id="dropdownMenuButton1" data-bs-toggle="dropdown">
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if (Auth::check())
                <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-user"></i> Welcome, {{ Auth::user()->username }}</a></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                  </form>
                </li>
              @else
                <li><a class="dropdown-item" href="/register"><i class="fas fa-user-plus"></i> Register</a></li>
                <li><a class="dropdown-item" href="/login"><i class="fas fa-sign-in-alt"></i> Login</a></li>
              @endif
              </ul>
        </div>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
</nav>
<body>
    <div class="container my-5">
      @yield('content')
    </div>
</body>
</html>