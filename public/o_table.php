<?php
session_start();
if (isset($_SESSION['username'])) {
    include "head.php";
    include "../dbcon.php";
    include "topandsidenav.php";
    include "function.php";
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

                            <th style="overflow-wrap: break-word;" scope="col" width="4%">View</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Edit</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Remove</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Create Bill</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Create Discharge</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //   $day = date('w');
                        $week_start = date('Y-m-d', strtotime("-3 days"));
                        $todayd = date('Y-m-d');
                        $sql = "SELECT * FROM `op_patient` WHERE `idstatus` = 'Active'  "; // WHERE rdate = '$todayd' 
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
                                        <p><?php // echo ++$counter; 
                                            ?></p>
                                    </td> -->
                                    <td style="overflow-wrap: break-word;"><?php echo $row["id"]; ?></td>
                                    <td style="overflow-wrap: break-word;text-transform:capitalize;"><?php echo $row['pre'] . " " . $row["fullname"]; ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row["age"]; ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row["gender"]; ?></td>

                                    <td style="overflow-wrap: break-word;">

                                        <form action="#" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">



                                            <button class="btn btn btn-info" type="submit" name="view" value="view"><i class="fas fa-street-view"></i> </button>
                                        </form>
                                    </td>

                                    <td style="overflow-wrap: break-word;">

                                        <form action="o_patient_edit.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">



                                            <button class="btn btn btn-secondary" type="submit" name="edit" value="edit"><i class="far fa-edit"></i> </button>
                                        </form>
                                    </td>

                                    <form method="POST" onSubmit="return confirm('Are you sure you want to Remove?');">
                                        <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                                        <td style="overflow-wrap: break-word;"><button class="btn btn-danger" type="submit" value="Remove" name="remove"><i class="far fa-trash-alt"></i> </button></td>
                                    </form>


                                    <td style="overflow-wrap: break-word;">

                                        
                                           

                                            <?php 
                                            $details = operation_bill_detail($row["id"]);
                                            if($details['pid'] == $row['id']){
                                                ?>
                                                <form action="" onsubmit="alert('Cash Memo Already created');">
                                               <button class="btn btn btn-danger" type="submit" name="bill" value="bill"><i class="fas fa-street-view" ></i> </button>
                                               </form>
                                               <?php
                                            }
                                            else{

                                                ?>
                                                <form action="o_bill_generate.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"> <button class="btn btn btn-success" type="submit" name="bill" value="bill"><i class="fas fa-street-view"></i> </button>
                                                </form>
                                                <?php
                                            }
                                            ?>

                                           
                                      
                                    </td>
                                    <td style="overflow-wrap: break-word;">

                                     



                                        <?php 
                                            $odetails = operation_discharge_detail($row["id"]);
                                            if($odetails['pid'] == $row['id']){
                                                ?>
                                                <form action="" onsubmit="alert('Discharge Papers Already created');">
                                               <button class="btn btn btn-danger" type="submit" name="discharge" value="discharge"><i class="fas fa-street-view" ></i> </button>
                                               </form>
                                               <?php
                                            }
                                            else{

                                                ?>
                                                <form action="o_discharge_generate.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"> <button class="btn btn btn-success" type="submit" name="discharge" value="discharge"><i class="fas fa-street-view"></i> </button>
                                                </form>
                                                <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                        <?php

                            }
                        } else {
                            // echo "0 results";
                        }



                        ?>

                        <?php
                        if (isset($_POST['remove'])) {
                            $id = $_POST['pid'];
                            $deletequery = "UPDATE `op_patient` SET `idstatus` = 'Removed' WHERE `op_patient`.`id` = $id;";
                            $query = mysqli_query($conn, $deletequery);
                            if ($query) {
                        ?>
                                <script>
                                    swal({
                                        title: "Removed Successfully",
                                        text: "Patient Detail Removed Sccessfully",
                                        icon: "success",
                                        button: "Close",
                                    }).then(function() {
                                        window.location = "o_table.php";
                                    });
                                </script>
                            <?php

                            } else {
                            ?>
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
                    <?php $detail = operation_patient_detail($_POST['id']); ?>
                    <table style="width: 100%;" class="mb-3">
                        <tbody>
                            <tr>
                                <td style="width: 30.9714%;">ID:</td>
                                <td style="width: 2%;">:<br></td>
                                <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                echo $detail['id'];
                                                            } ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30.9714%;">NAME:</td>
                                <td style="width: 2%;">:<br></td>
                                <td style="width: 66.912%; text-transform:capitalize;"><?php if (isset($_POST['view'])) {
                                                                echo $detail['ppre'] . " " . $detail['pname'];
                                                            } ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30.9714%;">AGE</td>
                                <td style="width: 2%;">:<br></td>
                                <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                echo $detail['age'];
                                                            } ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30.9714%;">GENDER</td>
                                <td style="width: 2%;">:<br></td>
                                <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                // echo $_POST['gender'];
                                                                if ($detail['gender'] == "M") {
                                                                    echo "MALE";
                                                                } elseif ($detail['gender'] == "F") {
                                                                    echo "FEMALE";
                                                                }
                                                            } ?></td>
                            </tr>

                            <tr>
                                <td style="width: 30.9714%;">RDATE & TIME</td>
                                <td style="width: 2%;">:<br></td>
                                <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                echo $detail['timestamp'];
                                                            } ?></td>
                            </tr>


                            <tr>
                                <td style="width: 30.9714%;">Email</td>
                                <td style="width: 2%;">:<br></td>

                                <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                echo $detail['email'];
                                                            } ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30.9714%;">PHONE NO.</td>
                                <td style="width: 2%;">:<br></td>

                                <td style="width: 66.912%;"><?php if (isset($_POST['view'])) {
                                                                echo $detail['phone'];
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