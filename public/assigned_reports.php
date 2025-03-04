<?php
session_start();
if ($_SESSION['access_level'] == 'admin') {
    include "head.php";
    include "../dbcon.php";
    include "topandsidenav.php";
    date_default_timezone_set("Asia/Kolkata");

?>

<div class="card-body position-relative">
    <div class="row">
        <div class="col-lg-8">
            <h3>Fire Reports Details</h3>
            <!-- <p class="mb-0">Please Enter full and acurate data.</p> -->
        </div>
    </div>
</div>
<div class="card mb-3 mt-2">
    <div class="card-body pt-0" style="margin-top:10px;padding:10px;">

        <div class="table-responsive scrollbar ">
            <table class="table  table-responsive table-bordered table-striped fs--1 mb-0 table-hover" id="myTable">

                <thead>
                    <tr>
                        <!-- <th style="overflow-wrap: break-word;" scope="col"width="1%">S.No.</th> -->
                        <th style="overflow-wrap: break-word;" scope="col">ID</th>
                        <th style="overflow-wrap: break-word;" scope="col">Report By</th>
                        <th style="overflow-wrap: break-word;" scope="col">Time</th>
                        <th style="overflow-wrap: break-word;" scope="col">Location</th>
                        <th style="overflow-wrap: break-word;" scope="col">Cause Of Fire</th>
                        <th style="overflow-wrap: break-word;" scope="col">Fire Strength</th>
                        <th style="overflow-wrap: break-word;" scope="col">Occupants</th>
                        <th style="overflow-wrap: break-word;" scope="col">Remarks</th>
                        <th style="overflow-wrap: break-word;" scope="col">Timestamp</th>
                        <th style="overflow-wrap: break-word;" scope="col">Assigned To</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `fire_report`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 0;
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                        ?>
                    <tr>
                        <td style="overflow-wrap: break-word;"><?php echo $row['report_id'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['report_by'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['time'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['location'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['cause_of_fire'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['fire_strength'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['occupants'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['remarks'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['timestamp'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['assigned_to'] ?></td>
                    </tr>
                    <?php

                            }
                        } else {
                            echo "0 results";
                        }



                        ?>


                </tbody>


            </table>
        </div>
    </div>
</div>



<?php
    if (isset($_POST['change'])) {
        $id = $_POST['id'];
        // $pass = $_POST['pass'];
        // $pass = md5($pass);
        $email = $_POST['email'];
        $access = $_POST['access'];
        $name = $_POST['name'];


        $sql = "UPDATE users
    SET  emailid = '$email' , access_level = '$access', full_name = '$name'
    WHERE username = '$id';";

        if ($conn->query($sql) === TRUE) {
    ?>
<script>
swal({
    title: "Updated Successfully",
    text: "Profile updated Sccessfully",
    icon: "success",
    button: "Close",
}).then(function() {
    window.location = "users.php";
});
</script>
<?php
        } else { ?>
<script>
Swal({
    icon: 'error',
    title: 'Oops...',
    text: 'Something went wrong!',
    button: "Close",

})
</script>
<?php
        }
    }
    ?>
<?php
    if (isset($_POST['addnew'])) {
        $id = $_POST['id'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $email = $_POST['email'];
        $accessl = $_POST['accessl'];
        $fname = $_POST['fname'];


        $sql = "INSERT INTO `users`( `username`, `password`, `emailid` ,`full_name` , `access_level`) VALUES ('$id','$pass','$email','$fname','$accessl')";

        if ($conn->query($sql) === TRUE) {
    ?>
<script>
swal({
    title: "Created  Successfully",
    text: "New User Added Sccessfully",
    icon: "success",
    button: "Close",
}).then(function() {
    window.location = "users.php";
});
</script>
<?php
        } else { ?>
<script>
Swal({
    icon: 'error',
    title: 'Oops...',
    text: 'Something went wrong!',
    button: "Close",

})
</script>
<?php
        }
    }
    ?>


<?php

    if (isset($_POST['edit'])) {

        echo '<script type="text/javascript">
$(document).ready(function(){
    $("#edit").modal("show");
});
</script>';
    }
    ?>
<?php

    if (isset($_POST['add'])) {

        echo '<script type="text/javascript">
$(document).ready(function(){
    $("#add").modal("show");
});
</script>';
    }
    ?>
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        // order: [ 0, 'desc' ]
    });
});
</script>
<?php include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>