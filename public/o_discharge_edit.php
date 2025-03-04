<?php
session_start();
if (isset($_SESSION['username'])) {
    include "head.php";
    include "function.php";
    include "topandsidenav.php";
    date_default_timezone_set("Asia/Kolkata");

?>



    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
        </div>
        <!--/.bg-holder-->
        <?php // echo $_POST['username'];
        //echo $_POST['access_level'] ;
        ?>
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Update Patient Discharge Paper</h3>
                    <p class="mb-0">Please Provide Correct details</p>

                    <div class="col-12 mt-3">
                        <!-- <input class="btn btn-primary" onclick="printDiv('sec')" type="submit" value="Print" name="submit"> -->
                        <input class="btn btn-danger" type="submit" value="Back" name="submit" onclick="history.back();">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <?php $detail = operation_patient_detail($_POST['id']); ?>

        <form action="" method="POST">
            <div class="card-body bg-light">
                <div class="tab-content">
                    <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396" id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396">
                        <h4>Patient Info</h4>
                        <div class="table-responsive">
                            <table style="width: 100%;" class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 16.6667%;">Patient ID</td>
                                        <td style="width: 5.5762%;">:</td>
                                        <td style="width: 27.7571%;"><?php echo $detail['id']; ?></td>
                                        <td style="width: 16.6667%; text-align: right;">Patient name</td>
                                        <td style="width: 5.5762%; text-align: center;">:</td>
                                        <td style="width: 21.2868%; text-align: left;"><?php echo $detail['ppre'] . " " . $detail['pname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 16.6667%;">Age/Sex</td>
                                        <td style="width: 5.5762%;">:</td>
                                        <td style="width: 27.7571%;"><?php echo $detail['age'] . "/" . $detail['gender']; ?></td>
                                        <td style="width: 16.6667%; text-align: right;">Fathers name</td>
                                        <td style="width: 5.5762%; text-align: center;">:</td>
                                        <td style="width: 21.2868%; text-align: left;"><?php echo $detail['fpre'] . " " . $detail['fname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 16.6667%;">Address</td>
                                        <td style="width: 5.5762%;">:</td>
                                        <td style="width: 27.7571%;"><?php echo $detail['address']; ?></td>
                                        <td style="width: 16.6667%; text-align: right;"></td>
                                        <td style="width: 5.5762%; text-align: center;"></td>
                                        <td style="width: 21.2868%; text-align: left;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <hr> -->
<?php $odetail = operation_discharge_detail($_POST['id']) ?>
                        <form action="" method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="i1" class="form-label">Diagnosis</label>
                                    <input type="text" class="form-control" id="i1" required name="diagnosis" value="<?php echo $odetail['diagnosis'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="i2" class="form-label">Surgery Procedure</label>
                                    <input type="text" class="form-control" id="i2" required name="procedure" value="<?php echo $odetail['surgery'] ?>">
                                </div>


                                <div class="row gx-3 gy-2 align-items-center">
                                    <div class="col-auto">
                                        <label for="i3" class="form-label">DOA (Date of Admission)</label>
                                        <input type="date" class="form-control" id="i3" required name="doa" value="<?php echo $odetail['doa'] ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="i4" class="form-label">Time</label>
                                        <input type="time" class="form-control" id="i4" required name="t" value="<?php echo $odetail['doatime'] ?>">
                                    </div>
                                    <div class="col-auto">
                                        <label for="i5" class="form-label">DOS (Date of Surgery)</label>
                                        <input type="date" class="form-control" id="i5" required name="dos" value="<?php echo $odetail['dos'] ?>">
                                    </div>
                                    <div class="col-auto">
                                        <label for="i6" class="form-label">DOD (Date of Discharge)</label>
                                        <input type="date" class="form-control" id="i6" required name="dod" value="<?php echo $odetail['dod'] ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="i7" class="form-label">Time</label>
                                        <input type="time" class="form-control" id="i7" required name="tt" value="<?php echo $odetail['dodtime'] ?>">
                                    </div>

                                </div>

                                <input type="hidden" name="id" value="<?php echo  $detail['id']; ?>">
                                <!-- <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Total bill</label>
                                    <input type="text" class="form-control" id="inputEmail4" readonly>
                                </div> -->
                                <div class="col-12">
                                    <input class="btn btn-primary" type="submit" value="Update Discharge Papers" name="submit">
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        include "../dbcon.php";
        $id =  mysqli_real_escape_string($conn, $_POST['id']);
        $diagnosis =  mysqli_real_escape_string($conn, $_POST['diagnosis']);
        $procedure =  mysqli_real_escape_string($conn, $_POST['procedure']);
        $doa =  mysqli_real_escape_string($conn, $_POST['doa']);
        $t =  mysqli_real_escape_string($conn, $_POST['t']);
        $dos =  mysqli_real_escape_string($conn, $_POST['dos']);
        $dod =  mysqli_real_escape_string($conn, $_POST['dod']);
        $tt =  mysqli_real_escape_string($conn, $_POST['tt']);
      



        $sql = "UPDATE `op_discharge` SET `diagnosis`='$diagnosis',`surgeryprocedure`='$procedure',`doa`='$doa',`doatime`='$t',`dos`='$dos',`dod`='$dod',`dodtime`='$tt' WHERE `pid`='$id'";


        if ($conn->query($sql) === TRUE) {
    ?>
            <script>
                swal({
                    title: "Discharge Papers Updated Successfully",
                    // text: "Patient Register Sccessfully",
                    icon: "success",
                    button: "Close",
                }).then(function() {
                    window.location = "o_discharge_list.php";
                });
            </script>
        <?php
        } else { ?>
              <script>
              
              swal({
                  title: "Something went wrong!",
                  text: "OOPS!",
                  icon: "warning",
                  button: "Close",

              });
          </script>
    <?php
        }
    }
    ?>
<?php include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>