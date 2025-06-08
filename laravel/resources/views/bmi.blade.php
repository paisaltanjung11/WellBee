<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Calculate and track your BMI with WellBee's easy-to-use BMI calculator." />
  <title>WellBee | BMI Calculator</title>
  <link rel="stylesheet" href="{{ asset('css/bmi.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
</head>

<body>
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
        @if (Auth::check())
      <!-- User is logged in -->
      <div class="profile-logout">
        <a href="{{ route('dashboard') }}" class="profile-menu nav-link">
        <img src="{{ asset('images/user-icon/user2.png') }}" alt="Profile" class="avatar" />
        <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="sign-in" style="margin-left: 1rem;">Logout</button>
        </form>
      </div>
    @else
      <!-- Guest user -->
      <a href="{{ route('login') }}" class="sign-in">Sign In</a>
      <a href="{{ route('register') }}" class="sign-up">Sign Up</a>
    @endif
      </div>
    </nav>
  </header>

  <main class="container">
    <div class="left-side">
      <div class="title">
        <h1>Know Your BMI,</h1>
        <h1>Know Your Health</h1>
      </div>

      <div class="calculator-form">
        <form method="POST" action="{{ route('bmi.save') }}">
          @csrf

          <div class="input-group">
            <label for="height">Enter Your Height (cm)</label>
            <input type="number" name="height" id="height" value="{{ $user->height ?? '' }}" required />
          </div>

          <div class="input-group">
            <label for="weight">Enter Your Weight (kg)</label>
            <input type="number" name="weight" id="weight" value="{{ $user->weight ?? '' }}" required />
            <p class="input-hint">* Input your height and weight</p>
          </div>

          <button type="submit" class="calculate-btn">
            {{ is_null($user->bmi) ? 'Save BMI' : 'Update BMI' }}
          </button>
        </form>
      </div>
    </div>

    <div class="right-side">
      <img src="{{ asset('images/bminew.png') }}" alt="BMI Chart" class="bmi-chart" />
    </div>
  </main>

  <!-- BMI Result Modal -->
  <div class="modal-overlay" id="popupOverlay"></div>
  <div class="modal" id="bmiPopup">
    <div class="modal-content">
      <div class="modal-header">
        <div class="header-content">
          <h2 id="bmi-result">Your BMI Result</h2>
          <span class="info-icon">
            <span class="tooltip">
              BMI is a general estimate and does not account for muscle mass,
              bone density, or overall body composition.
            </span>
          </span>
        </div>
        <button class="close-btn" onclick="closePopup()">&times;</button>
      </div>
      <div id="popupResult"></div>
      <div class="modal-cta">
        <p class="cta-text">
          Want personalized health recommendations and detailed insights?
        </p>
        <a href="{{ route('login') }}" class="cta-button">Get Detailed Analysis</a>
        <button class="secondary-btn" onclick="closePopup()">
          Maybe Later
        </button>
      </div>
    </div>
  </div>

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
          <li><a href="#">Dashboard</a></li>
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
          <!-- <li><a href="#">Support</a></li> -->
        </ul>
      </div>
      <div class="footer-section">
        <h3>COMPANY</h3>
        <ul>
          <li><a href="{{ route('about-us') }}">About Us</a></li>
          <li>
            <a href="mailto:contact.wellbee@gmail.com?subject=Support Request&body=Hi WellBee Support,">Contact Us</a>
          </li>
          <!-- <li><a href="#">Partnerships</a></li>
            <li><a href="#">Careers</a></li> -->
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
      <!-- <div class="footer-links">
          <a href="#">Terms</a>
          <a href="#">Privacy</a>
        </div> -->
    </div>
  </footer>

  <script src="{{ asset('js/bmi.js') }}"></script>
</body>

</html>