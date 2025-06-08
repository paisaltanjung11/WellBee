<header class="header">
  <a href="{{ route('index') }}" class="logo" aria-label="WellBee Home">
    <span class="well">Well</span><span class="bee">Bee</span>
  </a>

  <nav class="navbar">
    <div class="nav-center">
      <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
      <a href="{{ route('exercise') }}" class="{{ Request::routeIs('exercise') ? 'active' : '' }}">Exercise</a>
      <a href="{{ route('nutrition') }}" class="{{ Request::routeIs('nutrition') ? 'active' : '' }}">Nutrition</a>
      <a href="{{ route('nearby') }}" class="{{ Request::routeIs('nearby') ? 'active' : '' }}">Nearby</a>
    </div>
    <div class="nav-right">
      <a href="{{ route('dashboard') }}" class="profile-menu">
        <img src="{{ asset('images/user-icon/user2.png') }}" alt="Profile" class="avatar" />
        <span id="userName">{{ $user->first_name }} {{ $user->last_name }}</span>
      </a>
      <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn" style="margin-left: 1rem;">Logout</button>
      </form>
    </div>
  </nav>
</header>