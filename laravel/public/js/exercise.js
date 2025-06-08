document.addEventListener("DOMContentLoaded", () => {
    initWorkoutSelection();
    setUserName();
    getBmiCategory();
});

// Set user name in navbar profile
function setUserName() {
    const userNameElement = document.getElementById("userName");
    const userName = localStorage.getItem("userName") || "User";
    userNameElement.textContent = userName;
}

function getBmiCategory() {
    const userBmi = window.userData.bmi;

    document.getElementById("homeRecommended").style.display = "none";
    document.getElementById("outdoorRecommended").style.display = "none";
    document.getElementById("woRecommended").style.display = "none";

    if (userBmi === null) {
        // No BMI → no recommendation
        return;
    }

    // Define BMI → Workout mapping
    const bmiRecommendationMap = [
        { min: 0, max: 18.5, workout: "homeRecommended" },
        { min: 18.5, max: 25, workout: "outdoorRecommended" },
        { min: 25, max: 30, workout: "woRecommended" }, // overweight → Gym
        { min: 30, max: 1000, workout: "homeRecommended" }, // obese → Home safer
    ];

    const recommendation = bmiRecommendationMap.find(
        (rule) => userBmi >= rule.min && userBmi < rule.max
    );

    if (recommendation) {
        document.getElementById(recommendation.workout).style.display =
            "inline-block";
    }
}

// Handle workout selection and display appropriate exercises
function initWorkoutSelection() {
    const workoutButtons = document.querySelectorAll(
        ".btn-secondary[data-workout]"
    );
    const workoutSection = document.getElementById("workout-section");
    const exerciseDetails = document.getElementById("exerciseDetails");
    const exerciseTypeTitle = document.getElementById("exerciseTypeTitle");
    const backToWorkoutsBtn = document.getElementById("backToWorkouts");

    const itemUnderw = document.getElementById("exercise-item-unw");
    const infoUnderw = document.getElementById("exercise-info-unw");
    const itemStd = document.getElementById("exercise-item-std");
    const infoStd = document.getElementById("exercise-info-std");
    const itemOverw = document.getElementById("exercise-item-ovw");
    const infoOverw = document.getElementById("exercise-info-ovw");
    const itemObese = document.getElementById("exercise-item-obs");
    const infoObese = document.getElementById("exercise-info-obs");

    // Handle workout selection
    workoutButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();
            const workoutType = button.getAttribute("data-workout");

            // Hide workout section and show exercise details
            workoutSection.style.display = "none";
            exerciseDetails.style.display = "block";

            // Update exercise type title
            exerciseTypeTitle.textContent = `${
                workoutType.charAt(0).toUpperCase() + workoutType.slice(1)
            } Workout Exercises`;

            // Hide all exercise lists first
            document.querySelectorAll(".exercise-list").forEach((list) => {
                list.style.display = "none";
            });

            // Show selected workout exercises
            document.getElementById(`${workoutType}Exercises`).style.display =
                "flex";

            // Scroll to exercise details
            window.scrollTo({
                top: exerciseDetails.offsetTop - 80,
                behavior: "smooth",
            });
        });
    });

    // Handle "Choose Another Workout" button
    backToWorkoutsBtn.addEventListener("click", (e) => {
        e.preventDefault();
        exerciseDetails.style.display = "none";
        workoutSection.style.display = "block";

        // Scroll back to workout section
        window.scrollTo({
            top: workoutSection.offsetTop - 80,
            behavior: "smooth",
        });
    });
}
