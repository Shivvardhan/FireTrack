<?php
session_start();
if (isset($_SESSION['username'])) {
    include "head.php";
    include "function.php";
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
                            <input class="form-control" id="exampleFormControlInput1" type="text" value="<?php echo $_POST['id']; ?>" name="id" readonly />
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
                            <input class="form-control" id="exampleFormControlInput1" type="number" placeholder="" required value="<?php echo $_POST['dob']; ?>" name="dob" min="0" max="150"/>
                            <!-- <input class="form-control" id="exampleFormControlInput1" type="date" placeholder="" required value="<?php echo $_POST['dob']; ?>" name="dob" max="<?php //echo date('Y-m-d');  ?>" min="<?php //echo date('Y-m-d', strtotime("-150 years"));  ?>" /> -->
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Registeration date</label>
                            <input class="form-control" id="exampleFormControlInput1" type="text" required value="<?php echo $_POST['rdate']; ?>" readonly name="rdate" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Payment</label>
                            <select class="form-select" required name="payment" onchange="toggleInput();" id="inp">

                                <option value="" <?php if (!$_POST['payment']) {
                                                        echo "selected";
                                                    } ?>>select</option>
                                <option value="cash" <?php if ($_POST['payment'] == "cash") {
                                                            echo "selected";
                                                        } ?>>Cash</option>
                                <option value="cheque" <?php if ($_POST['payment'] == "cheque") {
                                                            echo "selected";
                                                        } ?>>Cheque</option>


                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Cheque no.</label>
                            <input class="form-control" id="inpch" disabled type="text" placeholder="" value="<?php echo $_POST['chno']; ?>" name="chnum" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">check multiple</label><br>

                            <?php
                        $sql = "SELECT * FROM `rate`"; // select only the username field from the table "users_table"
                        $result = mysqli_query($conn, $sql); // process the query

                        $rate = array(); // start an array

                        while ($row = mysqli_fetch_array($result)) { // cycle through each record returned
                            $rate[] = $row['rate']; // get the username field and add to the array above with surrounding quotes
                        }
                        ?>


                            <!-- <label class="form-label" for="exampleFormControlInput1"><strong>check multiple</strong></label><br> -->


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="<?php echo $rate[0]; ?>" name="d1" <?php if($_POST['m1']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> />
                                <label class="form-check-label" for="inlineCheckbox1">O.C.T.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="<?php echo $rate[1]; ?>" name="d2" <?php if($_POST['m2']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox2">F.F.A.</label>
                            </div>
                            <br> <label class="form-label" for="exampleFormControlInput1">Green Laser : </label>
                            <!-- <div class="form-check form-check-inline"><input class="form-check-input" id="inlineCheckbox3" type="checkbox" value="Y" name = "d3" /><label class="form-check-label" for="inlineCheckbox3" >GREEN LASER</label></div> -->

                            <div class="form-check form-check-inline">
                                <input onclick="var input = document.getElementById('c1'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" class="form-check-input" id="inlineCheckboxs1" type="checkbox" value="<?php echo $rate[2]; ?>" name="x1" <?php if($_POST['prp']){
                                                                                                                                                                                                                                                                        echo 'checked=""';
                                                                                                                                                                                                                                                                    } ?> />
                                <input <?php if(!$_POST['prp']){echo 'disabled="disabled"';} ?> id="c1" type="number" max="2" min="1" style="width: 40px;" name="xa1" value="<?php echo  $_POST['noprp'] ?>">
                                <label class="form-check-label" for="inlineCheckboxs1">&nbsp; X PRP</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input onclick="var input = document.getElementById('c2'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" class="form-check-input" id="inlineCheckboxs2" type="checkbox" value="<?php echo $rate[3]; ?>" name="x2" <?php if($_POST['sectoral']){
                                                                                                                                                                                                                                                                        echo 'checked=""';
                                                                                                                                                                                                                                                                    } ?> />
                                <input <?php if(!$_POST['sectoral']){echo 'disabled="disabled"';} ?> id="c2" type="number" max="2" min="1" style="width: 40px;" name="xa2" value="<?php echo $_POST['nosectoral'] ?>">
                                <label class="form-check-label" for="inlineCheckboxs2">&nbsp; X SECTORAL LASER</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input onclick="var input = document.getElementById('c3'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" class="form-check-input" id="inlineCheckboxs3" type="checkbox" value="<?php echo $rate[14]; ?>" name="x3" <?php if($_POST['barrage']) {
                                                                                                                                                                                                                                                                        echo 'checked=""';
                                                                                                                                                                                                                                                                    } ?> />
                                <input <?php if(!$_POST['barrage']){echo 'disabled="disabled"';} ?> id="c3" type="number" max="2" min="1" style="width: 40px;" name="xa3" value="<?php echo $_POST['nobarrage'] ?>">
                                <label class="form-check-label" for="inlineCheckboxs3">&nbsp; X BARRAGE LASER</label>
                            </div>
                            <BR>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox4" type="checkbox" value="<?php echo $rate[4]; ?>" name="d4" <?php if($_POST['m4']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox4">YAG LASER</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox5" type="checkbox" value="<?php echo $rate[5]; ?>" name="d5" <?php if($_POST['m5']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox5">B.SCAN</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox6" type="checkbox" value="<?php echo $rate[6]; ?>" name="d6" <?php if($_POST['m6']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox6">F.PHOTO</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox7" type="checkbox" value="<?php echo $rate[7]; ?>" name="d7" <?php if($_POST['m7']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox7">C.C.T.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox8" type="checkbox" value="<?php echo $rate[8]; ?>" name="d8" <?php if($_POST['m8']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox8">PERIMETRY</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox9" type="checkbox" value="<?php echo $rate[9]; ?>" name="d9" <?php if($_POST['m9']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox9">YAG P.I.</label>
                            </div>
                            <br> <label class="form-label" for="exampleFormControlInput1">AVASTIN INJ : </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="v3" type="checkbox" value="<?php echo $rate[15]; ?>" name="x6"<?php if($_POST['m13']){
                                                                                                                echo 'checked=""';
                                                                                                            } ?> /><label class="form-check-label" for="v3">ANTIVEGF INJ</label></div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="v1" type="checkbox" value="<?php echo $rate[10]; ?>" name="x4" <?php if($_POST['ranieyeinj']) {
                                                                                                                echo 'checked=""';
                                                                                                            } ?> /><label class="form-check-label" for="v1">RANIEYE INJ.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="v2" type="checkbox" value="<?php echo $rate[13]; ?>" name="x5" <?php if($_POST['rajumabinj']){
                                                                                                                echo 'checked=""';
                                                                                                            } ?> /><label class="form-check-label" for="v2">RAJUMAB INJ</label>
                            </div><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox11" type="checkbox" value="<?php echo $rate[11]; ?>" name="d11" <?php if($_POST['m11']){
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox11">GLAUCOMA WORK UP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox12" type="checkbox" value="<?php echo $rate[12]; ?>" name="d12" <?php if($_POST['m12']) {
                                                                                                                                echo 'checked=""';
                                                                                                                            } ?> /><label class="form-check-label" for="inlineCheckbox12">I.O.L WORKUP</label>
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
        $pre = $_POST['pre'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $rdate = $_POST['rdate'];
        $pay = $_POST['payment'];
        $chnum = $_POST['chnum'];
        $d1 = $_POST['d1'];
        $d2 = $_POST['d2'];

        $x1 = $_POST['x1'];
        $xa1 = $_POST['xa1'];
        $x2 = $_POST['x2'];
        $xa2 = $_POST['xa2'];
        $x3 = $_POST['x3'];
        $xa3 = $_POST['xa3'];



        // $d3 = $_POST['d3'];
        $d4 = $_POST['d4'];
        $d5 = $_POST['d5'];
        $d6 = $_POST['d6'];
        $d7 = $_POST['d7'];
        $d8 = $_POST['d8'];
        $d9 = $_POST['d9'];
        $x4 = $_POST['x4'];
        $x5 = $_POST['x5'];
        $d13 = $_POST['x6'];


        $d11 = $_POST['d11'];
        $d12 = $_POST['d12'];


        $sql = "UPDATE `patient_treatment` SET `f_pre`='$pre',`name`='$name',`dob`='$dob',`gender`='$gender',`payment`='$pay',`chno`='$chnum',`oct`='$d1',`ffa`='$d2',`prp`='$x1',`noprp`='$xa1',`sectoral`='$x2',`nosectoral`='$xa2',`barrage`='$x3',`nobarrage`='$xa3',`yaglaser`='$d4',`bscan`='$d5',`fphoto`='$d6',`cct`='$d7',`perimetry`='$d8',`yagpi`='$d9',`ranieyeinj`='$x4',`rajumabinj`='$x5',`glaucomaworkup`='$d11',`iolworkup`='$d12' , `antivegf` = '$d13' where `id` = '$id'";

        if ($conn->query($sql) === TRUE) {
    ?>
            <script>
                swal({
                    title: "Registered Successfully",
                    text: "Patient Register Sccessfully",
                    icon: "success",
                    button: "Close",
                }).then(function() {
                    window.location = "pa_treat.php";
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