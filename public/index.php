<?php
session_start();
if (isset($_SESSION['username'])) {
  include "head.php";
  include "../dbcon.php";
  include "topandsidenav.php";
  include "function.php";

  $month6 = date('Y-06-01');
  $month12 = date('Y-12-01');
  $tdate = date('Y-m-d');
  $backupdates = date('Y-m-01');
  
  // echo $backupdates;
  if ($month6 == $tdate OR $backupdates == $tdate) {
    // if($tdate == $backupdates ){
      include "../dbcon.php";
      // echo $servername ;
      //  echo  $dbpassword;
      //  echo  $dbuser; 
      //  echo $dbname;
    backDb($servername, $dbuser, $dbpassword, $dbname);
  }

  $day = date('w');
  $week_start = date('Y-m-d', strtotime('-' . $day . ' days'));
  $week_end = date('Y-m-d', strtotime('+' . (6 - $day) . ' days'));
  $last_week_start = date('Y-m-d', strtotime("sunday -2 week"));
  $last_week_end = date('Y-m-d', strtotime("saturday -1 week"));

  // -------when user login delete all the patient data before 1year from the database-------------

  // $date = date('Y-m-d', strtotime("-1 years"));   /// months years days

  // $del = "DELETE FROM `patients` WHERE rdate<'" . $date . "'";
  // //echo $date;
  // // echo $del;

  // if ($conn->query($del)) {
  //   // echo "yes";  
  // } else {
  //   //echo "error in deleting database";
  // }
  include "chart.php";

?>


<script>
fetch(`https://api.openweathermap.org/data/2.5/weather?q=Gwalior&units=metric&appid=3c41f4bc5b92ff5b2294e46210f196cc`, {
    "method": "GET",
    "headers": {}
}).then(response => {
    if (!response.ok) {
        throw response; //check the http response code and if isn't ok then throw the response as an error
    }

    return response.json(); //parse the result as JSON

}).then(response => {
    //response now contains parsed JSON ready for use

    const city = response['name'];
    const desc = response['weather'][0]['description'];
    const temp = response['main']['temp'];
    const min = response['main']['temp_min'];
    const max = response['main']['temp_max'];
    const icon = response['weather'][0]['icon'];


    document.getElementById('city').innerHTML = city;
    document.getElementById('desc').innerHTML = desc;
    document.getElementById('temp').innerHTML = temp + "&deg;";
    // document.getElementById('min_max').innerHTML = min + "&deg;" + "/" + max + "&deg;";
    document.getElementById("icon").src = "http://openweathermap.org/img/wn/" + icon + ".png";


}).catch((errorResponse) => {
    if (errorResponse.text) { //additional error information
        errorResponse.text().then(errorMessage => {
            //errorMessage now returns the response body which includes the full error message
        })
    } else {
        //no additional error information 
    }
});
</script>





<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card card border border-primary"
        style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <div class="row">
            <center>
                <h2>
                    Fire Track
                </h2>
            </center>
        </div>
    </div>
</div>


<?php
  $query = "SELECT * FROM patients WHERE rdate BETWEEN '$week_start' AND '$week_end';";
  // echo $query;
  if ($result = mysqli_query($conn, $query)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
  }
  $tquery = "SELECT * FROM patient_treatment WHERE rdate BETWEEN '$week_start' AND '$week_end';";
  // echo $query;
  if ($tresult = mysqli_query($conn, $tquery)) {
    // Return the number of rows in result set
    $trowcount = mysqli_num_rows($tresult);
  }
  ?>
<?php
  $lquery = "SELECT * FROM patients WHERE rdate BETWEEN '$last_week_start' AND '$last_week_end';";
  // echo $query;
  if ($lresult = mysqli_query($conn, $lquery)) {
    // Return the number of rows in result set
    $lrowcount = mysqli_num_rows($lresult);
  }
  $tlquery = "SELECT * FROM patient_treatment WHERE rdate BETWEEN '$last_week_start' AND '$last_week_end';";
  // echo $query;
  if ($tlresult = mysqli_query($conn, $tlquery)) {
    // Return the number of rows in result set
    $tlrowcount = mysqli_num_rows($tlresult);
  }

  $differce = $rowcount - $lrowcount;
  $tdifferce = $trowcount - $tlrowcount;
  //echo $differce;



  $last_month_start = date("Y-m-d", strtotime("first day of previous month"));
  // echo "<br>";
  //echo $last_month_start;
  $last_month_end = date("Y-m-d", strtotime("last day of previous month"));

  $last_start = range_rowcount($last_month_start, $last_month_end);

  $last_end = range_rowcount($first_day, $last_day);
  //echo $last_start;
  $last_month_diff = $last_end - $last_start;

  $tlast_start = trange_rowcount($last_month_start, $last_month_end);

  $tlast_end = trange_rowcount($first_day, $last_day);
  //echo $last_start;
  $tlast_month_diff = $tlast_end - $tlast_start;

  //$last_month_diff




  $present_y_start = date('Y-01-01');

  $date3 = date('Y-12-d');
  $date2 = strtotime($date3);

  // Last date of current month.
  $lastdate = strtotime(date("Y-m-t", $date2));

  //$last_day = date("Y-m-d", $lastdate);
  $present_y_end = date("Y-m-d", $lastdate);
  // echo $present_y_start;
  // echo $present_y_end;


  $previous_y_start = date("Y-01-01", strtotime("first day of previous year"));
  // echo "<br>";
  //echo $last_month_start;
  $previous_y_end  = date("Y-12-t", strtotime($present_y_start));
  //echo $previous_y_start;  echo $previous_y_end ;
  $previous_y_range = range_rowcount($previous_y_start, $previous_y_end);

  $present_y_range = range_rowcount($present_y_start, $present_y_end);
  //echo $last_start;
  $year_diff =  $present_y_range - $previous_y_range;
  //$last_month_diff
  $tprevious_y_range = trange_rowcount($previous_y_start, $previous_y_end);

  $tpresent_y_range = trange_rowcount($present_y_start, $present_y_end);
  //echo $last_start;
  $tyear_diff =  $tpresent_y_range - $tprevious_y_range;
  // echo $_SESSION['access_level'];



// echo rupee_patient();
  ?>





<div class="row g-3 mb-3">
    <div class="col-md-6 col-xxl-3 ">
        <div class="card overflow-hidden h-100" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body h-100 position-relative">
                <!-- <h6>Orders<span class="badge badge-soft-info rounded-pill ms-2">0.0%</span></h6> -->
                <div class="row g-0  align-items-center">
                    <div class="col">
                        <div class="d-flex align-items-center"><img class="me-3" id="icon" alt=""
                                style="width: 60px!important;" />
                            <div>
                                <h6 id="city" class="mb-2"></h6>
                                <div class="fs--2 fw-semi-bold">
                                    <div id="desc" class="text-warning"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-center ps-2">
                        <div id="temp" class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1"></div>
                        <div id="min_max" class="fs--1 text-800"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Consultation <br> Patient (week)<?php
                                                    if ($differce > 0) {
                                                      echo "<span class='badge badge-soft-success rounded-pill fs--2 ms-2'> <span class='fas fa-caret-up me-1'></span>" . $differce;
                                                    } elseif ($differce == 0) {
                                                    } else {
                                                      echo " <span class='badge badge-soft-danger rounded-pill fs--2 ms-2'> <span class='fas fa-caret-down me-1'></span>" . $differce;
                                                    }
                                                    ?>
                </h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                    data-countup='{"endValue":<?php echo $rowcount; ?>}'>0</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Consultation <br> Patient (month)<?php
                                                      if ($last_month_diff > 0) {
                                                        echo "<span class='badge badge-soft-success rounded-pill fs--2 ms-2'> <span class='fas fa-caret-up me-1'></span>" . $last_month_diff;
                                                      } elseif ($last_month_diff == 0) {
                                                      } else {
                                                        echo " <span class='badge badge-soft-danger rounded-pill fs--2 ms-2'> <span class='fas fa-caret-down me-1'></span>" . $last_month_diff;
                                                      }
                                                      ?></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                    data-countup='{"endValue":<?php echo range_rowcount($first_day, $last_day); ?>}'>0 </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Consultation <br> Patient (Year)<?php
                                                    if ($year_diff > 0) {
                                                      echo "<span class='badge badge-soft-success rounded-pill fs--2 ms-2'> <span class='fas fa-caret-up me-1'></span>" . $year_diff;
                                                    } elseif ($year_diff == 0) {
                                                    } else {
                                                      echo " <span class='badge badge-soft-danger rounded-pill fs--2 ms-2'> <span class='fas fa-caret-down me-1'></span>" . $year_diff;
                                                    }
                                                    ?></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                    data-countup='{"endValue":<?php echo range_rowcount($present_y_start, $present_y_end); ?>}'>0</div>
            </div>
        </div>
    </div>


</div>


<div class="row g-3 mb-3">
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Treatment<br> Patient (week)<?php
                                                if ($tdifferce > 0) {
                                                  echo "<span class='badge badge-soft-success rounded-pill fs--2 ms-2'> <span class='fas fa-caret-up me-1'></span>" . $tdifferce;
                                                } elseif ($tdifferce == 0) {
                                                } else {
                                                  echo " <span class='badge badge-soft-danger rounded-pill fs--2 ms-2'> <span class='fas fa-caret-down me-1'></span>" . $tdifferce;
                                                }
                                                ?>
                </h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                    data-countup='{"endValue":<?php echo $trowcount; ?>}'>0</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Treatment<br> Patient (month)<?php
                                                  if ($tlast_month_diff > 0) {
                                                    echo "<span class='badge badge-soft-success rounded-pill fs--2 ms-2'> <span class='fas fa-caret-up me-1'></span>" . $tlast_month_diff;
                                                  } elseif ($tlast_month_diff == 0) {
                                                  } else {
                                                    echo " <span class='badge badge-soft-danger rounded-pill fs--2 ms-2'> <span class='fas fa-caret-down me-1'></span>" . $tlast_month_diff;
                                                  }
                                                  ?></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                    data-countup='{"endValue":<?php echo trange_rowcount($first_day, $last_day); ?>}'>0 </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Treatment<br> Patient (Year)<?php
                                                if ($tyear_diff > 0) {
                                                  echo "<span class='badge badge-soft-success rounded-pill fs--2 ms-2'> <span class='fas fa-caret-up me-1'></span>" . $tyear_diff;
                                                } elseif ($tyear_diff == 0) {
                                                } else {
                                                  echo " <span class='badge badge-soft-danger rounded-pill fs--2 ms-2'> <span class='fas fa-caret-down me-1'></span>" . $tyear_diff;
                                                }
                                                ?></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                    data-countup='{"endValue":<?php echo trange_rowcount($present_y_start, $present_y_end); ?>}'>0</div>
            </div>
        </div>
    </div>
    <?php if($_SESSION['access_level'] == 'admin'){?>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Consultation<br> Patient (Today)
                </h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                    data-countup='{"endValue":<?php echo rupee_patient_range(date('Y-m-d'),date('Y-m-d')); ?>,"prefix":"₹"}'>
                    0</div>
            </div>
        </div>
    </div>
    <?php }?>

</div>
<?php if($_SESSION['access_level'] == 'admin'){?>
<div class="row g-3 mb-3">

    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Consultation<br> Patient (week)
                </h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                    data-countup='{"endValue":<?php echo rupee_patient_range($week_start,$week_end); ?>,"prefix":"₹"}'>0
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Consultation<br> Patient (month)</h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                    data-countup='{"endValue":<?php echo rupee_patient_range($first_day, $last_day); ?>,"prefix":"₹"}'>0
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Consultation<br> Patient (week)
                </h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                    data-countup='{"endValue":<?php echo rupee_patient_range($week_start,$week_end); ?>,"prefix":"₹"}'>0
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Total Consultation<br> Patient</h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                    data-countup='{"endValue":<?php echo rupee_patient(); ?>,"prefix":"₹"}'>0</div>
            </div>
        </div>
    </div>


</div>
<?php } ?>



<div class="row g-0">
    <?php if (range_rowcount(date('Y-m-d', strtotime("-6 days")), date('Y-m-d'))) { ?>
    <div class="col-lg-6 pe-lg-2 mb-3">
        <div class="card h-lg-100 overflow-hidden">
            <div class="card-header bg-light">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="mb-0">Daily </h6>
                    </div>

                </div>
            </div>
            <div class="card-body  h-100 p-0">
                <div id="curve_chart" class="h-100   w-100" data-echart-responsive="true"></div>


            </div>

        </div>
    </div>
    <?php } ?>


    <?php if (range_rowcount(date('Y-m-d', strtotime("-1 months")), date('Y-m-d'))) { ?>
    <div class="col-lg-6 pe-lg-2 mb-3">
        <div class="card h-lg-100 overflow-hidden">
            <div class="card-header bg-light">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="mb-0">Total Patient this month</h6>
                    </div>

                </div>
            </div>
            <div class="card-body h-100 pe-0">
                <!-- Find the JS file for the following chart at: src\js\charts\echarts\total-sales.js-->
                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public\assets\js\theme.js-->
                <!-- <div class="echart-line-total-sales h-100" data-echart-responsive="true"></div> -->

                <div id="donutchart" class="h-100 mt-n4 w-100" data-echart-responsive="true"></div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>






<?php include "footer.php";
} else {
  echo "<script>window.location.href = '../index.php'; </script>";
}
?>