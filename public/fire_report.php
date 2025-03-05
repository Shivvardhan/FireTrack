<?php
session_start();
if (isset($_SESSION['username'])) {
    include "head.php";
    include "function.php";
    include "topandsidenav.php";
    date_default_timezone_set("Asia/Kolkata");

?>
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card"
        style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h3>Fire Report Details</h3>
                <!-- <p class="mb-0">Please Enter full and acurate data.</p> -->
            </div>
        </div>
    </div>
</div>
<form action="#" method="POST">
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396"
                id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396">
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Time of Incident</label>
                    <input type="time" class="form-control" name="time" required>
                </div>
<!-- Location Input Field -->
<div class="mb-3">
    <label class="form-label" for="location">Location</label>
    <div class="location-search-box">
        <input type="text" class="form-control" id="locationSearch" 
               placeholder="Search for a location" autocomplete="off">
        <i class="fas fa-times clear-location" id="clearLocation"></i>
        <div id="searchResults"></div>
    </div>
    <div id="map"></div>
    
    <!-- Hidden fields for form submission -->
    <input type="hidden" id="location" name="location">
    <input type="hidden" id="latitude" name="latitude">
    <input type="hidden" id="longitude" name="longitude">
</div>

<!-- Map Container -->
<!-- <div id="map" style="height: 300px;"></div> -->

<!-- Include Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

<style>
.location-search-box {
    position: relative;
}

#searchResults {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 4px;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
    display: none;
}

.search-result-item {
    padding: 10px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
}

.search-result-item:hover {
    background-color: #f8f9fa;
}

#map {
    height: 300px;
    margin-top: 10px;
    border-radius: 4px;
}

.clear-location {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #666;
    display: none;
}
</style>

<!-- Replace the existing location input field with this -->
<!-- <div class="mb-3">
    <label class="form-label" for="location">Location</label>
    <div class="location-search-box">
        <input type="text" class="form-control" id="locationSearch" 
               placeholder="Search for a location" autocomplete="off">
        <i class="fas fa-times clear-location" id="clearLocation"></i>
        <div id="searchResults"></div>
    </div>
    <div id="map"></div>
    
     Hidden fields for form submission -->
    <!-- <input type="hidden" id="location" name="location">
    <input type="hidden" id="latitude" name="latitude">
    <input type="hidden" id="longitude" name="longitude">
</div> -->
 
<!-- Include Leaflet CSS & JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let map = L.map('map').setView([20.5937, 78.9629], 5); // Default view centered on India
    let marker;

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const locationSearch = document.getElementById('locationSearch');
    const searchResults = document.getElementById('searchResults');
    const clearLocationBtn = document.getElementById('clearLocation');
    const locationInput = document.getElementById('location');
    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');

    // Search location
    let searchTimeout;
    locationSearch.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value;
        
        if (query.length < 3) {
            searchResults.style.display = 'none';
            return;
        }

        clearLocationBtn.style.display = query ? 'block' : 'none';

        searchTimeout = setTimeout(() => {
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=5&countrycodes=in`)
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(result => {
                            const div = document.createElement('div');
                            div.className = 'search-result-item';
                            div.textContent = result.display_name;
                            div.addEventListener('click', () => {
                                selectLocation(result);
                            });
                            searchResults.appendChild(div);
                        });
                        searchResults.style.display = 'block';
                    } else {
                        searchResults.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }, 300);
    });

    // Select location from search results
    function selectLocation(result) {
        const lat = parseFloat(result.lat);
        const lon = parseFloat(result.lon);

        // Update hidden inputs
        locationInput.value = result.display_name;
        latitudeInput.value = lat;
        longitudeInput.value = lon;
        
        // Update search box
        locationSearch.value = result.display_name;
        searchResults.style.display = 'none';

        // Update map
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker([lat, lon]).addTo(map);
        map.setView([lat, lon], 16);
    }

    // Clear location
    clearLocationBtn.addEventListener('click', function() {
        locationSearch.value = '';
        locationInput.value = '';
        latitudeInput.value = '';
        longitudeInput.value = '';
        this.style.display = 'none';
        if (marker) {
            map.removeLayer(marker);
        }
        map.setView([20.5937, 78.9629], 5);
    });

    // Click on map to select location
    map.on('click', function(e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;

        // Reverse geocoding
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    marker = L.marker([lat, lng]).addTo(map);
                    
                    locationSearch.value = data.display_name;
                    locationInput.value = data.display_name;
                    latitudeInput.value = lat;
                    longitudeInput.value = lng;
                    clearLocationBtn.style.display = 'block';
                }
            });
    });

    // Close search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchResults.contains(e.target) && e.target !== locationSearch) {
            searchResults.style.display = 'none';
        }
    });
});
</script>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Cause of Fire</label>
                    <textarea class="form-control" name="cause_of_fire" required></textarea>
                </div>

                <div class=" mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Fire Strength</label>
                    <select class="form-select" name="fire_strength" required>
                        <option selected value="">select fire strength</option>
                        <option value="weak">Weak</option>
                        <option value="medium">Medium</option>
                        <option value="strong">Strong</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Occupants</label>
                    <input type="text" class="form-control" name="occupants" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Remarks</label>
                    <textarea class="form-control" name="remarks" required></textarea>
                </div>

                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="Send" name="submit">
                </div>
            </div>
        </div>
    </div>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_by = $_SESSION['username'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $cause_of_fire = $_POST['cause_of_fire'];
    $fire_strength = $_POST['fire_strength'];
    $occupants = $_POST['occupants'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO fire_report (report_by, time, location, latitude, longitude, cause_of_fire, fire_strength, occupants, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssddssss", $report_by, $time, $location, $latitude, $longitude, $cause_of_fire, $fire_strength, $occupants, $remarks);

    if ($stmt->execute()) {
        echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Fire Incident Reported!!.',
            icon: 'success'
        }).then(() => {
            window.location.href = 'fire_report.php'; 
        });
      </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Error: " . addslashes($conn->error) . "',
                icon: 'error'
            });
          </script>";
    }
    
    $stmt->close();
}

?>

<?php

    include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>

<!-- Add this just before closing body tag -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY&libraries=places"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Google Places Autocomplete
    const locationInput = document.getElementById('location');
    const clearLocationBtn = document.getElementById('clearLocation');
    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');
    const formattedAddressInput = document.getElementById('formatted_address');

    const autocomplete = new google.maps.places.Autocomplete(locationInput, {
        types: ['geocode', 'establishment'],
        componentRestrictions: { country: 'IN' } // Restrict to India
    });

    // Handle place selection
    autocomplete.addListener('place_changed', function() {
        const place = autocomplete.getPlace();
        
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed
            locationInput.value = '';
            return;
        }

        // Get location details
        const lat = place.geometry.location.lat();
        const lng = place.geometry.location.lng();
        const address = place.formatted_address;

        // Update hidden fields
        latitudeInput.value = lat;
        longitudeInput.value = lng;
        formattedAddressInput.value = address;

        // Show clear button
        clearLocationBtn.style.display = 'block';
    });

    // Clear location
    clearLocationBtn.addEventListener('click', function() {
        locationInput.value = '';
        latitudeInput.value = '';
        longitudeInput.value = '';
        formattedAddressInput.value = '';
        this.style.display = 'none';
    });

    // Show/hide clear button based on input
    locationInput.addEventListener('input', function() {
        clearLocationBtn.style.display = this.value ? 'block' : 'none';
    });

    // Prevent form submission on enter in location field
    locationInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
        }
    });
});
</script>