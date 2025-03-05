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
                <div class="card-body cardbody-color p-lg-5">
                    <form action="mail.php" method="POST">
                        <?php
                            if (isset($_SESSION['message1'])) { ?>
                        <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                            <div class="bg-danger me-3 icon-item"><span
                                    class="fas fa-times-circle text-white fs-3"></span></div>
                            <p class="mb-0 flex-1">
                                <?PHP
                                                            echo $_SESSION['message1'];
                                                            unset($_SESSION['message1']);
                                                            ?>
                            </p><button class="btn-close" type="button" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <?PHP }
                            ?>

                        <h2 class="text-center text-dark ">FIRE TRACK</h2>
                        <h3 class="text-center text-dark "> <u>FORGOT YOUR PASSWORD</u> </h3>

                        <div class="text-center">
                            <img src="FireTrack_logo.png"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                                placeholder="User Name" name="username" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" aria-describedby="emailHelp"
                                placeholder="E-mail ID" name="mail" required>
                        </div>

                        <div class="text-center"><button type="submit" name="submit"
                                class="btn btn-color px-5 mb-1 w-100">SEND PASSWORD</button></div>

                    </form>
                    <div class="text-center"><a href="index.php"><button type="submit"
                                class="btn btn-color px-5 mb-5 w-100">LOGIN</button></a></div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>

</html>


<?php } ?>