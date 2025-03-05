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
                    <h3>Create Bill/Cash Memo</h3>
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
                                </tbody>
                            </table>
                        </div>
                        <!-- <hr> -->

                        <form action="" method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="i1" class="form-label">Operation on</label>
                                    <input type="date" class="form-control" id="i1" required name="operationon">
                                </div>
                                <div class="col-md-6">
                                    <label for="i2" class="form-label">Bed Charges</label>
                                    <input type="number" class="form-control" id="i2" name="bed" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i3" class="form-label">Operation Theater Charges</label>
                                    <input type="number" class="form-control" id="i3" name="ot" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i4" class="form-label">Surgeon Charges</label>
                                    <input type="number" class="form-control" id="i4" name="surgeon" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i5" class="form-label">Anesthetic Charges</label>
                                    <input type="number" class="form-control" id="i5" name="anesthetic" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i6" class="form-label">Assistant Charges</label>
                                    <input type="number" class="form-control" id="i6" name="assistant" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i7" class="form-label">Laurette Cassette</label>
                                    <input type="number" class="form-control" id="i7" name="laurettecassette" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i8" class="form-label">Laurette Expenses</label>
                                    <input type="number" class="form-control" id="i8" name="lauretteexpenses" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i9" class="form-label">IOL work up</label>
                                    <input type="number" class="form-control" id="i9" name="iol" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i10" class="form-label">Medicine & Consumables</label>
                                    <input type="number" class="form-control" id="i10" name="med" >
                                </div>
                                <div class="col-md-6">
                                    <label for="i11" class="form-label">Intra Ocular Lens Charges</label>
                                    <input type="number" class="form-control" id="i11"  name="intra" >
                                </div>
                                <input type="hidden" name="id" value="<?php echo  $detail['id']; ?>">
                                <!-- <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Total bill</label>
                                    <input type="text" class="form-control" id="total" readonly>
                                </div> -->
                                <div class="col-12">
                                    <input class="btn btn-primary" type="submit" value="Create Bill" name="submit">
                                </div>
                                <!-- <p id="total"></p> -->
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
        $operationon =  mysqli_real_escape_string($conn, $_POST['operationon']);
        $bed =  mysqli_real_escape_string($conn, $_POST['bed']);
        $ot =  mysqli_real_escape_string($conn, $_POST['ot']);
        $surgeon =  mysqli_real_escape_string($conn, $_POST['surgeon']);
        $anesthetic =  mysqli_real_escape_string($conn, $_POST['anesthetic']);
        $assistant =  mysqli_real_escape_string($conn, $_POST['assistant']);
        $laurettecassette =  mysqli_real_escape_string($conn, $_POST['laurettecassette']);
        $lauretteexpenses =  mysqli_real_escape_string($conn, $_POST['lauretteexpenses']);
        $iol =  mysqli_real_escape_string($conn, $_POST['iol']);
        $med =  mysqli_real_escape_string($conn, $_POST['med']);
        $intra =  mysqli_real_escape_string($conn, $_POST['intra']);
    $total = $bed + $ot +$surgeon+$anesthetic+$assistant+$laurettecassette+$lauretteexpenses+$iol+$med+$intra;
     

        $sql = "INSERT INTO `op_bill`(`pid`, `opon`, `bed`, `ot`, `anesthetic`, `surgeon`, `assistant`, `laurettecassette`, `lauretteexpenses`, `iolworkup`, `medicine`, `intra`, `total`) VALUES ('$id','$operationon','$bed','$ot','$anesthetic','$surgeon','$assistant','$laurettecassette','$lauretteexpenses','$iol','$med','$intra','$total')";


        if ($conn->query($sql) === TRUE) {
    ?>
            <script>
                swal({
                    title: "Cash/Bill Memo Generated Successfully",
                    // text: "Patient Register Sccessfully",
                    icon: "success",
                    button: "Close",
                }).then(function() {
                    window.location = "o_bill_list.php";
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