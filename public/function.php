<?php

session_start();
if (isset($_SESSION['username'])) {
error_reporting(0);
include "../dbcon.php";
date_default_timezone_set("Asia/Kolkata");
//echo file_exists("dbbackup/".date('Y-m-d').'_drp_database.sql');

function backDb($host, $user, $pass, $dbname, $tables = '*'){
 
	$conn = new mysqli($host, $user, $pass, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
 
 
	if($tables == '*'){
		$tables = array();
		$sql = "SHOW TABLES";
		$query = $conn->query($sql);
		while($row = $query->fetch_row()){
			$tables[] = $row[0];
		}
	}
	else{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
 
 
	$outsql = '';
	foreach ($tables as $table) {
 
 
	    $sql = "SHOW CREATE TABLE $table";
	    $query = $conn->query($sql);
	    $row = $query->fetch_row();
 
	    $outsql .= "\n\n" . $row[1] . ";\n\n";
 
	    $sql = "SELECT * FROM $table";
	    $query = $conn->query($sql);
 
	    $columnCount = $query->field_count;
 
 
	    for ($i = 0; $i < $columnCount; $i ++) {
	        while ($row = $query->fetch_row()) {
	            $outsql .= "INSERT INTO $table VALUES(";
	            for ($j = 0; $j < $columnCount; $j ++) {
	                $row[$j] = $row[$j];
 
	                if (isset($row[$j])) {
	                    $outsql .= '"' . $row[$j] . '"';
	                } else {
	                    $outsql .= '""';
	                }
	                if ($j < ($columnCount - 1)) {
	                    $outsql .= ',';
	                }
	            }
	            $outsql .= ");\n";
	        }
	    }
 
	    $outsql .= "\n"; 
	}
 
 $date = date("Y-m-d");
    $backup_file_name =  $date.'_'.$dbname . '_database.sql';
    $fileHandler = fopen("dbbackup/".$backup_file_name, 'w+');
    fwrite($fileHandler, $outsql);
    fclose($fileHandler);
 
 
    // header('Content-Description: File Transfer');
    // header('Content-Type: application/octet-stream');
    // header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
    // header('Content-Transfer-Encoding: binary');
    // header('Expires: 0');
    // header('Cache-Control: must-revalidate');
    // header('Pragma: public');
    // header('Content-Length: ' . filesize($backup_file_name));
    // ob_clean();
    // flush();
    // readfile($backup_file_name);
    // exec('rm ' . $backup_file_name);
 
}
 //Database Credentials Vairables
 

 // Initiating the backup database function



 function get_age($dob)
 {

	 $A = $dob;
	 $today = date('d-M-Y');
	 $Person_A = date("d-M-Y", strtotime($A));
	 $diff_A = date_diff(date_create($Person_A), date_create($today));
	 $A_age = $diff_A->format('%y');
	 return $A_age;
 }
 function row_count_rdate_with_increment($particulardate)
{
    include "../dbcon.php";
    $query = "SELECT * FROM patients WHERE rdate = '$particulardate'";
    //echo $query;
    if ($result = mysqli_query($conn, $query)) {

        $rowcount = mysqli_num_rows($result);
        return $rowcount+1;
    }
}
 function row_count_rdate_with_increment_treat($particulardate)
{
    include "../dbcon.php";
    $query = "SELECT * FROM patient_treatment WHERE rdate = '$particulardate'";
    //echo $query;
    if ($result = mysqli_query($conn, $query)) {

        $rowcount = mysqli_num_rows($result);
        return $rowcount+1;
    }
}
if (!(function_exists('rate_y'))) {
    function rate_y($treat)
    {
      $tr = explode("_","$treat");
      return $tr;
    }
  }
  class numbertowordconvertsconver {
    function convert_number($number) 
    {
        if (($number < 0) || ($number > 999999999)) 
        {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 1000000);
        // Millions (giga)
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga) 
        {
            $result .= $this->convert_number($giga) .  "Million";
        }
        if ($kilo) 
        {
            $result .= (empty($result) ? "" : " ") .$this->convert_number($kilo) . " Thousand";
        }
        if ($hecto) 
        {
            $result .= (empty($result) ? "" : " ") .$this->convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result)) 
            {
                $result .= " and ";
            }
            if ($deca < 2) 
            {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n) 
                {
                    $result .= "-" . $ones[$n];
                }
            }
        }
        if (empty($result)) 
        {
            $result = "zero";
        }
        return $result;
    }
}
function rupee_patient(){
    include "../dbcon.php";
  $query = "SELECT * FROM patients";
  $query_run = mysqli_query($conn,$query);

  $qty = 0;
  while ($num = mysqli_fetch_assoc($query_run)) {
    $qty += $num['fee'];
  }
  return $qty;
}
function rupee_patient_range($startdate , $enddate){
    include "../dbcon.php";
  $query = "SELECT * FROM patients WHERE rdate BETWEEN '$startdate' AND '$enddate';";
  $query_run = mysqli_query($conn,$query);

  $qty = 0;
  while ($num = mysqli_fetch_assoc($query_run)) {
    $qty += $num['fee'];
  }
  return $qty;
}


if (!(function_exists('operation_patient_detail'))) {
  function operation_patient_detail($id)
  {
    include('../dbcon.php');

    $q = "SELECT * FROM `op_patient` WHERE id ='$id';";
    $testt = $conn->query($q);
    $row =  $testt->fetch_assoc();
    $result = array("id" => $row['id'], "ppre" => $row['pre'], "pname" => $row['fullname'], "fpre" => $row['pref'], "fname" => $row['fathersname'], "gender" => $row['gender'], "age" => $row['age'], "address" => $row['address'], "email" => $row['email'], "phone" => $row['phone'], "timestamp" => $row['timestamp']);
    return $result;
  }
}

if (!(function_exists('operation_bill_detail'))) {
  function operation_bill_detail($id)
  {
    include('../dbcon.php');

    $q = "SELECT * FROM `op_bill` WHERE pid ='$id';";
    $testt = $conn->query($q);
    $row =  $testt->fetch_assoc();
    $result = array("pid" => $row['pid'], "billid" => $row['billid'], "opon" => $row['opon'], "bed" => $row['bed'], "ot" => $row['ot'], "anesthetic" => $row['anesthetic'], "surgeon" => $row['surgeon'], "assistant" => $row['assistant'], "lauca" => $row['laurettecassette'], "lauex" => $row['lauretteexpenses'], "iolworkup" => $row['iolworkup'], "medicine" => $row['medicine'], "intra" => $row['intra'], "total" => $row['total'], "timestamp" => $row['timestamp']);
    return $result;
  }
}
if (!(function_exists('operation_discharge_detail'))) {
  function operation_discharge_detail($id)
  {
    include('../dbcon.php');

    $q = "SELECT * FROM `op_discharge` WHERE pid ='$id';";
    $testt = $conn->query($q);
    $row =  $testt->fetch_assoc();
    $result = array("pid" => $row['pid'], "diagnosis" => $row['diagnosis'], "surgery" => $row['surgeryprocedure'], "doa" => $row['doa'], "doatime" => $row['doatime'], "dos" => $row['dos'], "dod" => $row['dod'], "dodtime" => $row['dodtime']);
    return $result;
  }
}


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
    <?php 
    } else {
        echo "<script>window.location.href = '../index.php'; </script>";
    }
    ?>
