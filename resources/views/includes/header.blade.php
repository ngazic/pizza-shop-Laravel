<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Pizza Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{request()->routeIs('home')? 'active':''}}">
          <a class="nav-link" href="/">Home</span></a>
        </li>
        @auth
        <li class="nav-item {{request()->routeIs('dashboard')? 'active':''}}">
          <a class="nav-link" href="/dashboard">Dashboard</a>
        </li>
        @endauth
        @guest
        <li class="nav-item {{request()->routeIs('login')? 'active':''}}">
          <a class="nav-link" href="{{ route('login') }}">Sign In</a>
        </li>
        <li class="nav-item {{request()->routeIs('signup')? 'active':''}}">
          <a class="nav-link" href="{{ route('signup') }}">Sign Up</a>
        </li>
        @endguest
        @auth
        <li class="nav-item {{request()->routeIs('signout')? 'active':''}}">
          <a class="nav-link" href="{{route('signout')}}">Sign Out</a>
        </li>
        <li class="nav-item text-white {{request()->routeIs('user')? 'bg-light':''}}">
          <a class="nav-link text-info" href="{{route('user')}}">
            {{ Auth::user()['name'] }}
          </a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
