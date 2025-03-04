<?php
session_start();
if (isset($_SESSION['username'])) {
    include "head.php";
    include "../dbcon.php";
    include "topandsidenav.php";
    date_default_timezone_set("Asia/Kolkata");

?>







    <div class="card mb-3">
        <div class="card-body pt-0" style="margin-top:10px;padding:10px;">

            <div class="table-responsive scrollbar ">
                <table class="table  table-responsive table-bordered table-striped fs--1 mb-0 table-hover" id="myTable">

                    <thead>
                        <tr>
                            <!-- <th style="overflow-wrap: break-word;" scope="col"width="1%">S.No.</th> -->
                            <th style="overflow-wrap: break-word;" scope="col">ID</th>
                            <th style="overflow-wrap: break-word;" scope="col">Name</th>
                            <th style="overflow-wrap: break-word;" scope="col">Age</th>
                            <th style="overflow-wrap: break-word;" scope="col">Gender</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="5%">Checkup No.</th>
                            <!-- <th style="overflow-wrap: break-word;" scope="col">Fee</th> -->

                            <th style="overflow-wrap: break-word;" scope="col">rdate</th>
                            <th style="overflow-wrap: break-word;" scope="col">Payment</th>
                            <!-- <th style="overflow-wrap: break-word;" scope="col">Cheque No.</th> -->
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">View</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Edit</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Delete</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Print</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Print Receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //   $day = date('w');
                        $week_start = date('Y-m-d', strtotime("-3 days"));
                        $todayd = date('Y-m-d');
                        $sql = "SELECT * FROM `patients` WHERE rdate = '$todayd' ";
                        // $sql = "SELECT * FROM `patients` WHERE rdate BETWEEN '$week_start' AND '$todayd' ";
                        // echo  $sql;
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 0;
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {



                        ?>
                                <tr>
                                    <!-- <td style=" overflow-wrap: normal;">
                                        <p><?php echo ++$counter; ?></p>
                                    </td> -->
                                    <td style="overflow-wrap: break-word;"><?php echo $row["id"]; ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row['f_pre'] . " " . $row["name"]; ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row["dob"]; ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row["gender"]; ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row["checkup_no"]; ?></td>
                                    <!-- <td style="overflow-wrap: break-word;"><?php //echo $row["fee"]; ?></td> -->
                                    <td style="overflow-wrap: break-word;"><?php echo $row["rdate"]; ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row["payment"]; ?></td>
                                    <!-- <td style="overflow-wrap: anywhere;"><?php //echo $row["chno"]; ?></td> -->

                                    <td style="overflow-wrap: break-word;">

                                        <form action="#" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="name" value="<?php echo $row['f_pre'] . " " . $row["name"]; ?>">
                                            <input type="hidden" name="dob" value="<?php echo $row['dob']; ?>">
                                            <input type="hidden" name="gender" value="<?php echo $row['gender']; ?>">
                                            <input type="hidden" name="rdate" value="<?php echo $row['rdate']; ?>">
                                            <input type="hidden" name="payment" value="<?php echo $row['payment']; ?>">
                                            <input type="hidden" name="chno" value="<?php echo $row['chno']; ?>">
                                            <input type="hidden" name="checkup_no" value="<?php echo $row['checkup_no']; ?>">
                                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                            <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                                            <input type="hidden" name="fee" value="<?php echo $row["fee"]; ?>">


                                            <button class="btn btn btn-info" type="submit" name="view" value="view"><i class="fas fa-street-view"></i> </button>
                                        </form>
                                    </td>

                                    <td style="overflow-wrap: break-word;">

                                        <form action="pedit.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                            <input type="hidden" name="f_pre" value="<?php echo $row['f_pre']; ?>">
                                            <input type="hidden" name="dob" value="<?php echo $row['dob']; ?>">
                                            <input type="hidden" name="gender" value="<?php echo $row['gender']; ?>">
                                            <input type="hidden" name="rdate" value="<?php echo $row['rdate']; ?>">
                                            <input type="hidden" name="payment" value="<?php echo $row['payment']; ?>">
                                            <input type="hidden" name="chno" value="<?php echo $row['chno']; ?>">
                                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                            <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">

                                            <!-- <input class="btn btn btn-info" type="submit" name="edit" value="edit"> -->
                                            <button class="btn btn btn-secondary" type="submit" name="edit" value="edit"><i class="far fa-edit"></i> </button>
                                        </form>
                                    </td>

                                    <form method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
                                        <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                                        <td style="overflow-wrap: break-word;"><button class="btn btn-danger" type="submit" value="Delete" name="delete"><i class="far fa-trash-alt"></i> </button></td>
                                    </form>

                                    <td style="overflow-wrap: break-word;">


                                        <form action="print.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="name" value="<?php echo $row['f_pre'] . " " . $row["name"]; ?>">
                                            <input type="hidden" name="dob" value="<?php echo $row['dob']; ?>">
                                            <input type="hidden" name="gender" value="<?php echo $row['gender']; ?>">
                                            <input type="hidden" name="rdate" value="<?php echo $row['rdate']; ?>">
                                            <input type="hidden" name="fee" value="<?php echo $row['fee']; ?>">
                                            <input type="hidden" name="checkup" value="<?php echo $row['checkup_no']; ?>">



                                            <!-- <input class="btn btn-success" type="submit" value="Print" name="submit"> -->
                                            <button class="btn btn-success" type="submit" value="Print" name="submit"><i class="fas fa-print"></i> </button>
                                        </form>
                                    </td>
                                    <td style="overflow-wrap: break-word;">


                                        <form action="printreceipt.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="name" value="<?php echo $row['f_pre'] . " " . $row["name"]; ?>">
                                            <input type="hidden" name="dob" value="<?php echo $row['dob']; ?>">
                                            <input type="hidden" name="gender" value="<?php echo $row['gender']; ?>">
                                            <input type="hidden" name="rdate" value="<?php echo $row['rdate']; ?>">
                                            <input type="hidden" name="payment" value="<?php echo $row['payment']; ?>">
                                            <input type="hidden" name="chno" value="<?php echo $row['chno']; ?>">
                                            <input type="hidden" name="checkup" value="<?php echo $row["checkup_no"]; ?>">
                                            <input type="hidden" name="fee" value="<?php echo $row["fee"]; ?>">


                                            <!-- <input class="btn btn-success" type="submit" value="Print" name="submit"> -->
                                            <button class="btn btn-success" type="submit" value="Print" name="submit"><i class="fas fa-print"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php

                            }
                        } else {
                            // echo "0 results";
                        }



                        ?>

                        <?php
                        if (isset($_POST['delete'])) {
                            $id = $_POST['pid'];
                            $deletequery = "DELETE FROM `patients` WHERE id = '$id'";
                            $query = mysqli_query($conn, $deletequery);
                            if ($query) {
                        ?>
                                <script>
                                    swal({
                                        title: "Deleted Successfully",
                                        text: "Patient Detail Deleted Sccessfully",
                                        icon: "success",
                                        button: "Close",
                                    }).then(function() {
                                        window.location = "patient.php";
                                    });
                                </script>
                            <?php

                            } else {
                            ?>
                                 <script>
              
              swal({
                  title: "Something went wrong!",
                  text: "OOPS!",
                  icon: "warning",
                  button: "Close",

              });
          </script>
                        <?php
                            }
                        }
                        ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-xl modal-dialog modal-dialog-centered" role="document" style="max-width: 700px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">View Patient details </h4>
                    </div>
                    <div class="p-4 pb-0">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 30.9714%;">ID:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['id'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">NAME:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['name'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">AGE</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['dob'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">GENDER</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    // echo $_POST['gender'];
                                                                    if($_POST['gender'] == "M"){
                                                                        echo "MALE";
                                                                    }
                                                                    elseif($_POST['gender'] == "F"){
                                                                        echo "FEMALE";
                                                                    }
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">CHECKUP NO.</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['checkup_no'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">RDATE</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['rdate'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">FEE</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['fee'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">PAYMENT</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['payment'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">CHEQUE NO.</td>
                                    <td style="width: 2%;">:<br></td>

                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['chno'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">Email</td>
                                    <td style="width: 2%;">:<br></td>

                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['email'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">PHONE NO.</td>
                                    <td style="width: 2%;">:<br></td>

                                    <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                    echo $_POST['phone'];
                                                                } ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST['view'])) {

        echo '<script type="text/javascript">
$(document).ready(function(){
$("#view").modal("show");
});
</script>';
    }
    ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                order: [0, 'desc'],
              
            });
        });
    </script>
<?php include "footer.php";
} else {
    echo "<script>window.location.href = '../index.php'; </script>";
}
?>