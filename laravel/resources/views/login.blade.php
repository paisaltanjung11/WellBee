<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Login to WellBee - Your personal health and fitness tracking companion."
    />
    <title>WellBee | Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <!-- Left Section with Image -->
      <div class="left-section">
        <a href="{{ route('index') }}" class="back-link">← Return to WellBee</a>
        <div class="image-content">
          <h2>Welcome Back!</h2>
          <h2>Let's Get Healthy</h2>
        </div>
      </div>

      <!-- Right Section with Form -->
      <div class="right-section">
        <div class="form-container">
          <h1>Welcome Back!</h1>
          <p>Login to access your personalized health dashboard</p>

          <form class="login-form">
            <div class="input-group">
              <input type="email" id="email" required placeholder="Email" />
            </div>

            <div class="input-group">
              <div class="password-input">
                <input
                  type="password"
                  id="password"
                  required
                  placeholder="Enter your password"
                />
                <button type="button" class="toggle-password">
                  <svg
                    class="eye-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                    ></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                </button>
              </div>
            </div>

            <div class="form-options">
              <label class="remember-me">
                <input type="checkbox" id="remember" />
                <span>Remember me</span>
              </label>
              <a href="#" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">Login</button>

            <div class="divider">
              <span>OR</span>
            </div>

            <div class="social-login">
              <button type="button" class="google-btn">
                <img src="{{ asset('images/google.png') }}" alt="Google" />
                Continue with Google
              </button>
            </div>

            <div class="register-link">
              Don't have an account? <a href="{{ route('register') }}">Register Now</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      function togglePassword() {
        const passwordInput = document.getElementById("password");
        passwordInput.type =
          passwordInput.type === "password" ? "text" : "password";
      }
    </script>
  </body>
</html>
