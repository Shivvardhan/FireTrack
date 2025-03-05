<?php
session_start();

if (isset($_SESSION['username'])) {
    include "head.php";
    include "function.php";
?>





    <?php


    include "topandsidenav.php";
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
                    <h3>Print Patient's Receipt</h3>
                    <p class="mb-0">Click on Print Button To print Receipt.</p>

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
                                <td colspan="4" style="width: 100%; text-align: center;"><strong><span style="font-size: 22px; color:black;">KANHAIYALAL VINODKUMARI MEMORIAL EYE HOSPITAL</span></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="width: 100%; text-align: center; ">
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
                               
                                <td colspan="2" style="width: 25%; text-align: right;color:black;"><!-- <strong><span style="font-size: 20px; color:black;text-transform:capitalize;">Checkup no.:- <?php //echo $_POST['checkup']; ?></span></strong> --></td>
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
                                <td colspan="4" style="text-align: left;"><span style="font-size: 22px;color:black;text-transform:capitalize;">the sum of Rs&nbsp;<u><?php
                                                                                                                                                                        $class_obj = new numbertowordconvertsconver();
                                                                                                                                                                        $convert_number = $_POST['fee'];
                                                                                                                                                                        echo $class_obj->convert_number($convert_number);
                                                                                                                                                                        ?>
                                            Rs only</u></span><u><br></u></td>
                            </tr>
                            <!-- (Rs 300/-)</u> by cash / Cheque no. <u>112654996585487 -->
                            <tr>
                                <td colspan="4" style="text-align: left;"><span style="text-transform:capitalize;font-size: 22px;color:black;"><?php if (isset($_POST['payment'])) {
                                                                                                                                                    if ($_POST['payment'] == "cash") {
                                                                                                                                                        echo "<u>(Rs " . $_POST['fee']  . "/-)</u> by cash/Online Payments";
                                                                                                                                                    } elseif ($_POST['payment'] == "cheque") {
                                                                                                                                                        echo "by Cheque no. <u>" . $_POST['chno'] . " </u>";
                                                                                                                                                    }
                                                                                                                                                } ?></span><br></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: left;color:black;"><span style="font-size: 22px;text-transform:capitalize;">Towards Consultation.</span><br></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                                <td style="text-align: left;"><br></td>
                            </tr>
                            <tr>
                            <td colspan="2"><img src="300-.png" class="img400" style="width: 250px;"><span style="font-size: 22px;text-transform:capitalize;"><h3 style="position: absolute; margin-top:-45px;margin-left:100px; color:black;font-weight:500;"><b><?php echo $_POST['fee']; ?>/-</b></h3></span></td>

                                <td style="text-align: left;"><br></td>
                                <td style="text-align: center;color:black;text-transform:capitalize;">Signature</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <hr style="color:black;"> -->
                    <!-- <table class="mt-6" style="width: 100%; border-collapse: collapse;">
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
                            <tr>
                                <td colspan="5">
                                    <hr class="mt-4" style="color:black;">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <H3 style="color: black; text-align:center;">THANK YOU FOR YOUR VISIT !</H3>
                                </td>
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