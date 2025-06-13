// DOM Elements
const userName = document.getElementById("userName");
const locationInput = document.getElementById("locationInput");
const currentLocationBtn = document.getElementById("currentLocationBtn");
const searchBtn = document.getElementById("searchBtn");
const filterBtns = document.querySelectorAll(".filter-btn");
const resultsContainer = document.getElementById("resultsContainer");
const resultsCount = document.getElementById("resultsCount");
const loadMoreBtn = document.getElementById("loadMoreBtn");

// Mock data (ISI dengan data kamu ya)
const mockLocations = {
    gyms: [
        {
            id: 1,
            name: "Elite Fitness Center",
            type: "Gym",
            address: "123 Main Street, Anytown",
            rating: 4.2,
            reviews: 86,
            distance: 0.8,
            image: "images/fitness-center.jpg",
            coordinates: { lat: -6.2088, lng: 106.8456 }, // Jakarta!
        },
    ],
    parks: [
        {
            id: 2,
            name: "Central Park",
            type: "Park",
            address: "Jl. Letjen S. Parman, Jakarta",
            rating: 4.8,
            reviews: 124,
            distance: 1.2,
            image: "images/city-park.jpg",
            coordinates: { lat: -6.1754, lng: 106.8272 },
        },
    ],
    "healthy-food": [
        {
            id: 3,
            name: "Green Plate Café",
            type: "Healthy Food",
            address: "Jl. Kebon Jeruk, Jakarta",
            rating: 4.5,
            reviews: 92,
            distance: 1.5,
            image: "images/health-food.jpg",
            coordinates: { lat: -6.1907, lng: 106.8239 },
        },
    ],
    yoga: [
        {
            id: 4,
            name: "Zen Yoga Studio",
            type: "Yoga Studio",
            address: "Jl. Kemang, Jakarta",
            rating: 4.9,
            reviews: 76,
            distance: 1.7,
            image: "images/yoga-studio.jpg",
            coordinates: { lat: -6.2607, lng: 106.8035 },
        },
    ],
};

// Global variables
let currentFilter = "gyms";
let currentPage = 1;
let itemsPerPage = 3;
let map;
let markers = [];
let userLocation = { lat: -6.2088, lng: 106.8456 }; // Default Jakarta
let currentMapCenter = { lat: -6.2088, lng: 106.8456 };

// Init page
document.addEventListener("DOMContentLoaded", () => {
    setUserName();
    initFilterButtons();
    initSearchButton();
    initLoadMoreButton();
    initMap();
});

function setUserName() {
    const storedName = localStorage.getItem("userName") || "User";
    const userNameElem = document.getElementById("userName");
    if (userNameElem) {
        userNameElem.textContent = storedName;
    }
}

// Init map
function initMap() {
    map = L.map("map").setView([userLocation.lat, userLocation.lng], 13);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);

    L.marker([userLocation.lat, userLocation.lng])
        .addTo(map)
        .bindPopup("Your Location")
        .openPopup();

    displayLocations(currentFilter, currentPage, true);
}

function getFilteredLocations() {
    const maxDistance = 5; // miles

    return (mockLocations[currentFilter] || []).filter((location) => {
        const dx = location.coordinates.lat - currentMapCenter.lat;
        const dy = location.coordinates.lng - currentMapCenter.lng;
        const approxDistance = Math.sqrt(dx * dx + dy * dy) * 69; // rough miles
        return approxDistance <= maxDistance;
    });
}

function displayLocations(filter, page, resetMap = false) {
    currentFilter = filter;
    currentPage = page;

    const locations = getFilteredLocations();

    if (resultsCount) {
        resultsCount.textContent = `Showing ${locations.length} ${filter} near you`;
    }

    if (resetMap) {
        clearMapMarkers();
    }

    locations.forEach((location) => {
        addLocationMarker(location);
    });

    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = Math.min(startIndex + itemsPerPage, locations.length);
    const paginatedLocations = locations.slice(startIndex, endIndex);

    if (loadMoreBtn) {
        loadMoreBtn.style.display =
            endIndex < locations.length ? "block" : "none";
    }

    renderLocationCards(paginatedLocations, page === 1);
}

function renderLocationCards(locations, clearContainer = true) {
    if (!resultsContainer) return;

    if (clearContainer) {
        resultsContainer.innerHTML = "";
    }

    locations.forEach((location) => {
        const card = document.createElement("div");
        card.className = "location-card";
        card.dataset.id = location.id;

        const starsHTML = generateStars(location.rating);

        card.innerHTML = `
      <div class="location-img">
        <img src="${location.image}" alt="${location.name}">
      </div>
      <div class="location-info">
        <h3>${location.name}</h3>
        <p class="location-type"><span class="tag">${location.type}</span></p>
        <p class="location-address">${location.address}</p>
        <div class="location-details">
          <div class="rating">
            <span class="stars">${starsHTML}</span>
            <span class="rating-count">${location.rating.toFixed(1)} (${
            location.reviews
        } reviews)</span>
          </div>
          <p class="distance">${location.distance} miles away</p>
        </div>
      </div>
      <div class="location-actions">
        <button class="btn-secondary get-directions-btn" data-id="${
            location.id
        }">Get Directions</button>
        <button class="btn-secondary view-details-btn" data-id="${
            location.id
        }">View Details</button>
      </div>
    `;

        card.querySelector(".get-directions-btn").addEventListener(
            "click",
            () => getDirections(location)
        );

        card.querySelector(".view-details-btn").addEventListener("click", () =>
            viewLocationDetails(location)
        );

        resultsContainer.appendChild(card);
    });

    if (locations.length === 0 && clearContainer) {
        resultsContainer.innerHTML = `
      <div class="no-results">
        <p>No ${currentFilter.replace("-", " ")} found near this location.</p>
        <p>Try another filter or location.</p>
      </div>
    `;
    }
}

function generateStars(rating) {
    let stars = "";
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating - fullStars >= 0.5;

    for (let i = 0; i < 5; i++) {
        if (i < fullStars) {
            stars += "★";
        } else if (i === fullStars && hasHalfStar) {
            stars += "⭐";
        } else {
            stars += "☆";
        }
    }

    return stars;
}

function addLocationMarker(location) {
    const marker = L.marker([
        location.coordinates.lat,
        location.coordinates.lng,
    ]).addTo(map).bindPopup(`
            <div class="map-info-window">
                <h3>${location.name}</h3>
                <p>${location.type}</p>
                <p>${location.distance} miles away</p>
                <p>Rating: ${location.rating.toFixed(1)}/5</p>
            </div>
        `);

    marker.on("click", () => {
        highlightLocationCard(location.id);
    });

    markers.push(marker);
}

function clearMapMarkers() {
    markers.forEach((marker) => map.removeLayer(marker));
    markers = [];
}

function highlightLocationCard(locationId) {
    document.querySelectorAll(".location-card").forEach((card) => {
        card.classList.remove("highlight");
    });

    const card = document.querySelector(
        `.location-card[data-id="${locationId}"]`
    );
    if (card) {
        card.classList.add("highlight");
        card.scrollIntoView({ behavior: "smooth", block: "center" });
    }
}

function getDirections(location) {
    const directionsUrl = `https://www.google.com/maps/dir/?api=1&destination=${location.coordinates.lat},${location.coordinates.lng}`;
    window.open(directionsUrl, "_blank");
}

function viewLocationDetails(location) {
    alert(`
    ${location.name}
    Type: ${location.type}
    Address: ${location.address}
    Rating: ${location.rating.toFixed(1)}/5 (${location.reviews} reviews)
    Distance: ${location.distance} miles away
  `);
}

function initFilterButtons() {
    filterBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            filterBtns.forEach((b) => b.classList.remove("active"));
            btn.classList.add("active");
            const filter = btn.dataset.filter;
            displayLocations(filter, 1, true);
        });
    });
}

function initSearchButton() {
    if (searchBtn) {
        searchBtn.addEventListener("click", performSearch);
    }

    if (locationInput) {
        locationInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                performSearch();
            }
        });
    }

    if (currentLocationBtn) {
        currentLocationBtn.addEventListener("click", useCurrentLocation);
    }
}

function performSearch() {
    const query = locationInput.value.trim();

    if (!query) {
        alert("Please enter a location or use current location");
        return;
    }

    fetch(
        `https://corsproxy.io/?https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(
            query
        )}`
    )
        .then((response) => response.json())
        .then((data) => {
            if (data && data.length > 0) {
                const firstResult = data[0];
                const lat = parseFloat(firstResult.lat);
                const lon = parseFloat(firstResult.lon);

                currentMapCenter = { lat: lat, lng: lon };
                map.setView([lat, lon], 15);

                displayLocations(currentFilter, 1, true);
            } else {
                alert("Location not found.");
            }
        })
        .catch((error) => {
            console.error("Error with Nominatim API:", error);
            alert("Error searching location.");
        });
}

function useCurrentLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                currentMapCenter = userLocation;
                map.setView([userLocation.lat, userLocation.lng], 13);

                displayLocations(currentFilter, 1, true);
            },
            () => {
                alert("Unable to get your current location.");
            }
        );
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function initLoadMoreButton() {
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener("click", () => {
            currentPage++;
            displayLocations(currentFilter, currentPage, false);
        });
    }
}
