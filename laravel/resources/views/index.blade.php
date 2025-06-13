<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="WellBee - Your personal health and fitness tracking companion. Monitor BMI, exercises, and find supplements."
    />
    <title>WellBee | Health & Fitness</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
      <link rel="icon" type="image/x-icon" href="{{ asset('images/WellBee Logo.png') }}" />
  </head>
  <body>
    <header class="header">
      <a href="{{ route('index') }}" class="logo" aria-label="WellBee Home">
        <span class="well">Well</span><span class="bee">Bee</span>
      </a>

      <nav class="navbar">
        <div class="nav-center">
          <a href="{{ route('index') }}">Home</a>
          <a href="{{ route('bmi') }}">BMI Calculator</a>
          <a href="{{ route('about-us') }}">About</a>
        </div>
        <div class="nav-right">
          <a href="{{ route('login') }}" class="sign-in">Sign In</a>
          <a href="{{ route('register') }}" class="sign-up">Sign Up</a>
        </div>
      </nav>
    </header>

    <main>
      <section class="home" id="home">
        <div class="home-content">
          <h1 id="main-title">Health & Fitness Tracker</h1>
          <p>Monitor your health and track your fitness goals with ease</p>
          <div class="btn-group">
          <a href="{{ route('bmi') }}" class="btn">Get Started</a>
          </div>
        </div>
        <div class="home-img">
          <img src="{{ asset('images/img.png') }}" alt="Fitness tracking illustration" />
        </div>
      </section>

      <section class="testimonials">
        <div class="testimonials-header">
          <h2>Achieve More with WellBee</h2>
          <h2>Your Health, Your Rules</h2>
        </div>

        <div class="testimonials-container">
          <div class="testimonial-card">
            <div class="profile-img">
              <img src="{{ asset('images/john-wick.png') }}" alt="Customer testimonial" />
            </div>
            <h3>John Wick 1</h3>
            <p class="job-title">Software Engineer at Google</p>
            <div class="stars">
              <span>★</span><span>★</span><span>★</span><span>★</span
              ><span>★</span>
            </div>
            <p class="review-text">
              "WellBee has transformed how I track my fitness journey. The
              interface is intuitive and the features are exactly what I
              needed!"
            </p>
          </div>

          <div class="testimonial-card">
            <div class="profile-img">
              <img src="{{ asset('images/john-wick.png') }}" alt="Customer testimonial" />
            </div>
            <h3>John Wick 2</h3>
            <p class="job-title">Fitness Trainer at GoldGym</p>
            <div class="stars">
              <span>★</span><span>★</span><span>★</span><span>★</span
              ><span>★</span>
            </div>
            <p class="review-text">
              "As a fitness trainer, I recommend WellBee to all my clients. It's
              comprehensive and easy to use."
            </p>
          </div>

          <div class="testimonial-card">
            <div class="profile-img">
              <img src="{{ asset('images/john-wick.png') }}" alt="Customer testimonial" />
            </div>
            <h3>John Wick 3</h3>
            <p class="job-title">Nutritionist at HealthPlus</p>
            <div class="stars">
              <span>★</span><span>★</span><span>★</span><span>★</span
              ><span>★</span>
            </div>
            <p class="review-text">
              "The nutrition tracking features are outstanding. My clients love
              how easy it is to monitor their daily intake."
            </p>
          </div>

          <div class="testimonial-card">
            <div class="profile-img">
              <img src="{{ asset('images/john-wick.png') }}" alt="Customer testimonial" />
            </div>
            <h3>John Wick 4</h3>
            <p class="job-title">Professional Athlete</p>
            <div class="stars">
              <span>★</span><span>★</span><span>★</span><span>★</span
              ><span>★</span>
            </div>
            <p class="review-text">
              "WellBee helps me stay on top of my game. The tracking features
              are perfect for monitoring my performance."
            </p>
          </div>
        </div>

        <div class="cta-container">
          <h2>No More Excuses, Your Evolution Starts Here</h2>
          <a href="{{ route('register') }}" class="cta-button">
            Enter the Grind
            <div class="mana-particle"></div>
            <div class="mana-particle"></div>
            <div class="mana-particle"></div>
          </a>
          <p class="cta-quote">
            <span class="system-text">System:</span> No more delays, now's your
            time to lock in and begin your villain arc 😈
          </p>
        </div>
      </section>
    </main>

    <div class="wave-divider">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 2880 320"
        preserveAspectRatio="none"
      >
        <!-- Background wave -->
        <path
          class="wave wave-back"
          fill="#0b1b35"
          fill-opacity="0.3"
          d="M0,192L60,181.3C120,171,240,149,360,160C480,171,600,213,720,213.3C840,213,960,171,1080,170.7C1200,171,1320,213,1440,224C1560,235,1680,213,1800,181.3C1920,149,2040,107,2160,112C2280,117,2400,171,2520,197.3C2640,224,2760,224,2880,213.3C3000,203,3120,181,3180,170.7L3240,160L3240,320L3180,320C3120,320,3000,320,2880,320C2760,320,2640,320,2520,320C2400,320,2280,320,2160,320C2040,320,1920,320,1800,320C1680,320,1560,320,1440,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
        ></path>
        <!-- Foreground wave -->
        <path
          class="wave"
          fill="#0b1b35"
          fill-opacity="1"
          d="M0,192L60,181.3C120,171,240,149,360,160C480,171,600,213,720,213.3C840,213,960,171,1080,170.7C1200,171,1320,213,1440,224C1560,235,1680,213,1800,181.3C1920,149,2040,107,2160,112C2280,117,2400,171,2520,197.3C2640,224,2760,224,2880,213.3C3000,203,3120,181,3180,170.7L3240,160L3240,320L3180,320C3120,320,3000,320,2880,320C2760,320,2640,320,2520,320C2400,320,2280,320,2160,320C2040,320,1920,320,1800,320C1680,320,1560,320,1440,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
        ></path>
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
            <!-- <li><a href="#">Support</a></li> -->
          </ul>
        </div>
        <div class="footer-section">
          <h3>COMPANY</h3>
          <ul>
            <li><a href="{{ route('about-us') }}">About Us</a></li>
            <li>
              <a
                href="mailto:contact.wellbee@gmail.com?subject=Support Request&body=Hi WellBee Support,"
                >Contact Us</a
              >
            </li>
            <!-- <li><a href="#">Partnerships</a></li>
            <li><a href="#">Careers</a></li> -->
          </ul>
        </div>
        <div class="footer-section">
          <h3>SOCIAL</h3>
          <ul>
            <li>
              <a href="https://www.linkedin.com/in/wellbee-founder/"
                >LinkedIn</a
              >
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
  </body>
</html>
