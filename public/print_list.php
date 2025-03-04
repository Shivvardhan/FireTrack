<?php
session_start();
if (isset($_SESSION['username'])) {
  include "head.php";
  include "function.php";
  include "topandsidenav.php";
  include "../dbcon.php";
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
          <h3>Print Patient's List</h3>
          <p class="mb-0">Click on Print Button To print Patient List.</p>

          <div class="col-12 mt-3">
            <input class="btn btn-primary" onclick="printDiv('sec1')" type="submit" value="Print" name="submit">
            <a href="list.php"> <input class="btn btn-danger" type="submit" value="Back" name="submit"></a>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="card mb-3">
    <div class="card-body bg-light">

      <div id="sec1" class="tab-content bg-white " style="background-color:white !important;">
        <div class="receipt" style="width:800px ; background-color:white !important;">

          <table style="width: 100%;" class="table-responsive scrollbar">
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
                <td style="width: 25.0000%;" colspan="4">
                  <hr>
                </td>

              </tr>

              <tr>
                <td colspan="2" style="width: 25.0000%;">Start Date :- <?php echo $_POST['startdate'] ?></td>
                <td colspan="2" style="width: 25%; text-align: right;">End Date:- <?php echo $_POST['enddate']; ?></td>
              </tr>
              <tr>
                <td style="width: 25.0000%;"><br></td>
                <td style="width: 25.0000%;"><br></td>
                <td colspan="2" style="width: 25%; text-align: right;">Print Request Date:- <?php echo date('Y-m-d'); ?> </td>

              </tr>
              <tr>
                <td style="width: 25.0000%;"><br></td>
                <td style="width: 25.0000%;"><br></td>
                <td style="width: 25%; text-align: right;"><br></td>
                <td style="width: 25%; text-align: right;"><br></td>
              </tr>
              <tr>
                <td colspan="4" style="width: 25.0000%;">
                  <div style="text-align: center;"><u><span style="font-size: 30px; color:black;"><strong> <?php if ($_POST['printtype'] == "consultation") {
                                                                                                              echo "Patient Consultation List";
                                                                                                            } elseif ($_POST['printtype'] == "treatment") {
                                                                                                              echo "Patient Treatment List";
                                                                                                            } 
                                                                                                            elseif ($_POST['printtype'] == "totalot") {
                                                                                                              echo "Patient Operation List";
                                                                                                            } ?></strong></span></u></div>
                </td>
              </tr>
              <tr>
                <td style="width: 25.0000%;"><br></td>
                <td style="width: 25.0000%;"><br></td>
                <td style="width: 25%; text-align: right;"><br></td>
                <td style="width: 25%; text-align: right;"><br></td>
              </tr>
            </tbody>
          </table>
          <?php

          $startdate = $_POST['startdate'];
          $enddate = $_POST['enddate'];
          // echo $startdate;
          // echo $enddate;
          if ($_POST['printtype'] == "consultation") {
          ?>
            <?php
            $counter = 0;
            $num = 0;
            $sql = "SELECT * FROM patients WHERE rdate BETWEEN '$startdate' AND '$enddate';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo "<table  class='table-responsive scrollbar' style=' border: 1px solid black;width:100%;font-size:13px;'><tr><th style=' border: 1px solid black;'>S.no.</th><th style=' border: 1px solid black;'>rdate</th><th style=' border: 1px solid black;'>ID</th><th style=' border: 1px solid black;'>Name</th><th style=' border: 1px solid black;'>checkup</th><th style=' border: 1px solid black;'>fee</th><th style=' border: 1px solid black;'>Remarks</th></tr>";
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                $num++;
                echo "<tr><td style=' border: 1px solid black;width:2%;'>" . ++$counter . "</td><td style=' border: 1px solid black;width:13%'>" . $row["rdate"] . "</td><td style=' width:10%; border: 1px solid black;'>" . $row["id"] . "</td><td style=' border: 1px solid black;overflow-wrap: break-word;'>" . $row["pre"] . $row["name"] . " </td><td style=' border: 1px solid black;width:10%'>Consultation</td><td style=' border: 1px solid black;width:5%'>" . $row["fee"] . "/-</td><td style=' border: 1px solid black;width:10%'></td></tr>";

                if ($num == 25) {
                  echo "</table> <p style='page-break-after:always;'></p> <table  class='table-responsive scrollbar' style='margin-top:20px; border: 1px solid black;width:100%;font-size:13px;'> <tr><th style=' border: 1px solid black;'>S.no.</th><th style=' border: 1px solid black;'>rdate</th><th style=' border: 1px solid black;'>ID</th><th style=' border: 1px solid black;'>Name</th><th style=' border: 1px solid black;'>checkup</th><th style=' border: 1px solid black;'>fee</th><th style=' border: 1px solid black;'>Remarks</th></tr>";
                }

                if ($num == 70) {
                  $num = 26;
                  echo "</table> <p style='page-break-after:always;'></p> <table  class='table-responsive scrollbar' style='margin-top:20px; border: 1px solid black;width:100%;font-size:13px;'> <tr><th style=' border: 1px solid black;'>S.no.</th><th style=' border: 1px solid black;'>rdate</th><th style=' border: 1px solid black;'>ID</th><th style=' border: 1px solid black;'>Name</th><th style=' border: 1px solid black;'>checkup</th><th style=' border: 1px solid black;'>fee</th><th style=' border: 1px solid black;'>Remarks</th></tr>";
                }
              }



              echo "</table>";
            } else {
              echo "NO RECORD";
            }
          }




          if ($_POST['printtype'] == "totalot") {
            ?>
            <?php
            $counter = 0;
            $num = 0;
            $startdate = $_POST['startdate'] ." ". date("00:00:00");
            $enddate = $_POST['enddate']." ".  date("00:00:00");
            $sql = "SELECT * FROM op_patient WHERE timestamp BETWEEN '$startdate' AND '$enddate'; "; /*  WHERE rdate BETWEEN '$startdate' AND '$enddate';  */
            // echo $sql;
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {

              echo "<table  class='table-responsive scrollbar' style=' border: 1px solid black;width:100%;font-size:13px;'><tr><th style=' border: 1px solid black;'>S.no.</th><th style=' border: 1px solid black;'>rdate</th><th style=' border: 1px solid black;'>ID</th><th style=' border: 1px solid black;'>Name</th><th style=' border: 1px solid black;'>checkup</th><th style=' border: 1px solid black;'>fee</th><th style=' border: 1px solid black;'>Remarks</th></tr>";
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                $details = operation_bill_detail($row["id"]);
                $num++;
                $stx =   $row['timestamp'];
                $ex = explode(" ", "$stx");
              //  if(is_null($details['total'])){
              //   echo "";
              //  }
              //  else{
              //   $remark = "bill";
              //  }

                echo "<tr><td style=' border: 1px solid black;width:2%;'>" . ++$counter . "</td><td style=' border: 1px solid black;width:13%'>" . $ex[0] . "</td><td style=' width:10%; border: 1px solid black;'>" . $row["id"] . "</td><td style=' border: 1px solid black;overflow-wrap: break-word; text-transform:capitalize;'>" . $row["pre"] . $row["fullname"] . " </td><td style=' border: 1px solid black;width:10%'>Operation</td><td style=' border: 1px solid black;width:5%'>" . $details['total'] . "</td><td style=' border: 1px solid black;width:10%'>  </td></tr>";

                if ($num == 25) {
                  echo "</table> <p style='page-break-after:always;'></p> <table  class='table-responsive scrollbar' style='margin-top:20px; border: 1px solid black;width:100%;font-size:13px;'> <tr><th style=' border: 1px solid black;'>S.no.</th><th style=' border: 1px solid black;'>rdate</th><th style=' border: 1px solid black;'>ID</th><th style=' border: 1px solid black;'>Name</th><th style=' border: 1px solid black;'>checkup</th><th style=' border: 1px solid black;'>fee</th><th style=' border: 1px solid black;'>Remarks</th></tr>";
                }

                if ($num == 70) {
                  $num = 26;
                  echo "</table> <p style='page-break-after:always;'></p> <table  class='table-responsive scrollbar' style='margin-top:20px; border: 1px solid black;width:100%;font-size:13px;'> <tr><th style=' border: 1px solid black;'>S.no.</th><th style=' border: 1px solid black;'>rdate</th><th style=' border: 1px solid black;'>ID</th><th style=' border: 1px solid black;'>Name</th><th style=' border: 1px solid black;'>checkup</th><th style=' border: 1px solid black;'>fee</th><th style=' border: 1px solid black;'>Remarks</th></tr>";
                }
              }



              echo "</table>";
            } else {
              echo "NO RECORD";
            }
          }



          if ($_POST['printtype'] == "treatment") {

            $counters = 0;
            $nums = 0;
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $sql = "SELECT * FROM patient_treatment WHERE rdate BETWEEN '$startdate' AND '$enddate';";
            // echo $sql;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo "<table  class='table-responsive scrollbar' style=' font-size:13px; border: 1px solid black;width:100%;'><tr><th style=' border: 1px solid black;'>S.no.</th><th style=' border: 1px solid black;'>rdate</th><th style=' border: 1px solid black;'>ID</th><th style=' border: 1px solid black;'>Name</th><th style=' border: 1px solid black;'>fee</th><th style=' border: 1px solid black;'>checkup</th><th style=' border: 1px solid black;'>Remarks</th></tr>";
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                $nums++;
                $f1 = (int)$row["oct"];
                $f2 = (int)$row["ffa"];
                $f3 = (int)$row["prp"];
                $f4 = (int)$row["noprp"];
                $f5 = (int)$row["sectoral"];
                $f6 = (int)$row["nosectoral"];
                $f7 = (int)$row["barrage"];
                $f8 = (int)$row["nobarrage"];
                $f9 = (int)$row["yaglaser"];
                $f10 = (int)$row["bscan"];
                $f11 = (int)$row["fphoto"];
                $f12 = (int)$row["cct"];
                $f13 = (int)$row["perimetry"];
                $f14 = (int)$row["yagpi"];
                $f15 = (int)$row["antivegf"];
                $f16 = (int)$row["rajumabinj"];
                $f17 = (int)$row["glaucomaworkup"];
                $f18 = (int)$row["iolworkup"];
                $f19 = (int)$row["ranieyeinj"];

                $sums = $f1 + $f2 + ($f4 * $f3) + ($f6 * $f5) + ($f8 * $f7) + $f9 + $f10 + $f11 + $f12 + $f13 + $f14 + $f15 + $f16 + $f17 + $f18 + $f19;;


                echo "<tr><td style=' border: 1px solid black;width:2%;'>" . ++$counters . "</td><td style=' border: 1px solid black;width:13%'>" . $row["rdate"] . "</td><td style=' border: 1px solid black;width:10%;'>" . $row["id"] . "</td><td style=' border: 1px solid black;overflow-wrap: break-word;width:30%;'>" . $row["pre"] . $row["name"] . " </td><td style=' border: 1px solid black;width:8%;'>" .  $sums . "</td><td style=' border: 1px solid black;'>" ?>
                <?php
                if ($f1) {
                  echo 'O.C.T.';
                }
                if ($f2) {
                  echo ', F.F.A.';
                }
                if ($f3) {
                  echo ', ' . $f4 . '  Eye Green Laser (PRP)';
                }
                if ($f5) {
                  echo ', ' . $f6 . '  Eye Green Laser (Sectoral)';
                }
                if ($f7) {
                  echo ', ' . $f8 . '  Eye Green Laser (Barrage)';
                }
                if ($f9) {
                  echo ', Yag Laser';
                }
                if ($f10) {
                  echo ', B.Scan';
                }
                if ($f11) {
                  echo ', F.Photo';
                }
                if ($f12) {
                  echo ', C.C.T.';
                }
                if ($f13) {
                  echo ', Perimetry';
                }
                if ($f14) {
                  echo ', Yag P.I.';
                }
                if ($f15) {
                  echo ', Antivegf Inj';
                }

                if ($f19) {
                  echo ', Antivegf Inj (Ranieye Inj)';
                }
                if ($f16) {
                  echo ', Antivegf Inj (Rajumab Inj)';
                }
                if ($f17) {
                  echo ', Glaucoma Work Up';
                }
                if ($f18) {
                  echo ', I.O.L Work Up';
                }
                ?>
          <?php echo "</td><td style='width:8%!important; border: 1px solid black;overflow-wrap: break-word;'></td></tr>";


                if ($nums == 25) {
                  echo "</table> <p style='page-break-after:always;'></p> <table  class='table-responsive scrollbar' style='margin-top:20px; border: 1px solid black;width:100%;font-size:13px;'>";
                }

                if ($nums == 51) {
                  $num = 26;
                  echo "</table> <p style='page-break-after:always;'></p> <table  class='table-responsive scrollbar' style='margin-top:20px; border: 1px solid black;width:100%;font-size:13px;'>";
                }
              }
              echo "</table>";
            } else {
              echo "NO RECORD";
            }
          }
          ?>

        </div>
      </div>
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <script>

  </script>

<?php

  include "footer.php";
} else {
  echo "<script>window.location.href = '../index.php'; </script>";
}
?>