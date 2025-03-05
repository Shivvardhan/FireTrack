<?php
session_start();

if (isset($_SESSION['username'])) {
  echo "<script>window.location.href = 'public/'; </script>";
} else {
  include "head.php";
?>


<div class="container" style="background-color: #ff9e0d;max-width:100% !important;height:100vh;">
    <div class="row flex justify-content-center">
        <div class="col-md-4">

            <div class="text-center mb-5 text-dark"></div>
            <div class="card my-5">

                <form class="card-body cardbody-color rounded p-lg-5" action="usercheck.php" method="POST">
                    <?php
            if (isset($_SESSION['send'])) { ?>
                    <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                        <div class="bg-success me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span>
                        </div>
                        <p class="mb-0 flex-1">
                            <?PHP
                                        echo $_SESSION['send'];
                                        unset($_SESSION['send']);
                                        ?>
                        </p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?PHP }
                    ?>
                    <?php
            if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                        <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span>
                        </div>
                        <p class="mb-0 flex-1">
                            <?PHP
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                        ?>
                        </p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?PHP }
                    ?>

                    <h2 class="text-center text-dark ">FIRETRACK</h2>

                    <div class="text-center">
                        <img src="FireTrack_logo.png"
                            class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="150px"
                            alt="profile">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                            placeholder="User Name" name="username" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="password" name="password"
                            required>
                    </div>
                    <div class="text-center"><button type="submit" name="submit"
                            class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Forgot Password? <a
                            href="forgotpass.php" class="text-dark fw-bold"> Request Your Password.</a>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
</body>

</html>


<?php } ?>