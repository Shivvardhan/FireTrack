<?php
session_start();

if (isset($_SESSION['username'])) {
    echo "<script>window.location.href = 'public/'; </script>";
} else {
    include "head.php";
?>


    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div class="text-center mb-5 text-dark"></div>
                <div class="card my-5">
                    <div class="card-body cardbody-color p-lg-5">
                        <form action="mail.php" method="POST">
                            <?php
                            if (isset($_SESSION['message1'])) { ?>
                                <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                                    <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
                                    <p class="mb-0 flex-1"> <?PHP
                                                            echo $_SESSION['message1'];
                                                            unset($_SESSION['message1']);
                                                            ?>
                                    </p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div><?PHP }
                                        ?>

                            <h2 class="text-center text-dark ">KANHAIYALAL VINODKUMARI MEMORIAL EYE HOSPITAL</h2>
                            <h2 class="text-center text-dark "> <u>FORGOT PASSWORD</u> </h2>

                            <div class="text-center">
                                <img src="doctor.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="User Name" name="username" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="E-mail ID" name="mail" required>
                            </div>

                            <div class="text-center"><button type="submit" name="submit" class="btn btn-color px-5 mb-1 w-100">SEND PASSWORD</button></div>

                        </form>
                        <div class="text-center"><a href="index.php"><button type="submit" class="btn btn-color px-5 mb-5 w-100">LOGIN</button></a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </body>

    </html>


<?php } ?>