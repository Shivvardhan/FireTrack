<?php
session_start();
if (isset($_SESSION['username'])) {
include "head.php";

include "topandsidenav.php";
date_default_timezone_set("Asia/Kolkata");
include "../dbcon.php";

?>

<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h3>Enter Patient details</h3>
                <p class="mb-0">Please update patient data.</p>
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
    <form action="" method="POST">
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396" id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396">
                    <!-- <div class="mb-3">
                    <select class="form-select" aria-label="Default select example">

                        <option selected="">Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>

                    </select>
                </div> -->
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Patient ID</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text"  value="<?php echo $_POST['id']; ?>"  name="id"readonly  />
                    </div>
                    <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Pre Name</label>
                            <select class="form-select" required name="pre">

                                <option value="" <?php

                                                    if (!$_POST['f_pre']) {
                                                        echo "selected";
                                                    }
                                                    ?>>select</option>
                                <option value="Shri" <?php

                                                        if ($_POST['f_pre'] == "Shri") {
                                                            echo "selected";
                                                        }
                                                        ?>>Shri</option>
                                <option value="Smt." <?php

                                                        if ($_POST['f_pre'] == "Smt.") {
                                                            echo "selected";
                                                        }
                                                        ?>>Smt.</option>
                                <option value="Ku." <?php

                                                    if ($_POST['f_pre'] == "Ku.") {
                                                        echo "selected";
                                                    }
                                                    ?>>Ku.</option>

                            </select>
                        </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Name</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" required value="<?php echo $_POST['name']; ?>" name="name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Gender</label>
                        <select class="form-select" required name="gender">

                            <option value="">select</option>
                            <option value="M" <?php

                                                if ($_POST['gender'] == 'M') {
                                                    echo "selected";
                                                }
                                                ?>>Male</option>
                            <option value="F" <?php

                                                if ($_POST['gender'] == 'F') {
                                                    echo "selected";
                                                }
                                                ?>>Female</option>
                            <option value="O" <?php

                                                if ($_POST['gender'] == 'O') {
                                                    echo "selected";
                                                }
                                                ?>>Others</option>

                        </select>
                    </div>
                 
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Age</label>
                        <!-- <input class="form-control" id="exampleFormControlInput1" type="date" placeholder="" required value="<?php // echo $_POST['dob']; ?>" name="dob"  max="<?php //echo date('Y-m-d');  ?>"  min="<?php // echo date('Y-m-d',strtotime("-150 years"));  ?>"/> -->
<input type="number" class="form-control" id="exampleFormControlInput1"  placeholder="" name="dob" required min = "0" max = "140" value="<?php echo $_POST['dob']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Registeration date</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" required value="<?php echo $_POST['rdate']; ?>" readonly  name="rdate"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Payment</label>
                        <select class="form-select" required name="payment" onchange="toggleInput();" id="inp">

                            <option value="" <?php if (!$_POST['payment']){ echo "selected";}?>>select</option>
                            <option value="cash"  <?php if ($_POST['payment'] == "cash"){ echo "selected";}?> >Cash</option>
                            <option value="cheque"  <?php if ($_POST['payment'] == "cheque"){ echo "selected";}?>>Cheque</option>
                        

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Cheque no.</label>
                        <input class="form-control" id="inpch"  disabled type="text" placeholder=""  value="<?php echo $_POST['chno']; ?>" name="chnum" />
                    </div>
                    <div class="mb-3">
                            <!-- <hr> -->
                            <!-- <label class="form-label" >Contact Details</label> -->
                            <!-- <hr> -->
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" name="emailup" id="email" value ="<?php echo $_POST['email']; ?>"type="email" /></div>
                                <div class="col-md-6"><label class="form-label" for="phone">Phone Number</label><input class="form-control" value ="<?php echo $_POST['phone']; ?>" name="phoneup" id="phone" type="phone" /></div>
                            </div>


                        </div>
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="Save changes" name="submit">
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
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $rdate = $_POST['rdate'];
    $pay = $_POST['payment'];
    $chnum = $_POST['chnum'];
    $pre = $_POST['pre'];
    $email = $_POST['emailup'];
    $phoneup = $_POST['phoneup'];


    $sql = "UPDATE patients
    SET name='$name', dob = '$dob', gender = '$gender', chno = '$chnum', payment = '$pay', f_pre = '$pre', email = '$email', phone = '$phoneup'
    WHERE rdate = '$rdate' AND id = '$id';";

    if ($conn->query($sql) === TRUE) {
?>
        <script>
            swal({
                title: "Registered Successfully",
                text: "Patient Register Sccessfully",
                icon: "success",
                button: "Close",
            }).then(function() {
                window.location = "patient.php";
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