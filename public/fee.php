<?php
session_start();
if ($_SESSION['access_level'] == 'admin') {
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
                            <th style="overflow-wrap: break-word;" scope="col">Rate</th>


                            <th style="overflow-wrap: break-word;" scope="col" width="4%">Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `rate`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // $counter = 0;
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {



                        ?>
                                <tr>
                                    <!-- <td style=" overflow-wrap: normal;">
                                        <p><?php //echo ++$counter; 
                                            ?></p>
                                    </td> -->
                                    <td style="overflow-wrap: break-word;"><?php echo $row["sno"]; ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row['name'] ?></td>
                                    <td style="overflow-wrap: break-word;"><?php echo $row['rate'] ?></td>

                                    <td style="overflow-wrap: break-word;">

                                        <form action="#" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row["sno"]; ?>">
                                            <input type="hidden" name="name" value="<?php echo $row['name'] ?>">
                                            <input type="hidden" name="price" value="<?php echo $row['rate'] ?>">

                                            <button class="btn btn btn-secondary" type="submit" name="edit" value="edit"><i class="far fa-edit"></i> </button>
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
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body p-0">
                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                            <h4 class="mb-1" id="modalExampleDemoLabel">Change Price</h4>
                        </div>
                        <div class="p-4 pb-0">

                            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                            <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">Name</label>
                                <input class="form-control" id="recipient-name" type="text" value="<?php echo $_POST['name']; ?>" name="name" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="message-text">Price</label>
                                <div class="input-group flex-nowrap"><span class="input-group-text" id="addon-wrapping">₹</span><input class="form-control" type="text" placeholder="" value="<?php echo $_POST['price']; ?>" name="price" /></div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <!-- <button class="btn btn-primary" type="button" name="change">change price</button> -->
                        <input type="submit" class="btn btn-primary" value="Change Price" name="change">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['change'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];


        $sql = "UPDATE rate
    SET  rate = '$price'
    WHERE sno = '$id';";

        if ($conn->query($sql) === TRUE) {
    ?>
            <script>
                swal({
                    title: "Updated Successfully",
                    text: "fee updated Sccessfully",
                    icon: "success",
                    button: "Close",
                }).then(function() {
                    window.location = "fee.php";
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