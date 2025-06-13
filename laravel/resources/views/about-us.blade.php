<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="WellBee - Meet our team of dedicated founders and professionals." />
  <title>WellBee | About Us</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/about-us.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
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
    <section class="hero-section">
      <div class="hero-content">
        <h1>Empowering You to Live Healthier, Every Day</h1>
        <p>
          At WellBee, we believe that health is more than just numbers on a
          scale or medical test results—it's about balance, good habits, and
          making better daily choices. We're here to help you understand your
          body better and achieve optimal well-being through smart technology
          and data-driven solutions.
        </p>
      </div>
    </section>

    <section class="mission-story-section">
      <div class="mission-container">
        <div class="mission-content">
          <span class="section-label">Our Mission</span>
          <h2>Making Health and Wellness Accessible to Everyone</h2>
          <p>
            We strive to make health and wellness easier, more personalized,
            and enjoyable. By combining AI technology, personalized
            recommendations, and a data-driven approach, WellBee helps people
            build sustainable healthy habits that fit seamlessly into their
            daily lives.
          </p>
        </div>
        <div class="mission-image">
          <img src="{{ asset('images/mission-image.png') }}" alt="WellBee's mission visualization" />
          <div class="pattern-dots"></div>
        </div>
      </div>

      <div class="story-container">
        <div class="story-image">
          <img src="{{ asset('images/story-image.jpg') }}" alt="The story of WellBee" />
          <div class="pattern-dots pattern-dots-left"></div>
        </div>
        <div class="story-content">
          <span class="section-label">Our Story</span>
          <h2>Inspired by Real Struggles, Built for Real People</h2>
          <p>
            WellBee started as a group discussion about how hard it is to
            maintain a healthy diet, especially for students living far from
            home. Without guidance, many just eat whatever is available, often
            unaware of healthier options. In Indonesia, obesity and diabetes
            are rising, largely due to poor dietary habits.
          </p>
          <p>
            Many people want to live healthier but don't know where to start.
            Wrong diets, ineffective workouts, and lack of information make it
            even harder. One of our team members, also a student living away
            from home, struggled to find nearby healthy food options,
            reinforcing the need for a better solution.
          </p>
          <p>
            That's where WellBee comes in combining science, technology, and
            an intuitive user experience to offer practical, personalized
            health recommendations. Our goal is to make healthy living easier
            and more accessible for everyone.
          </p>
        </div>
      </div>

      <div class="features-container">
        <h2>Why Choose WellBee?</h2>
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">✅</div>
            <h3>Personalized Insights</h3>
            <p>
              We recognize that every individual is unique. That's why our
              recommendations are data-driven and tailored to your specific
              needs.
            </p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">✅</div>
            <h3>Science-Backed Approach</h3>
            <p>
              WellBee leverages AI and research-based data to help you make
              better health decisions.
            </p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">✅</div>
            <h3>User-Friendly Experience</h3>
            <p>
              Designed with simplicity and ease of use in mind, ensuring the
              best experience for all users.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="about-section">
      <div class="about-header">
        <h1>Meet the Team Behind WellBee</h1>
        <p>
          We’re just like you—students juggling life, studies, and trying to
          stay healthy. That’s why we built WellBee—to make health tracking
          simple, effective, and accessible.
        </p>
      </div>

      <div class="founders-slider">
        <div class="slider-container">
          <!-- Slide 1 -->
          <div class="slide">
            <div class="founder-card">
              <div class="founder-img">
                <img src="{{ asset('images/founder/paisal.jpg') }}" alt="paisal" />
              </div>
              <h3>Paisal Tanjung</h3>
              <p class="founder-title">
                Co-Founder | Computer Science Student
              </p>
              <p class="founder-desc">
                "Passionate about creating technology that makes health
                tracking accessible to everyone. Leading WellBee's vision of
                personalized wellness."
              </p>
              <a href="https://www.linkedin.com/in/paisaltanjung11/" class="connect-btn" target="_blank">Connect now</a>
            </div>

            <div class="founder-card">
              <div class="founder-img">
                <img src="{{ asset('images/founder/brian.jpg') }}" alt="brian" />
              </div>
              <h3>Brian Casey</h3>
              <p class="founder-title">
                Co-Founder | Computer Science Student
              </p>
              <p class="founder-desc">
                "Driving WellBee's technological innovation. Committed to
                building intuitive solutions that transform how people manage
                their health."
              </p>
              <a href="https://www.linkedin.com/in/brian-casey-reynard" class="connect-btn" target="_blank">Connect
                now</a>
            </div>

            <div class="founder-card">
              <div class="founder-img">
                <img src="{{ asset('images/founder/dedrick.jpg') }}" alt="dedrick" />
              </div>
              <h3>Dedrick Justin</h3>
              <p class="founder-title">
                Co-Founder | Computer Science Student
              </p>
              <p class="founder-desc">
                "Ensuring WellBee delivers exceptional value to our users.
                Focused on creating seamless experiences in health
                monitoring."
              </p>
              <a href="https://linkedin.com/in/david" class="connect-btn" target="_blank">Connect now</a>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="slide">
            <div class="founder-card">
              <div class="founder-img">
                <img src="{{ asset('images/founder/oliver.jpg') }}" alt="oliver" />
              </div>
              <h3>Gregorius Oliver</h3>
              <p class="founder-title">
                Co-Founder | Computer Science Student
              </p>
              <p class="founder-desc">
                "Spreading the message of wellness through innovative
                marketing strategies. Making health tracking engaging and
                fun."
              </p>
              <a href="https://linkedin.com/in/emily" class="connect-btn" target="_blank">Connect now</a>
            </div>

            <div class="founder-card">
              <div class="founder-img">
                <img src="{{ asset('images/founder/riccardo.jpg') }}" alt="riccardo" />
              </div>
              <h3>Riccardo Rehyan</h3>
              <p class="founder-title">
                Co-Founder | Computer Science Student
              </p>
              <p class="founder-desc">
                "Designing products that make a difference. Focused on
                creating features that truly help people achieve their health
                goals."
              </p>
              <a href="https://linkedin.com/in/james" class="connect-btn" target="_blank">Connect now</a>
            </div>

            <!-- <div class="founder-card">
                <div class="founder-img">
                  <img src="images/" alt="" />
                </div>
                <h3></h3>
                <p class="founder-title"></p>
                <p class="founder-desc">
                  "Creating beautiful and functional interfaces that make health
                  tracking a delightful experience for our users."
                </p>
                <a
                  href=""
                  class="connect-btn"
                  target="_blank"
                  >Connect now</a
                >
              </div> -->
          </div>
        </div>

        <button class="slider-btn prev" aria-label="Previous slide">
          &#10094;
        </button>
        <button class="slider-btn next" aria-label="Next slide">
          &#10095;
        </button>

        <div class="slider-dots">
          <span class="dot active"></span>
          <span class="dot"></span>
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
          <li><a href="#">About Us</a></li>
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

  <script src="{{ asset('js/about-us.js') }}"></script>
</body>

</html>