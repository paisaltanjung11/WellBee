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

    const userBmi = window.userData.bmi;
    if (userBmi === null) {
        // No BMI → no recommendation
        return;
    }
    

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
            // Show exercises by BMI
            document.querySelectorAll(".exercise-item-unw").forEach(item =>{
                item.style.display = "none"
            });
            document.querySelectorAll(".exercise-info-unw").forEach(info =>{
                info.style.display = "none"
            });
            document.querySelectorAll(".exercise-item-std").forEach(item =>{
                item.style.display = "none"
            });
            document.querySelectorAll(".exercise-info-std").forEach(info =>{
                info.style.display = "none"
            });
            document.querySelectorAll(".exercise-item-ovw").forEach(item =>{
                item.style.display = "none"
            });
            document.querySelectorAll(".exercise-info-ovw").forEach(info =>{
                info.style.display = "none"
            });
            document.querySelectorAll(".exercise-item-obs").forEach(item =>{
                item.style.display = "none"
            });
            document.querySelectorAll(".exercise-info-obs").forEach(info =>{
                info.style.display = "none"
            });
            const bmiRecommendationMap = [
                { min: 0, max: 18.5, item: ".exercise-item-unw", info: ".exercise-info-unw" },
                { min: 18.5, max: 25, item: ".exercise-item-std", info: ".exercise-info-std" },
                { min: 25, max: 30, item: ".exercise-item-ovw", info: ".exercise-info-ovw" }, 
                { min: 30, max: 1000, item: ".exercise-item-obs", info: ".exercise-info-obs" }, 
            ];

            const recommendation = bmiRecommendationMap.find(
                (rule) => userBmi >= rule.min && userBmi < rule.max
            );

            if(recommendation)
            {
                document.querySelectorAll(recommendation.item).forEach(item => {
                    item.style.display = "flex";
                });
                document.querySelectorAll(recommendation.info).forEach(info => {
                    info.style.display = "inline-block";
                });
            } 
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
