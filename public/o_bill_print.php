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
    <?php
    $detail = operation_patient_detail($_POST['id']);
    $details = operation_bill_detail($_POST['id']);
    ?>


    <div class="card mb-3">
        <div class="card-body bg-light">

            <div id="sec" class="tab-content bg-white " style="background-color:white !important;">



                <div class="receipt" style="width:800px ; background-color:white !important;">
                    <table style="width: 100%;">
                        <tbody>
                            <!-- <tr>
            <td rowspan="6" style="width: 17.3077%;"><img src="falcom.png" alt="" width="100%"></td>
         
        </tr> -->
                            <tr>
                                <td colspan="4" style="width: 82.5757%; text-align: right; color: black; text-transform: capitalize;">Reg no:- 0783</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="background-color: black; width: 82.5757%; text-align: center; border-radius: 50px;"><strong><span style="font-size: 30px; color:black;color:white;">कन्हैयालाल विनोदकुमारी मेमोरियल आई हॉस्पिटल</span></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="width: 82.5757%; text-align: center;"><strong><span style="font-size: 18px; color:black;">KANHAIYALAL VINODKUMARI MEMORIAL EYE HOSPITAL</span></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="width: 82.5757%; text-align: center;">
                                    <p style="text-transform:capitalize;font-size:13px;">Behind sardar Petrol Pump, Kampoo, Lashkar, Gwalior (M.P.) Mob. 8839078798 Tel: 0751-2628168, 4084708</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="width: 100%; text-align: center;">
                                    <p style="text-align:center;font-size:13px;"><img src="icon/mail.svg" alt="">&nbsp;contact@kvmeyehospital.com | <img src="icon/globe.svg" alt="">&nbsp;www.kvmeyehospital.com</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 20.0000%;">Receipt No. :</td>
                                <td style="width: 20.0000%; text-align: left;"><strong><?php echo  $details['billid'] ?></strong></td>
                                <td style="width: 20.0000%;"><br></td>
                                <td style="width: 20%; text-align: right;">Date :&nbsp;</td>
                                <td style="width: 20.0000%;"><strong><?php $stx =   $details['timestamp'];
                                                                        $ex = explode(" ", "$stx");
                                                                        echo $ex[0] ?></strong> </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td><br></td>
                            </tr>

                            <tr>
                                <td style="width: 100.0000%;"><span style="font-size: 22px;">Received with Thanks as Amount of Rs <strong> <u> <?php $class_obj = new numbertowordconvertsconver();
                                                                                                                                                $convert_number = $details['total'];
                                                                                                                                                echo $class_obj->convert_number($convert_number); ?> only </u></strong> from Mr. / Mrs. / Ms. <strong style="text-transform:capitalize;"><u><?php echo $detail['pname'] ?></u></strong> Towards Consultation / Procedure / Surgery Fee <strong><u><?php echo  $details['total'] ?>/-</u></strong> </span></td>
                            </tr>
                            <tr>
                                <td><br><br></td>
                            </tr>
                            <tr>
                                <td style="width: 100.0000%; text-align:right;"><span style="font-size: 20px; "> Signature </span></td>
                            </tr>

                        </tbody>
                    </table>
                    <hr style=" border-top: 2px dotted grey;">
                    <table style="width: 100%;">
                        <tbody>

                            <tr>
                                <td style="width: 100%; text-align: center; "><strong><span class="ps-3 pe-3" style="font-size:20px; background-color:#3b3c36;color:white;border-radius:50px;">Bill/Cash Memo</span></strong></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>

                            <tr>
                                <td style="width: 100.0000%;"><span style="font-size: 18px;">Received Following Amount from : <strong style="text-transform:capitalize;"><u><?php echo $detail['pname'] ?></u></strong>
                                        operation on : <strong><u><?php echo $details['opon'] ?></u> </strong></span></td>
                            </tr>
                            <tr>
                                <td style="width: 100.0000%;"><span style="font-size: 18px;"><strong>For Cataract</strong></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 78%; margin-right: calc(22%);">
                        <tbody>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">1.</td>
                                <td style="width: 43.2983%; text-align: left;">Bed Charges&nbsp;<br></td>
                                <td style="width: 7.1114%;">:</td>
                                <td style="width: 43.0052%;"><?php echo $details['bed'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">2.</td>
                                <td style="width: 43.2983%; text-align: left;">Operation Theater Charges&nbsp;<br></td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['ot'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">3.</td>
                                <td style="width: 43.2983%; text-align: left;">Surgeon Charges&nbsp;<br></td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['surgeon'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">4.</td>
                                <td style="width: 43.2983%; text-align: left;">Anesthetic Charges&nbsp;<br></td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['anesthetic'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">5.</td>
                                <td style="width: 43.2983%; text-align: left;">Assistant Charges&nbsp;<br></td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['assistant'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">6.</td>
                                <td style="width: 43.2983%; text-align: left;">Laurette Cassette&nbsp;<br></td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['lauca'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">7.</td>
                                <td style="width: 43.2983%; text-align: left;">Laurette Expenses&nbsp;<br></td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['lauex'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">8.</td>
                                <td style="width: 43.2983%; text-align: left;">IOL work up&nbsp;<br></td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['iolworkup'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">9.</td>
                                <td style="width: 43.2983%; text-align: left;">Medicine &amp; Consumables&nbsp;<br></td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['medicine'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;">10.</td>
                                <td style="width: 43.2983%; text-align: left;">Intra-Ocular Lens Charges</td>
                                <td style="width: 7.1114%;">:<br></td>
                                <td style="width: 43.0052%;"><?php echo $details['intra'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;"><br></td>
                                <td style="width: 43.2983%; text-align: left;"><br></td>
                                <td style="width: 7.1114%;"></td>
                                <td style="width: 43.0052%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 6.5851%; text-align: center;"><br></td>
                                <td style="width: 43.2983%; text-align: right;">Total</td>
                                <td style="width: 7.1114%; text-align: left;">:</td>
                                <td style="width: 43.0052%;"><?php echo $details['total'] ?></td>
                            </tr>

                        </tbody>
                    </table>
                    <table style="width: 100%;">
                        <tbody>

                            <tr>
                                <td><br><br></td>
                            </tr>
                            <tr>
                                <td style="width: 100.0000%; text-align:right;"><span style="font-size: 20px; "> Signature </span></td>
                            </tr>

                        </tbody>
                    </table>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <br>
                    <h6 style="text-align:center;font-size:18px;"><img src="icon/mail.svg" alt=""> contact@kvmeyehospital.com | <img src="icon/globe.svg" alt=""> www.kvmeyehospital.com</h6>
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