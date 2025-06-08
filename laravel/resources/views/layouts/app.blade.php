<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Your app description here" />
  <title>WellBee | Your App</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
  <script>
    window.userData = {
      name: "{{ Auth::user()->first_name ?? 'User' }} {{ Auth::user()->last_name ?? '' }}",
      bmi: {{ Auth::user()->bmi ?? 'null' }},
      weight: {{ Auth::user()->weight ?? 'null' }},
      height: {{ Auth::user()->height ?? 'null' }},
    };
  </script>
</head>

<body>
  <header class="header">
    <a href="{{ route('index') }}" class="logo" aria-label="WellBee Home">
      <span class="well">Well</span><span class="bee">Bee</span>
    </a>

    @include('partials.navbar')
  </header>

  <main class="container">
    @yield('content')
  </main>

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
          <li><a href="https://www.youtube.com/@WellBeeLife">Using WellBee</a></li>
          <li><a href="{{ route('tnc') }}">Terms & Conditions</a></li>
          <li><a href="#">Docs</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>COMPANY</h3>
        <ul>
          <li><a href="{{ route('about-us') }}">About Us</a></li>
          <li><a href="mailto:contact.wellbee@gmail.com?subject=Support Request&body=Hi WellBee Support,">Contact Us</a>
          </li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>SOCIAL</h3>
        <ul>
          <li><a href="https://www.linkedin.com/in/wellbee-founder/">LinkedIn</a></li>
          <li><a href="https://github.com/WellBee">GitHub</a></li>
          <li><a href="https://www.youtube.com/@WellBeeLife">YouTube</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 WellBee. All rights reserved.</p>
    </div>
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>