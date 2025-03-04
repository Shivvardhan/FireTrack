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
                    <h3>Enter Patient details for Consultation</h3>
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
        <?php
        $sql = "SELECT * FROM `rate`"; // select only the username field from the table "users_table"
        $result = mysqli_query($conn, $sql); // process the query

        $rate = array(); // start an array

        while ($row = mysqli_fetch_array($result)) { // cycle through each record returned
            $rate[] = $row['rate']; // get the username field and add to the array above with surrounding quotes
        }
        ?>
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
                            <label class="form-label" for="pre">Pre Name</label>
                            <select class="form-select" id="pre" required name="pre">

                                <option selected value="">select</option>
                                <option value="Shri">Shri</option>
                                <option value="Smt.">Smt.</option>
                                <option value="Ku.">Ku.</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" type="text" placeholder="" required name="name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="gender">Gender</label>
                            <select class="form-select" id="gender" required name="gender">

                                <option selected value="">select</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="O">Others</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="age">Age</label>
                            <!-- <input class="form-control" id="exampleFormControlInput1" type="date" placeholder="" required name="dob" max="<?php //echo date('Y-m-d');  
                                                                                                                                                ?>" min="<?php // echo date('Y-m-d', strtotime("-150 years"));  
                                                                                                                                                                                        ?>" /> -->
                            <input type="number" class="form-control" id="age" placeholder="" required name="dob" min="0" max="140" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inp">Payment</label>
                            <select class="form-select" required name="payment" onchange="toggleInput();" id="inp">

                                <option value="">select</option>
                                <option value="cash" selected>Cash</option>
                                <option value="cheque">Cheque</option>


                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inpch">Cheque No.</label>
                            <input class="form-control" id="inpch" disabled type="text" placeholder="" name="chno" />
                        </div>
                        <!-- <hr> -->
                        <div class="mb-3">
                            <!-- <hr> -->
                            <!-- <label class="form-label" >Contact Details</label> -->
                            <!-- <hr> -->
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" name="email" id="email" type="email" /></div>
                                <div class="col-md-6"><label class="form-label" for="phone">Phone Number</label><input class="form-control" name="phone" id="phone" type="phone" /></div>
                            </div>


                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="hidden" required value="<?php $d = date('Y-m-d');
                                                                                        echo row_count_rdate_with_increment($d); ?>" name="checkup" />
                        </div>
                        <div class="mb-3">

                            <input class="form-control" id="exampleFormControlInput1" type="hidden" placeholder="" required value="<?php echo date('Y-m-d'); ?>" name="rdate" />
                            <input class="form-control" id="exampleFormControlInput1" type="hidden" placeholder="" required value="<?php echo $rate[16]; ?>" name="fee" />
                        </div>

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
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $rdate = $_POST['rdate'];
        $pay = $_POST['payment'];
        $ch = $_POST['chno'];
        $checkup = $_POST['checkup'];
        $pre = $_POST['pre'];
        $fee =   $_POST['fee'];
        $email =   $_POST['email'];
        $phone =   $_POST['phone'];


        $sql = "INSERT INTO patients (name, dob, gender, rdate, payment, chno, checkup_no, f_pre, fee, email, phone)
VALUES ('$name', '$dob', '$gender','$rdate','$pay', '$ch' ,'$checkup','$pre','$fee','$email','$phone')";

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