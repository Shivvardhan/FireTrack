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
                            <th style="overflow-wrap: break-word;" scope="col"> Patient ID</th>
                            <!-- <th style="overflow-wrap: break-word;" scope="col"> Bill ID</th> -->
                            <th style="overflow-wrap: break-word;" scope="col">Patient Name</th>
                            <th style="overflow-wrap: break-word;" scope="col">Father's Name</th>


                            <th style="overflow-wrap: break-word;" scope="col" width="4%">View</th>
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Edit</th>
                            <!-- <th style="overflow-wrap: break-word;" scope="col" width="4%">Remove</th> -->
                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Print Discharge</th>
                            <!-- <th style="overflow-wrap: break-word;" scope="col" width="4%">Create Discharge</th> -->


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //   $day = date('w');
                        $week_start = date('Y-m-d', strtotime("-3 days"));
                        $todayd = date('Y-m-d');
                        $sql = "SELECT * FROM `op_discharge`  "; // WHERE rdate = '$todayd' 
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
                                    <td style="overflow-wrap: break-word;"><?php echo $row["pid"]; ?></td>
                                    <!-- <td style="overflow-wrap: break-word;"><?php //echo $row["billid"]; ?></td> -->
                                    <td style="overflow-wrap: break-word;text-transform:capitalize;"><?php $detail = operation_patient_detail($row['pid']);
                                                                            echo $detail['ppre'] . " " . $detail['pname']; ?></td>
                                    <td style="overflow-wrap: break-word;text-transform:capitalize;"><?php
                                                                            echo $detail['fpre'] . " " . $detail['fname']; ?></td>


                                    <td style="overflow-wrap: break-word;">

                                        <form action="#" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['pid']; ?>">



                                            <button class="btn btn btn-info" type="submit" name="billview" value="billview"><i class="fas fa-street-view"></i> </button>
                                        </form>
                                    </td>

                                    <td style="overflow-wrap: break-word;">

                                        <form action="o_discharge_edit.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['pid']; ?>">



                                            <button class="btn btn btn-secondary" type="submit" name="edit" value="edit"><i class="far fa-edit"></i> </button>
                                        </form>
                                    </td>



                                    <td style="overflow-wrap: break-word;">

                                        <form action="o_discharge_print.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['pid']; ?>">



                                            <button class="btn btn btn-success" type="submit" name="bill" value="bill"><i class=" fas fa-print"></i> </button>
                                        </form>
                                    </td>

                                </tr>
                        <?php

                            }
                        } else {
                            // echo "0 results";
                        }



                        ?>


                    </tbody>


                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="billview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-xl modal-dialog modal-dialog-centered" role="document" style="max-width: 700px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel" style=" text-transform:capitalize;">Patient Discharge Papers details </h4>
                    </div>
                    <div class="p-4 pb-0">
                        <?php $details = operation_bill_detail($_POST['id']); ?>
                        <?php $detail = operation_patient_detail($_POST['id']); ?>
                        <table style="width: 100%;" class="mb-3" class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 30.9714%;">ID:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['billview'])) {
                                                                    echo $details['pid'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">Patient Name:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%; text-transform:capitalize;"><?php if (isset($_POST['billview'])) {
                                                                    echo $detail['ppre'] . ' ' . $detail['pname'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">Fathers Name:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%; text-transform:capitalize;"><?php if (isset($_POST['billview'])) {
                                                                    echo $detail['fpre'] . ' ' . $detail['fname'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;" colspan="3">
                                        <hr>
                                    </td>

                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">Total Amount:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['billview'])) {
                                                                    echo $details['total'];
                                                                } ?></td>
                                </tr>
                                
                                <tr>
                                    <td style="width: 100%;" colspan="3">
                                        <hr>
                                    </td>

                                </tr>
                                <?php $odetail = operation_discharge_detail($_POST['id']) ?>
                                <tr>
                                    <td style="width: 30.9714%;">Diagnosis:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%; text-transform:capitalize;"><?php if (isset($_POST['billview'])) {
                                                                    echo $odetail['diagnosis'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">Surgery Procedure:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%; text-transform:capitalize;"><?php if (isset($_POST['billview'])) {
                                                                    echo $odetail['surgery'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">DOA:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['billview'])) {
                                                                    echo $odetail['doa'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">T:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['billview'])) {
                                                                 echo $odetail['doatime'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">DOS:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['billview'])) {
                                                                   echo $odetail['dos'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">DOD:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['billview'])) {
                                                                   echo $odetail['dod'];
                                                                } ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30.9714%;">T.:</td>
                                    <td style="width: 2%;">:<br></td>
                                    <td style="width: 66.912%;"><?php if (isset($_POST['billview'])) {
                                                                   echo $odetail['dodtime'];
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

    if (isset($_POST['billview'])) {

        echo '<script type="text/javascript">
$(document).ready(function(){
$("#billview").modal("show");
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