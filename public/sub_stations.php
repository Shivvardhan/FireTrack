<?php
session_start();
if ($_SESSION['access_level'] == 'admin') {
    include "head.php";
    include "../dbcon.php";
    include "topandsidenav.php";
    date_default_timezone_set("Asia/Kolkata");

?>





<form action="" method="POST">
    <button class="btn btn btn-primary" type="submit" name="add" value="add"><i class="far fa-plus-square"></i>
        &nbsp;Create New Station</button><br>
</form>
<div class="card mb-3 mt-2">
    <div class="card-body pt-0" style="margin-top:10px;padding:10px;">

        <div class="table-responsive scrollbar ">
            <table class="table  table-responsive table-bordered table-striped fs--1 mb-0 table-hover" id="myTable">

                <thead>
                    <tr>
                        <!-- <th style="overflow-wrap: break-word;" scope="col"width="1%">S.No.</th> -->
                        <th style="overflow-wrap: break-word;" scope="col">ID</th>
                        <th style="overflow-wrap: break-word;" scope="col">Name</th>
                        <th style="overflow-wrap: break-word;" scope="col">Address</th>
                        <th style="overflow-wrap: break-word;" scope="col">Man Power</th>
                        <th style="overflow-wrap: break-word;" scope="col">Fire Trucks</th>
                        <th style="overflow-wrap: break-word;" scope="col">Equipments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `sub-stations`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 0;
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {



                        ?>
                    <tr>
                        <td style=" overflow-wrap: normal;">
                            <p><?php echo ++$counter;
                                            ?></p>
                        </td>
                        <!-- <td style="overflow-wrap: break-word;"><?php //echo $row["sno"]; 
                                                                                ?></td> -->
                        <td style="overflow-wrap: break-word;"><?php echo $row['full_name'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['username'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['password'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['emailid'] ?></td>
                        <td style="overflow-wrap: break-word;"><?php echo $row['access_level'] ?></td>

                        <td style="overflow-wrap: break-word;">

                            <form action="#" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row["username"]; ?>">
                                <input type="hidden" name="pass" value="<?php echo $row['password'] ?>">
                                <input type="hidden" name="email" value="<?php echo $row['emailid'] ?>">
                                <input type="hidden" name="access_level" value="<?php echo $row['access_level'] ?>">
                                <input type="hidden" name="name" value="<?php echo $row['full_name'] ?>">

                                <button class="btn btn btn-secondary" type="submit" name="edit" value="edit"><i
                                        class="far fa-edit"></i> </button>
                            </form>
                        </td>





                    </tr>
                    <?php

                            }
                        } else {
                            echo "0 results";
                        }



                        ?>


                </tbody>


            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Edit User</h4>
                    </div>
                    <div class="p-4 pb-0">

                        <!-- <input type="hidden" name="id" value="<?php //echo $_POST['id']; 
                                                                        ?>"> -->
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">Full Name</label>
                            <input class="form-control" id="recipient-name" type="text"
                                value="<?php echo $_POST['name']; ?>" name="name" />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">Username</label>
                            <input class="form-control" id="recipient-name" type="text"
                                value="<?php echo $_POST['id']; ?>" name="id" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="message-text">Encrypted Password</label>
                            <input class="form-control" id="recipient-name" type="text"
                                value="<?php echo $_POST['pass']; ?>" name="pass" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="message-text">Email-Id</label>
                            <input class="form-control" id="recipient-name" type="text"
                                value="<?php echo $_POST['email']; ?>" name="email" />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="message-text">Account Type</label>
                            <select class="form-select" required name="access">

                                <option <?php if(empty($_POST['access_level'])){echo 'selected';} ?> value="">select
                                </option>
                                <option <?php if($_POST['access_level'] == 'admin'){echo 'selected';} ?> value="admin">
                                    Admin</option>
                                <option <?php if($_POST['access_level'] == 'user'){echo 'selected';} ?> value="user">
                                    User</option>


                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <!-- <button class="btn btn-primary" type="button" name="change">change price</button> -->
                    <input type="submit" class="btn btn-primary" value="Update Profile" name="change">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST">
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Add New Station</h4>
                    </div>
                    <div class="p-4 pb-0">

                        <!-- <input type="hidden" name="id" value="<?php //echo $_POST['id']; 
                                                                        ?>"> -->
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">Station Name</label>
                            <input class="form-control" id="recipient-name" type="text" name="station_name" required />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">Address</label>
                            <input class="form-control" id="recipient-name" type="text" name="address" required />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="message-text">Man Power</label>
                            <input class="form-control" id="recipient-name" type="number" name="man_power" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Add" name="add">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    if (isset($_POST['change'])) {
        $id = $_POST['id'];
        // $pass = $_POST['pass'];
        // $pass = md5($pass);
        $email = $_POST['email'];
        $access = $_POST['access'];
        $name = $_POST['name'];


        $sql = "UPDATE users
    SET  emailid = '$email' , access_level = '$access', full_name = '$name'
    WHERE username = '$id';";

        if ($conn->query($sql) === TRUE) {
    ?>
<script>
swal({
    title: "Updated Successfully",
    text: "Profile updated Sccessfully",
    icon: "success",
    button: "Close",
}).then(function() {
    window.location = "users.php";
});
</script>
<?php
        } else { ?>
<script>
Swal({
    icon: 'error',
    title: 'Oops...',
    text: 'Something went wrong!',
    button: "Close",

})
</script>
<?php
        }
    }
    ?>
<?php
    if (isset($_POST['addnew'])) {
        $id = $_POST['id'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $email = $_POST['email'];
        $accessl = $_POST['accessl'];
        $fname = $_POST['fname'];


        $sql = "INSERT INTO `users`( `username`, `password`, `emailid` ,`full_name` , `access_level`) VALUES ('$id','$pass','$email','$fname','$accessl')";

        if ($conn->query($sql) === TRUE) {
    ?>
<script>
swal({
    title: "Created  Successfully",
    text: "New User Added Sccessfully",
    icon: "success",
    button: "Close",
}).then(function() {
    window.location = "users.php";
});
</script>
<?php
        } else { ?>
<script>
Swal({
    icon: 'error',
    title: 'Oops...',
    text: 'Something went wrong!',
    button: "Close",

})
</script>
<?php
        }
    }
    ?>


<?php

    if (isset($_POST['edit'])) {

        echo '<script type="text/javascript">
$(document).ready(function(){
    $("#edit").modal("show");
});
</script>';
    }
    ?>
<?php

    if (isset($_POST['add'])) {

        echo '<script type="text/javascript">
$(document).ready(function(){
    $("#add").modal("show");
});
</script>';
    }
    ?>
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        // order: [ 0, 'desc' ]
    });
});
</script>
<?php include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>