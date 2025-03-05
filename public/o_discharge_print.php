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
    $details = operation_discharge_detail($_POST['id']);
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
                                <td style="width: 100%; text-align: center; "><strong><span style="font-size:18px;color:BLACK;border-radius:50px;">DISCHARGE TICKET</span></strong></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 30.0000%;"><span style="font-size: 13px;">Patient&apos;s Name :</span></td>
                                <td style="width: 33.8112%;"><span style="font-size: 13px; text-transform:capitalize;"><strong><u><?php echo $detail['ppre'] . " " . $detail['pname'] ?></u></strong></span></td>
                                <td style="width: 20.979%; text-align: center;"><span style="font-size: 13px;">Age/Sex :</span></td>
                                <td style="width: 15.1515%;"><span style="font-size: 13px; text-transform:capitalize;"><strong><u><?php echo $detail['age'] . " / " . $detail['gender'] ?></u></strong></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 30%;"><span style="font-size: 13px;">Father&apos;s / Husband&apos;s Name :</span></td>
                                <td style="width: 70%; text-align: left;"><span style="font-size: 13px;text-transform:capitalize;"><strong><u><?php echo $detail['fpre'] . " " . $detail['fname'] ?></u></strong></span></td>
                            </tr>
                            <tr>
                                <td style="width: 25.3497%;"><span style="font-size: 13px;">Address :</span></td>
                                <td style="width: 74.5337%; text-align: left;"><span style="font-size: 13px;text-transform:capitalize;"><strong><u><?php echo $detail['address']  ?></u></strong></span></td>
                            </tr>
                            <tr>
                                <td style="width: 25.3497%;"><span style="font-size: 13px;">Diagnosis :</span></td>
                                <td style="width: 74.5337%; text-align: left;"><span style="font-size: 13px;text-transform:capitalize;"><strong><u><?php echo $details['diagnosis']  ?></u></strong></span></td>
                            </tr>
                            <tr>
                                <td style="width: 25.3497%;"><span style="font-size: 13px;">Surgery Procedure :</span></td>
                                <td style="width: 74.5337%; text-align: left;"><span style="font-size: 13px;text-transform:capitalize;"><strong><u><?php echo $details['surgery']  ?></u></strong></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 5.5726%;"><span style="font-size: 13px;">DOA</span></td>
                                <td style="width: 14.474%;"><span style="font-size: 13px;"><strong><u><?php echo $details['doa']  ?></u></strong></span></td>
                                <td style="width: 3.5785%;"><span style="font-size: 13px;">T.</span></td>
                                <td style="width: 16.4681%;"><span style="font-size: 13px;"><strong><u><?php echo $details['doatime']  ?></u></strong></span></td>
                                <td style="width: 5.0007%;"><span style="font-size: 13px;">DOS</span></td>
                                <td style="width: 15.0459%;"><span style="font-size: 13px;"><strong><u><?php echo $details['dos']  ?></u></strong></span></td>
                                <td style="width: 5.1464%;"><span style="font-size: 13px;">DOD</span></td>
                                <td style="width: 14.9002%;"><span style="font-size: 13px;"><strong><u><?php echo $details['dod']  ?></u></strong></span></td>
                                <td style="width: 3.5402%;"><span style="font-size: 13px;">T.</span></td>
                                <td style="width: 16.2733%;"><span style="font-size: 13px;"><strong><u><?php echo $details['dodtime']  ?></u></strong></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: left; width: 44.2307%;"><span style="font-size: 13px;">Treatment Advised</span></th>
                                <th style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></th>
                                <th style="width: 3.5548%;"><span style="font-size: 13px;"><br></span></th>
                                <th style="width: 45.5711%;"><span style="font-size: 13px;"><br></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;">1.</span></td>
                                <td style="width: 44.2307%;"><span style="font-size: 13px;">L-500 mg. / Maha Flox 400 mg / Moxigood - 400 rng. / 4 Ouin - 400mg.</span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;">5.</span></td>
                                <td style="width: 45.5711%;"><span style="font-size: 13px;">E/D-Flan-DX/ Predfort/ Apdrop-DM/ Moxtif-D/Milflodex</span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 44.2307%; text-align: right;"><span style="font-size: 13px;">एक गोली रोज X 5 दिन</span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 45.5711%; text-align: right;"><span style="font-size: 13px;">सुबह / दोपहर/शाम.......... 1 माह</span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 44.2307%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 45.5711%;"><span style="font-size: 13px;"><br></span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;">2.</span></td>
                                <td style="width: 44.2307%;"><span style="font-size: 13px;">Nimcet Plus/ Dolokind Plus Maxrel</span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;">6.</span></td>
                                <td style="width: 45.5711%;"><span style="font-size: 13px;">&nbsp;E/D Lubrex Genteal / Refresh Tears /Tears&nbsp;</span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 44.2307%; text-align: right;"><span style="font-size: 13px;">एक गोली रोज X 5 दिन</span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 45.5711%; text-align: right;"><span style="font-size: 13px;">सुबह / दोपहर/शाम.......... 1 माह</span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 44.2307%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 45.5711%;"><span style="font-size: 13px;"><br></span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;">3.</span></td>
                                <td style="width: 44.2307%;"><span style="font-size: 13px;">Glumox / Diamox&nbsp;</span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;">7.</span></td>
                                <td style="width: 45.5711%;"><span style="font-size: 13px;">&nbsp;E/D- Briteblue / Rimoflo-T/Brimotas-T&nbsp;</span></td>
                                <td style="width: 0.9324%;"><span style="font-size: 13px;"><br></span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 44.2307%; text-align: right;"><span style="font-size: 13px;">एक&nbsp;गोली&nbsp;सुबह&nbsp;/&nbsp;शाम</span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 45.5711%; text-align: right;"><span style="font-size: 13px;">सुबह / शाम.......... 1 माह</span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 44.2307%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 45.5711%;"><span style="font-size: 13px;"><br></span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;">4.</span></td>
                                <td style="width: 44.2307%;"><span style="font-size: 13px;">Nevanac / Nepcinac / Neypac / Amnac / Nepawel.</span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%; text-align: center;"><span style="font-size: 13px;">8.</span></td>
                                <td style="width: 45.5711%;"><span style="font-size: 13px;">Eye Wipes</span></td>
                                <td style="width: 0.9324%;"><span style="font-size: 13px;"><br></span></td>
                            </tr>
                            <tr>
                                <td style="width: 3.5548%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 44.2307%; text-align: right;"><span style="font-size: 13px;">&nbsp;एक एक ड्रॉप 4 बार</span></td>
                                <td style="width: 2.0513%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 3.5548%;"><span style="font-size: 13px;"><br></span></td>
                                <td style="width: 45.5711%; text-align: left;"><span class="ps-6" style="font-size: 13px;">1 माह</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%;">
                        <tbody>

                            <tr>
                                <td><br><br></td>
                            </tr>
                            <tr>
                                <td style="width: 100.0000%; text-align:right;"><span style="font-size:15px; "> Signature </span></td>
                            </tr>

                        </tbody>
                    </table>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <div style="border:1px solid black ; border-radius:5px;" class="p-2">
                        <p><span style="font-size: 10px;">If you experience any of the following symptoms, contact the ophthalmologist immediately-<br>इनमें से निम्नलिखित लक्षण होने पर तुरंत डॉक्टर से संपर्क करें -&nbsp;</span></p>
                        <ul>
                            <li style="font-size: 10px;">Any sudden change in vision or excessive blurring of Vision. दृष्टि में अचानक परिवर्तनबी या अत्यधिक धुंधला दिखने पर |</li>
                            <li style="font-size: 10px;">Severe redness. अत्याधिक लालपन |</li>
                            <li style="font-size: 10px;">Any white spot on (or cloudiness of) black of eye. काली पुतली पर सफेद धब्बा देखने पर |</li>
                            <li style="font-size: 10px;">Persistent discomfort of pain. लगातार दर्द होने पर |</li>
                        </ul>
                    </div>






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