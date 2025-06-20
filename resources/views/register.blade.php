<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Register for WellBee - Your Health and Fitness Companion" />
  <title>Register | WellBee</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
  <link rel="icon" type="image/x-icon" href="{{ asset('images/WellBee Logo.png') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="container">
    <!-- Left Section with Image -->
    <div class="left-section">
      <a href="{{ route('index') }}" class="back-link">← Return to WellBee</a>
      <div class="image-content">
        <h2>Living Well,</h2>
        <h2>Feeling Great</h2>
      </div>
    </div>

    <!-- Right Section with Form -->
    <div class="right-section">
      <div class="form-container">
        <h1>Create an account</h1>
        <form class="register-form" method="POST" action="{{ route('register.store') }}">
          @csrf
          @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
      @endif
          <!-- Name Fields -->
          <div class="name-fields">
            <div class="input-group">
              <input type="text" id="firstName" name="firstName" required placeholder="First name"
                value="{{ old('firstName') }}" />
            </div>
            <div class="input-group">
              <input type="text" id="lastName" name="lastName" required placeholder="Last name"
                value="{{ old('lastName') }}" />
            </div>
          </div>

          <!-- Email -->
          <div class="input-group">
            <input type="email" id="email" name="email" required placeholder="Email" value="{{ old('email') }}" />
          </div>

          <!-- Password -->
          <div class="input-group">
            <div class="password-input">
              <input type="password" id="password" name="password" required placeholder="Enter your password" />
              <button type="button" class="toggle-password" onclick="togglePassword()">
                <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
              </button>
            </div>
          </div>

          <!-- Confirm Password -->
          <div class="input-group">
            <div class="password-input">
              <input type="password" id="password_confirmation" name="password_confirmation" required
                placeholder="Confirm your password" />
              <button type="button" class="toggle-password" onclick="toggleConfirmPassword()">
                <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
              </button>
            </div>
          </div>

          <!-- Terms and Conditions -->
          <div class="terms-group">
            <label class="terms-checkbox">
              <input type="checkbox" required />
              <span>I agree to the
                <a href="{{route('tnc')}}">Terms & Conditions</a></span>
            </label>
          </div>

          <!-- Register Button -->
          <button type="submit" class="register-btn">Create account</button>

          <!-- Divider -->
          <div class="divider">
            <span>OR</span>
          </div>

          <!-- Social Register -->
          <div class="social-register">
            <button type="button" class="google-btn">
              <img src="{{ asset('images/google.png') }}" alt="Google Logo" />
              Register with Google
            </button>
          </div>

          <!-- Login Link -->
          <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Log in</a>
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

    function toggleConfirmPassword() {
      const passwordInput = document.getElementById("password_confirmation");
      passwordInput.type =
        passwordInput.type === "password" ? "text" : "password";
    }
  </script>
</body>

</html>