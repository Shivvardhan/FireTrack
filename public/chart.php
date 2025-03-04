<?php
include "../dbcon.php";
date_default_timezone_set("Asia/Kolkata");
function range_rowcount($startdate, $enddate)
{
    include "../dbcon.php";
    $query = "SELECT * FROM patients WHERE rdate BETWEEN '$startdate' AND '$enddate';";
    //echo $query;
    if ($result = mysqli_query($conn, $query)) {

        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
function trange_rowcount($startdate, $enddate)
{
    include "../dbcon.php";
    $query = "SELECT * FROM patient_treatment WHERE rdate BETWEEN '$startdate' AND '$enddate';";
    //echo $query;
    if ($result = mysqli_query($conn, $query)) {

        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
function row_count_rdate($particulardate)
{
    include "../dbcon.php";
    $query = "SELECT * FROM patients WHERE rdate = '$particulardate'";
    //echo $query;
    if ($result = mysqli_query($conn, $query)) {

        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
//echo row_count_rdate(date('Y-m-d')); 

function gender_chart($startdate, $enddate)
{
    include "../dbcon.php";

    $male=0;
    $female=0;
    $other=0;

    $query = "SELECT * FROM patients WHERE rdate BETWEEN '$startdate' AND '$enddate';";
    
    $result = $conn->query($query);
  
    if ($result->num_rows > 0) 
    {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
            // echo $row['gender'];
            $gender= $row['gender'];
            // echo "<br>";
            if($gender=='M') {
                $male+=1;
            }

            elseif($gender=='F') {
                $female+=1;
            }

            else {
                $other+=1;
            };

        }

        $result = array($male,$female,$other);
        return $result;
        
    } 
    else {
       // echo "0 results";
    }

}


?>
<?php

    $date=date('Y-m-d');

    $first_day = date('Y-m-01');

    // Converting string to date
    $date1 = strtotime($date);
    
    // Last date of current month.
    $lastdate = strtotime(date("Y-m-t", $date1 ));
    // echo $first_day;
    

    $last_day = date("Y-m-d", $lastdate);
    // echo $last_day;
    $data = gender_chart($first_day,$last_day);
    

 //echo range_rowcount('2022-06-06', '2022-06-25'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Male', <?php echo $data[0]?>],
            ['Female', <?php echo $data[1]?>],
            ['Others', <?php echo $data[2]?>],

        ]);

        var options = {
            title: 'gender wise',
            pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
</script>


<!-- -----------------------line chart-------------------- -->
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Total Patient'],
            ['<?php echo date('d',strtotime("-6 days")); ?>', <?php echo row_count_rdate(date('Y-m-d',strtotime("-6 days")));  ?>],
            ['<?php echo date('d',strtotime("-5 days")); ?>', <?php echo row_count_rdate(date('Y-m-d',strtotime("-5 days")));  ?>],
            ['<?php echo date('d',strtotime("-4 days")); ?>', <?php echo row_count_rdate(date('Y-m-d',strtotime("-4 days")));  ?>],
            ['<?php echo date('d',strtotime("-3 days")); ?>', <?php echo row_count_rdate(date('Y-m-d',strtotime("-3 days")));  ?>],
            ['<?php echo date('d',strtotime("-2 days")); ?>', <?php echo row_count_rdate(date('Y-m-d',strtotime("-2 days")));  ?>],
            ['<?php echo date('d',strtotime("-1 days")); ?>', <?php echo row_count_rdate(date('Y-m-d',strtotime("-1 days")));  ?>],
            ['<?php echo date("d"); ?>', <?php echo row_count_rdate(date('Y-m-d'));  ?>]
        ]);

        var options = {
            // title: 'Company Performance',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>

<!-- -----------------------line chart end-------------------- -->