<?php
// Replace with your Google Maps API key
$apiKey = "AlzaSyBB_AqhfBjv48iR2Ukw4lN_B2RBzXg5Jcf";

// Function to fetch shortest route
function getShortestRoute($start, $end, $apiKey) {
    $start = urlencode($start);
    $end = urlencode($end);

    // Google Maps Directions API URL
    $url = "https://maps.googleapis.com/maps/api/directions/json?origin=$start&destination=$end&key=$apiKey";

    // Fetch response from Google API
    $response = file_get_contents($url);
    return json_decode($response, true);
}

// Handle user input
$start = isset($_POST["start"]) ? $_POST["start"] : "";
$end = isset($_POST["end"]) ? $_POST["end"] : "";
$routeData = null;

if (!empty($start) && !empty($end)) {
    $routeData = getShortestRoute($start, $end, $apiKey);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortest Route Finder</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apiKey; ?>&libraries=places"></script>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Find the Shortest Route</h2>
    <form method="POST">
        <input type="text" name="start" placeholder="Enter Start Location" required value="<?php echo htmlspecialchars($start); ?>">
        <input type="text" name="end" placeholder="Enter Destination" required value="<?php echo htmlspecialchars($end); ?>">
        <button type="submit">Get Route</button>
    </form>

    <div id="map"></div>

    <script>
        function initMap() {
            let map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 28.7041, lng: 77.1025 }, // Default location (Delhi)
                zoom: 10
            });

            let directionsService = new google.maps.DirectionsService();
            let directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            <?php if ($routeData && $routeData['status'] === 'OK'): ?>
                let request = {
                    origin: "<?php echo $start; ?>",
                    destination: "<?php echo $end; ?>",
                    travelMode: google.maps.TravelMode.DRIVING
                };

                directionsService.route(request, function(result, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        directionsRenderer.setDirections(result);
                    } else {
                        alert("Route not found! Check the location names.");
                    }
                });
            <?php endif; ?>
        }

        window.onload = initMap;
    </script>
</body>
</html>
