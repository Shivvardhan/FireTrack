<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href = '../index.php'; </script>";
    exit;
}

include "head.php";
include "topandsidenav.php";
date_default_timezone_set("Asia/Kolkata");

// Database connection
$servername = "localhost";
$db_username = "your_db_username"; // Replace with your actual username
$db_password = "your_db_password"; // Replace with your actual password
$dbname = "your_db_name"; // Replace with your actual database name

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $inspection_date = $conn->real_escape_string($_POST['inspection_date']);
    $notes = $conn->real_escape_string($_POST['notes']);

    // Insert the inspection request into the database
    $sql = "INSERT INTO inspection_requests (fullname, email, phone, address, inspection_date, notes, status)
            VALUES ('$fullname', '$email', '$phone', '$address', '$inspection_date', '$notes', 'pending')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Inspection request submitted successfully!'); window.location.href = 'inspection_request.php';</script>";
    } else {
        echo "<script>alert('Error submitting inspection request: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h3>Request House Inspection</h3>
                <p class="mb-0">Please provide accurate details for scheduling your house inspection.</p>
            </div>
        </div>
    </div>
</div>

<form action="inspection_request.php" method="POST">
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396" id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396">

                <!-- Full Name -->
                <div class="mb-3">
                    <label class="form-label" for="fullname">Full Name</label>
                    <input class="form-control" id="fullname" type="text" placeholder="Enter your full name" name="fullname" required />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label class="form-label" for="email">Email Address</label>
                    <input class="form-control" id="email" type="email" placeholder="Enter your email address" name="email" required />
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input class="form-control" id="phone" type="tel" placeholder="Enter your phone number" name="phone" required />
                </div>

                <!-- Address of the House -->
                <div class="mb-3">
                    <label class="form-label" for="address">House Address</label>
                    <textarea class="form-control" id="address" rows="3" placeholder="Enter the address of the house to be inspected" name="address" required></textarea>
                </div>

                <!-- Preferred Inspection Date -->
                <div class="mb-3">
                    <label class="form-label" for="inspection_date">Preferred Inspection Date</label>
                    <input class="form-control" id="inspection_date" type="date" placeholder="Select a date" name="inspection_date" min="<?php echo date('Y-m-d'); ?>" required />
                </div>

                <!-- Additional Notes -->
                <div class="mb-3">
                    <label class="form-label" for="notes">Additional Notes</label>
                    <textarea class="form-control" id="notes" rows="3" placeholder="Any specific requests or notes for the inspector?" name="notes"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="Submit Request" name="submit">
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include "footer.php";
?>