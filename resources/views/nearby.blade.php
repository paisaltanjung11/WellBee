<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="WellBee Nearby - Find fitness centers, parks, and healthy food options near your location." />
  <title>WellBee | Nearby</title>
  <link rel="stylesheet" href="{{ asset('css/nearby.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{ asset('images/WellBee Logo.png') }}" />
  <!-- Load dark mode script early -->
  <script src="{{ asset('js/darkmode.js') }}" defer></script>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha512-sA+z0twU6CE2rGLnVljXgTC+Kc9xwXKDoZLLKYo3g6AJI4F1nbOBU7hnpaIFeBiUUlrntk7udx6s0FdzrGg6Q=="
    crossorigin="" />

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha512-tAGcCf+uOrxM9mTxjVa7hPq2Hppv1WRS7c3QH23pHPzS9xuC9a4l1t5B8Cnc2+qv9vbEOJPFL2f79HyEJVoFAQ=="
    crossorigin=""></script>
</head>

<body>
  <nav class="navbar">
    <div class="nav-center">
      <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
      <a href="{{ route('exercise') }}" class="{{ Request::routeIs('exercise') ? 'active' : '' }}">Exercise</a>
      <a href="{{ route('nutrition') }}" class="{{ Request::routeIs('nutrition') ? 'active' : '' }}">Nutrition</a>
      <a href="{{ route('nearby') }}" class="{{ Request::routeIs('nearby') ? 'active' : '' }}">Nearby</a>
    </div>
    <div class="nav-right">

      <a href="{{ route('index') }}" class="profile-menu">
        <img src="{{ asset('images/user-icon/user2.png') }}" alt="Profile" class="avatar" />
        <span id="userName">{{ $user->first_name }} {{ $user->last_name }}</span>
      </a>


      <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="sign-in" style="margin-left: 1rem;">Logout</button>
      </form>
    </div>
  </nav>
  </header>

  @include('partials.navbar')

  <main class="nearby-container">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-content">
        <!-- Theme Toggle Button -->
        <div class="theme-toggle">
          <button id="themeToggleBtn" class="btn-theme">
            <span class="theme-icon">🌙</span>
          </button>
        </div>

        <h1>Discover Healthy Places Nearby</h1>
        <p class="motivation">
          Find fitness centers, parks, and healthy food options in your area
        </p>
      </div>
    </section>

    <!-- Location Search Section -->
    <section class="location-section">
      <div class="section-header">
        <h2>Find What's Around You</h2>
        <p>Search for health-focused places near your location</p>
      </div>
      <div class="search-container">
        <div class="location-input">
          <input type="text" id="locationInput" placeholder="Enter your location or use current location" />
          <button id="currentLocationBtn" class="location-btn">
            <span class="location-icon">📍</span>
          </button>
        </div>
        <div class="filter-options">
          <button class="filter-btn active" data-filter="gyms">
            <span class="filter-icon">💪</span>
            <span>Gyms</span>
          </button>
          <button class="filter-btn" data-filter="parks">
            <span class="filter-icon">🌳</span>
            <span>Parks</span>
          </button>
          <button class="filter-btn" data-filter="healthy-food">
            <span class="filter-icon">🥗</span>
            <span>Healthy Food</span>
          </button>
          <button class="filter-btn" data-filter="yoga">
            <span class="filter-icon">🧘</span>
            <span>Yoga Studios</span>
          </button>
        </div>
        <button id="searchBtn" class="btn-primary">Search</button>
      </div>
    </section>

    <!-- Results Section -->
    <section class="results-section">
      <div class="section-header">
        <h2>Nearby Locations</h2>
        <p>Explore these health-focused places</p>
      </div>

      <div class="results-container" id="resultsContainer">
        <!-- Sample Results - Will be replaced dynamically -->
        <div class="location-card">
          <div class="location-img">
            <img src="{{ asset('images/ftl-kmg.png') }}" alt="City Park" />
          </div>
          <div class="location-info">
            <h3>FTL Kemanggisan</h3>
            <p class="location-type"><span class="tag">Gym</span></p>
            <p class="location-address">Jl. Raya Kb. Jeruk No.18, RT.8/RW.5, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta
              Barat, Daerah Khusus Ibukota Jakarta 11530</p>
            <div class="location-details">
              <div class="rating">
                <span class="stars">★★★★★</span>
                <span class="rating-count">4,7 (85 reviews)</span>
              </div>
              <p class="distance">0.8 miles away</p>
            </div>
          </div>
          <div class="location-actions">
            <button class="btn-secondary">Get Directions</button>
            <button class="btn-secondary">View Details</button>
          </div>
        </div>

        <div class="location-card">
          <div class="location-img">
            <img src="{{ asset('images/Central_Park.jpg') }}" alt="City Park" />
          </div>
          <div class="location-info">
            <h3>Central Park</h3>
            <p class="location-type"><span class="tag">Park</span></p>
            <p class="location-address">Jl. Letjen S. Parman No.Kav. 28, Tj. Duren Sel., Kec. Grogol petamburan, Kota
              Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470</p>
            <div class="location-details">
              <div class="rating">
                <span class="stars">★★★★★</span>
                <span class="rating-count">4,7 (104.839 reviews)</span>
              </div>
              <p class="distance">1.2 miles away</p>
            </div>
          </div>
          <div class="location-actions">
            <button class="btn-secondary">Get Directions</button>
            <button class="btn-secondary">View Details</button>
          </div>
        </div>

        <div class="location-card">
          <div class="location-img">
            <img src="{{ asset('images/greenly-jkt.png') }}" alt="Health Food Restaurant" />
          </div>
          <div class="location-info">
            <h3>Greenly Tanjung Duren</h3>
            <p class="location-type"><span class="tag">Healthy Food</span></p>
            <p class="location-address">Jl. Taman Daan Mogot Raya No.4, RT.2/RW.1, Tj. Duren Utara, Kec. Grogol
              petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11460</p>
            <div class="location-details">
              <div class="rating">
                <span class="stars">★★★★★</span>
                <span class="rating-count">4.4 (84 reviews)</span>
              </div>
              <p class="distance">1.5 miles away</p>
            </div>
          </div>
          <div class="location-actions">
            <button class="btn-secondary">Get Directions</button>
            <button class="btn-secondary">View Details</button>
          </div>
        </div>
      </div>

      <div class="load-more">
        <button id="loadMoreBtn" class="btn-primary">Load More</button>
      </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
      <div class="section-header">
        <h2>Map View</h2>
        <p id="resultsCount">Showing results near you</p>
      </div>
      <div class="map-container" id="map">
        <div class="map-placeholder">
          <p>Map loading...</p>
          <div class="loading-spinner"></div>
        </div>
      </div>
    </section>
  </main>

  <div class="wave-divider">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2880 320" preserveAspectRatio="none">
      <!-- Background wave -->
      <path class="wave wave-back" fill="#0b1b35" fill-opacity="0.3"
        d="M0,192L60,181.3C120,171,240,149,360,160C480,171,600,213,720,213.3C840,213,960,171,1080,170.7C1200,171,1320,213,1440,224C1560,235,1680,213,1800,181.3C1920,149,2040,107,2160,112C2280,117,2400,171,2520,197.3C2640,224,2760,224,2880,213.3C3000,203,3120,181,3180,170.7L3240,160L3240,320L3180,320C3120,320,3000,320,2880,320C2760,320,2640,320,2520,320C2400,320,2280,320,2160,320C2040,320,1920,320,1800,320C1680,320,1560,320,1440,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
      </path>
      <!-- Foreground wave -->
      <path class="wave" fill="#0b1b35" fill-opacity="1"
        d="M0,192L60,181.3C120,171,240,149,360,160C480,171,600,213,720,213.3C840,213,960,171,1080,170.7C1200,171,1320,213,1440,224C1560,235,1680,213,1800,181.3C1920,149,2040,107,2160,112C2280,117,2400,171,2520,197.3C2640,224,2760,224,2880,213.3C3000,203,3120,181,3180,170.7L3240,160L3240,320L3180,320C3120,320,3000,320,2880,320C2760,320,2640,320,2520,320C2400,320,2280,320,2160,320C2040,320,1920,320,1800,320C1680,320,1560,320,1440,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
      </path>

    </svg>
  </div>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-section">
        <h3>GET CONNECTED</h3>
        <ul>
          <li><a href="#">Connectivity</a></li>
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>RESOURCES</h3>
        <ul>
          <li>
            <a href="https://www.youtube.com/@WellBeeLife">Using WellBee</a>
          </li>
          <li><a href="{{ route('tnc') }}">Terms & Conditions</a></li>
          <li><a href="#">Docs</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>COMPANY</h3>
        <ul>
          <li><a href="{{ route('about-us') }}">About Us</a></li>
          <li>
            <a href="mailto:contact.wellbee@gmail.com?subject=Support Request&body=Hi WellBee Support,">Contact Us</a>
          </li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>SOCIAL</h3>
        <ul>
          <li>
            <a href="https://www.linkedin.com/in/wellbee-founder/">LinkedIn</a>
          </li>
          <li><a href="https://github.com/WellBee">GitHub</a></li>
          <li><a href="https://www.youtube.com/@WellBeeLife">YouTube</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 WellBee. All rights reserved.</p>
    </div>
  </footer>

  <script src="{{ asset('js/nearby.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMxQ-lZ-lQIGX-yQbT0q4sQhWocJ6ziWQ&callback=initMap" async defer></script>
</body>

</html>