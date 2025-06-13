<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="WellBee Nutrition - Get personalized nutrition guides and meal plans to support your health goals." />
  <title>WellBee | Nutrition</title>
  <link rel="stylesheet" href="{{ asset('css/nutrition.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{ asset('images/WellBee Logo.png') }}" />
  <!-- Load dark mode script early -->
  <script src="{{ asset('js/darkmode.js') }}" defer></script>
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

  <main class="nutrition-container">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-content">
        <!-- Theme Toggle Button -->
        <div class="theme-toggle">
          <button id="themeToggleBtn" class="btn-theme">
            <span class="theme-icon">🌙</span>
          </button>
        </div>

        <h1>Your Personalized Nutrition Plan</h1>
        <p class="motivation">
          Fuel your body with the right nutrients for optimal health and
          performance
        </p>
      </div>
    </section>

    <!-- Nutrition Guide Section -->
    <section class="nutrition-guide-section">
      <div class="section-header">
        <h2>Nutrition Guide</h2>
        <p>
          Personalized nutrition recommendations based on your health profile
        </p>
      </div>

      <!-- Meal Plan Categories -->
      <div class="meal-plan-categories">
        <div class="meal-plan-card" id="balancedDiet">
          <div class="meal-plan-icon">
            <img src="{{ asset('images/nutrition/balanced-diet.jpg') }}" alt="Balanced Diet" />
          </div>
          <h3>Balanced Diet</h3>
          <p>
            A well-rounded meal plan with proper portions of carbs, proteins,
            and fats.
          </p>
          <div class="tag-recommended" id="balancedRecommended" style="display: none;">
            Recommended for you
          </div>
          <a href="#" class="btn-secondary" data-meal-plan="balanced">View Plan</a>
        </div>

        <div class="meal-plan-card" id="weightLoss">
          <div class="meal-plan-icon">
            <img src="{{ asset('images/nutrition/weightloss-diet.jpg') }}" alt="Muscle Gain Diet" />
          </div>
          <h3>Weight Loss Diet</h3>
          <p>
            Calorie-controlled meals with high protein to maintain muscle
            while losing fat.
          </p>
          <div class="tag-recommended" id="weightLossRecommended" style="display: none;">Recommended for you</div>
          <a href="#" class="btn-secondary" data-meal-plan="weightLoss">View Plan</a>
        </div>

        <div class="meal-plan-card" id="muscleGain">
          <div class="meal-plan-icon">
            <img src="{{ asset('images/nutrition/musclegain-diet.jpg') }}" alt="Weight Loss Diet" />
          </div>
          <h3>Muscle Gain Diet</h3>
          <p>
            High protein, calorie-surplus meals to support muscle growth and
            recovery.
          </p>
          <div class="tag-recommended" id="muscleGainRecommended" style="display: none;">Recommended for you</div>
          <a href="#" class="btn-secondary" data-meal-plan="muscleGain">View Plan</a>
        </div>
      </div>
    </section>

    <!-- Meal Plan Details Section (Hidden by Default) -->
    <section class="meal-plan-details" id="mealPlanDetails">
      <div class="section-header">
        <h2 id="mealPlanTitle">Balanced Diet Plan</h2>
        <p>Follow this meal plan for optimum nutrition</p>
      </div>

      <!-- Balanced Diet Plan (Hidden initially) -->
      <div class="meal-plan" id="balancedMealPlan">
        <div class="daily-meals">
          <h3>Daily Meal Breakdown</h3>

          <div class="meal">
            <div class="meal-header">
              <h4>Breakfast</h4>
              <span class="meal-time">7:00 - 8:30 AM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/breakfast.jpg') }}" alt="Healthy Breakfast" />
              </div>
              <div class="meal-details">
                <h5>Oatmeal with Fruits</h5>
                <p>
                  1 cup cooked oatmeal topped with berries, banana slices, and
                  a tablespoon of honey or maple syrup. Serve with a side of
                  Greek yogurt.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 350</span>
                  <span>Protein: 15g</span>
                  <span>Carbs: 60g</span>
                  <span>Fat: 5g</span>
                </div>
              </div>
            </div>
          </div>

          <div class="meal">
            <div class="meal-header">
              <h4>Lunch</h4>
              <span class="meal-time">12:00 - 1:30 PM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/lunch.jpg') }}" alt="Healthy Lunch" />
              </div>
              <div class="meal-details">
                <h5>Grilled Chicken Salad</h5>
                <p>
                  Mixed greens with grilled chicken breast, cherry tomatoes,
                  cucumber, avocado, and balsamic vinaigrette. Serve with a
                  whole grain roll.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 450</span>
                  <span>Protein: 35g</span>
                  <span>Carbs: 30g</span>
                  <span>Fat: 20g</span>
                </div>
              </div>
            </div>
          </div>

          <div class="meal">
            <div class="meal-header">
              <h4>Dinner</h4>
              <span class="meal-time">6:30 - 8:00 PM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/dinner.jpg') }}" alt="Healthy Dinner" />
              </div>
              <div class="meal-details">
                <h5>Baked Salmon with Vegetables</h5>
                <p>
                  4oz baked salmon fillet with roasted sweet potatoes,
                  broccoli, and asparagus seasoned with herbs and olive oil.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 500</span>
                  <span>Protein: 30g</span>
                  <span>Carbs: 40g</span>
                  <span>Fat: 25g</span>
                </div>
              </div>
            </div>
          </div>

          <div class="meal">
            <div class="meal-header">
              <h4>Snacks</h4>
              <span class="meal-time">Between meals</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/snack.jpg') }}" alt="Healthy Snacks" />
              </div>
              <div class="meal-details">
                <h5>Healthy Snack Options</h5>
                <p>
                  Apple slices with almond butter, Greek yogurt with honey, a
                  handful of nuts, or a protein shake.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 150-200 per snack</span>
                  <span>Protein: 5-15g</span>
                  <span>Carbs: 15-20g</span>
                  <span>Fat: 5-10g</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="nutrition-tips">
          <h3>Tips for Success</h3>
          <ul>
            <li>Stay hydrated by drinking at least 8 glasses of water daily</li>
            <li>Aim for 5 servings of fruits and vegetables each day</li>
            <li>Limit processed foods and added sugars</li>
            <li>Eat slowly and mindfully to better recognize hunger and fullness cues</li>
            <li>Prepare meals in advance to avoid unhealthy choices when busy</li>
          </ul>
        </div>
      </div>

      <!-- Weight Loss Diet Plan (Hidden initially) -->
      <div class="meal-plan" id="weightLossMealPlan" style="display: none">
        <div class="daily-meals">
          <h3>Daily Meal Breakdown</h3>

          <div class="meal">
            <div class="meal-header">
              <h4>Breakfast</h4>
              <span class="meal-time">7:00 - 8:30 AM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/weight-loss-breakfast.jpg') }}" alt="Weight Loss Breakfast" />
              </div>
              <div class="meal-details">
                <h5>Protein-Packed Smoothie</h5>
                <p>
                  Blend 1 scoop protein powder, 1 cup spinach, 1/2 banana, 1/2
                  cup berries, and almond milk.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 250</span>
                  <span>Protein: 25g</span>
                  <span>Carbs: 30g</span>
                  <span>Fat: 3g</span>
                </div>
              </div>
            </div>
          </div>

          <div class="meal">
            <div class="meal-header">
              <h4>Lunch</h4>
              <span class="meal-time">12:00 - 1:30 PM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/weight-loss-lunch.jpg') }}" alt="Weight Loss Lunch" />
              </div>
              <div class="meal-details">
                <h5>Lean Protein Bowl</h5>
                <p>
                  3oz grilled chicken or tofu with 1/2 cup quinoa, plenty of
                  steamed vegetables, and 1 tbsp olive oil dressing.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 350</span>
                  <span>Protein: 30g</span>
                  <span>Carbs: 25g</span>
                  <span>Fat: 15g</span>
                </div>
              </div>
            </div>
          </div>

          <div class="meal">
            <div class="meal-header">
              <h4>Dinner</h4>
              <span class="meal-time">6:30 - 8:00 PM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/weight-loss-dinner.jpg') }}" alt="Weight Loss Dinner" />
              </div>
              <div class="meal-details">
                <h5>White Fish with Vegetables</h5>
                <p>
                  4oz baked white fish (cod, tilapia) with large portion of
                  roasted non-starchy vegetables and herbs.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 300</span>
                  <span>Protein: 30g</span>
                  <span>Carbs: 20g</span>
                  <span>Fat: 10g</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="nutrition-tips">
          <h3>Weight Loss Tips</h3>
          <ul>
            <li>
              Create a calorie deficit of 500 calories per day for sustainable
              weight loss
            </li>
            <li>
              Focus on high-protein foods to maintain muscle mass and increase
              satiety
            </li>
            <li>Include fiber-rich foods to stay full longer</li>
            <li>Drink water before meals to help control portion sizes</li>
            <li>
              Allow occasional treats in moderation to maintain long-term
              adherence
            </li>
          </ul>
        </div>
      </div>

      <!-- Muscle Gain Diet Plan (Hidden initially) -->
      <div class="meal-plan" id="muscleGainMealPlan" style="display: none">
        <div class="daily-meals">
          <h3>Daily Meal Breakdown</h3>

          <div class="meal">
            <div class="meal-header">
              <h4>Breakfast</h4>
              <span class="meal-time">7:00 - 8:30 AM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/muscle-gain-breakfast.jpg') }}" alt="Muscle Gain Breakfast" />
              </div>
              <div class="meal-details">
                <h5>High-Protein Oatmeal</h5>
                <p>
                  1 cup oatmeal cooked with milk, 2 scoops protein powder, 1
                  banana, 2 tbsp peanut butter, and 1 tbsp honey.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 650</span>
                  <span>Protein: 40g</span>
                  <span>Carbs: 80g</span>
                  <span>Fat: 20g</span>
                </div>
              </div>
            </div>
          </div>

          <div class="meal">
            <div class="meal-header">
              <h4>Lunch</h4>
              <span class="meal-time">12:00 - 1:30 PM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/muscle-gain-lunch.jpg') }}" alt="Muscle Gain Lunch" />
              </div>
              <div class="meal-details">
                <h5>Lean Mass Builder</h5>
                <p>
                  6oz chicken breast or lean beef, 1 cup brown rice, 1 cup
                  vegetables, and 1/2 avocado.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 700</span>
                  <span>Protein: 50g</span>
                  <span>Carbs: 70g</span>
                  <span>Fat: 25g</span>
                </div>
              </div>
            </div>
          </div>

          <div class="meal">
            <div class="meal-header">
              <h4>Dinner</h4>
              <span class="meal-time">6:30 - 8:00 PM</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/muscle-gain-dinner.jpg') }}" alt="Muscle Gain Dinner" />
              </div>
              <div class="meal-details">
                <h5>Recovery Fuel</h5>
                <p>
                  8oz salmon or red meat, 2 medium sweet potatoes, large
                  serving of vegetables, and 1 tbsp olive oil.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 750</span>
                  <span>Protein: 45g</span>
                  <span>Carbs: 60g</span>
                  <span>Fat: 35g</span>
                </div>
              </div>
            </div>
          </div>

          <div class="meal">
            <div class="meal-header">
              <h4>Post-Workout Shake</h4>
              <span class="meal-time">After training</span>
            </div>
            <div class="meal-content">
              <div class="meal-image">
                <img src="{{ asset('images/post-workout.jpg') }}" alt="Post-Workout Shake" />
              </div>
              <div class="meal-details">
                <h5>Muscle Recovery Shake</h5>
                <p>
                  2 scoops protein powder, 1 banana, 1 cup milk, 1/4 cup oats,
                  and 1 tbsp honey.
                </p>
                <div class="nutrition-facts">
                  <span>Calories: 450</span>
                  <span>Protein: 40g</span>
                  <span>Carbs: 50g</span>
                  <span>Fat: 10g</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="nutrition-tips">
          <h3>Muscle Gain Tips</h3>
          <ul>
            <li>
              Aim for a calorie surplus of 300-500 calories above maintenance
            </li>
            <li>Consume 1.6-2.2g of protein per kg of bodyweight daily</li>
            <li>
              Time your carbohydrate intake around your workouts for optimal
              performance
            </li>
            <li>
              Ensure you're getting enough calories to support muscle growth
            </li>
            <li>Focus on nutrient-dense foods rather than empty calories</li>
          </ul>
        </div>
      </div>

      <div class="back-to-plans">
        <a href="#" class="btn-primary" id="backToPlans">Choose Another Meal Plan</a>
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
          <li><a href="{{ route('tnc') }}">About Us</a></li>
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
      bmi: {{ $user->bmi ?? 'null' }},
      weight: {{ $user->weight ?? 'null' }},
      height: {{ $user->height ?? 'null' }},
    };
  </script>

  <script src="{{ asset('js/nutrition.js') }}"></script>
</body>

</html>