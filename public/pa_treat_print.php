<?php
session_start();

if (isset($_SESSION['username'])) {
    include "head.php";
    include "function.php";
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
                    <h3>Print Patient's Receipt</h3>
                    <p class="mb-0">Click on Print Button To print Receipt.</p>

                    <div class="col-12 mt-3">
                        <input class="btn btn-primary" onclick="printDiv('sec')" type="submit" value="Print" name="submit">
                        <a href="pa_treat.php"> <input class="btn btn-danger" type="submit" value="Back" name="submit"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="card mb-3">
        <div class="card-body bg-light">

            <div id="sec" class="tab-content bg-white " style="background-color:white !important;">



                <div class="receipt" style="width:800px ; background-color:white !important;">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>

                                <td colspan="4" style="width: 25%; text-align: right;color:black;text-transform:capitalize;">Reg no:- 0783</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="background-color: black;width: 25%; text-align: center; border-radius:50px;"><strong><span style="font-size: 30px; color:black;color:white;">कन्हैयालाल विनोदकुमारी मेमोरियल आई हॉस्पिटल</span></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="width: 25%; text-align: center;"><strong><span style="font-size: 22px; color:black;">KANHAIYALAL VINODKUMARI MEMORIAL EYE HOSPITAL</span></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="width: 25%; text-align: center; ">
                                    <p style="text-transform:capitalize;">Behind sardar Petrol Pump, Kampoo, Lashkar, Gwalior (M.P.) Ph.: 0751-2628168, 4084708</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="width: 100%; text-align: center; ">
                                <p style="text-align:center;font-size:13px;"><img src="icon/mail.svg" alt=""> contact@kvmeyehospital.com | <img src="icon/globe.svg" alt=""> www.kvmeyehospital.com</p>
                                  
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25.0000%;"><br></td>
                                <td style="width: 25.0000%;"><br></td>
                                <td style="width: 25.0000%;"><br></td>
                                <td style="width: 25%; text-align: right;color:black;"><!-- <strong><span style="font-size: 20px; color:black;text-transform:capitalize;">Checkup no.:- <?php // echo $_POST['checkup_no']; ?></span></strong> --></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 25.0000%;color:black;text-transform:capitalize;">Receipt No.:- <?php if ($_POST['id']) {
                                                                                                                                    echo $_POST['id'];
                                                                                                                                } ?></td>

                                <td style="width: 25.0000%;"><br></td>
                                <td style="width: 25%; text-align: right;color:black;text-transform:capitalize;">Date:- <?php $x = $_POST['rdate'];
                                                                                                                        $y = explode("-", "$x");
                                                                                                                        echo $y[2] . "-" . $y[1] . "-" . $y[0] ?> </td>
                            </tr>
                            <tr>
                                <td style="width: 25.0000%;"><br></td>
                                <td style="width: 25.0000%;"><br></td>
                                <td style="width: 25.0000%;"><br></td>
                                <td style="width: 25.0000%;"><br></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: left;"><span style="font-size: 22px;color:black;text-transform:capitalize;">Received with thanks from <u><?php if ($_POST['name']) {
                                                                                                                                                                                echo $_POST['name'];
                                                                                                                                                                            } ?>&nbsp;</u></span></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: left;"><span style="font-size: 22px;color:black;text-transform:capitalize;">the sum of Rs&nbsp;<u>
                                            <?php
                                            if ($_POST['m1']) {
                                                $x1 = $_POST['m1'];
                                            } else {
                                                $x1 = 0;
                                            }
                                            if ($_POST['m2']) {
                                                $x2 = $_POST['m2'];
                                            } else {
                                                $x2 = 0;
                                            }
                                            if ($_POST['prp']) {
                                                $x3 = $_POST['prp'];
                                            } else {
                                                $x3 = 0;
                                            }
                                            if ($_POST['noprp']) {
                                                $x4 = $_POST['noprp'];
                                            } else {
                                                $x4 = 0;
                                            }
                                            if ($_POST['sectoral']) {
                                                $x5 = $_POST['sectoral'];
                                            } else {
                                                $x5 = 0;
                                            }
                                            if ($_POST['nosectoral']) {
                                                $x6 = $_POST['nosectoral'];
                                            } else {
                                                $x6 = 0;
                                            }
                                            if ($_POST['barrage']) {
                                                $x7 = $_POST['barrage'];
                                            } else {
                                                $x7 = 0;
                                            }






                                            if ($_POST['nobarrage']) {
                                                $x8 = $_POST['nobarrage'];
                                            } else {
                                                $x8 = 0;
                                            }
                                            if ($_POST['m4']) {
                                                $x9 = $_POST['m4'];
                                            } else {
                                                $x9 = 0;
                                            }
                                            if ($_POST['m5']) {
                                                $x10 = $_POST['m5'];
                                            } else {
                                                $x10 = 0;
                                            }
                                            if ($_POST['m6']) {
                                                $x11 = $_POST['m6'];
                                            } else {
                                                $x11 = 0;
                                            }
                                            if ($_POST['m7']) {
                                                $x12 = $_POST['m7'];
                                            } else {
                                                $x12 = 0;
                                            }
                                            if ($_POST['m8']) {
                                                $x13 = $_POST['m8'];
                                            } else {
                                                $x13 = 0;
                                            }
                                            if ($_POST['m9']) {
                                                $x14 = $_POST['m9'];
                                            } else {
                                                $x14 = 0;
                                            }
                                            if ($_POST['ranieyeinj']) {
                                                $x15 = $_POST['ranieyeinj'];
                                            } else {
                                                $x15 = 0;
                                            }
                                            if ($_POST['rajumabinj']) {
                                                $x16 = $_POST['rajumabinj'];
                                            } else {
                                                $x16 = 0;
                                            }
                                            if ($_POST['m11']) {
                                                $x17 = $_POST['m11'];
                                            } else {
                                                $x17 = 0;
                                            }
                                            if ($_POST['m12']) {
                                                $x18 = $_POST['m12'];
                                            } else {
                                                $x18 = 0;
                                            }
                                            if ($_POST['m13']) {
                                                $x19 = $_POST['m13'];
                                            } else {
                                                $x19 = 0;
                                            }

// echo $x1 . "<br>";
// echo $x2 . "<br>";
// echo $x3 . "<br>";
// echo $x4 . "<br>";
// echo $x5 . "<br>";
// echo $x6 . "<br>";
// echo $x7 . "<br>";
// echo $x8 . "<br>";
// echo $x9 . "<br>";
// echo $x10 . "<br>";
// echo $x11 . "<br>";
// echo $x12 . "<br>";
// echo $x13 . "<br>";
// echo $x14 . "<br>";
// echo $x15 . "<br>";
// echo $x16 . "<br>";
// echo $x17 . "<br>";
// echo $x18 . "<br>";

                                            $sum = $x1 + $x2 + ($x4 * $x3) + ($x6 * $x5) + ($x8 * $x7) + $x9 + $x10 + $x11 + $x12 + $x13 + $x14 + $x15 + $x16 + $x17 + $x18 +$x19;

                                            $class_obj = new numbertowordconvertsconver();
                                            $convert_number = $sum;
                                            echo $class_obj->convert_number($convert_number); ?>
                                        </u></span><u><br></u></td>
                            </tr>

                            <!-- (Rs 300/-)</u> by cash / Cheque no. <u>112654996585487 -->
                            <tr>
                                <td colspan="4" style="text-align: left;"><span style="text-transform:capitalize;font-size: 22px;color:black;"><?php if (isset($_POST['payment'])) {
                                                                                                                                                    if ($_POST['payment'] == "cash") {
                                                                                                                                                        echo "<u>(Rs " . $sum . "/-)</u> by cash/Online Payments";
                                                                                                                                                    } elseif ($_POST['payment'] == "cheque") {
                                                                                                                                                        echo "by Cheque no. <u>" . $_POST['chno'] . " </u>";
                                                                                                                                                    }
                                                                                                                                                } ?></span><br></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: left;color:black;"><span style="font-size: 22px;text-transform:capitalize;">Towards the Treatment of<u>
                                            <?php

                                            if ($x1) {
                                                echo "O.C.T.";
                                            }
                                            if ($x2) {
                                                echo ", F.F.A.";
                                            }
                                            if ($x3) {
                                                echo ", " . $x4 . "  Eye Green Laser (PRP)";
                                            }
                                            if ($x5) {
                                                echo ", " . $x6 . "  Eye Green Laser (Sectoral)";
                                            }
                                            if ($x7) {
                                                echo ", " . $x8 . "  Eye Green Laser (Barrage)";
                                            }
                                            if ($x9) {
                                                echo ", Yag Laser";
                                            }
                                            if ($x10) {
                                                echo ", B.Scan";
                                            }
                                            if ($x11) {
                                                echo ", F.Photo";
                                            }
                                            if ($x12) {
                                                echo ", C.C.T.";
                                            }
                                            if ($x13) {
                                                echo ", Perimetry";
                                            }
                                            if ($x14) {
                                                echo ", Yag P.I.";
                                            }
                                            if ($x19) {
                                                echo ", Antivegf Inj";
                                            }

                                            if ($x15) {
                                                echo ", Antivegf Inj (Ranieye Inj)";
                                            }
                                            if ($x16) {
                                                // echo "O.C.T ,";
                                                echo ", Antivegf Inj (Rajumab Inj)";
                                            }
                                            if ($x17) {
                                                echo ", Glaucoma Work Up";
                                            }
                                            if ($x18) {
                                                echo ", I.O.L Work Up";
                                            }



                                            ?>
                                        </u>
                                    </span><br></td>
                            </tr>
                            <!-- <tr>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                            </tr> -->
                            <tr>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                            </tr>
                            <tr>
                                <td colspan="2"><img src="300-.png" class="img400" style="width: 250px;"><span style="font-size: 22px;text-transform:capitalize;"><h3 style="position: absolute; margin-top:-45px;margin-left:100px; color:black;font-weight:500;"><b><?php echo $sum; ?>/-</b></h3></span></td>
                                <td><br></td>
                                <td style="text-align: center;color:black;text-transform:capitalize;">Signature</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <hr style="color:black;">
                    <table class="mt-4" style="width: 100%; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px;"><strong><span style="color: rgb(0, 0, 0);">STAR HEALTH CARE</span></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>MEDI ASSIST</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>FHPL</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>APOLLO MUNICH</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>HEALTH INDIA</strong></span></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>IFFCO-TOKIO</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>HERITAGE</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>HEALTH INSURANCE TPA</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>TATA AIG</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>HDFC ERGO</strong></span></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>MAX BUPA</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>SBI GENERAL INSU.</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>CHOLA MANDALAM</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>ADITYA BIRLA H.I.CO</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>ERICSON TPA</strong></span></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;">
                                    <div style="text-align: center;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>SUNRISE TPA</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong>DHFL</strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                                <td style="width: 20.0000%;vertical-align: top;">
                                    <div style="text-align: center;vertical-align: top;"><span style="font-size: 18px; color: rgb(0, 0, 0);"><strong><br></strong></span></div>
                                </td>
                            </tr>
                            <tr >
                                <td colspan="5"> <hr class="mt-4" style="color:black;"></td>
                            </tr>
                            <tr>
                                <td colspan="5"><H3 style="color: black; text-align:center;">THANK YOU FOR YOUR VISIT !</H3></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                <h6 style="text-align:center;font-size:13px;"><img src="icon/mail.svg" alt=""> contact@kvmeyehospital.com | <img src="icon/globe.svg" alt=""> www.kvmeyehospital.com</h6>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->





                </div>

            </div>



        </div>
    </div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script>

    </script>

<?php include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>