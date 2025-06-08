<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="WellBee User Dashboard - Track your fitness journey and get personalized recommendations." />
  <title>WellBee | User Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
  <!-- Load dark mode script early -->
  <script src="{{ asset('js/darkmode.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <div class="profile-logout">
          <a href="{{ route('dashboard') }}" class="profile-menu">
            <img src="{{ asset('images/user-icon/user2.png') }}" alt="Profile" class="avatar" />
            <span id="userName">{{ $user->first_name }} {{ $user->last_name }}</span>
          </a>
          <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="sign-in" style="margin-left: 1rem;">Logout</button>
          </form>
        </div>
      </div>
    </nav>
  </header>

  @include('partials.navbar')

  <main class="dashboard-container">
    @if (is_null($user->bmi))
    <div id="bmiReminder"
      style="display:none; background-color:#fff3cd; color:#856404; padding:1rem; border-radius:8px; margin-bottom:20px; text-align:center; font-weight:500;">
      🚀 Let's go! Please update your BMI now to start your healthy journey!
      <a href="{{ route('bmi') }}" style="color:#004085; font-weight:600;">Update Now</a>
    </div>
  @endif


    <!-- Hero Section - Welcome & Motivation -->
    <section class="hero-section">
      <div class="hero-content">
        <!-- Theme Toggle Button moved to top right -->
        <div class="theme-toggle">
          <button id="themeToggleBtn" class="btn-theme">
            <span class="theme-icon">🌙</span>
          </button>
        </div>

        <h1>
          <span id="welcomeMessage">Welcome</span>,
          <span id="welcomeUserName">User</span>!
        </h1>
        <p class="motivation" id="motivationText">
          Start Your Journey to a Healthier Life!
        </p>

        <div class="quick-stats">
          <div class="stat-item medium-stat">
            <span class="stat-label">BMI</span>
            <span class="stat-value" id="userBmi">22.5</span>

            <!-- Confetti Container for BMI Celebrations -->
            <div class="confetti-container" id="confettiContainer"></div>
          </div>
          <div class="stat-item medium-stat">
            <span class="stat-label">Status</span>
            <span class="stat-value" id="bmiCategory">Normal</span>
          </div>
        </div>

        <!-- Badges Display -->
        <div class="badges-container">
          <div class="badge" id="healthyEaterBadge">
            <span class="badge-icon">🍏</span>
            <span class="badge-text">Healthy Eater</span>
          </div>
          <div class="badge" id="workoutWarriorBadge">
            <span class="badge-icon">💪</span>
            <span class="badge-text">Workout Warrior</span>
          </div>
        </div>
      </div>
    </section>

    <!-- BMI Results & Recommendations -->
    <section class="bmi-section">
      <div class="section-header">
        <h2>Your Health Profile</h2>
      </div>
      <div class="bmi-card">
        <div class="bmi-result">
          <div class="bmi-value">
            <span id="bmiValue">22.5</span>
            <span class="bmi-unit">kg/m²</span>
          </div>
          <div class="bmi-category" id="bmiCategoryDetail">
            Your BMI is in the
            <span class="category-highlight">Normal</span> range
          </div>
          <div class="bmi-range">
            <div class="range-bar">
              <div class="range-indicator" id="bmiIndicator"></div>
              <div class="range-labels">
                <span>Underweight</span>
                <span>Normal</span>
                <span>Overweight</span>
                <span>Obese</span>
              </div>
            </div>
          </div>

          <!-- Update BMI Button replacing Milestone Progress -->
          <div class="update-bmi-section">
            <button id="updateBmiBtn" class="btn-update-pill">Update</button>
          </div>
        </div>
        <div class="bmi-recommendation">
          <h3>Personalized Recommendation</h3>
          <p id="bmiRecommendation">
            Your BMI is within a healthy range. Focus on maintaining balanced
            nutrition and regular exercise to keep it that way.
          </p>
          <div class="recommendation-links">
            <a href="{{ route('exercise') }}" class="btn-primary">View Workout Options</a>
            <a href="{{ route('nutrition') }}" class="btn-primary">Check Nutrition Plans</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Progress Tracking Section -->
    <section class="progress-section">
      <div class="section-header">
        <h2>Track Your Progress</h2>
        <p>Monitor your health and fitness journey</p>
      </div>
      <div class="progress-content">
        <div class="progress-chart">
          <h3>BMI History <span class="chart-period">Last 30 days</span></h3>
          <div class="chart-container">
            <canvas id="bmiChart"></canvas>
          </div>
        </div>
        <div class="progress-metrics">
          <div class="metric-card">
            <h4>Weight</h4>
            <div class="metric-value">
              <span id="currentWeight">65</span>
              <span class="metric-unit">kg</span>
            </div>
            <!-- <div class="metric-change positive">
              <span>-2.5kg</span>
              <span>Last 30 days</span>
            </div> -->
          </div>
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

  <script>
    window.userData = {
      name: "{{ $user->first_name }} {{ $user->last_name }}",
      bmi: {{ $user->bmi ?? 'null' }},
      weight: {{ $user->weight ?? 'null' }},
      height: {{ $user->height ?? 'null' }},
      bmiHistory: @json($bmiHistory),
    };
  </script>


  <script src="{{ asset('js/dashboard.js') }}"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const bmiReminder = document.getElementById("bmiReminder");
      if (bmiReminder) {
        setTimeout(() => {
          bmiReminder.style.display = "block";
          bmiReminder.style.opacity = 0;
          bmiReminder.style.transition = "opacity 0.5s ease-in-out";
          bmiReminder.style.opacity = 1;
        }, 1000);
      }
    });
  </script>

</body>

</html>