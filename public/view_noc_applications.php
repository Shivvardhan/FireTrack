<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href = '../index.php'; </script>";
    exit;
}

include "head.php";
include "function.php";
include "topandsidenav.php";
date_default_timezone_set("Asia/Kolkata");

// Database connection
$servername = "localhost";
$db_username = "your_db_username";
$db_password = "your_db_password";
$dbname = "your_db_name";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch pending NOC applications
$sql_noc = "SELECT * FROM noc_applications WHERE status = 'pending'";
$result_noc = $conn->query($sql_noc);

// Handle form submission to approve NOC application
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve_noc'])) {
    $noc_id = intval($_POST['noc_id']);
    $inspection_date = $conn->real_escape_string($_POST['inspection_date']);

    // Update NOC application status to approved
    $sql_update = "UPDATE noc_applications SET status = 'approved', inspection_date = '$inspection_date' WHERE id = $noc_id";
    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('NOC application approved successfully!'); window.location.href = 'view_noc_applications.php';</script>";
    } else {
        echo "<script>alert('Error approving NOC application: " . $conn->error . "'); window.location.href = 'view_noc_applications.php';</script>";
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
                <h3>Pending NOC Applications</h3>
                <p class="mb-0">View and approve NOC applications for inspection.</p>
            </div>
        </div>
    </div>
</div>

<div class="card-body bg-light">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Application Date</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_noc->num_rows > 0) {
                    while ($row = $result_noc->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['application_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['notes']) . "</td>";
                        echo "<td>";
                        echo "<button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#approveModal' data-noc-id='" . htmlspecialchars($row['id']) . "' data-fullname='" . htmlspecialchars($row['fullname']) . "' data-address='" . htmlspecialchars($row['address']) . "'>Approve</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No pending NOC applications found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Approving NOC Application -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel">Approve NOC Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="view_noc_applications.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="noc_id" id="noc_id">
                    <div class="mb-3">
                        <label class="form-label" for="fullname">Applicant Name</label>
                        <input type="text" class="form-control" id="fullname" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" class="form-control" id="address" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inspection_date">Inspection Date</label>
                        <input type="date" class="form-control" id="inspection_date" name="inspection_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="approve_noc">Approve for Inspection</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var approveModal = document.getElementById('approveModal');
        approveModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var nocId = button.getAttribute('data-noc-id');
            var fullname = button.getAttribute('data-fullname');
            var address = button.getAttribute('data-address');

            var modal = approveModal.querySelector('.modal-body');
            modal.querySelector('#noc_id').value = nocId;
            modal.querySelector('#fullname').value = fullname;
            modal.querySelector('#address').value = address;
        });
    });
</script>

<?php
include "footer.php";
?>