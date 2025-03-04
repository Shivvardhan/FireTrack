<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



require('dbcon.php');
$mail = new PHPMailer(true);

try {
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'kvmeh2015@gmail.com';                     //SMTP username
  $mail->Password   = 'gykajvaedzvsqgpo';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;

  if (isset($_POST) & !empty($_POST)) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $emailid = mysqli_real_escape_string($conn, $_POST['mail']);
    $sql = "SELECT * FROM `users` WHERE username = '$username' and emailid = '$emailid'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
      $r = mysqli_fetch_assoc($res);
      $password = $r['password'];
      	$to = $r['emailid'];
      $accountname = $r['username'];
      $mail->setFrom('contact@kvmeyehospital.com', 'K.V.M. EYE HOSPITAL');
      $mail->addAddress($to, $accountname);
      $subject = "Your Recovered Password";
      $new = generateRandomString();
      $secnew = md5($new);
      $up = "UPDATE users SET password='" . $secnew . "' WHERE username = '" . $username . "'";
     // echo $up;

      if ($conn->query($up) === TRUE) {
       // echo "Record updated successfully";
      } else {
       // echo "Error updating record: " . $conn->error;
       $_SESSION['message1'] = 'we are facing problem please try again later !';
       echo "<script>window.location.href = 'forgotpass.php'; </script>";
      }

      $mail->isHTML(true);
      $mail->Subject = 'YOUR CREDENTIALS | K.V.M. EYE HOSPITAL';
      $mail->Body    = "<img style='width:300px;height:auto;' src='https://admin.kvmeyehospital.com/public/kvmeh.png' alt='logo'></img><br><strong> do not share your password! </strong> <br> username :- " . $username . "<br>Please use this password to login :-  " . $new . "<br> <br> Regards!<br>K.V.M. EYE HOSPITAL <br><br> <small> if this mail not mean to you please delete it </small>";
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      $_SESSION['send'] = ' PASSWORD RECOVERED SENT TO REGISTERED MAIL-ID !';
      echo "<script>window.location.href = 'index.php'; </script>";
    } else {
      $_SESSION['message1'] = 'username or email address is not correct!';
      echo "<script>window.location.href = 'forgotpass.php'; </script>";
    }
  }
} catch (Exception $e) {
  // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  $_SESSION['message1'] = ' Message could not be sent. :{$mail->ErrorInfo}';
  echo "<script>window.location.href = 'forgotpass.php'; </script>";
}



function generateRandomString($length = 6)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
