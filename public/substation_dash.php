<?php
session_start();
if (isset($_SESSION['username'])) {
    include "head.php";
    include "../dbcon.php";
    include "topandsidenav.php";
    include "function.php";
?>

<script>
// Weather API - same as index.php
fetch(`https://api.openweathermap.org/data/2.5/weather?q=Gwalior&units=metric&appid=3c41f4bc5b92ff5b2294e46210f196cc`, {
    "method": "GET",
    "headers": {}
}).then(response => {
    if (!response.ok) {
        throw response;
    }
    return response.json();
}).then(response => {
    const city = response['name'];
    const desc = response['weather'][0]['description'];
    const temp = response['main']['temp'];
    const icon = response['weather'][0]['icon'];

    document.getElementById('city').innerHTML = city;
    document.getElementById('desc').innerHTML = desc;
    document.getElementById('temp').innerHTML = temp + "&deg;";
    document.getElementById("icon").src = "http://openweathermap.org/img/wn/" + icon + ".png";
}).catch((errorResponse) => {
    if (errorResponse.text) {
        errorResponse.text().then(errorMessage => {
            // Handle error
        })
    }
});
</script>

<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card card border border-primary"
        style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
    </div>
    <div class="card-body position-relative">
        <div class="row">
            <center>
                <h2>FireTrack</h2>
            </center>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden h-100" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);">
            </div>
            <div class="card-body position-relative">
                <h6>Active Emergency Calls</h6>
                <div class="display-4 fs-1 mb-2 fw-normal font-sans-serif text-danger">5</div>
                <p class="mb-0 fs--1">Ongoing Incidents</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
            </div>
            <div class="card-body position-relative">
                <h6>Available Fire Trucks</h6>
                <div class="display-4 fs-1 mb-2 fw-normal font-sans-serif text-success">8</div>
                <p class="mb-0 fs--1">Ready for Deployment</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <div class="card-body position-relative">
                <h6>Staff on Duty</h6>
                <div class="display-4 fs-1 mb-2 fw-normal font-sans-serif text-primary">24</div>
                <p class="mb-0 fs--1">Current Shift</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <div class="card-body position-relative">
                <h6>Response Time</h6>
                <div class="display-4 fs-1 mb-2 fw-normal font-sans-serif text-warning">4.5</div>
                <p class="mb-0 fs--1">Minutes (Avg. Today)</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Emergency Calls Table -->
<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Recent Emergency Calls</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10:30 AM</td>
                    <td>123 Main St</td>
                    <td>Building Fire</td>
                    <td><span class="badge bg-danger">Active</span></td>
                    <td><button class="btn btn-sm btn-primary">View Details</button></td>
                </tr>
                <tr>
                    <td>09:15 AM</td>
                    <td>456 Park Ave</td>
                    <td>Gas Leak</td>
                    <td><span class="badge bg-success">Resolved</span></td>
                    <td><button class="btn btn-sm btn-primary">View Details</button></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>

<!-- Equipment Status -->
<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Equipment Status</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="alert alert-success">
                    <h6>Fire Trucks</h6>
                    <p class="mb-0">8/10 Available</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-warning">
                    <h6>Breathing Apparatus</h6>
                    <p class="mb-0">15/20 Available</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-info">
                    <h6>Water Tanks</h6>
                    <p class="mb-0">90% Capacity</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>
