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

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Enter Patient details for Operations</h3>
                    <p class="mb-0">Please Enter full and acurate data.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <!-- <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" >Example</h5>
                </div>
                
              </div>
            </div> -->
        <?php $detail = operation_patient_detail($_POST['id']); ?>
        <form action="" method="POST">
            <div class="card-body bg-light">
                <div class="tab-content">
                    <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396" id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396">



                        <div class="row mb-3">

                            <div class="col-sm-2">
                                <label class="form-label" for="ppre">Pre Name</label>
                                <select class="form-select" id="ppre" required name="ppre">
                                    <option value="" <?php

                                                        if (!$detail['ppre']) {
                                                            echo "selected";
                                                        }
                                                        ?>>select</option>
                                    <option value="Shri" <?php

                                                            if ($detail['ppre'] == "Shri") {
                                                                echo "selected";
                                                            }
                                                            ?>>Shri</option>
                                    <option value="Smt." <?php

                                                            if ($detail['ppre'] == "Smt.") {
                                                                echo "selected";
                                                            }
                                                            ?>>Smt.</option>
                                    <option value="Ku." <?php

                                                        if ($detail['ppre'] == "Ku.") {
                                                            echo "selected";
                                                        }
                                                        ?>>Ku.</option>



                                </select>
                            </div>
                            <div class="col-sm-10">
                                <label class="form-label" for="pname">Patient's Name</label>
                                <input class="form-control" id="pname" type="text" placeholder="" required name="pname" value="<?php echo $detail['pname'] ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-sm-2">
                                <label class="form-label" for="fpre">Pre Name</label>
                                <select class="form-select" id="fpre" required name="fpre">


                                    <option value="Shri" selected>Shri</option>


                                </select>
                            </div>
                            <div class="col-sm-10">
                                <label class="form-label" for="fname">Father's / Husband's Name</label>
                                <input class="form-control" id="fname" type="text" placeholder="" required name="fname" value="<?php echo $detail['fname'] ?>" />
                            </div>
                        </div>



                        <div class="mb-3">

                            <div class="row g-3">
                                <div class="col-md-6"> <label class="form-label" for="gender">Gender</label>
                                    <select class="form-select" id="gender" required name="gender">

                                        <option value="M" <?php

                                                            if ($detail['gender'] == 'M') {
                                                                echo "selected";
                                                            }
                                                            ?>>Male</option>
                                        <option value="F" <?php

                                                            if ($detail['gender']  == 'F') {
                                                                echo "selected";
                                                            }
                                                            ?>>Female</option>
                                        <option value="O" <?php

                                                            if ($detail['gender']  == 'O') {
                                                                echo "selected";
                                                            }
                                                            ?>>Others</option>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="age">Age</label>

                                    <input type="number" class="form-control" id="age" placeholder="" required name="age" min="0" max="140" value="<?php echo $detail['age'] ?>" required>
                                </div>
                            </div>


                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="address">Full Address</label>
                            <input class="form-control" name="address" id="address" type="text" required value="<?php echo $detail['address'] ?>" />
                        </div>

                        <div class="mb-3">

                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" name="email" id="email" type="email" value="<?php echo $detail['email'] ?>"  /></div>
                                <div class="col-md-6"><label class="form-label" for="phone">Phone Number</label><input class="form-control" name="phone" id="phone" type="phone" value="<?php echo $detail['phone'] ?>"  /></div>
                            </div>


                        </div>

                        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>">

                        <div class="col-12">
                            <input class="btn btn-primary" type="submit" value="Register Patient" name="submit">
                        </div>

                    </div>
                    <div class="tab-pane code-tab-pane" role="tabpanel" aria-labelledby="tab-dom-5b65eabf-8724-44fc-b10b-93c9826d4c4f" id="dom-5b65eabf-8724-44fc-b10b-93c9826d4c4f">
                        <pre class="scrollbar rounded-1" style="max-height:420px"></pre>
                    </div>

                </div>
            </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        include "../dbcon.php";
        $pprename =  mysqli_real_escape_string($conn, $_POST['ppre']);
        $pname =  mysqli_real_escape_string($conn, $_POST['pname']);
      
       
        $fprename =  mysqli_real_escape_string($conn, $_POST['fpre']);
        $fname =  mysqli_real_escape_string($conn, $_POST['fname']);
 

        $gender =  mysqli_real_escape_string($conn, $_POST['gender']);
        $age =  mysqli_real_escape_string($conn, $_POST['age']);
        $address =  mysqli_real_escape_string($conn, $_POST['address']);
        $email =  mysqli_real_escape_string($conn, $_POST['email']);
        $phone =  mysqli_real_escape_string($conn, $_POST['phone']);
        $id =  mysqli_real_escape_string($conn, $_POST['id']);


        $sql = "UPDATE `op_patient` SET `pre`='$pprename',`fullname`='$pname',`pref`='$fprename',`fathersname`='$fname',`gender`='$gender',`age`='$age',`address`='$address',`email`='$email',`phone`='$phone' WHERE id = '$id'";
// echo $sql ."<br>";

        if ($conn->query($sql) === TRUE) {
    ?>
            <script>
                swal({
                    title: "Registered Successfully",
                    text: "Patient Register Sccessfully",
                    icon: "success",
                    button: "Close",
                }).then(function() {
                    window.location = "o_table.php";
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
    </form>
<?php include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>