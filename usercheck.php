<?php
include "dbcon.php";
// error_reporting(0);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $user = $_POST['username'];
     $pass = $_POST['password'];
     // prevent from sql injection
     $pass = mysqli_real_escape_string($conn,$pass);
     $user = mysqli_real_escape_string($conn,$user);
     $pass = md5($pass);

     if (empty($_POST["username"]) and empty($_POST["password"])) {

          $_SESSION['message'] = ' ENTER BOTH THE DETAILS!';
          echo "<script>window.location.href = 'index.php'; </script>";
     }
     $sql  = "select * from users where username='" . $user . "' AND password = '" . $pass . "'  ";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);


     if (isset($row["access_level"]) == "admin") {
          $_SESSION['username'] = $user;
          $_SESSION['id'] = $row['id'];

          $_SESSION['access_level'] = "admin";
          // header("location:public/");
          // exit();
          echo "<script>";
          echo "window.location.href = 'public/';";
          echo "</script>";
     } elseif (isset($row["access_level"]) == "user") {
          $_SESSION['username'] = $user;
          $_SESSION['access_level'] = "user";
          header("location:public/");
          exit();
     } else {
          $_SESSION['message'] = 'WRONG USERNAME OR PASSWORD!';
          echo "<script>window.location.href = 'index.php'; </script>";
     }

     // if ($row['password'] == 12345) {
     //      header("location:newwuser.php");
     //      exit();
     // }
}


// if($_SERVER["REQUEST_METHOD"]=="POST")  
// {  
//      if(empty($_POST["username"]) and empty($_POST["password"]))  
//      {  
          
//           $_SESSION['message'] = ' ENTER BOTH THE DETAILS!';
//           echo "<script>window.location.href = 'index.php'; </script>";
//      }  
//      else  
//      {  
//           $username = mysqli_real_escape_string($conn, $_POST["username"]);  
//           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
//           $password = md5($password);  
//           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
//           $result = mysqli_query($conn, $query);  
//           if(mysqli_num_rows($result) > 0)  
//           {  
//                $_SESSION['username'] = $username;  
//                header("location:public/");  
//           }  
//           else  
//           {  
//                $_SESSION['message'] = ' WRONG USERNAME OR PASSWORD!';
//                echo "<script>window.location.href = 'index.php'; </script>";
//           }  
//      }  
// }