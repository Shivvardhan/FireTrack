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
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Location</label>
                    <input type="text" class="form-control" name="location" required>
                </div>
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
    $report_by = $_SESSION['id'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $cause_of_fire = $_POST['cause_of_fire'];
    $fire_strength = $_POST['fire_strength'];
    $occupants = $_POST['occupants'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO fire_report (report_by, time, location, cause_of_fire, fire_strength, occupants, remarks) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $report_by, $time, $location, $cause_of_fire, $fire_strength, $occupants, $remarks);

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