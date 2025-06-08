<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="WellBee Exercise - Choose from various workout options tailored to your fitness level and goals." />
  <title>WellBee | Exercise</title>
  <link rel="stylesheet" href="{{ asset('css/exercise.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
  <!-- Load dark mode script early -->
  <script src="{{ asset('js/darkmode.js') }}" defer></script>
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
        <a href="{{ route('index') }}" class="profile-menu">
          <img src="{{ asset('images/user-icon/user2.png') }}" alt="Profile" class="avatar" />
          <span id="userName">User</span>
        </a>
      </div>
    </nav>
  </header>

  <main class="exercise-container">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-content">
        <!-- Theme Toggle Button -->
        <div class="theme-toggle">
          <button id="themeToggleBtn" class="btn-theme">
            <span class="theme-icon">🌙</span>
          </button>
        </div>

        <h1>Find Your Perfect Workout</h1>
        <p class="motivation">
          Choose a workout that fits your lifestyle, goals, and fitness level
        </p>
      </div>
    </section>

    <!-- Workout Selection Section -->
    <section class="workout-section" id="workout-section">
      <div class="section-header">
        <h2>Choose Your Workout</h2>
        <p>Select a workout type that fits your lifestyle and goals</p>
      </div>
      <div class="workout-cards">
        <div class="workout-card" id="homeWorkout">
          <div class="workout-icon">
            <img src="images/home-workout.png" alt="Home Workout" />
          </div>
          <h3>Home Workout</h3>
          <p>
            Perfect for beginners. No equipment needed, exercise in the
            comfort of your home.
          </p>
          <div class="tag-recommended" id="homeRecommended">
            Recommended for you
          </div>
          <a href="#" class="btn-secondary" data-workout="home">View Exercises</a>
        </div>

        <div class="workout-card" id="outdoorWorkout">
          <div class="workout-icon">
            <img src="{{ asset('images/outdoor-workout.png') }}" alt="Outdoor Workout" />
          </div>
          <h3>Outdoor Workout</h3>
          <p>
            Get fresh air while exercising. Includes jogging, bodyweight
            exercises, and more.
          </p>
          <div class="tag-recommended" id="outdoorRecommended">
            Recommended for you
          </div>
          <a href="#" class="btn-secondary" data-workout="outdoor">View Exercises</a>
        </div>

        <div class="workout-card" id="gymWorkout">
          <div class="workout-icon">
            <img src="{{ asset('images/gym-workout.png') }}" alt="Gym Workout" />
          </div>
          <h3>Gym Workout</h3>
          <p>
            For experienced users. Full equipment access for maximum results.
          </p>
          <div class="tag-recommended" id="woRecommended">
            Recommended for you
          </div>
          <a href="#" class="btn-secondary" data-workout="gym">View Exercises</a>
        </div>
      </div>
    </section>

    <!-- Exercise Details Section (Hidden by Default) -->
    <section class="exercise-details-section" id="exerciseDetails">
      <div class="section-header">
        <h2 id="exerciseTypeTitle">Home Workout Exercises</h2>
        <p>Follow these exercises for optimal results</p>
      </div>

 <!-- Home Workout Exercises -->
        <div class="exercise-list" id="homeExercises">
          <!-- Universal / All BMI -->
          <div class="exercise-item-uni">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Brisk Walking"
              />
            </div>
            <div class="exercise-info-uni">
              <h3>Brisk Walking</h3>
              <p>
                Low impact cardio, safe for all BMI levels. Helps build stamina.
              </p>
              <div class="exercise-details">
                <span>10-20 mins</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=nmvVfgrExAg&pp=ygUXYnJpc2sgd2Fsa2luZyBob3cgdG8gZG_SBwkJsgkBhyohjO8%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Underweight Focus -->
          <div class="exercise-item-unw">
            <div class="exercise-img">
              <img
                src="{{asset('images/workout/temp-animation.gif')}}"
                alt="Wall Push-ups"
              />
            </div>
            <div class="exercise-info-unw">
              <h3>Wall Push-ups</h3>
              <p>
                Easier push-up variation, helps build upper body strength
                progressively.
              </p>
              <div class="exercise-details">
                <span>3 sets x 10-12 reps</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=5NPvv40gd3Q&pp=ygUMd2FsbCBwdXNoIHVw" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-unw">
            <div class="exercise-img">
              <img src="{{asset('images/workout/temp-animation.gif')}}" alt="Glute Bridge" />
            </div>
            <div class="exercise-info-unw">
              <h3>Glute Bridge</h3>
              <p>
                Strengthens glutes and lower back, improves posture and
                stability.
              </p>
              <div class="exercise-details">
                <span>3 sets x 15-20 reps</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=Xp33YgPZgns&pp=ygUMZ2x1dGUgYnJpZGdl" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Normal BMI -->
          <div class="exercise-item-std">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/home-workout/pushups.gif')}}"
                alt="Push-ups"
              />
            </div>
            <div class="exercise-info-std">
              <h3>Push-ups</h3>
              <p>
                Targets chest, shoulders, and triceps. Great for building upper
                body strength.
              </p>
              <div class="exercise-details">
                <span>3 sets x 10-15 reps</span>
                <span>Difficulty: Beginner to Intermediate</span>
                <a href="https://www.youtube.com/watch?v=WDIpL0pjun0&pp=ygUQcHVzaCB1cCB0dXRvcmlhbNIHCQmyCQGHKiGM7w%3D%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-std">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Bodyweight Squats"
              />
            </div>
            <div class="exercise-info-std">
              <h3>Bodyweight Squats</h3>
              <p>
                Targets quads, hamstrings, and glutes. Essential for lower body
                strength.
              </p>
              <div class="exercise-details">
                <span>3 sets x 15-20 reps</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=m0GcZ24pK6k&pp=ygURYm9keXdlaWdodCBzcXVhdHM%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-std">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/home-workout/plank.jpg')}}" alt="Plank" />
            </div>
            <div class="exercise-info-std">
              <h3>Plank</h3>
              <p>
                Targets core, shoulders, and back. Excellent for building
                stability and endurance.
              </p>
              <div class="exercise-details">
                <span>3 sets x 30-60 seconds</span>
                <span>Difficulty: Beginner to Advanced</span>
                <a href="https://www.youtube.com/watch?v=pvIjsG5Svck&pp=ygUFcGxhbms%3D"
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Overweight Focus -->
          <div class="exercise-item-ovw">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Step Touch" />
            </div>
            <div class="exercise-info-ovw">
              <h3>Step Touch</h3>
              <p>
                Low impact lateral step movement. Improves mobility and burns
                calories.
              </p>
              <div class="exercise-details">
                <span>3 sets x 1 min</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=wH9hsR7Ck_M&pp=ygUKc3RlcCB0b3VjaA%3D%3D"
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-ovw">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Seated March" />
            </div>
            <div class="exercise-info-ovw">
              <h3>Seated March</h3>
              <p>
                Safe cardio option for overweight/obese users. Increases heart
                rate gently.
              </p>
              <div class="exercise-details">
                <span>3 sets x 1 min</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=uoRVJBDEX60&pp=ygUMc2VhdGVkIG1hcmNo"
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Obese Focus -->
          <div class="exercise-item-obs">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Chair Squat" />
            </div>
            <div class="exercise-info-obs">
              <h3>Chair Squat</h3>
              <p>
                Assisted squat using chair support. Builds lower body strength
                safely.
              </p>
              <div class="exercise-details">
                <span>3 sets x 10-12 reps</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=GIz1C3yfE1s&pp=ygULY2hhaXIgc3F1YXTSBwkJsgkBhyohjO8%3D"
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-obs">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Wall Push-ups"
              />
            </div>
            <div class="exercise-info-obs">
              <h3>Wall Push-ups</h3>
              <p>
                Easier push-up variation. Helps build strength safely for obese
                users.
              </p>
              <div class="exercise-details">
                <span>3 sets x 8-12 reps</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=5NPvv40gd3Q&pp=ygUMd2FsbCBwdXNoIHVw" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Outdoor Workout Exercises (Hidden initially) -->
        <div class="exercise-list" id="outdoorExercises" style="display: none">
          <!-- Universal / All BMI -->
          <div class="exercise-item-uni">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Brisk Walking"
              />
            </div>
            <div class="exercise-info-uni">
              <h3>Brisk Walking</h3>
              <p>
                Low impact cardio, suitable for all fitness levels. Improves
                cardiovascular health.
              </p>
              <div class="exercise-details">
                <span>20-30 minutes</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=nmvVfgrExAg&pp=ygUXYnJpc2sgd2Fsa2luZyBob3cgdG8gZG_SBwkJsgkBhyohjO8%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Underweight Focus -->
          <div class="exercise-item-unw">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Dynamic Stretching"
              />
            </div>
            <div class="exercise-info-unw">
              <h3>Dynamic Stretching</h3>
              <p>
                Enhances flexibility and warms up the body safely for outdoor
                activities.
              </p>
              <div class="exercise-details">
                <span>5-10 minutes</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=3qyWpJ34dWw&pp=ygUSZHluYW1pYyBzdHJldGNoaW5n" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Normal BMI -->
          <div class="exercise-item-std">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Jogging" />
            </div>
            <div class="exercise-info-std">
              <h3>Jogging</h3>
              <p>
                Great cardio exercise that improves heart health and burns
                calories.
              </p>
              <div class="exercise-details">
                <span>20-30 minutes</span>
                <span>Difficulty: Beginner to Advanced</span>
                <a href="https://www.youtube.com/shorts/A5uZobDo80Q" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-std">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Park Bench Dips"
              />
            </div>
            <div class="exercise-info-std">
              <h3>Park Bench Dips</h3>
              <p>Targets triceps, shoulders, and chest using a park bench.</p>
              <div class="exercise-details">
                <span>3 sets x 10-15 reps</span>
                <span>Difficulty: Intermediate</span>
                <a href="https://www.youtube.com/watch?v=larQGD02ndE&pp=ygUKYmVuY2ggZGlwcw%3D%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-std">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Jumping Jacks"
              />
            </div>
            <div class="exercise-info-std">
              <h3>Jumping Jacks</h3>
              <p>
                Full body cardio exercise that gets your heart rate up quickly.
              </p>
              <div class="exercise-details">
                <span>3 sets x 30 seconds</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=q_Z29u7nglQ&pp=ygUNanVtcGluZyBqYWNrcw%3D%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Overweight Focus -->
          <div class="exercise-item-ovw">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Step-ups on Bench"
              />
            </div>
            <div class="exercise-info-ovw">
              <h3>Step-ups on Bench</h3>
              <p>
                Strengthens legs and glutes, improves balance and coordination.
              </p>
              <div class="exercise-details">
                <span>3 sets x 10 reps each leg</span>
                <span>Difficulty: Beginner to Intermediate</span>
                <a href="https://www.youtube.com/shorts/hmyKV9tUkHc" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Obese Focus -->
          <div class="exercise-item-obs">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Side Steps" />
            </div>
            <div class="exercise-info-obs">
              <h3>Side Steps</h3>
              <p>
                Low impact movement that enhances hip mobility and burns
                calories safely.
              </p>
              <div class="exercise-details">
                <span>3 sets x 1 minute</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=X0jsl2ZrXug&pp=ygUTc2lkZSBzdGVwcyBleGVyY2lzZQ%3D%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-obs">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Seated Arm Raises"
              />
            </div>
            <div class="exercise-info-obs">
              <h3>Seated Arm Raises</h3>
              <p>
                Safe upper body exercise performed from a seated position.
                Improves shoulder mobility.
              </p>
              <div class="exercise-details">
                <span>3 sets x 12-15 reps</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=jFM-Hg9V8fM&pp=ygURc2VhdGVkIGFybSByYWlzZXM%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Gym Workout Exercises (Hidden initially) -->
        <div class="exercise-list" id="gymExercises" style="display: none">
          <!-- Universal / All BMI -->
          <div class="exercise-item-uni">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Treadmill Walking"
              />
            </div>
            <div class="exercise-info-uni">
              <h3>Treadmill Walking</h3>
              <p>
                Low impact cardio suitable for all fitness levels. Great warm-up
                or main exercise for beginners.
              </p>
              <div class="exercise-details">
                <span>10-20 minutes</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=vdsaHSr1H_E&pp=ygURdHJlYWRtaWxsIHdhbGtpbmc%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Underweight Focus -->
          <div class="exercise-item-unw">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Seated Cable Row"
              />
            </div>
            <div class="exercise-info-unw">
              <h3>Seated Cable Row</h3>
              <p>
                Strengthens the back and biceps. Controlled movement helps build
                strength safely.
              </p>
              <div class="exercise-details">
                <span>3 sets x 12-15 reps</span>
                <span>Difficulty: Beginner to Intermediate</span>
                <a href="https://www.youtube.com/watch?v=xQNrFHEMhI4&pp=ygUQc2VhdGVkIGNhYmxlIHJvd9IHCQmyCQGHKiGM7w%3D%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Normal BMI -->
          <div class="exercise-item-std">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Bench Press" />
            </div>
            <div class="exercise-info-std">
              <h3>Bench Press</h3>
              <p>
                Classic chest exercise using a barbell or dumbbells on a bench.
              </p>
              <div class="exercise-details">
                <span>4 sets x 8-12 reps</span>
                <span>Difficulty: Intermediate</span>
                <a href="https://www.youtube.com/shorts/hWbUlkb5Ms4" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-std">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Deadlift" />
            </div>
            <div class="exercise-info-std">
              <h3>Deadlift</h3>
              <p>
                Compound exercise targeting hamstrings, back, and grip strength.
              </p>
              <div class="exercise-details">
                <span>3 sets x 6-10 reps</span>
                <span>Difficulty: Intermediate to Advanced</span>
                <a href="https://www.youtube.com/shorts/HrXR9MxcU8g" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-std">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Lat Pulldown" />
            </div>
            <div class="exercise-info-std">
              <h3>Lat Pulldown</h3>
              <p>Targets the back muscles using a cable machine.</p>
              <div class="exercise-details">
                <span>3 sets x 10-15 reps</span>
                <span>Difficulty: Beginner to Intermediate</span>
                <a href="https://www.youtube.com/shorts/4lKxpQvTDvU" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Overweight Focus -->
          <div class="exercise-item-ovw">
            <div class="exercise-img">
              <img src="{{asset ('images/workout/temp-animation.gif')}}" alt="Leg Press" />
            </div>
            <div class="exercise-info-ovw">
              <h3>Leg Press</h3>
              <p>
                Machine-based leg exercise, safer for knees and back. Builds
                lower body strength.
              </p>
              <div class="exercise-details">
                <span>3 sets x 10-12 reps</span>
                <span>Difficulty: Beginner to Intermediate</span>
                <a href="https://www.youtube.com/shorts/nDh_BlnLCGc" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <!-- Obese Focus -->
          <div class="exercise-item-obs">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Chest Press Machine"
              />
            </div>
            <div class="exercise-info-obs">
              <h3>Chest Press Machine</h3>
              <p>
                Machine-based chest exercise, providing guided motion for safe
                strength training.
              </p>
              <div class="exercise-details">
                <span>3 sets x 10-12 reps</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=7aRlJZCXdeo&pp=ygULY2hlc3QgcHJlc3PSBwkJsgkBhyohjO8%3D" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>

          <div class="exercise-item-obs">
            <div class="exercise-img">
              <img
                src="{{asset ('images/workout/temp-animation.gif')}}"
                alt="Stretching Machine or Mat Stretch"
              />
            </div>
            <div class="exercise-info-obs">
              <h3>Stretching Machine or Mat Stretch</h3>
              <p>
                Enhances flexibility and mobility, helps reduce injury risk.
                Great cool-down.
              </p>
              <div class="exercise-details">
                <span>5-10 minutes</span>
                <span>Difficulty: Beginner</span>
                <a href="https://www.youtube.com/watch?v=1iwor0oFjfk&pp=ygUSc3RyZXRjaGluZyBtYWNoaW5l" 
                target="_blank" rel="noopener noreferrer" class="exercise-nav-link"> Watch Tutorial </a>
              </div>
            </div>
          </div>
        </div>

      <div class="back-to-workout">
        <a href="#workout-section" class="btn-primary" id="backToWorkouts">Choose Another Workout</a>
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

  <script src="{{ asset('js/exercise.js') }}"></script>
</body>

</html>