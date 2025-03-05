<?php
session_start();

if (isset($_SESSION['username'])) {
    include "head.php";
    include "function.php";
?>

    <?php //echo $_SESSION['username']; 
    //error_reporting(0);
    // date_default_timezone_set("Asia/Kolkata"); 
    ?>



    <?php


    include "topandsidenav.php";
    ?>



    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>




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
                    <h3>Print Patient's Prescriptions</h3>
                    <p class="mb-0">Click on Print Button To print Prescription.</p>

                    <div class="col-12 mt-3">
                        <input class="btn btn-primary" onclick="printDiv('sec')" type="submit" value="Print" name="submit">
                        <a href="patient.php"> <input class="btn btn-danger" type="submit" value="Back" name="submit"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="card mb-3">
        <div class="card-body bg-light">
            <div class="tab-content">
                <!-- Start of Preloader -->
                <!-- <div class="preloader-floating-circles">
                            <div class="f_circleG" id="frotateG_01"></div>
                            <div class="f_circleG" id="frotateG_02"></div>
                            <div class="f_circleG" id="frotateG_03"></div>
                            <div class="f_circleG" id="frotateG_04"></div>
                            <div class="f_circleG" id="frotateG_05"></div>
                            <div class="f_circleG" id="frotateG_06"></div>
                            <div class="f_circleG" id="frotateG_07"></div>
                            <div class="f_circleG" id="frotateG_08"></div>
                        </div> -->
                <!-- End of Preloader -->
                <center>
                    <div class="loader"></div>
                </center>

                <!-- <div style="background-color: #D3F4FB;" class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-aaae31fb-8418-4ebf-bfb2-12b905874396" id="dom-aaae31fb-8418-4ebf-bfb2-12b905874396"> -->

                <center>
                    <table class="table-responsive">
                        <tr>
                            <td>

                                <div id="sec" style="display:none;">

                                    <img src="prescription.jpg" width="600" class="img1">
                                    <h5 class="name" style="position:absolute;margin-top:-695px;margin-left:195px;width:280px;overflow-wrap: break-word;text-align:left;"><?php if ($_POST['name']) {
                                                                                                                                                                                echo $_POST['name'];
                                                                                                                                                                            } ?></h5>
                                    <h5 class="age" style="position:absolute;margin-top:-692px;margin-left:515px;text-align:left;font-size:15px;"><?php if ($_POST['dob']) {
                                                                                                                                                        echo $_POST['dob'] . "Yr(s)/";
                                                                                                                                                        echo $_POST['gender'];
                                                                                                                                                    } ?></h5>

                                    <h5 class="gender" style="position:absolute;margin-top:-718px;margin-left:182px;text-align:left;"><?php echo $_POST['checkup']; ?></h5>
                                    <h5 class="rdate w-10" style="position:absolute;margin-top:-718px;margin-left:500px;text-align:left;font-size:15px;overflow-wrap: normal;">  <?php $x = $_POST['rdate'];
                                                                                                                        $y = explode("-", "$x");
                                                                                                                        echo $y[2] . "-" . $y[1] . "-" . $y[0] ?></h5>

                                    <h6 class="contact" style="position:absolute;margin-top:-60px!important;margin-left:160px;text-align:left;font-size:13px;"><img src="icon/mail.svg" alt=""> contact@kvmeyehospital.com | <img src="icon/globe.svg" alt=""> www.kvmeyehospital.com</h6>

                                </div>

                            </td>
                        </tr>
                    </table>
                </center>
                <!-- </div> -->

                <div class="tab-pane code-tab-pane" role="tabpanel" aria-labelledby="tab-dom-5b65eabf-8724-44fc-b10b-93c9826d4c4f" id="dom-5b65eabf-8724-44fc-b10b-93c9826d4c4f">
                    <pre class="scrollbar rounded-1" style="max-height:420px"></pre>
                </div>

            </div>
        </div>
    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script>
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".loader").fadeOut("slow");
            $("#sec").fadeIn(3000);
        });
    </script>

<?php include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>