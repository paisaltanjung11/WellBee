// DOM Elements
const welcomeUserName = document.getElementById("welcomeUserName");
const userName = document.getElementById("userName");
const userBmi = document.getElementById("userBmi");
const bmiCategory = document.getElementById("bmiCategory");
const bmiValue = document.getElementById("bmiValue");
const bmiCategoryDetail = document.getElementById("bmiCategoryDetail");
const bmiIndicator = document.getElementById("bmiIndicator");
const bmiRecommendation = document.getElementById("bmiRecommendation");
const bmiChart = document.getElementById("bmiChart");
const currentWeight = document.getElementById("currentWeight");
const motivationText = document.getElementById("motivationText");
const welcomeMessage = document.getElementById("welcomeMessage");
const updateBmiBtn = document.getElementById("updateBmiBtn");

// Array of motivational quotes
const motivationalQuotes = [
    "Your health is your greatest wealth. Keep moving forward!",
    "Small steps every day lead to big changes.",
    "Progress, not perfection—keep going!",
    "You are stronger than you think. Believe in yourself!",
    "Lock in your goals, commit to your progress!",
    "Discipline defines destiny!",
    "Focus, follow through, finish!",
    "Lock in, stay consistent!",
];

// Get time-based greeting
function getTimeBasedGreeting() {
    const hour = new Date().getHours();

    if (hour >= 5 && hour < 12) {
        return "Good Morning";
    } else if (hour >= 12 && hour < 18) {
        return "Good Afternoon";
    } else {
        return "Good Evening";
    }
}

// Get random motivational quote
function getRandomMotivationalQuote() {
    const randomIndex = Math.floor(Math.random() * motivationalQuotes.length);
    return motivationalQuotes[randomIndex];
}

// Initialize Dashboard
function initDashboard() {
    const userData = window.userData;

    // Set time-based greeting
    welcomeMessage.textContent = getTimeBasedGreeting();

    // Set random motivational quote
    motivationText.textContent = getRandomMotivationalQuote();

    // Set user information
    welcomeUserName.textContent = userData.name;
    userName.textContent = userData.name;

    // Set BMI data
    if (userData.bmi === null) {
        // Belum isi BMI
        userBmi.textContent = "--";
        bmiValue.textContent = "--";
        bmiCategory.textContent = "Not Set";
        bmiCategoryDetail.innerHTML =
            'Your BMI is not yet set. <a href="' +
            "/bmi" +
            '" style="color: var(--primary-color); font-weight: 500;">Click here to update your BMI</a>';
        bmiRecommendation.textContent =
            "Please update your BMI to receive personalized recommendations.";
        bmiIndicator.style.left = `0%`;

        if (bmiChart) bmiChart.parentElement.style.display = "none";
    } else {
        // Tampilkan BMI biasa
        userBmi.textContent = userData.bmi.toFixed(1);
        bmiValue.textContent = userData.bmi.toFixed(1);

        const bmiStatus = getBmiCategory(userData.bmi);
        bmiCategory.textContent = bmiStatus.category;
        bmiCategoryDetail.innerHTML = `Your BMI is in the <span class="category-highlight" style="color: ${bmiStatus.color}">${bmiStatus.category}</span> range`;

        const indicatorPosition = getBmiIndicatorPosition(userData.bmi);
        bmiIndicator.style.left = `${indicatorPosition}%`;

        bmiRecommendation.textContent = bmiStatus.recommendation;

        if (bmiChart) bmiChart.parentElement.style.display = "block";
    }

    // Set weight
    currentWeight.textContent =
        userData.weight !== null ? userData.weight : "--";

    // Init BMI Chart if data available
    if (userData.bmiHistory && userData.bmiHistory.length > 0) {
        initBmiChart();
    }

    // Init listeners
    initEventListeners();
}

// Initialize BMI Chart
function initBmiChart() {
    console.log("Rendering BMI Chart..."); // Debug log

    const bmiChartCtx = document.getElementById("bmiChart").getContext("2d");

    const bmiLabels = window.userData.bmiHistory.map((item) => item.date);
    const bmiData = window.userData.bmiHistory.map((item) => item.bmi);

    console.log("Labels:", bmiLabels);
    console.log("Data:", bmiData);

    // Hitung BMI Average
    const averageBmi =
        bmiData.reduce((acc, val) => acc + val, 0) / bmiData.length;

    new Chart(bmiChartCtx, {
        type: "line",
        data: {
            labels: bmiLabels,
            datasets: [
                {
                    label: "BMI History (Last 30 Days)",
                    data: bmiData,
                    borderColor: "#04a6c2",
                    backgroundColor: "rgba(4, 166, 194, 0.08)", // Lebih soft
                    fill: true,
                    tension: 0.4, // Lebih halus curve
                    pointRadius: 4, // lebih kecil elegan
                    pointHoverRadius: 6,
                    pointBackgroundColor: "#04a6c2",
                    pointBorderColor: "#fff",
                },
                {
                    label: "BMI Average",
                    data: Array(bmiData.length).fill(averageBmi),
                    borderColor: "#999999", // Soft grey
                    borderDash: [5, 5],
                    fill: false,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20,
                },
            },
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 10,
                    suggestedMax: 40,
                    grid: {
                        color: "#eeeeee", // Grid ringan
                    },
                },
                x: {
                    grid: {
                        color: "#f5f5f5", // Grid ringan
                    },
                },
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: "#333",
                        font: {
                            size: 13,
                        },
                    },
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: "#fff",
                    titleColor: "#333",
                    bodyColor: "#333",
                    borderColor: "#ccc",
                    borderWidth: 1,
                },
            },
        },
    });
}

// Get BMI category and details
function getBmiCategory(bmi) {
    if (bmi < 18.5) {
        return {
            category: "Underweight",
            color: "var(--underweight-color)",
            recommendation:
                "Focus on increasing caloric intake with nutrient-dense foods and strength training.",
        };
    } else if (bmi < 25) {
        return {
            category: "Normal",
            color: "var(--normal-color)",
            recommendation:
                "Maintain balanced nutrition and regular exercise to keep it that way.",
        };
    } else if (bmi < 30) {
        return {
            category: "Overweight",
            color: "var(--overweight-color)",
            recommendation:
                "Focus on a balanced diet with a slight caloric deficit and regular cardiovascular exercise.",
        };
    } else {
        return {
            category: "Obese",
            color: "var(--obese-color)",
            recommendation:
                "Consult with a healthcare professional for a personalized plan. Focus on gradual weight loss.",
        };
    }
}

// Calculate BMI indicator position
function getBmiIndicatorPosition(bmi) {
    if (bmi < 18.5) {
        return (bmi / 18.5) * 12.5 + 6.25;
    } else if (bmi < 25) {
        return ((bmi - 18.5) / 6.5) * 25 + 25;
    } else if (bmi < 30) {
        return ((bmi - 25) / 5) * 25 + 50;
    } else {
        let position = ((bmi - 30) / 10) * 25 + 75;
        return Math.min(position, 93);
    }
}

// Initialize event listeners
function initEventListeners() {
    if (updateBmiBtn) {
        updateBmiBtn.addEventListener("click", () => {
            window.location.href = "/bmi";
        });
    }
}

// Initialize dashboard when DOM is loaded
document.addEventListener("DOMContentLoaded", initDashboard);
