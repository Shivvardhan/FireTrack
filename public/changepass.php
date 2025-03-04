<?php
session_start();
if (isset($_SESSION['username'])) {
  include "head.php";
  include "../dbcon.php";
  include "topandsidenav.php";


?>
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card"
        style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h3>Create New Password</h3>
                <p class="mb-0">Please cross check your details.</p>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 pe-lg-2 mb-3">
    <div class="card h-lg-100">
        <div class="card-body p-4 p-sm-5">

            <form class="" method="POST">
                <div class="mb-3">
                    <label class="form-label"></label>
                    <input class="form-control" type="password" placeholder="Old Password" name="currentPassword"
                        required />
                </div>
                <div class="mb-3">

                    <input class="form-control" type="password" placeholder="New Password" name="newPassword"
                        required />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" placeholder="Confirm Password" name="confirmPassword"
                        required />
                </div>

                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Set password</button>
            </form>
        </div>
    </div>
</div>

<?php

  $id = $_SESSION["username"];/* userid of the user */

  if (!empty(isset($_POST['submit']))) {
    $currentpass = md5($_POST["currentPassword"]);
    // $newpass = md5($_POST["newPassword"]);
    $newpass = $_POST["newPassword"];
    $mdpass = md5($newpass);
    $result = mysqli_query($conn, "SELECT *from users WHERE username='" . $id . "'");
    $row = mysqli_fetch_array($result);
    if ($currentpass == $row["password"] and $_POST['newPassword'] == $_POST['confirmPassword']) {
      $query = "UPDATE users set password='" . $mdpass . "' WHERE username='" . $id . "'";
      // echo $query;
      mysqli_query($conn, $query);

      //$message = "Password Changed Sucessfully";
      echo '<script>
swal({
    title: "Password Changed Sucessfully",
    
    icon: "success",
    button: "Close",
}).then(function() {
  window.location = "../logout.php";
});
</script>';
    } else {
      // $message = "Password is not correct";
      echo '<script>
    swal({
        title: "Password is not correct",
        
        icon: "error",
        button: "Close",
    });
    </script>';
    }
  }
  include "footer.php";
}
?>