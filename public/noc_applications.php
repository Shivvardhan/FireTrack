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
                <h3>NOC Applications</h3>
                <!-- <p class="mb-0">Please Enter full and acurate data.</p> -->
            </div>
        </div>
    </div>
</div>

<div class="card mb-3 mt-2">
    <div class="card-body pt-0" style="margin-top:10px;padding:10px;">

        <div class="table-responsive scrollbar ">
            <table class="table  table-responsive table-bordered table-striped fs--1 mb-0 table-hover" id="myTable">
                <thead>
                    <tr>
                        <th style="overflow-wrap: break-word;" scope="col">ID</th>
                        <th style="overflow-wrap: break-word;" scope="col">Report By</th>
                        <th style="overflow-wrap: break-word;" scope="col">Time</th>
                        <th style="overflow-wrap: break-word;" scope="col">Location</th>
                        <th style="overflow-wrap: break-word;" scope="col">Cause Of Fire</th>
                        <th style="overflow-wrap: break-word;" scope="col">Fire Strength</th>
                        <th style="overflow-wrap: break-word;" scope="col">Occupants</th>
                        <th style="overflow-wrap: break-word;" scope="col">Remarks</th>
                        <th style="overflow-wrap: break-word;" scope="col">Photo</th>
                        <th style="overflow-wrap: break-word;" scope="col">Timestamp</th>
                        <th style="overflow-wrap: break-word;" scope="col" width="4%">Assign</th>

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
                        <td style="overflow-wrap: break-word;"><img src="<?php echo $row['photo'] ?>" class="img-fluid">
                        </td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['timestamp'] ?></td>

                        <td style="overflow-wrap: break-word;">

                            <form action="#" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row["username"]; ?>">
                                <input type="hidden" name="pass" value="<?php echo $row['password'] ?>">
                                <input type="hidden" name="email" value="<?php echo $row['emailid'] ?>">
                                <input type="hidden" name="access_level" value="<?php echo $row['access_level'] ?>">
                                <input type="hidden" name="name" value="<?php echo $row['full_name'] ?>">

                                <button class="btn btn btn-secondary" type="submit" name="edit" value="edit"><i
                                        class="far fa-edit"></i> </button>
                            </form>
                        </td>





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

    include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>